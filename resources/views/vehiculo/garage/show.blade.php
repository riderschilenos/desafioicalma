<x-app-layout>
    <x-slot name="tl">
            
        <title>{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</title>
        
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">


           
<style>
    .slider::-webkit-scrollbar {
  display: none;
}
</style>


            <section class="bg-gray-700 pb-12 pt-20 mb-8 ">
                <figure class="block sm:hidden pt-6 pb-4">
    
                    @if($vehiculo->image->first())
                    
                        {{-- comment <img class="h-80 w-full object-cover object-center" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">--}}
                        <ul class="slider snap-mandatory flex overflow-x-auto gap-0 snap-x before:shrink-0 before:w-[30vw] after:shrink-0 after:w-[30vw]" style='z-index: 1 ; '>
                            @foreach ($vehiculo->image as $image)  
                            <li class="shrink-0 snap-center w-full snap-mandatory">       
                                <img class="" src="{{Storage::url($image->url)}}" alt="" style="scroll-snap-align: center;">
                            </li>
                            @endforeach
                        </ul>
                        <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-8" style='z-index: 10 ;'>

                            @foreach ($vehiculo->image as $image)
                
                                <img class="h-24 w-full object-contain object-center" src="{{Storage::url($image->url)}}" alt="">
                        
                                
                            @endforeach

                            @can('vehiculo_propio', $vehiculo)
                                    <a href="{{route('garage.image',$vehiculo)}}" class="my-auto">
                                        <div>
                                            <img class="h-10 w-full object-contain object-center my-auto" src="{{asset('img/vehiculo/camara.png')}}" alt="">
                                            <h1 class="text-center text-xs text-white">AGREGAR</h1>
                                        </div>
                                    </a>
                            @endcan
                
                        </div>
    
                    @else
                        <img class="h-60 w-full object-cover object-center" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                    
                    @endif
                </figure>
                <div class="container grid grid-cols-1 md:grid-cols-2 gap-6">
                    <figure class="hidden sm:block">
    
                        @if($vehiculo->image->first())
                        
                            <img class="h-80 w-full object-cover object-center" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                            <div class="max-w-7xl mx-auto mt-6 px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-8">
    
                                @foreach ($vehiculo->image as $image)
                    
                                    <img class="h-24 w-full object-contain object-center" src="{{Storage::url($image->url)}}" alt="">
                            
                                    
                                @endforeach

                                @can('vehiculo_propio', $vehiculo)
                                    <a href="{{route('garage.image',$vehiculo)}}" class="my-auto">
                                        <div>
                                            <img class="h-10 w-full object-contain object-center my-auto" src="{{asset('img/vehiculo/camara.png')}}" alt="">
                                            <h1 class="text-center text-xs text-white">AGREGAR</h1>
                                        </div>
                                    </a>
                                @endcan
                    
                            </div>
                            
                        @else
                            <img class="h-60 w-full object-cover object-center" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                        
                        @endif
                    </figure>
    
                    <div class="text-white">
                        <h1 class="text-4xl">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).'-'.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                        @can('Super admin')
                            @if($vehiculo->ubicacion)
                                <h2 class="text xl mb-3">Ubicación: {{$vehiculo->ubicacion}}</h2>
                            @endif
                        @endcan
                        {{-- comment
                        
                        <p class="mb-2"><i class="fas fa-wrench"></i> <b>3</b> Mantenciones registradas</p>
                        --}}
                        <p class="mb-2"><i class="fas fa-biking"></i> Tipo de vehiculo: {{$vehiculo->vehiculo_type->name}}</p>
                        <p class="mb-2"><i class="fas fa-clock"></i> Año: {{$vehiculo->año}}</p>
                        @if ($vehiculo->precio)
                            <p class="my-2 text-2xl"><i class="fas fa-dollar-sign"></i> Precio: ${{number_format($vehiculo->precio, 0, '.', '.')}}-.</p>
                    
                        @endif


    
                        @if ($qr)
                            @if ($qr->value==5000)
                                <img class="h-24 w-16 object-contain object-center mt-24 ml-4" src="{{asset('img/home/qrsilver.png')}}" alt="">
                            @elseif($qr->value==10000)
                                <img class="h-24 w-16 object-contain object-center mt-24 ml-4" src="{{asset('img/home/qrgold.png')}}" alt="">
                            @endif
                            
                        @endif
                        {{-- comment
                        <p class="mb-2"><i class="fas fa-adjust"></i> Aro: </p>
                        <p class="mb-2"><i class="fas fa-star"></i> Ofertas: 40</p>
                        --}}
                    </div>
    
                </div>
    
            </section>
            <div class="container grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="order-1 lg:col-span-2 lg:order-1 ">
                    <section class="card  mb-8">
                        <div class="card-body">
                            <div class="grid grid-cols-2">
                            
                                <div>
                                    <h1 class="font-bold text-2xl mb-2 text-gray-800 items-center">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                                    
                                    
                                </div>
                                <div>
                                    @isset($vehiculo->marca->image)
                            
                        
                                    
                                        <img class="h-14 w-20 object-contain object-center ml-auto" src="{{Storage::url($vehiculo->marca->image->url)}}" alt="">
                        
                            
                                    @endisset
                                    
                        
                                </div>
                                
                            </div>
    
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-1 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Marca:</div>
                                        <div class="px-4 py-2">{{ $vehiculo->marca->name }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Modelo:</div>
                                        <div class="px-4 py-2">{{ $vehiculo->modelo}}</div>
                                    </div>
                                    @if($vehiculo->cilindrada)
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">cilindrada: </div>
                                            <div class="px-4 py-2">{{ $vehiculo->cilindrada}}</div>
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Año:</div>
                                        <div class="px-4 py-2">{{ $vehiculo->año}}</div>
                                    </div>
                                    @if($vehiculo->nro_serie)
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Nro Serie:</div>
                                            <div class="px-4 py-2" >
                                               <h1 alt="{{ $vehiculo->nro_serie}}"> {{ $vehiculo->nro_serie}}</h1>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Nro Chasis:</div>
                                            <div class="px-4 py-2" >
                                               <h1 alt="{{ $vehiculo->nro_serie}}"> {{ $vehiculo->nro_serie}}</h1>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                            @if($vehiculo->descripcion)
                                <div class="text-gray-700">
                                    <div class="grid md:grid-cols-1 text-sm">
                                        <div class="px-4 py-2 font-semibold text-lg">Descripción:</div>
                                        <div class="px-4 pb-2 text-lg">{!! $vehiculo->descripcion !!}</div>
                                        
                                    </div>
                                </div>
                            @endif
                            
    
                            
                        </div>
    
                    </section>  

                    @livewire('vehiculo.vehiculo-mantencion',['vehiculo' => $vehiculo])

                    <hr class="mt-2 mb-2 sm:mb-6">
                        {{-- comment                    @if ($qr)
                                            
                                        @else
                                        <section class="mb-8">
                                            
                        
                                            <div class="flex">
                                                <h1 class="font-bold text-2xl mb-2 text-gray-800">Mantenciones</h1>
                                                
                                            </div>
                        
                                            <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                                <p>Seccion exclusiva para Riders con KitQR Activo</p>
                                            </div>
                        
                                        </section>
                                        @endif
                            --}}

                    
    
                </div>
    
    
                <div class="order-2 lg:order-2">
                    <section class="card mb-28">
                        <div class="card-body">
                            @if($vehiculo->property==1)
                                <div class="flex items-center">

                                    @if (str_contains($vehiculo->user->profile_photo_url,'https://ui-'))
                                        <img class="flex h-16 w-16 rounded-full shadow-lg object-cover" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="">
                                        
                                    @else
                                        <img class="flex h-16 w-16 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  />
                                    
                                    @endif
                                      
                                    <div class="ml-4">
    
                                        
                                            <h1 class="font-fold text-gray-500 text-lg"> 
    
                                            @if($vehiculo->status==5)
    
                                                Dueño:
                                                
                                            @else
                                                Vendedor: 
                                            @endif
                                                
                                            @if($vehiculo->user->socio)
                                                {{ $vehiculo->user->socio->name." ".$vehiculo->user->socio->second_name }} {{ $vehiculo->user->socio->last_name }}</h1>
                                            @else
                                                {{ $vehiculo->user->name }}</h1>
                                            @endif
    
                                        @if($vehiculo->user->socio)

                                            <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $vehiculo->user->socio)}}">{{'@'.$vehiculo->user->socio->slug}}</a>
    
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Vendedor:</div>
                                    
                                    <div class="px-4 py-2">{{ $vehiculo->nombre }}</div>
                                </div>
                            @endif
    
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-1 text-sm">
                                    <div class="grid grid-cols-2">
                                        @can('Super admin')
                                            <div class="px-4 py-2 font-semibold">Ubicación:</div>
                                                @if($vehiculo->user->socio)
                                                    @if ($vehiculo->user->socio->direccion)
                                                    <div class="px-4 py-2">{{$vehiculo->user->socio->direccion->comuna}}, {{$vehiculo->user->socio->direccion->region}}</div>
                                                    @else
                                                    <div class="px-4 py-2">{{ $vehiculo->ubicacion }}</div>
                                                    @endif
                                                    
                                                @else
                                                    <div class="px-4 py-2">{{ $vehiculo->ubicacion }}</div>
                                                @endif
                                            
                                            </div>
                                        

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Fono:</div>
                                            @if($vehiculo->user->socio)
    
                                                <div class="px-4 py-2">{{ $vehiculo->user->socio->fono}}</div>
                                            @else
                                                <div class="px-4 py-2">{{ $vehiculo->fono}}</div>
                                            @endif
                                        
                                    </div>
                                    @endcan
                                    <div class="grid grid-cols-2">
                                            @if($vehiculo->status==5)
    
                                            <div class="px-4 py-2 font-semibold">Fecha de inscripción</div>
                                            @else
                                                <div class="px-4 py-2 font-semibold">Fecha de publicación</div>
                                            @endif
                                        
                                        <div class="px-4 py-2">{{$vehiculo->created_at->format('d-m-Y')}}</div>
                                    </div>
                                    
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email:</div>
                                            @if($vehiculo->status==5)
    
                                            <div class="px-4 py-2">{{ $vehiculo->user->email}}</div>
                                            @else
                                                <div class="px-4 py-2">{{ $vehiculo->email}}</div>
                                            @endif
                                        
                                    </div>
                                    
                                </div>
                            </div>
    
                            @if($vehiculo->property==2)
                                <hr class="w-full py-4">
                                <p class="text-sm text-center">Esta publicación fue realizada por un agende de ventas de RidersChilenos</p>
    
                                <div class="flex items-center mt-6">
                                    @if($vehiculo->user->socio)
                                    <a href="{{route('socio.show', $vehiculo->user->socio)}}"><img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  /></a>
                                        
                                    @else
                                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $vehiculo->user->profile_photo_url }}" alt=""  />
                                    @endif
                                    
                                    <div class="ml-4">
    
                                        
                                        
    
    
                                        @if($vehiculo->user->socio)
                                        <a href="{{route('socio.show', $vehiculo->user->socio)}}"><h1 class="font-fold text-gray-500 text-lg">Agente: {{ $vehiculo->user->name }}</h1></a>
                                            <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $vehiculo->user->socio)}}">{{'@'.$vehiculo->user->socio->slug}}</a>
                                        @else
                                            
                                        <h1 class="font-fold text-gray-500 text-lg">Agente: {{ $vehiculo->user->name }}</h1>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                    </section>
                </div>
    
            </div>
        </x-fast-view>
       
    
    

</x-app-layout>