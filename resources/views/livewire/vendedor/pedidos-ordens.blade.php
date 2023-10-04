<div>
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



    <div x-data="{open: false, referencia: false}" class="pb-12">
        @if($pedido->status==1)
            @if (auth()->user())
                <div class="grid grid-cols-3 md:grid-cols-5 justify-center ">
                            <button wire:click="select_product(1)" x-on:click="open=true" class="btn btn-danger max-w-xs items-center justify-items-center mt-2">CARCASA MX</button>
                            <button wire:click="select_product(2)" x-on:click="open=true" class="btn btn-danger max-w-xs items-center justify-items-center mt-2 ml-2">CARCASA MTB</button>
                            <button wire:click="select_product(7)" x-on:click="open=true" class="btn btn-danger max-w-xs items-center justify-items-center mt-2 ml-2">CARCASA MULTIMARCA</button>
                            <button wire:click="select_product(11)" x-on:click="open=true" class="btn btn-danger max-w-xs items-center justify-items-center mt-2 ml-2">POLERON 29.990</button>
                            <button wire:click="select_product(28)" x-on:click="open=true" class="btn btn-danger max-w-xs items-center justify-items-center mt-2 ml-2">ROMPECABEZAS PERSONALIZADO</button>             
                </div>
            @endif
        @endif
        <div class="flex">
            <h1 class="text-xl font-bold mt-6">Subtotal: ${{number_format($subtotal)}}-.</h1>
            @if($pedido->status==1)
                @if (auth()->user())
                    <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer justify-end ml-auto">
                        <i class="far fa-plus-square text-2xl text-green-500 mr-2"></i>
                        Agregar Producto
                    </a>
                @endif
            @endif
        </div>
        <hr class="mt-2 mb-6 max-w-sm">

        

        
        <article class="card mb-20" x-show="open">
           
      
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font bold">Agregando Productos</h1>

              

                <div class="flex items-center mt-4">
         
                    <select wire:model="selectedcategory" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="" class="text-center">Selecciona una categoría</option>
                        @foreach ($category_products as $category_product)

                            <option value="{{$category_product->id}}" class="text-center">{{$category_product->name}}</option>
                            
                        @endforeach
                    </select>
                </div>
                @if(!is_null($products))

                    <div class="items-center mt-4">
                        <Label class="flex justify-center">PRODUCTO:</Label>
                        <select wire:model="selectedproduct" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">--PRODUCTOS--</option>
                                    
                            
                            @foreach ($products as $product)
                                
                                @if($pedido->pedidoable_type=="App\Models\Socio")
                                    
                                    
                                    <option value="{{$product->id}}">{{$product->name."  -  $".number_format($product->precio-$product->descuento_socio)}}</option>
                                    
                                    
                    
                                @endif
                                @if($pedido->pedidoable_type=="App\Models\Invitado")
                                    
                                    
                                        
                                    <option value="{{$product->id}}">{{$product->name."  -  $".number_format($product->precio)}}</option>
                    
                                    
                                
                    
                                @endif

                                
                                
                            @endforeach
                        </select>
                    </div>
                
                    @if(!is_null($marcas))

                        @if ($marcas->count())
                            <div class="items-center mt-4">
                                <Label class="flex justify-center">MARCA de Diseño:</Label>
                                <select wire:model="selectedmarca" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">--MARCA--</option>
                                    @foreach ($marcas as $marca)
            
                                        <option value="{{$marca->id}}">{{$marca->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if(!is_null($modelos))

                            <div class="items-center mt-4">
                                <Label class="flex justify-center">MODELO:</Label>
                                <select wire:model="modelo_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">--MODELO--</option>
                                    @foreach ($modelos as $modelo)
                                        @if($modelo->category_product_id==$category_id)
            
                                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            
                            
                           

                        @endif

                        @if(!is_null($smartphones))

                            <div class="items-center mt-4">
                                <Label class="flex justify-center">SMARTPHONE:</Label>
                                <select wire:model="smartphone_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">-smartphone-</option>
                                    @foreach ($smartphones as $smartphone)
                                        
            
                                            <option value="{{$smartphone->id}}">{{$smartphone->marcasmartphone->name."; ".$smartphone->modelo}}</option>

                                        
                                    @endforeach
                                </select>
                            
                            </div>
                        @endif
                         
                        <div class="items-center mt-4">
                            <label class="flex justify-center">Nombre:</label>
                            <input wire:model="name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>

                        <div class="items-center mt-4">
                            <label class="flex justify-center">Nro:</label>
                            <input wire:model="numero" type="number" id="numero" name="numero" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm">
                            
                        </div>

                        <div class="items-center mt-4">
                            <label class="flex justify-center">Detalles:</label>
                            <input wire:model="detalle" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>
                        <div class="flex items-center mt-4">
                            <label class="w-32">Referencia:</label>
                            <div class="flex justify-center" x-show="!referencia">
                                <button type="submit" class="btn bg-blue-800 text-white justify-center mt-2 mr-4" x-on:click="referencia=!referencia">Agregar Referencia</button>
                            </div>
                        </div>


                        <div class="grid grid-cols-3 " x-show="referencia">
                            
                            @if ($image)
        
                                <div class="">
                                              
                                    <img src="{{$image->temporaryUrl()}}" alt="">                      
                                
                                </div>
                            @endif
        
                            <div class="col-span-2 ml-2 mt-6">
                                <div class="flex items-center mt-2">
                                    
                                    <input type="file" wire:model="image">
                                </div>
                                
                                
                                @error('image')
                                    <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
                                    
                        
        
                            </div>
                        </div>
                        
                       



                    @else

                    

                    @endif

                @endif

                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>

                </div>
            </div>
        </article>

    
        <x-table-responsive>

          
            @if ($pedido->ordens->count())
      
                <table class="min-w-full divide-y divide-gray-200 mb-20 pb-20">
                    <thead class="bg-gray-50">
                    <tr>
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
                        
                        <th  class="text-center mr-4 text-xs font-medium text-gray-500 uppercase tracking-wider justify-end ml-auto">
                            Precio
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                        $counter=$pedido->ordens->count();
                        @endphp
                        @foreach ($pedido->ordens->reverse() as $orden)
                        @php
                            $counter-=1
                        @endphp
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <label class="mx-4">{{$counter+1}}</label>
                                    </td>
                                    @if($orden->smartphone)
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            {{$orden->producto->name." (".$orden->smartphone->marcasmartphone->name."; ".$orden->smartphone->modelo.")"}}
                                          
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap">
                                      
                                            {{$orden->producto->name}}
                                          
                                        </td>
                                    @endif
                                  
      
                                  
                                    @if($orden->modelo)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="items-center">
                                                <label class="mx-4">{{$orden->modelo->marca->name}}</label>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="items-center">
                                                <label class="mx-4">Mod: {{$orden->modelo->name}}</label>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="items-center">
                                                <label class="mx-4">Sin Marca</label>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="items-center">
                                                <label class="mx-4">Sin Modelo</label>
                                            </div>
                                        </td>
                                    @endif

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <label class="mx-4">@if ($orden->name)
                                            {{$orden->name}}
                                            @else
                                                -
                                            @endif</label>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">    
      
                                        <label class="mx-4">
                                            @if ($orden->numero)
                                                {{$orden->numero}} 
                                            @else
                                                S/N
                                            @endif</label>
                                            
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">    
      
                                        <label class="mx-4">
                                            @if ($orden->detalle)
                                                {{$orden->detalle}} 
                                            @else
                                                -
                                            @endif</label>
                                            
                                    </td>
                                  
                                 
      
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if($pedido->pedidoable_type=="App\Models\Socio")
                                            <div class="items-center justify-end ml-auto">
                                                <label class="mx-4 ml-6">${{number_format($orden->producto->precio-$orden->producto->descuento_socio)}}</label>
                                            </div>
                                        @endif
                                        @if($pedido->pedidoable_type=="App\Models\Invitado")
                                            <div class="items-center justify-end ml-auto">
                                                <label class="mx-4 ml-6">${{number_format($orden->producto->precio)}}</label>
                                            </div>
                                        @endif

                                    </td>
                                    @if($pedido->status==1)
                                 
                                        <td class="px-6 py-4 whitespace-nowrap">    
                                            @if (auth()->user())
                                                <div tabindex="0" wire:click="destroy({{$orden}})" class="focus:outline-none text-red-600 text-xs w-full py-4 px-4 cursor-pointer hover:text-red-700">
                                                    <p>Eliminar</p>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                  
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
        @if($pedido->ordens->count()>0)
            @if($pedido->status==1)
                <div class="flex justify-center pb-8">
                    
                    @if(auth()->user())           
                        <form action="{{route('vendedor.pedido.close',$pedido)}}" method="POST">
                            @csrf

                            <button class="btn btn-success justify-center my-4" type="submit">Finalizar->Pagar</button>
                        </form>
                    @endif
                </div>

            @elseif($pedido->status==2)
               
                    <div class="flex justify-center mb-4">
                        @if(auth()->user())    

                            <form action="{{route('vendedor.pedido.editing',$pedido)}}" method="POST">
                                @csrf

                                <button class="btn justify-center my-4" type="submit">Editar</button>
                            </form>

                        @endif                  
                          @if(auth()->user())                   
                            <form action="{{route('vendedor.pedidos.prepay')}}">
                            

                                <button class="btn btn-success justify-center mt-4" type="submit">Pagar</button>
                            </form>
                        @endif
                    </div>    
                        <h1 class="text-center mb-14 mt-6">Es necesario pagar el pedido para avanzar a su proceso productivo.</h1>
                    
                
            @endif
        @endif
    </div>

</div>
