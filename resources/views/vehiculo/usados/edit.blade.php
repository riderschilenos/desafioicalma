<x-app-layout>
    <x-slot name="tl">
                
        <title>Vende tu Juguete Rider</title>
        
        
    </x-slot>
    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-3">
                    <a href="{{route('garage.vehiculos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Mis Vehiculos</a>
        
                    <h1 class="text-2xl font-bold text-center">Vende tu Juguete Rider</h1>
                </div>
                <hr class="mt-2 mb-6">

                <div class="w-full py-6">
                    <div class="flex">
                      @if($vehiculo->status==1 || $vehiculo->status==3 || $vehiculo->status==4)
                      <a href="{{route('garage.edit.usados',$vehiculo)}}">
                          
                      @elseif($vehiculo->status==2 || $vehiculo->status==5 || $vehiculo->status==6)
                        <a href="{{route('garage.edit',$vehiculo)}}">

                      @else
                      <a href="">
                      @endif
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-white w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                        </a>
                  
                        <div class="text-xs text-center md:text-base">Información</div>
                      </div>
                  
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded transition-all duration-500" style="width: 0%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-gray-600 w-full ml-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Fotos</div>
                      </div>
                  
                      
                      <div class="w-1/4">
                        
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-gray-600 w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                        @if($vehiculo->status==1 || $vehiculo->status==3 || $vehiculo->status==4)
                            <div class="text-xs text-center md:text-base">Precio/Comisión</div>
                            
                        @elseif($vehiculo->status==2 || $vehiculo->status==5)
                          <div class="text-xs text-center md:text-base">Activar Inscripción</div>
                        @endif
                      </div>
                      
                  
                      <div class="w-1/4">
                        <div class="relative mb-2">
                          <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                              <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
                            </div>
                          </div>
                  
                          <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                            <span class="text-center text-gray-600 w-full">
                              <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
                              </svg>
                            </span>
                          </div>
                        </div>
                  
                        <div class="text-xs text-center md:text-base">Publicación</div>
                      </div>
                    </div>
                  </div>

                {!! Form::model($vehiculo, ['route'=>['garage.vehiculo.update',$vehiculo], 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                    @csrf

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8 mt-6">

                        
                        
                        @if($disciplina_id==1)
                            @include('vehiculo.usados.partials.formmoto')
                        @elseif($disciplina_id==2)
                            @include('vehiculo.usados.partials.formbici')
                        @elseif($disciplina_id==9)
                            @include('vehiculo.usados.partials.formacuatico')
                        @endif

                        <h1 class="text-center font-bold">Propiedad:</h1>


                        <h1 class="text-center mt-6 font-bold">Contacto</h1>

                        <div class="mb-4">
                                
                            {!! Form::label('nombre', 'Nombre:*') !!}
                            {!! Form::text('nombre', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nombre')?' border-red-600':'')]) !!}
                    
                            @error('nombre')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('fono', 'Fono:*') !!}
                            {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                    
                            @error('fono')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null , ['class' => 'form-input block w-full mt-1'.($errors->has('email')?' border-red-600':'')]) !!}
                    
                            @error('email')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('ubicacion', 'Ubicación:*') !!}
                            {!! Form::text('ubicacion', null , ['class' => 'form-input block w-full mt-1'.($errors->has('ubicacion')?' border-red-600':'')]) !!}
                    
                            @error('ubicacion')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror

                      </div>  


                        <div class="flex justify-center">
                          {!! Form::submit('Siguiente', ['class'=>'btn btn-primary cursor-pointer']) !!}
                        </div>

                {!! Form::close() !!}
                
                
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    </x-slot>
    

</x-app-layout>