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
    @if($paginate==4)

        <h1 class="text-right pb-2 cursor-pointer" wire:click="updatepaginate">(Ver todos)</h1>
    @else
        <h1 class="text-right pb-2 cursor-pointer" wire:click="updatepaginate">(Resume)</h1>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 ">

        @foreach ($lotes as $lote)
        
            <label class="w-full flex flex-col px-4 pb-4 pt-2 mb-3 bg-white text-blue rounded-lg shadow-lg  uppercase border border-blue hover:bg-blue ">
                <img class="ml-auto h-5 w-5 object-contain cursor-pointer" src="{{asset('img/home/check.png')}}" alt="" wire:click="close({{$lote}})" >

                <svg class="w-8 h-8 cursor-pointer hover:text-gray-500 mx-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" wire:click="download({{$lote}})">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                
                <span class="mt-2 text-base leading-normal text-center">Lote N° {{$lote->id}}</span>
                <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-y-2">
                    @foreach($lote->ordens as $orden)
                        <div class="p-1 mx-1 rounded-lg btn-danger text-center">
                            {{$orden->id}}
                        </div>
                    @endforeach
                </div>
                
            </label>
        
        
        @endforeach
        @if ($paginate==250)
            @foreach ($alllotes as $lote)
            
                <label class="w-full flex flex-col px-4 pb-6 pt-2 mb-3 bg-white text-blue rounded-lg shadow-lg  uppercase border border-blue hover:bg-blue ">
                    <img class="ml-auto h-5 w-5 object-contain cursor-pointer" src="{{asset('img/home/check.png')}}" alt="" wire:click="close({{$lote}})" >

                    <svg class="w-8 h-8 cursor-pointer hover:text-gray-500 mx-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" wire:click="download({{$lote}})">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    
                    <span class="mt-2 text-base leading-normal text-center">Lote N° {{$lote->id}}</span>
                    <div class="flex">
                        @foreach($lote->ordens as $orden)
                            <div class="p-1 mx-1 rounded-lg btn-danger ">
                                {{$orden->id}}
                            </div>
                        @endforeach
                    </div>
                    
                </label>
            
            
            @endforeach
        
        
        @endif
    </div>

   
    

    <x-table-responsive>
       
  
        @if ($pedidos->count())
  
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fono
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" >
                        Vendedor
                    </th>
                    
                    
                  
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fono
                        
                    </th>
                    
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Email
                        
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    
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
  
                    @foreach ($pedidos as $pedido)
                    
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                            @if($pedido->status==6)
                                                    <label>
                                                        <input type="checkbox" wire:model="selectedetiquetas" value="{{$pedido->id}}" class="mr-4 mt-2">
                                                    </label>
                                                @endif
                                    
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @isset($pedido->image)
                                                <span class="" wire:click="imagedestroy({{$pedido->image}})">
                                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Eliminar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                                </span>
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                              
                                            @else
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                            @endisset
                                            
                                        </div>
                                        <a href="{{route('vendedor.pedidos.edit',$pedido)}}">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                
                                                @if($pedido->pedidoable_type=='App\Models\Socio')
                                                    @foreach ($socios as $socio)
                                                            
                                                            @if($socio->id == $pedido->pedidoable_id)
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
                                                                {{$invitado->name}} <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
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

                                        </div>
                                        </a>
                                    </div>
                                    @if ($pedido->status==6)
                                        <input wire:model="file" type="file" class="form-input bg-gray-200 mt-4">
                                         <br>
                                         <div class="flex justify-center mt-2">
                                            <a class="btn btn-danger text-indigo-600 cursor-pointer text-center mt-1"  wire:click="despachado({{$pedido}})">Despachado</a>
                                            <a class="ml-2 btn btn-danger text-indigo-600 cursor-pointer text-center mt-1"  wire:click="retirado({{$pedido}})">Retirado</a>
                                         </div>
                                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="file">
                                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                        </div>
                                    @endif
                              </td>
  
                              

                              <td class="text-center">
                                <div class="text-sm font-medium text-gray-900">
                                          
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=hola%20que%20tal%2C%20soy%20el%20encargado%20de%20despacho%20de%20riders%20chilenos%20y%20me%20comunico%20con%20usted%20para%20enviarle%20su%20numero%20de%20seguimiento" target="_blank">
                                                    {{$socio->fono}}
                                                </a>
                                                <p class="text-xs mt-3"> Cliente </p>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $invitado->fono), -8)}}&text=hola%20que%20tal%2C%20soy%20el%20encargado%20de%20despacho%20de%20riders%20chilenos%20y%20me%20comunico%20con%20usted%20para%20enviarle%20su%20numero%20de%20seguimiento" target="_blank">
                                                    {{$invitado->fono}} 
                                                </a> 
                                                <p class="text-xs mt-3"> Cliente </p>
                                                @endif
                                        @endforeach
                                    @endif


                                  </div>
                              </td>
                              <td class="text-center text-sm">{{$pedido->vendedor->name}}</td>
                                
                                <td class="text-center text-sm">+56966996699 <br>Vendedor</td>
                                
                            
                              <td class="text-center">
                                <div class="text-sm font-medium text-gray-900">
                                          
                                    @if($pedido->pedidoable_type=='App\Models\Socio')
                                        @foreach ($socios as $socio)
                                                
                                                @if($socio->id == $pedido->pedidoable_id)
                                                <a href="mailto:{{$socio->user->email}}" target="_blank">
                                                    {{$socio->user->email}}
                                                </a>
                                                @endif
                                        @endforeach
                                    @endif
                                    @if($pedido->pedidoable_type=='App\Models\Invitado')
                                        @foreach ($invitados as $invitado)
                                                
                                                @if($invitado->id == $pedido->pedidoable_id)
                                                <a href="mailto:{{$invitado->email}} " target="_blank">
                                                    {{$invitado->email}} 
                                                </a> 
                                                @endif
                                        @endforeach
                                    @endif


                                  </div>

                              </td>
                             

                              <td class="px-6 py-4 whitespace-nowrap">
                                  
                              </td>
  
                                
  
                                
  
                        
                              
                              <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                  <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                              </td>
  
                                <td class="px-6 py-4 text-center text-sm font-medium">
                                   
                                    
                                </td>

                            </tr>
                            
                                @php
                                $counter=$pedido->ordens->count();
                                @endphp

                                    <tr class="bg-gray-300">
                                        <th >
                                            ORDENES
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nro
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Marca
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Modelo                        
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Número
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Detalle
                                        </th>
                                        
                                      
                                    </tr>
                                @foreach ($ordens->reverse() as $orden)
                                    @if ($orden->pedido_id==$pedido->id)
                                        
                                    
                                        @php
                                            $counter-=1
                                        @endphp

                                            <tr>
                                                    <td class="text-center">
                                                        @if($orden->images)
                                                            <label>
                                                                <input type="checkbox" wire:model="selected" value="{{$orden->id}}" id="{{$orden->id}}" class="mr-4 mt-2">
                                                            </label>
                                                            @foreach ($orden->images as $image)
                                                                <div class="flex justify-center">
                                                                    <img class="h-18 w-20 object-contain" src=" {{Storage::url($image->url)}}" alt="">
                                                                    <span class="" wire:click="imagedestroy({{$image}})">
                                                                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                                                    </span>
                                                                </div>
                                                            @endforeach()
                                                        
                                                        @elseif($orden->status>=2)
                                                            <label>
                                                                <input type="checkbox" wire:model="selected" value="{{$orden->id}}" id="{{$orden->id}}" class="mr-4 mt-2">
                                                            </label>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                        <label class="mx-4">
                                                            @if ($orden->lotes)
                                                                @foreach ($orden->lotes as $lote)

                                                                     <img wire:click="download({{$lote}})" class="h-8 object-contain mx-2 cursor-pointer" src="{{asset('img/pdf_icon2.png')}}" title="Descargar" alt="">
                                            
                                                                @endforeach
                                                            @else
                                                                {{$orden->id}}
                                                            @endif
                                                            
                                                        </label>
                                                    </td>
                                                
                                                    @if($orden->smartphone)
                                                    <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif ">
                                                    
                                                        {{$orden->producto->name." (".$orden->smartphone->marcasmartphone->name."; ".$orden->smartphone->modelo.")"}}
                                                        
                                                    </td>
                                                    @else
                                                    <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif ">
                                                        
                                                            {{$orden->producto->name}}
                                                            
                                                        </td>
                                                    @endif
                                                
                    
                                                
                                                    @if($orden->modelo)
                                                        <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                            <div class="items-center">
                                                                <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                            <div class="items-center">
                                                                <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                            <div class="items-center">
                                                                <label class="mx-4">Sin Marca</label>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                            <div class="items-center">
                                                                <label class="mx-4">Sin Modelo</label>
                                                            </div>
                                                        </td>
                                                    @endif
                
                                                    <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">
                                                        <label class="mx-4">@if ($orden->name)
                                                            {{$orden->name}}
                                                            @else
                                                                -
                                                            @endif</label>
                                                    </td>
                
                                                    <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">    
                    
                                                        <label class="mx-4">
                                                            @if ($orden->numero)
                                                                {{$orden->numero}} 
                                                            @else
                                                                S/N
                                                            @endif</label>
                                                            
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap @if($orden->status==2)bg-yellow-200 @else bg-green-200 @endif">    
                    
                                                        <label class="mx-4">
                                                            @if ($orden->detalle)
                                                                {{$orden->detalle}} 
                                                            @else
                                                                -
                                                            @endif</label>
                                                            
                                                    </td>
                                                
                                                
                    
                                                    
                                                
                                            </tr>
                                    @endif
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
                                                    <div class="flex mr-4 form-check">
                                                        <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselecteddescartar">
                                                        <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800" >
                                                               ReDiseñar
                                                        </label>
                                                    </div>
                                                    <div class="flex form-check mr-4">
                                                    <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" checked wire:click="updateselectedproduccion">
                                                    <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                        En caja
                                                    </label>
                                                    </div>
                                                    <div class="flex form-check">
                                                        <input type="radio" name="type" id="propio" value="" class="mr-2 mt-4" wire:click="updateselectedetiquetas">
                                                        <label for="propio" class="text-xl md:text-3xl font-bold text-gray-800">
                                                            Generar Etiquetas
                                                        </label>
                                                        </div>
                                                    
                                                    
                        
                        
                                                </div>
                                        
                        
                                        </div>
                                    @if(!is_null($descartar))

                                        <h1 class="text-center py-6">El pedido ira directamente a despacho</h1>

                                       

                                        <div class="flex justify-center">
                                            <button class="btn btn-primary text-sm" wire:click="rediseñar">Enviar</button>
                                        </div>
                               
                                    @elseif(!is_null($etiquetas))

                                    <h1 class="text-center py-6">¿Cuales etiquetas desea generar?</h1>
                                 
                                        @foreach ($selectedetiquetas as $item)
                                        {{$item}}
                                        @endforeach
                                        {!! Form::open(['route'=>'admin.generar.etiquetas', 'autocomplete'=>'off', 'method'=> 'GET' , 'target' => '_blank']) !!}
                                       
    
                                            
                                        @foreach ($selectedetiquetas as $item)
                                            <input type="hidden" name="selectedetiquetas[]" value="{{$item}}">
                                        @endforeach
                          
                
    
                                            
    
                                            <div class="flex justify-center">
                                                {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-16']) !!}
                                            </div>
                                        
                                        {!! Form::close() !!}
                                        



                                    @else

                                    
                                        <div class="h-32">
                                            <h1 class="text-xl font-bold text-center py-2 mt-4">Adjunte fotos si desea</h1>
                                            <hr class="w-full">
                                            <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200">                                      
                                            @error('lote')
                                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                            @enderror
                                            
                                        </div>
                                        <div class="text-white  text-md font-bold px-4" wire:loading wire:target="file">
                                            <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                        </div>


                                        

                                        <div class="flex justify-center">
                                            <button class="btn btn-primary" wire:click="encaja"> Enviar</button>
                                        </div>
                                    
                                 
                                    

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
    @if ($pago->gastotype_id==3)
        
    
        
    
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
    @endif
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
