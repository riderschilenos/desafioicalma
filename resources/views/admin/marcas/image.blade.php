<x-app-layout>
    
    @section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection

    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                
                <h1 class="text-2xl font-bold text-center">Fotos</h1>

                <hr class="mt-2 mb-2">

              <div class="flex justify-center">
                <div class="flex p-5 mt-4 space-x-4 items-center shadow-xl max-w-sm rounded-md">
                  @isset($marca->image)
                      
                  
                    <img src="{{Storage::url($marca->image->url)}}" alt="image" class="h-14 w-24" />
                  
                      
                  @endisset
                  <div>
                    <h2 class="text-gray-800 font-semibold text-xl text-center">{{$marca->name}}</h2>
                    <p class="mt-1 text-gray-400 text-center text-sm cursor-pointer">{{'Disciplina:'.$marca->disciplina->name}}</p>
                  </div>
                </div>
              </div>      

                  <h1 class="text-center mt-4 mb-2">Selecciona 1 foto a la vez y y dale al boton <b>Subir Imagen</b>, cuando las hayas subido todas puedes dar al botón siguiente</h1>
                  
                  <div class="flex justify-center">
                    <div class="card">
                    <div class="card-body">
                      @if (session('info'))
                        <div class="text-red-500 mb-6">
                            {{session('info')}}
                        </div>
                    @endif
                      <form action="{{route('admin.marca.image',$marca)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <input type="file" name="file" id="">
    
                        </div>
                        <div class="flex justify-center">
                        <button type="submit" class="btn btn-primary mt-4"> Subir Imagen</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                 

                    <div class="flex justify-center">
                      <a href="{{route('admin.marcas.index')}}">
                        <button class="btn btn-primary mt-4">
                          Volver
                        </button>
                      </a>
                    </div>

            </div>
        </div>

    </div>


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