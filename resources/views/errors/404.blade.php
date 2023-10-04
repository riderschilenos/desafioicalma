<x-app-layout>
    <style type="text/css">
        .text-9xl{
        font-size: 14rem;
        }
        @media(max-width: 645px){
        .text-9xl{
        font-size: 5.75rem;
        }
        .text-6xl{
        font-size: 1.75rem;
        }
        .text-2xl {
        font-size: 1rem;
        line-height: 1.2rem;
        }
        .py-8 {
        padding-top: 1rem;
        padding-bottom: 1rem;
        }
        .px-6 {
        padding-left: 1.2rem;
        padding-right: 1.2rem;
        }
        .mr-6{
        margin-right: 0.5rem;
        }
        .px-12 {
        padding-left: 1rem;
        padding-right: 1rem;
        }
        }
      </style>
  </head>
  <body>
  <div class="bg-gradient-to-r from-purple-300 to-blue-200">
  <div class="w-9/12 m-auto py-8 flex items-center justify-center">
    <div class="bg-main-color flex justify-center pb-4 pt-6 z-10 my-6 rounded-lg mx-2"> 
        <div class="text-white text-center shadow overflow-hidden sm:rounded-lg pb-8">
  
 
            
                <p class="text-3xl md:text-8xl lg:text-3xl font-bold tracking-wider text-white my-4">¡ERROR 404!</p>
                <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-white my-4">Página no encontrada</p>
            
            <h1 class="text-2xl font-medium">El Contenido a sido destruido o trasladado a otro lugar.</h1>
            <p class="text-2xl pb-8 px-12 font-medium">Vuelve a la página principal y utiliza el buscador para llegar nuevamente a lo que tenias en mente.</p>
            
                <a href="{{ route('home') }}">
                    <button class="btn btn-danger hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                    HOME
                    </button>
                </a>
                <a href="{{ route('login') }}">
                    <button class="btn btn-danger hover:from-red-500 hover:to-red-500 text-white font-semibold px-6 py-3 rounded-md">
                   Ingresar
                    </button>
                </a>
       
    </div>
  </div>
  </div>
  </div>
  </body>
</x-app-layout>