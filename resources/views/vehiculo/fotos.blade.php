<x-app-layout>
  <x-slot name="tl">
                
    <title>Subir Fotos {{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</title>
    
    
</x-slot>
  @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @endsection
  
  <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
    <div class="my-12">
        <div class="container py-8 ">
        
            <div class="card">
                <div class="card-body">
                    @if($vehiculo->status==1 || $vehiculo->status==3 || $vehiculo->status==4  )
                        <div class="grid grid-cols-3">
                          <a href="{{route('garage.vehiculos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Mis Vehiculos</a>
            
                          <h1 class="text-2xl font-bold text-center">Vende tu Juguete Rider</h1>
                        </div>
                    @elseif($vehiculo->status==2)
                        <div class="grid grid-cols-3">
                          <a href="{{route('garage.vehiculos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Mis Vehiculos</a>
            
                          <h1 class="text-2xl font-bold text-center">Fotos</h1>
                        </div>
                    @endif


                    <hr class="mt-2 mb-2">

                  <div class="flex justify-center">
                    <div class="flex p-5 mt-4 space-x-4 items-center shadow-xl max-w-sm rounded-md">
                      @isset($vehiculo->marca->image)
                          
                      
                        <img src="{{Storage::url($vehiculo->marca->image->url)}}" alt="image" class="h-14 w-24" />
                      
                          
                      @endisset
                      <div>
                        <h2 class="text-gray-800 font-semibold text-xl">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada}}</h2>
                        <p class="mt-1 text-gray-400 text-center text-sm cursor-pointer">{{$vehiculo->año}}</p>
                      </div>
                    </div>
                  </div>      

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
                                  <div class="w-0 bg-green-300 py-1 rounded transition-all duration-500" style="width: 100%;"></div>
                                </div>
                              </div>
                      
                              <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                                <span class="text-center text-white w-full">
                                    <svg class="w-7 h-7 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
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
                      <h1 class="text-center mt-4 mb-2">Selecciona 1 foto a la vez y y dale al boton <b>Subir Imagen</b>, cuando las hayas subido todas puedes dar al botón siguiente</h1>
                      
                      @if (session('info'))
                            <div class="text-red-500 mb-6">
                                {{session('info')}}
                            </div>
                      @endif
                    {{-- comment  
                      <div class="flex justify-center">
                        <div class="card">
                        <div class="card-body">
                          
                          <form action="{{route('garage.upload',$vehiculo)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="file" name="file" id="" >
        
                            </div>
                            <div class="flex justify-center">
                            <button type="submit" class="btn btn-primary mt-4"> Subir Imagen</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    

                        --}}
      
                        <form action="{{route('garage.upload',$vehiculo)}}"
                        method="POST"
                        class="dropzone"
                        id="my-awesome-dropzone">
                        <div class="dz-message " data-dz-message>
                          <h1 class="text-xl font-bold">Seleccione Imágenes</h1>
                          <span>Utiliza fotos sacadas de dia donde puedas mostrar todos los detalles importantes de tu Vehiculo</span>
                        </div>
                        </form>
                  @if($vehiculo->status==2 || $vehiculo->status==5)
                        
                            <div class="flex justify-center">
                              <a href="{{route('garage.inscripcion',$vehiculo)}}">
                                <button class="btn btn-primary mt-4">
                                  Siguiente
                                </button>
                              </a>
                            </div>
          
                        @else    
                        
                            <div class="flex justify-center">
                              <a href="{{route('garage.comision',$vehiculo)}}">
                                <button class="btn btn-primary mt-4">
                                  Siguiente
                                </button>
                              </a>
                            </div>
                        @endif
                      
                      @livewire('vehiculo.vehiculo-image', ['vehiculo' => $vehiculo], key('vehiculo-image.'.$vehiculo->slug))
              {{-- comment      --}}
                      
                </div>
            </div>

        </div>
    </div>
    
  </x-fast-view>

    <x-slot name="js">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
      <script>
        
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
          headers:{
            'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
          },
          acceptedFiles: "image/*",
          maxFiles: 6,
          
  
            
            };
           
            
        
      </script>

    </x-slot>
    

</x-app-layout>