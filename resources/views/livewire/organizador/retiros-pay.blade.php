<div>

    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vendedor / Trabajador</th>
                        <th>Pedidos</th>
                        <th>Metodo</th>
                        <th>Cantidad</th>
                        
                        <th class="text-center">Fecha Solicitud</th>
                        <th class="text-center">Fecha Pago</th>

                        <th class="text-center">Transferir</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        @if ($user->retiros)
                            @php
                                $subtotal=0;
                                $total=0;
                            @endphp
                            @foreach ($user->retiros as $retiro)
                                @if ($retiro->estado==1)
                                    @php
                                        $subtotal+=1;
                                    @endphp      
                                @endif
                            @endforeach
                            @foreach ($user->retiros as $retiro)
                                @if ($retiro->estado==1)
                                    @foreach ($selected as $item)
                                        @if ($retiro->id==$item)
                                            @php
                                                $total+=$retiro->cantidad;
                                            @endphp      
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            @if ($subtotal>0)
                                <tr>
                                    <td>

                                    </td>
                                    <td> 
                                        {{$user->name}}
                                   
                            
                                    </td>
                                  
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['organizador.retiros.update',$retiro],'files'=>true , 'autocomplete'=>'off', 'method'=> 'PUT' ]) !!}
                                                            @csrf

                                                                <div class="h-32">
                                                                    <h1 class="text-xl text-center"><b>$</b> {{number_format($total)}}</h1>
                                                                    <hr class="w-full">
                                                                    
                                                                    @if ($retiro->user->vendedor)
                                            

                                                                    <h1 class="text-md text-center"><b>Nombre:</b> {{$retiro->user->vendedor->user->name}}</h1>
                                                                    <h1 class="text-md text-center"><b>Rut:</b> {{$retiro->user->vendedor->rut}}</h1>
                                                                    <h1 class="text-md text-center"><b>Banco:</b> {{$retiro->user->vendedor->banco}}</h1>
                                                                    <h1 class="text-md text-center"><b>Cuenta:</b> {{$retiro->user->vendedor->tipo_cuenta}}</h1>
                                                                    <h1 class="text-md text-center"><b>Nro Cuenta:</b> {{$retiro->user->vendedor->nro_cuenta}}</h1>
                                                                    
                                                                    @endif

                                                                    <hr class="w-full">
                                                                    {!! Form::file('comprobante', ['class'=>'form-input w-full mt-6'.($errors->has('comprobante')?' border-red-600':''), 'id'=>'comprobante','accept'=>'image/*']) !!}
                                                                    @error('foto')
                                                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                    @enderror

                                                                    
                                                                </div>

                                                                @foreach ($selected as $item)
                                                                    <input type="hidden" name="selected[]" value="{{$item}}">
                                                                @endforeach

                                                                <div class="flex justify-center">
                                                                    {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                                </div>
                                                            
                                            {!! Form::close() !!}
                                    </td>
                                    <td> 
                                        <form action="{{route('admin.gastos.destroy',$retiro)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            @foreach ($selected as $item)
                                                <input type="hidden" name="selected[]" value="{{$item}}">
                                            @endforeach

                                            <button class="btn btn-danger btn-sm" type="submit"> RECHAZAR </button>
                                        </form>
                                    </td>
                                
                                    
                                </tr>
                            
                                @foreach ($user->retiros as $retiro)
                                    @if ($retiro->estado==1)
                                    
                                
                                        <tr>
                                            <td>

                                                <input type="checkbox" wire:model="selected" value="{{$retiro->id}}" class="mr-4 mt-2">
                                                {{$retiro->id}}
                                                </td>
                                            <td> 
                                                @if($retiro->user)
                                                    {{$retiro->user->name}}<br>
                                                @endif
                                            </td>
                                            <td> 
                {{-- comment                                               @if ($gasto->gastotype->id==2 || $gasto->gastotype->id==3)
                                                        
                                                        @foreach ($gasto->ordens as $orden)
                                                            Orden {{$orden->id}} - $1500 <br>
                                                        @endforeach
                                                        
                                                @else
                                                        @foreach ($gasto->pedidos as $pedido)
                                                            @php
                                                            $subtotal=0;
                                                            @endphp
                                
                                                            @if($pedido->pedidoable_type=="App\Models\Socio")
                                                            @foreach ($pedido->ordens as $orden)
                                                            @php
                                                                
                                                                $subtotal+=$orden->producto->comision_socio;
                                
                                                            @endphp    
                                                            @endforeach
                                
                                                            @endif
                                                            @if($pedido->pedidoable_type=="App\Models\Invitado")
                                                            @foreach ($pedido->ordens as $orden)
                                                            @php
                                                                
                                                                $subtotal+=$orden->producto->comision_invitado;
                                
                                                            @endphp    
                                                            @endforeach
                                
                                                            @endif

                                                            Pedido {{$pedido->id}} - ${{$subtotal}} <br>
                                                            
                                                        @endforeach
                
                                                      
                                                @endif
                                                
                                                 --}}
 
                                            </td>
                                            <td>Retiro Productor</td>
                                            <td>{{$retiro->metodo}}</td>
                                            <td class="text-center">{{$retiro->created_at->format('d-m-Y H:i:s')}}</td>
                               
                                            <td class="text-center">${{number_format($retiro->cantidad)}}</td>
                                         
                                            <td>
                                   
                                                    <button class="btn btn-warning" type="submit">PENDIENTE</button>
                                      
                                            </td>

                                            
                                            
                                        </tr>
                                    @endif
                                @endforeach

                            @endif
                        @endif

                    @endforeach

                </tbody>
            </table>

    <div class="float-right">
        <a wire:click="show()" class="btn btn-success my-2">Retiros Pagados</a>

    </div>
        @if ($current)
            <table class="table table-striped mt-4">
                <tbody class="mt-12">
                    @foreach ($gastosok as $gasto)
                 
                            <tr>
                                <td>{{$gasto->id}}</td>
                                <td> 
                                    @if($gasto->user)
                                    {{$gasto->user->name}}<br>
                                    @else
                                RIDESCHILENOS
                                    @endif
                                </td>
                              
                                <td>Retiro Organizador</td>
                                <td>{{$gasto->metodo}}</td>
                                <td>${{number_format($gasto->cantidad)}}</td>
                            
                                <td>{{$gasto->created_at->format('d-m-Y H:i:s')}}</td>
                                <td>{{$gasto->updated_at->format('d-m-Y H:i:s')}}</td>
                                <td>
                                    <form action="" >
                                        
                
                                        <button class="btn btn-success" type="submit">Aprobado</button>
                                    </form>   
                                </td>
                            
                                
                            </tr>

                    @endforeach

                </tbody>
            </table>
        @endif
        </div>

        <div class="card-footer">
            {{$gastos->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>
