<div>
    @php

    $motos=0;
    $bicicletas=0;

        foreach ($vehiculosall as $vehiculo) {
            if ($vehiculo->status==5) {
                if ($vehiculo->vehiculo_type->id==9 or $vehiculo->vehiculo_type->id==10 or $vehiculo->vehiculo_type->id==11 ) {
                    $bicicletas+=1;}
                else {
                    $motos+=1;
                
                }    
            }
        }


    @endphp
<div>
    <h1 class="text-center font-bold text-2xl">¿Cuántas Motos y Bicicletas Hay Registradas en Chile?</h1>
</div>
<div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-x-4">
                
    <div>

    </div>
   
    <div class="hidden sm:block">
        <div class="flex justify-center mr-4 ">

            
            <div class="grid grid-cols-3 gap-3">
                    <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas+$motos}}<br> TOTAL</button>
                    <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTOS</button>
                    <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas}}<br> BICICLETAS</button>
                   
            </div>
            

        </div>
    </div>
    <div class="block sm:hidden">
        <div class="flex justify-center ">

            
                
                <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center mr-2">{{$bicicletas+$motos}}<br> TOTAL</button>
         
                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTOS</button>
           
          
                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ml-2">{{$bicicletas}}<br> BICICLETAS</button>
                
            

        </div>
    </div>
</div>
<div class="hidden max-w-7xl mx-auto sm:px-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 mt-8">
    <article class="hidden">
        <figure class="hidden sm:flex justify-center">
            <a href="{{route('socio.index')}}"><img class="md:mr-8 ml-8 object-contain object-center" width="460" src="{{asset('img/home/qrpubli2.png')}}" alt=""></a>
        </figure>
        <figure class="flex justify-center sm:hidden">
            <a href="{{route('socio.index')}}"><img class="mx-auto md:mr-8 object-contain object-center" width="280" src="{{asset('img/home/qrpubli2.png')}}" alt=""></a>
        </figure>

    
    </article>
    <article class="hidden">
            <div>

                <div>
                    
                    <div class="flex-wrap md:flex justify-center">
                    
                        <!-- Step Checkout -->
                        <div class="my-12 ml-2 md:ml-12 mt-4 d:mt-4  md:w-2/3">
                          <div class="relative flex pb-4">
                            <div class="absolute inset-0 flex h-full w-10 items-center justify-center">
                              <div class="pointer-events-none h-full w-1 bg-gray-200"></div>
                            </div>
                            <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                              </svg>
                            </div>
                            <div class="flex-grow pl-4">
                              <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">1 Registro AntiRobo</h2>
                              <p class="font-laonoto leading-relaxed">
                                Al momento de escanear el  <br />
                                <b>QR CODE </b>se despliega la Información sobre la pertenencia del vehiculo
                              </p>
                            </div>
                          </div>
                          <div class="relative flex pb-4">
                            <div class="absolute inset-0 flex h-full w-10 items-center justify-center">
                              <div class="pointer-events-none h-full w-1 bg-gray-200"></div>
                            </div>
                            <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                              </svg>
                            </div>
                            <div class="flex-grow pl-4">
                              <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">2 Registro de Mantenciones</h2>
                              <p class="font-laonoto leading-relaxed">Podras <b>registrar</b><b> de cada una de las mantenciones realizadas a tu vehiculo</b>.</p>
                            </div>
                          </div>
                          <div class="relative flex pb-4">
                            <div class="relative z-10 inline-flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 text-white">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5" viewBox="0 0 24 24">
                                <circle cx="12" cy="5" r="3"></circle>
                                <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                              </svg>
                            </div>
                            <div class="flex-grow pl-4">
                              <h2 class="title-font mb-1 text-sm font-medium tracking-wider text-gray-900">3 Facil Instalación / Sin mantención</h2>
                              <p class="font-laonoto leading-relaxed">
                                Lo compras una vez y disfrutas sin costos de <span> <b>mantención</b></span
                                >.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>



                <a class="hidden sm:flex justify-center" href="{{route('garage.vehiculo.create')}}">
                    
                    <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                    
                        Inscribe tu Juguete

                    </button>
                </a>

            </div>
    
    </article>
   

</div>
<a class="flex justify-center sm:hidden mt-4" href="{{route('garage.vehiculo.create')}}">
                    
    <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
    
        Inscribe tu Juguete

    </button>
</a>



    <div class="px-2 mt-2">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Buscar por Nombre del Dueño" autocomplete="off">
    </div>
    @if($vehiculos->count())
        
        <div class="max-w-7xl lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-y-4">

            @foreach ($vehiculos as $vehiculo)
               
                    <x-mivehiculo-card :vehiculo="$vehiculo" />        
               
            @endforeach
    
        </div>
    
    @else
        <div class="px-6 py-4 text-center">
            No hay ningun registro de vehiculo en venta
        </div>
        
    @endif
    
        <div class="px-6 py-4">
            {{$vehiculos->links()}}
        </div>
  
        
</div>
