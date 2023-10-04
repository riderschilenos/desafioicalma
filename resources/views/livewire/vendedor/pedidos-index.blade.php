<div class="container py-4">
    @php
        $total=0;
        $pendiente=0;
        $comisiones=0;
        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp
    @foreach ($pedidos as $pedido)
            
            @if($pedido->pedidoable_type=="App\Models\Socio")
                @foreach ($pedido->ordens as $orden)
                @php
                    
                    $total+=$orden->producto->precio-$orden->producto->descuento_socio;
                    

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
            @if($pedido->status==7)
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

            @endif

            @if($pedido->pedidoable_type=="App\Models\Socio")
                @if($pedido->status==2)
                    @foreach ($pedido->ordens as $orden)
                    @php
                        
                        $pendiente+=$orden->producto->precio-$orden->producto->descuento_socio;

                    @endphp    
                    @endforeach
                @endif

            @endif
            @if($pedido->pedidoable_type=="App\Models\Invitado")
                @if($pedido->status==2)
                    @foreach ($pedido->ordens as $orden)
                    @php
                        
                        $pendiente+=$orden->producto->precio;

                    @endphp    
                    @endforeach
                @endif

            @endif
            

    @endforeach


                    <div class="max-w-xs mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6">
                        <article>
                            <figure>
                                <a href="https://chat.whatsapp.com/EEb1N0D0ubK9QHX3pYCPjH"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/whatsapp.png')}}" alt=""></a>
                            </figure>
        
                        
                        </article>

                    
                    </div>

    @livewire('vendedor.catalogo-productos')

        <div x-data="{whatsap: true}">

            <div class="justify-center mt-4 grid grid-cols-2 lg:grid-cols-3 gap-4">

                <div class="w-full rounded-xl flex items-center justify-center mx-auto">
                        <a class="cursor-pointer text-gray-500 font-bold text-center" wire:click="periodo">
                        @if ($periodo=="mensual")
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                        @else
                        <i class="fas fa-toggle-off text-2xl text-red-600"></i>
                        @endif
                        Todos/Activos
                        </a>
                </div>
        
                <div class="w-full rounded-xl flex items-center justify-around">
                    <a class="btn bg-gray-700 text-white ml-2 text-center text-xl" href="{{route('vendedor.pedidos.precios')}}">Precios y Comisiones</a>
                </div>
        
                
        
                <div class="w-full rounded-xl flex items-center justify-center col-span-3 md:col-span-1 order-2 md:order-3">
                    @can('Super admin')
                        <a class="btn btn-primary ml-2 text-center text-xl" href="{{ route('ticket.pistas.create') }}">Nueva Pista</a>
                        <a class="btn btn-primary ml-2 text-center text-xl" href="{{ route('organizador.eventos.index') }}">Nuevo Evento</a>
                    @endcan 
                    <button class="btn btn-success ml-2 text-center text-xl" x-on:click="whatsap=!whatsap">Whatsapp RCH</button>
                    <a class="btn btn-success ml-2 text-center text-xl" href="{{route('vendedor.pedidos.create')}}">Nuevo Pedido</a>
                  
                </div>
                
                
                
            </div>

            <div x-show="!whatsap">
            
                @livewire('admin.whatsapp-sender-cliente')

            </div>
        </div>
        <div class="md:hidden grid grid-cols-3 gap-x-2 justify-center my-4 items-center">
            <div class="items-center mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-green-700 px-3 text-[#191D23]">
                <h1 class="text-center text-sm">Venta <br>
                    @if ($periodo=="mensual")
                    Activa
                    @else
                    Total
                    @endif</h1>
                <h1 class="text-center mx-1">${{number_format($total)}}</h1>
            </div>
            <a href="{{route('vendedor.pedidos.prepay')}}">
                <div class="items-center mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-[#E7EAEE] px-3 text-[#191D23]">
                    <h1 class="text-center text-sm">Pagar Pendientes</h1>
                    <h1 class="text-center mx-1">${{number_format($pendiente)}}</h1>
                </div>
            </a>
            <a href="{{route('vendedor.pedidos.comisiones')}}">
                <div class="items-center mt-[14px] w-full mx-2 cursor-pointer bg-white  rounded-full border border-[#E7EAEE] px-3 text-[#191D23]">
                    <h1 class="text-center text-sm">Retirar Comisiones</h1>
                    <h1 class="text-center mx-1">${{number_format($comisiones)}}</h1>
                </div>
            </a>
        </div>
        <div class="hidden md:block max-w-5xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">     
            <div class="justify-between mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                    <img class="" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                    <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800">${{number_format($total)}}</h1>
                    <span class="text-gray-500">Venta 
                        @if ($periodo=="mensual")
                        Activa
                        @else
                        Total
                        @endif</span>
                    </div>
                </div>

                <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                    <img class="" src="https://i.imgur.com/Qnmqkil.png" alt="" />
                    <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800">${{number_format($pendiente)}}</h1>
                    <span class="text-gray-500">Pagos Pendientes</span>
                    <a href="{{route('vendedor.pedidos.prepay')}}">
                    <span class="text-blue-500 font-bold">PAGAR</span></a>
                    </div>
                </div>

                

                <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
                    <img class="ml-6" src="https://i.imgur.com/dJeEVcO.png" alt="" />
                    <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800">${{number_format($comisiones)}}</h1>
                    <span class="text-gray-500">Comisiones</span>
                    <a href="{{route('vendedor.pedidos.comisiones')}}">
                    <span class="text-blue-500 font-bold">RETIRAR</span></a>
                    </div>
                </div>
                <!-- 

                <div class="bg-white w-1/3 rounded-xl shadow-lg flex items-center justify-around">
                    
                    <div class="text-center">
                        <span class="text-gray-500">BONO</span>
                        <h1 class="text-4xl font-bold text-gray-800">$500.000</h1>
                        <span class="text-gray-500">En ventas</span>
                    </div>
                    <div class="text-center">
                        <img src="https://static.vecteezy.com/system/resources/previews/001/609/741/non_2x/padlock-security-symbol-isolated-cartoon-free-vector.jpg" class="h-20" alt="" />
                        <span class="text-gray-500">MAS INFO</span>
                    </div>       
                </div>
                -->
                
            </div>
        </div>
   <x-table-responsive>
       {{-- comment 
       
      <div class="px-6 py-4 flex">
          <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre o rut del cliente">
          
      </div>--}}

      @if ($pedidos->count())

          <table class="min-w-full divide-y divide-gray-200 mb-14">
              <thead class="bg-gray-50">
              <tr>
                  <th class="px-6 py-3 text-center text-xs font-medium text-gray-500">
                  Cliente / Subtotal
                  </th>
               
                
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Productos
                  </th>
                 
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Fecha
                  </th>
                  <th class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                  </th>
              </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($pedidos->reverse() as $pedido)
                  
                          <tr>
                            @php
                            $subtotal=0;
                            @endphp

                            @if($pedido->pedidoable_type=="App\Models\Socio")
                                @foreach ($pedido->ordens as $orden)
                                @php
                                    
                                    $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;

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

                              <td class="px-6 py-4 content-center">
                                  <div class="flex items-center">
                                     
                                      <div class="ml-2 flex-shrink-0 h-10 w-10">
                                        <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                            @isset($pedido->image)
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                            @else
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                            @endisset
                                        </a>
                                      </div>
                                      <div class="ml-4 whitespace-nowrap">
                                            <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                                <div class="text-sm font-medium text-gray-900">
                                                    
                                                        @if($pedido->pedidoable_type=='App\Models\Socio')
                                                            @foreach ($socios as $socio)
                                                                    
                                                                    @if($socio->id == $pedido->pedidoable_id)
                                                                        <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                                                            {{$socio->user->name}}
                                                                        
                                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                Socio
                                                                            </span>
                                                                       
                                                                    @endif
                                                            @endforeach
                                                        @endif
                                                        @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                            @foreach ($invitados as $invitado)
                                                                    
                                                                    @if($invitado->id == $pedido->pedidoable_id)
                                                                  
                                                                        {{$invitado->name}} 
                                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                            Invitado
                                                                        </span>
                                                                 
                                                                    @endif
                                                            @endforeach
                                                        @endif


                                                </div>
                                                
                                                <div class="text-sm text-gray-500">

                                               
                                                      
                                                            @if($pedido->pedidoable_type=='App\Models\Socio')
                                                                
                                                                @foreach ($socios as $socio)
                                                                    @if(!is_null($socio->direccion))
                                                                        @if($socio->id == $pedido->pedidoable_id)
                                                                            {{$socio->direccion->comuna.", ".$socio->direccion->region}} 
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                                @foreach ($invitados as $invitado)
                                                                    
                                                                        @if($invitado->id == $pedido->pedidoable_id)
                                                                        
                                                                            @if(!is_null($invitado->direccion))
                                                                                {{$invitado->direccion->comuna.", ".$invitado->direccion->region}}
                                                                            @else
                                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                    FALTA DIRECCIÓN DE DESPACHO
                                                                                </span>
                                                                            @endif
                                                                        
                                                                        @endif
                                                                    
                                                                @endforeach
                                                            @endif
                                                        <br>
                                                        @switch($pedido->transportista->id)
                                                            @case(1)
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    {{$pedido->transportista->name}}
                                                                </span>
                                                                @break
                                                            @case(2)
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                    {{$pedido->transportista->name}}
                                                                </span>
                                                                @break
                                                                @case(3)
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                    {{$pedido->transportista->name}}
                                                                </span>
                                                                @break
                                                            
                                                            @default
                                                                
                                                        @endswitch
                                                </div>
                                            </a>
                                      </div>
                                        <div class="ml-auto whitespace-nowrap">
                                            <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                                <div class="text-sm text-gray-900 ml-auto text-center mb-3">${{number_format($subtotal)}}</div>
                                               
                                            </a>
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
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    Procesando Pago
                                                </span>
                                                @break
                                            @case(4)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pendiente de diseño
                                                </span>
                                                @break
                                                @case(5)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Pendiente de producción
                                                </span>
                                                @break
                                                @case(6)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pendiente de despacho
                                                </span>
                                                @break
                                                @case(7)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Despachado
                                                </span>
                                                @break
                                                @case(8)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Procesando Comisión
                                                </span>
                                                @break
                                                @case(9)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    Cerrado
                                                </span>
                                                @break
                                            @default
                                                
                                            @endswitch
                                        </div>
                                  </div>
                            </td>

                         

                          

                            <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900 ml-3">{{$pedido->Ordens->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                  <div class="text-sm text-gray-500">Productos</div>
                            </td>

                              

                              

                           
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                            </td>

                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="{{route('vendedor.pedidos.edit',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                
                              </td>
                          </tr>

                  @endforeach
              <!-- More people... -->
              </tbody>
          </table>
      @else
          <div class="px-6 py-4">
              No hay ningun registro coincidente
          </div>
      @endif 
      
    </x-table-responsive>

</div>
