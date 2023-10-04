<div>

    @php
    
    $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    
    
    @endphp

 
    <div class="mx-auto px-2 bg-gray-700 py-4 ">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 mt-2 lg:px-8">
            @livewire('admin.pedidos-count')
        </div>
    </div>
<div class="container pb-8">    
    <x-table-responsive>
       
  
        @if ($pedidos->count())
  
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                    Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                        Fono
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" >
                        Vendedor
                    </th>
                    
                    
                 
                   
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
  
                    @foreach ($pedidos as $pedido)
                    
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @isset($pedido->image)
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                            @else
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                            @endisset
                                            
                                        </div>
                                        
                                        <div class="ml-4">
                                                <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                                <div class="text-sm font-medium text-gray-900 whitespace-nowrap">
                                                
                                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                                        @foreach ($socios as $socio)
                                                                
                                                                @if($socio->id == $pedido->pedidoable_id)
                                                                
                                                                    {{Str::limit($socio->user->name, 12)}}
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        Socio
                                                                    </span>
                                                                @endif
                                                        @endforeach
                                                    @endif
                                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                        @foreach ($invitados as $invitado)
                                                                
                                                                @if($invitado->id == $pedido->pedidoable_id)
                                                                  
                                                                    {{Str::limit($invitado->name, 12)}}
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
        
                                                </div>
                                            </a>
                                        </div>
                                       
                                    </div>
                              </td>
  
                              

                              <td class="text-center">
                                <div class="text-sm font-medium text-gray-900">
                                          
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20que%20tal" target="_blank">
                                                    {{str_replace(' ', '', $socio->fono)}}
                                                </a>
                                                <p class="text-xs mt-3"> Cliente </p>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $invitado->fono), -8)}}&text=Hola%20que%20tal" target="_blank">
                                                    {{str_replace(' ', '', $invitado->fono)}} 
                                                </a> 
                                                <p class="text-xs mt-3"> Cliente </p>
                                                @endif
                                        @endforeach
                                    @endif


                                  </div>
                              </td>
                             
                                
                          
                              <td class="px-6 py-4 whitespace-nowrap text-center">
                                  <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                  <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                              </td>

                              <td class="text-center text-sm">{{$pedido->vendedor->name}}<br>
                                +56966996699 <br>Vendedor
                            
                            </td>
                         
  
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('vendedor.pedidos.edit',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalle</a>
                                  
                                </td>

                   
                             
  
                           
  
                            </tr>
                            
                                @php
                                $counter=$pedido->ordens->count();
                                @endphp

                                    <tr class="bg-gray-300">
                                        <th >
                                            ORDENES
                                        </th>
                                      
                                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Marca/Modelo                        
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre/Numero
                                        </th>
                                        
                                      
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Detalle
                                        </th>
                                        
                                      
                                    </tr>
                                @foreach ($pedido->ordens->reverse() as $orden)
                                @php
                                    $counter-=1
                                @endphp

                                    <tr>
                                            <td class="text-center">
                                                @if($orden->status==1)
                                                    <label>
                                                        <input type="checkbox" wire:model="selected" value="{{$orden->id}}" class="mr-4 mt-2">
                                                    </label>
                                                @endif
                                                <br>
                                                <label class=" text-red-500">
                                                   (id: {{$orden->id}})
                                                </label>
                                            </td>
                                         
                                            
                                            @if($orden->smartphone)
                                                <td class="whitespace-nowrap px-2 py-4 @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif ">
                                              
                                                    {{$orden->producto->name." (".$orden->smartphone->marcasmartphone->name."; ".$orden->smartphone->modelo.")"}}
                                                  
                                              </td>
                                            @else
                                                <td class="whitespace-nowrap px-2 py-4 @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif ">
                                                
                                                    {{$orden->producto->name}}<br>
                                                    {{Str::limit($orden->detalle,40)}} 
                                                    
                                                </td>
                                            @endif
                                          
              
                                          
                                            @if($orden->modelo)
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif">
                                                    <div class="items-center text-center">
                                                        <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                                              <br>
                                                        <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif">
                                                    <div class="items-center text-center">
                                                        <label class="mx-4">Sin Marca</label>
                                                        <br>
                                                        <label class="mx-4">Sin Modelo</label>
                                                    </div>
                                                </td>
                                            @endif
        
                                            <td class="px-6 py-4 whitespace-nowrap @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif">
                                                <div class="items-center text-center">
                                                    <label class="mx-4">@if ($orden->name)
                                                        {{$orden->name}}
                                                        @else
                                                            -
                                                        @endif</label>
                                                        <br>
                                                        <label class="mx-4">
                                                            @if ($orden->numero)
                                                                {{$orden->numero}} 
                                                            @else
                                                                S/N
                                                            @endif</label>
                                                </div>
                                            </td>
        
                                   
                                            <td class="px-6 py-4 whitespace-nowrap @if($orden->status==1)bg-yellow-200 @elseif($orden->status==3) bg-green-400 @else bg-green-200 @endif">    
              
                                                <label class="mx-4">
                                                    <p>
                                                    @if ($orden->detalle)
                                                    @if ($orden->referencia)
                                                        <i wire:click="download({{$orden->id}})" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>
                                                    @endif
                                                        {{$orden->detalle}} 
                                                    @else
                                                    @if ($orden->referencia)
                                                    <i wire:click="download({{$orden->id}})" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>
                                                    @endif 
                                                    -
                                                    @endif
                                                    </p>
                                                </label>
                                                    
                                            </td>
                                          
                                         
              
                                            
                                         
                                        </tr>
              
                                @endforeach
                            <!-- More people... -->
                            
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
    <div class="justify-between mt-4 grid grid-cols-2 lg:grid-cols-2 gap-4">

    
                
                <div class="bg-white h-54 w-full rounded-xl p-6 shadow-lg flex items-center justify-around col-span-2">
                   
                    <div class="text-center">
                    
                   
                          
                         

                                    
                                
                                        <div class="form-group">
                                    
                                                <p class="px-12 pb-4">¿Que desea realizar?</p>
                                                {{var_export($selected)}}
                                                
                                                <div class="form-group flex justify-center">
                                                    <div class="flex form-check">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedproduccion">
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                        Enviar a Producción
                                                    </label>
                                                    </div>
                                                    <div class="flex ml-4 form-check">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselecteddescartar">
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                            Descartar
                                                    </label>
                                                    </div>
                                                    
                        
                        
                                                </div>
                                        
                        
                                        </div>
                                    @if(!is_null($descartar))

                                        <h1 class="text-center py-6">El producto ira directamente a producción</h1>

                                        <div class="flex justify-center">
                                            <button class="btn btn-primary text-sm" wire:click="descartar">Enviar</button>
                                        </div>
                               
                                    @else

                                    {!! Form::open(['route'=>'admin.lotes.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                    @csrf

                                        <div class="h-32">
                                            <p class="mt-4">1) Texto->Crear Contornos<br>2) Incrustar imagenes

                                            </p>
                                            <h1 class="text-xl font-bold text-center py-2 mt-2">Adjunte los archivos diseñados</h1>
                                            <hr class="w-full">
                                            {!! Form::file('lote', ['class'=>'form-input w-full mt-6'.($errors->has('lote')?' border-red-600':''), 'id'=>'lote','accept'=>'file/*']) !!}
                                            @error('lote')
                                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                            @enderror

                                            
                                        </div>

                                        {!! Form::hidden('user_id', Auth()->user()->id ) !!}
            
                                        @foreach ($selected as $item)
                                            <input type="hidden" name="selected[]" value="{{$item}}">
                                        @endforeach


                                        {!! Form::hidden('status', '1' ) !!}

                                        

                                        <div class="flex justify-center">
                                            {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-16']) !!}
                                        </div>
                                    
                                    {!! Form::close() !!}
                                    

                                    @endif
                               
                    
                    </div>
                </div>
    
         
    </div>

    
    <h1 class="text-3xl text-gray-800 text-center font-bold py-8">Historial de Retiros</h1>

                    @php
                   
                        $total=0;
                        $pendientes=0;
                    @endphp
                    @foreach ($gastosfull as $pago)
                    @if ($pago->estado==1)
                        
                            
                            @php                                   
                                $pendientes=$pendientes+$pago->cantidad;
                            @endphp
                            
                        
                    @endif
                    @if ($pago->estado==2)
                        
                            
                            @php                                   
                                $total=$total+$pago->cantidad;
                            @endphp
                            
                        
                    @endif
                           
                    @endforeach

    <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="" src="https://i.imgur.com/dJeEVcO.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($pendientes)}}</h1>
              <span class="text-gray-500">Comisiones</span>
              
              <span class="text-blue-500 font-bold">Pendientes</span>
            </div>
        </div>
       <div>
            <img class="hidden lg:block" src="https://www.pngkit.com/png/detail/297-2979179_una-estrella-y-es-la-ms-cercana-a.png" alt="" />
        
       </div>

        <div class="bg-white w-full rounded-xl shadow-lg flex items-center justify-around">
            <img class="" src="https://i.imgur.com/dJeEVcO.png" alt="" />
            <div class="text-center">
              <h1 class="text-4xl font-bold text-gray-800">${{number_format($total)}}</h1>
              <span class="text-gray-500">Comisiones</span>
              
              <span class="text-blue-500 font-bold">Retiradas</span>
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
    
    <x-table-responsive>
        
        
       
        @if ($gastos->count())

            <table class="min-w-full divide-y divide-gray-200 mt-4">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                    Nro
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Método
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad                       
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Pedidos
                    </th>
                    
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $counter=$gastos->count();
                     
                    @endphp
                   @foreach ($gastos as $pago)
                        @php
                            $counter-=1
                         
                        @endphp
                    
                        
                    
                        
                    
                            <tr>
                                <td class="px-6 py-4 justify-center">
                                    <p class="text-center">{{$counter+1}}</p>
                                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    
                                    @if ($pago->metodo=="MERCADOPAGO")
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            MERCADOPAGO
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            TRANSFERENCIA
                                        </span>
                                        
                                   
                                    @endif
                                          
                                    
                                </td>

                               
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 ml-3">${{number_format($pago->cantidad)}}</div>
                                    
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 ml-3">{{$pago->pedidos->count()}}<i class="fas fa-shopping-cart text-gray-400"></i></div>
                                    <div class="text-sm text-gray-500">Pedidos</div>
                                </td>

                                

                                

                                <td class="px-6 py-4 whitespace-nowrap">    

                                    @switch($pago->estado)
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Pendiente de Aprobación
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aprobado
                                            </span>
                                            @break
                                       
                                            
                                        @endswitch
                                        
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pago->created_at))-1]}}</div>
                                    <div class="text-sm text-gray-900">{{$pago->created_at->format('d-m-Y')}}</div>    
                                </td>
                                {{-- comment 
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('vendedor.pedidos.edit',$pago)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                    
                                </td>--}}
                            </tr>
                   
                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>

            <div class="card-footer">
                {{$gastos->links()}}
            </div>

        @else
            <div class="px-6 py-4">
                No hay ningun retiro realizado
            </div>
        @endif 
        
    </x-table-responsive>
    

  
</div>
 
    
</div>
