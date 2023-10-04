<div>
    @php
    $total=0;
    $comisiones=0;
    @endphp

    @foreach ($pedidos as $pedido)
        
        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $total+=$orden->producto->precio-$orden->producto->comision_invitado;

            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $total+=$orden->producto->precio;

            @endphp    
            @endforeach

        @endif

        @if($pedido->pedidoable_type=="App\Models\Socio")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $comisiones+=$orden->producto->comision_socio;

            @endphp    
            @endforeach

        @endif
        @if($pedido->pedidoable_type=="App\Models\Invitado")
            @foreach ($pedido->ordens as $orden)
            @php
                
                $comisiones+=$orden->producto->comision_invitado;

            @endphp    
            @endforeach

        @endif

    @endforeach



    <div class="card">

        <h3 class="ml-4 mt-2 font-bold">Buscador de Pedidos:</h3>
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre">
        </div>

        @if ($pedidos->count())
            
      
            <div class="card-body">

               
               


                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Captador</th>
                        <th class="text-center">Estado</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Subtotal</th>
                        <th></th>

                    </thead>
                    
                    <tbody>
                        @foreach ($pedidos->reverse() as $pedido)
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->vendedor->name}}</td>
                                <td class="text-center">
                                    @switch($pedido->status)
                                      @case(1)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                              Borrador
                                          </span>
                                          @break
                                      @case(2)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                              Pendiente de Pago
                                          </span>
                                          @break
                                      @case(3)
                                        <a class="btn btn-warning btn-sm" href="">Procesando pago</a>
                                          @break
                                        @case(4)
                                            <a class="btn btn-warning btn-sm" href="">Pendiente de diseño</a>
                                          @break
                                        @case(5)
                                            <a class="btn btn-warning btn-sm" href="">Pendiente de produccion</a>
                                          @break
                                        @case(6)
                                            <a class="btn btn-warning btn-sm" href="">Pendiente de despacho</a>
                                          
                                          @break
                                        @case(7)
                                            <a class="btn btn-success btn-sm" href="">DESPACHADO</a>
                                          @break
                                        @case(8)
                                            <a class="btn btn-success btn-sm" href="">PROCESANDO COMISIÓN</a>
                                          @break
                                        @case(9)
                                            <a class="btn btn-dark btn-sm" href="">CERRADO</a>
                                          @break
                                      @default
                                          
                                    @endswitch
                                </td>
                                <td>
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                    @foreach ($socios as $socio)
                                            
                                            @if($socio->id == $pedido->pedidoable_id)
                                                {{$socio->user->name}}
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Socio
                                                </span>
                                                <br>
                                                {{$pedido->transportista->name}}
                                            @endif
                                    @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                    {{$invitado->name}} <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Invitado
                                                    </span>
                                                    {{$pedido->transportista->name}}
                                                @endif
                                        @endforeach
                                    @endif
                                </td>

                                @php
                                $subtotal=0;
                                @endphp

                                @if($pedido->pedidoable_type=="App\Models\Socio")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->precio-$orden->producto->comision_invitado;

                                    @endphp    
                                    @endforeach

                                @endif
                                @if($pedido->pedidoable_type=="App\Models\Invitado")
                                    @foreach ($pedido->ordens as $orden)
                                    @php
                                        
                                        $subtotal+=$orden->producto->precio;

                                    @endphp    
                                    @endforeach

                                @endif

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{$pedido->created_at->format('l')}}</div>
                                    <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 ml-3">${{number_format($subtotal)}}</div>
                                    
                                    
                                </td>


                                
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('vendedor.pedidos.edit',$pedido)}}">Ver detalles</a>
                                </td>
                                <td width="10px">
                                    @can('Super admin')
                                        <form action="{{route('admin.pedidos.destroy',$pedido)}}" method="POST">
                                            @csrf
                                            @method('delete')
        
                                            <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                                        </form>
                                    @endcan
                                    
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                    <tbody>
                        @foreach ($pedidosint->reverse() as $pedido)
                            @if ($pedido->status==2)
                                
                                <tr>
                                    <td>{{$pedido->id}}</td>
                                    <td>{{$pedido->vendedor->name}}</td>
                                    <td class="text-center">
                                        @switch($pedido->status)
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Borrador
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Pendiente de Pago
                                            </span>
                                            @break
                                        @case(3)
                                            <a class="btn btn-warning btn-sm" href="">Procesando pago</a>
                                            @break
                                            @case(4)
                                                <a class="btn btn-warning btn-sm" href="">Pendiente de diseño</a>
                                            @break
                                            @case(5)
                                                <a class="btn btn-warning btn-sm" href="">Pendiente de produccion</a>
                                            @break
                                            @case(6)
                                                <a class="btn btn-warning btn-sm" href="">Pendiente de despacho</a>
                                            
                                            @break
                                            @case(7)
                                                <a class="btn btn-success btn-sm" href="">DESPACHADO</a>
                                            @break
                                            @case(8)
                                                <a class="btn btn-success btn-sm" href="">PROCESANDO COMISIÓN</a>
                                            @break
                                            @case(9)
                                                <a class="btn btn-dark btn-sm" href="">CERRADO</a>
                                            @break
                                        @default
                                            
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                    {{$socio->user->name}}
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Socio
                                                    </span>
                                                    <br>
                                                    {{$pedido->transportista->name}}
                                                @endif
                                        @endforeach
                                        @endif
                                        @if($pedido->pedidoable_type=='App\Models\Invitado')
                                            @foreach ($invitados as $invitado)
                                                    
                                                    @if($invitado->id == $pedido->pedidoable_id)
                                                        {{$invitado->name}} <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            Invitado
                                                        </span>
                                                        {{$pedido->transportista->name}}
                                                    @endif
                                            @endforeach
                                        @endif
                                    </td>

                                    @php
                                    $subtotal=0;
                                    @endphp

                                    @if($pedido->pedidoable_type=="App\Models\Socio")
                                        @foreach ($pedido->ordens as $orden)
                                        @php
                                            
                                            $subtotal+=$orden->producto->precio-$orden->producto->comision_invitado;

                                        @endphp    
                                        @endforeach

                                    @endif
                                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                                        @foreach ($pedido->ordens as $orden)
                                        @php
                                            
                                            $subtotal+=$orden->producto->precio;

                                        @endphp    
                                        @endforeach

                                    @endif

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{$pedido->created_at->format('l')}}</div>
                                        <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 ml-3">${{number_format($subtotal)}}</div>
                                        
                                        
                                    </td>


                                    
                                    <td width="10px">
                                        <a class="btn btn-primary" href="{{route('vendedor.pedidos.edit',$pedido)}}">Ver detalles</a>
                                    </td>
                                    <td width="10px">
                                        @can('Super admin')
                                            <form action="{{route('admin.pedidos.destroy',$pedido)}}" method="POST">
                                                @csrf
                                                @method('delete')
            
                                                <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                                            </form>
                                        @endcan
                                        
                                    </td>
                                </tr>

                            @endif
                           
                            
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$pedidos->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros que coincidan</strong>
            </div>
       

        @endif
    </div>
</div>
