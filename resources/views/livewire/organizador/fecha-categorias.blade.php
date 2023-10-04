<div>
    <div x-data="{open: false, categoria:false}">

        

            <div>


                    <div class="bg-gray-100 p-6 mt-6" x-data="{open: true}">
                        <div class="grid grid-cols-2">
                            <div>
                                <header class="flex justify-between item-center" >
                                    <h1 class="cursor-pointer"><strong>Fecha:</strong> {{$fecha->name}}</h1>
                                
                                </header>
                                
                                <div x-show="open">
                                    <h1 class="font-bold mt-4"><strong>Lugar:</strong> {{$fecha->lugar}}</h1>
                                    <h1 class="font-bold mt-4"><strong>Fecha:</strong> {{$fecha->fecha}}</h1>

                                </div>
                            </div>
                            <div>
                                    <div class="flex" x-on:click="categoria=!categoria">
                                        <div class="max-w-lg mx-auto">
                                            <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            <h2 class="mt-2 text-lg font-medium text-gray-900">Agrega Una Categoria</h2>
                                            <p class="mt-1 text-sm text-gray-500">Si necesitas incluir una categoria que no esta en las opciones que te ofrecemos puedes ingresarla a continuación.</p>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="flex">
                                        <div class="max-w-2xl mx-auto">
                                        <div class="text-center mt-2">
                                            {!! Form::open(['route'=>'organizador.categorias.store','files'=>true , 'autocomplete'=>'off']) !!}
                                            <div x-show="categoria" class="flex">
                                                    
                                                    {!! Form::hidden('disciplina_id',$evento->disciplina_id) !!}
                        
                                                    <div>
                                                        {!! Form::text('name', null , ['class' => 'form-input w-full'.($errors->has('name')?' border-red-600':'')]) !!}
                                                    </div>
                                                    @if ($evento->type=='pista')
                                                        <div>
                                                            {!! Form::hidden('descripciopn','pista') !!}
                                                        </div>
                                                    @else
                                                        <div>
                                                            {!! Form::hidden('descripciopn','race') !!}
                                                        </div>
                                                    @endif
                                                  

                                                    <div>
                                                            {!! Form::submit('Agregar', ['class'=>'ml-2 btn btn-primary']) !!}
                                                    </div>
                        
                                            </div>
                                            {!! Form::close() !!}
                                            <div class="flex justify-center" x-show="!categoria">
                                            <button type="submit" class="btn bg-blue-800 text-white justify-center mt-2 mr-4" x-on:click="categoria=!categoria">Agregar Categoria</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>       
                        

                            </div>
                        </div>

                        <h1 class="font-bold mt-12">INGRESA LAS CATEGORIAS</h1>
                        <p class="mb-4">Pincha las categorias que deseas incluir en tu eventos</p>
                      

                
                    <x-table-responsive>
                        

                        @if ($categorias->count())
                        
                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                <thead class="bg-gray-50">
                                  <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Categoria             
                                    </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Agregar 
                                      </th>
                                      
                                      <th>
                                        Delete
                                      </th>
                                    
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                  @foreach ($categorias as $categoria)

                                      

                                              <tr> 
                                                
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex h-10 w-10">
                                                        
                                                    
                                                            
                                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/rider.jpg')}}" alt="">
                                                        
                                                            <div class="text-sm text-gray-900 ml-3">{{$categoria->name}}</div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                            </td>
                                                  <td class="px-6 py-4 whitespace-nowrap">
                                                      <div class="flex items-center">
                                                          <div class="flex h-10 w-10">
                                       
                                                           
                                                                @php
                                                                    $check=FALSE;
                                                                    $fecha_cat=Null;
                                                                @endphp
                                                            @foreach ($items as $item)
                                                                
                                                                  @php
                                                                 
                                                                      if($categoria->id==$item->categoria_id){
                                                                        $check=TRUE;
                                                                        $fecha_cat=$item->id;
                                                                      }
                                                                  @endphp
                                                                
                                                            @endforeach
                                      
                                                            @if ($check )
                                                  
                                                            Agregada
                                                                            
                                                            @else

                                                            <label>
                                                              <input type="checkbox" wire:model="selected" value="{{$categoria->id}}" class="ml-4 mt-2">
                                                            </label>

                                                          @endif
                                                              
                                                                  
                                                              
                                                              
                                                          </div>
                                                      </div>
                                                  </td>

                                          

                                                 
                                                  @if ($fecha_cat)
                                                        
                                                        <td>
                                                                <button wire:click='categoria_destroy({{$fecha_cat}})' class="btn btn-danger my-auto">
                                                                DELETE
                                                                </button>

                                                        </td>

                                                    @else
                                                        <td>
                                                            
                                                        </td>        
                                                    @endif
                                                 
                                                  
                                              
                                              </tr>
                                              
                                  @endforeach
                                
                                </tbody>

                            </table>
                        @else
                            <div class="px-6 py-4">
                                No hay categorias ingresadas
                            </div>
                        @endif 
                        
                    </x-table-responsive>



                    <div class="bg-blue-900 rounded-lg max-w-sm mx-auto my-12">
                        <h1 class="text-center font-bold text-white pt-6">Agregar Categorias:</h1>
                        <div class="grid grid-cols-3">
                              @foreach ($selected as $item)
                                    @foreach ($categorias as $categoria)
                                        @if ($categoria->id==$item)
                                          <h1 class="text-white text-center mx-2">{{$categoria->name}}</h1>
                                        @endif
                                        
                                    @endforeach
                                    
                              @endforeach
                        </div>
                        <div class="flex justify-center mt-2 mb-4 ">
                            
                            <div class="block">
                                
                                <div class="mb-4">
                                    
                                    <h1 class="text-center font-bold text-white mt-6">Precio Inscripción:</h1>
                                    <input wire:model="inscripcion" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                </div>
                                <div class="mb-4">
                                    
                                <h1 class="text-center font-bold text-white mt-6">Limite de inscritos:</h1>
                                <input wire:model="limite" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                </div>
        
                                <div class="flex justify-center mb-4">                 
                                    <button class="btn btn-primary" wire:click="agregarcategoria">Agregar</button>
                                </div>
                            </div> 
                      </div>
                    </div>
             

                      
                                
            <div class="flex justify-center my-2">
              <a href="{{route('organizador.eventos.fechas',$evento)}}">
                      <button class="bg-gray-800 px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                  Volver Atras
                      </button>
              </a>
              
          </div>
          
        </div>         

        </div>

    </div>

    
    <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
  

</div>