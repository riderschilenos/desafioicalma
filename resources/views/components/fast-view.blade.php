@props(['series','riders','autos','socio2','disciplinas'])
<div>
    <style>
    :root {
        --main-color: #4a76a8;
        --rider-color: #314780;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .bg-rider-color {
        background-color: var(--rider-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
    </style>

    @if (auth()->user())
        @if (auth()->user()->socio)

            @if (auth()->user()->vehiculos->count())
                
            @else

                <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 my-4 @routeIs('garage.vehiculo.create') hidden @endif">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="success">
                    <strong class="font-bold">Falta poco!</strong>
                    <span class="block sm:inline">Ahora puedes registrar tu moto o bicicleta, esto te permitira registrar sus servicios y mantenciones, entre otras cosas.</span>
                    <a href="{{route('garage.vehiculo.create')}}">
                        <button class="bg-green-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-green-400 focus:outline-none focus:shadow-outline focus:bg-green-400 hover:shadow-xs p-3 my-4">Registrar</button>
                    </a>                                                
                </div>
                </div>


                
            @endif



        @else

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 my-4 @routeIs('socio.create') hidden @endif">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Bienvenido!</strong>
                <span class="block sm:inline">Ahora puedes crear el perfil de Rider que te servira para registrar tu moto o bicicleta, registrar tus logros deportivos, contratar cursos o clases, entre otras cosas.</span>
                <a href="{{route('socio.create')}}">
                    <button class="bg-green-500 block w-full text-white text-sm font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:shadow-outline focus:bg-gray-500 hover:shadow-xs p-3 my-4">CREAR PERFIL</button>
                </a>                                                
            </div>
        </div>
            
        @endif
        
    @endif

    <div :class="{'block': user, 'hidden': ! user}" class="hidden">
        @if($socio2)
            <div>
                @php
                    $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                @endphp
                <style>
                    :root {
                        --main-color: #4a76a8;
                    }
            
                    .bg-main-color {
                        background-color: var(--main-color);
                    }
            
                    .text-main-color {
                        color: var(--main-color);
                    }
            
                    .border-main-color {
                        border-color: var(--main-color);
                    }
                </style>
            
            
                <div class="bg-gray-100  min-h-screen pb-6">
                    <div class="w-full text-white bg-main-color hidden sm:block">
                        <div x-data="{ open: false }"
                            class="flex flex-col max-w-screen-xl py-5 sm:py-0 px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                            <div class="flex flex-row items-center justify-between p-4 ">
                                <a href="{{route('socio.index')}}"
                                    class="hidden md:inline text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-arrow-circle-left text-white-800"></i> Seguir Navegando</a>
                            
                            </div>
                        </div>
                    </div>
                    <!-- End of Navbar -->
                    <div class="max-w-7xl mx-auto mb-5">
                        <div class="md:flex no-wrap md:-mx-2">
                            <!-- Left Side -->
                            <div class="w-full md:w-3/12 md:mx-2"  x-data="{open: true}">
                                <!-- Profile Card -->
                                    @switch($socio2->status)
                                                            @case(1)
                                                            <div class="bg-white p-3 border-t-4 border-green-500">
                                                                @break
                                                            @case(2)
                                                            <div class="bg-white p-3 border-t-4 border-red-400">
                                                                @break
                                                            @default
                                                                
                                    @endswitch
                                <div class="flex items-center space-x-2 mb-2 font-semibold text-gray-900 leading-8 justify-between">
                                        <div class="flex items-center">
                                            <span clas="text-green-500">
                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </span>
                                            <div class="flex"> 
                                            <p class="ml-2 tracking-wide">{{ $socio2->name." ".$socio2->second_name }} {{ $socio2->last_name }} </p>
                                                @if ($socio2->status==1) 
                                                    <div class="star-icon z-10 my-auto ml-2"> <!-- Contenedor de la estrella con z-index -->
                                                        <i class="fa fa-star text-yellow-400 text-xl my-auto items-center"></i> <!-- Estrella usando Font Awesome (ajusta el tamaño y el color según necesites) -->
                                                    </div>
                                                @endif
                                            </div>
                                            
                                        </div>
                                            @can('perfil_propio', $socio2)

                                            
                                                <a href="{{route('socio.edit',$socio2)}}" class="ml-2"><h5 class="text-blue-600 font-bold text-sm cursor-pointer ml-4">(Editar)</h5></a>
                                            @else

                                                @can('Super admin')
                                    
                                
                                                    <div class="flex justify-center mb-3">
                                                        <a href="{{route('socio.points', $socio2)}}">
                                                            <span class="bg-red-500 py-1 px-2 rounded text-white text-sm text-center flex">
                                                                @livewire('socio.point-count', ['socio' => $socio2]) Pts
                                                            </span>
                                                        </a>
                                                    </div>
                                                @endcan

                                            @endcan
                                            
                                    
                                </div>

                                    <div class="flex">
                                        <div class="content-center items-center">
                                            <div class="image overflow-hidden">
                                                @if (str_contains($socio2->user->profile_photo_url,'https://ui-'))
                                                    <img class="h-44 w-40 mx-auto object-cover"
                                                    src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg"
                                                    alt="">
                                                @else
                                                    <img class="h-44 w-42 object-cover"
                                                    src="{{ $socio2->user->profile_photo_url }}"
                                                    alt="">
                    
                                                @endif
                                            
                                            </div>
                                            @can('perfil_propio', $socio2)
                                                <h1 class="text-gray-400 font-bold text-xs leading-8 my-1 ml-auto"><a href="{{ route('profile.show') }}">Editar Foto</a></h1>
                                            @endcan
                                        </div>
                                        <div class="col-spam-3 px-4 w-full">
                                            <a href="{{route('socio.show', $socio2)}}">
                                                <h1 class="text-blue-400 font-bold text-lg leading-8 mb-1">{{ '@'.$socio2->slug }}</h1>
                                            </a>  
                                            <div class="flex content-center">
                                                <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                    <i class="fas fa-birthday-cake content-arount" aria-hidden="true"></i>
                                                </div>
                                                <div class="px-2 py-2 text-sm">{{date('d-m-Y', strtotime($socio2->born_date))}}</div>
                                            </div>
                                        
                                            <div class="flex items-center content-center">
                                                        @if($socio2->direccion)
                                                            <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                            <i class="fa fa-map-marker my-auto py-auto" aria-hidden="true"></i>
                                                        </div>
                                                        
                                                            <div class="px-2 py-2">{{Str::limit($socio2->direccion->comuna.', '.$socio2->direccion->region,20)}}</div>
                                                        @endif
                                            </div>

                                            <div class="text-gray-700">
                                            
                                            
                                                <button x-on:click="open=false" x-show="open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Información de Contácto</button>
                                                <button x-on:click="open=true" x-show="!open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Resume</button>
                                            </div>

                                                @if($socio2->user->vendedor) 
                                                    @if($socio2->user->vendedor->estado==2) 
                                                        @if($socio2->fono) 
                                                            <div >
                                                                <a href="{{route('socio.store.show', $socio2)}}">
                                                                    <button class="bg-red-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-red-500 focus:outline-none focus:shadow-outline focus:bg-red-500 hover:shadow-xs p-3 my-4">TIENDA ONLINE</button>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                        

                                            
                                        </div>
                                    </div>

                                    <div class="grid md:grid-cols-2 text-sm">
                                                
                                                    
                                        <div x-show="!open">
                                            @if($socio2->fono)
                                                <div class="grid grid-cols-2">
                                                    <div class="px-4 py-2 font-semibold">Nro. Contacto</div>
                                                    
                                                    @can('Ver dashboard')
                                                        <a  href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio2->fono), -8)}}&text=Hola" target="_blank">
                                                            <div class="px-4 py-2">{{ $socio2->fono }}</div>
                                                        </a> 
                                                    @endcan
                                                    

                                                </div>
                                            @endif
                                            
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Email.</div>
                                                <div class="px-4 py-2">
                                                    <a class="text-blue-800" href="mailto:jane@example.com">{{$socio2->user->email}}</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    
                                    
                                
                                        @livewire('socio.socio-auspiciadores',['socio' => $socio2], key('socio-auspiciadores.'.$socio2->slug))

                                        @can('Super admin')
                                            
                                        
                                            <div class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded-lg shadow-sm ">
                                                <div class="mt-2">
                                                    <div class="font-semibold text-center text-sm mb-2">¡¡ AUSPICIA A {{Str::limit(strtoupper($socio2->name),10)}} AHORA !!</div>
                                                    <p class="text-center text-xs mb-2">Al realizar tu colaboración monetaria, apareceras en el perfil del rider como un auspiciador, manteniendo la cantidad donada de forma anonima.</p>
                                            
                                                    <div class="flex justify-between text-sm">
                                                    <div class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$1.000</div>
                                                    <div class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-green-700 p-3 text-[#191D23]">$5.000</div>
                                                    <div class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$10.000</div>
                                                    <div class="mt-[14px] whitespace-nowrap cursor-pointer bg-white rounded-[4px] border border-[#E7EAEE] p-3 text-[#191D23]">$20.000</div>
                                                    
                                                    </div>
                                                    <div><input class="mt-2 w-full rounded-lg border border-[#A0ABBB] p-2 hidden" value="$1.000" type="text" placeholder="$1.000" /></div>
                                                
                                                </div>
                                            
                                                <div class="mt-6 hidden">
                                                    <div class="flex justify-between">
                                                    <span class="font-semibold text-[#191D23]">Receiving</span>
                                                    <div class="flex cursor-pointer items-center gap-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <div class="font-semibold text-green-700">Add recipient</div>
                                                    </div>
                                                    </div>
                                            
                                                    
                                                </div>
                                            
                                                <div class="mt-2 hidden">
                                                    <div class="w-full cursor-pointer rounded-xl bg-blue-800 px-3 py-3 text-center font-semibold text-white hidden">AUSPICIAR A {{Str::limit(strtoupper($socio2->name),10)}}</div>
                                                </div>
                                            </div>

                                        @endcan
                                        <ul
                                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm hidden">
                                            <li class="flex items-center py-3">
                                                <span>Suscripción</span>
                                                    @switch($socio2->status)
                                                            @case(1)
                                                                <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Vigente</span></span>
                                                                @break
                                                            @case(2)
                                                                <span class="ml-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">INACTIVO</span></span>
                                                                @break
                                                            @default
                                                                
                                                    @endswitch
                                                    
                                            </li>
                                            {{-- comment
                                            @if($socio->suscripcions)
                                                @if($socio->suscripcions->count())
                                                
                                                    <li class="flex items-center py-3">
                                                        <span>Fecha Vencimiento</span>
                                                        <span class="ml-auto">{{date('d', strtotime($socio->suscripcions->first()->end_date)).' de '.$meses[date('n', strtotime($socio->suscripcions->first()->end_date))-1].' del '.date('Y', strtotime($socio->suscripcions->first()->end_date))}}</span>
                                                    </li>
                                                @endif
                                            @endif --}}
                                        </ul>
                                
                                    
                            </div>
                                <!-- End of profile card -->
                                <div class="my-4"></div>
                                <!-- Friends card -->
                                
                                <!-- End of friends card -->
                            </div>
                            <!-- Right Side -->
                            <div class="w-full md:w-9/12 mx-0 sm:mx-2">
                                <!-- Profile tab -->
                                <!-- About Section -->
                            

                                <!-- End of about section -->

                            

                                <!-- garage and movie -->
                                <div class="bg-white shadow-sm rounded-sm">

                                    <div class="grid grid-cols-1 sm:grid-cols-1">
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="items-center flex justify-between space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                
                                                <div>
                                                    <span class="text-red-500">
                                                        <i class="fas fa-car text-white-800"></i>
                                                    </span>
                                                    <span>Garage</span>
                                                </div>

                                                <div>
                                                                @can('perfil_propio', $socio2)
                                                                <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm align-middle"> (Inscribir Vehiculo)</span></a>
                                                                @endcan
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="grid grid-cols-2  md:grid-cols-4 gap-1 mt-4 "> 

                                                @if ($socio2->user->vehiculos)
                                                    
                                                
                                                    @foreach ($socio2->user->vehiculos as $vehiculo)
                                                        @if($vehiculo->status==5 || $vehiculo->status==6)
                                                            <div class="text-center p-2 m-2 bg-main-color rounded-xl">
                                                                <a href="{{route('garage.vehiculo.show', $vehiculo)}}" class="text-main-color">
                                                                    <img class="h-44 w-42 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                                                    <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                                                        <h1 class="text-white mt-1 font-bold text-md">{{$vehiculo->marca->name}}<br>{{strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                                                                    </a>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                @endif
                                                {{-- comment 
                                                
                                                    <div class="text-center my-2">
                                                        <img class="h-24 w-34 mx-auto"
                                                            src="https://www.canyon.com/on/demandware.static/-/Sites-canyon-master/default/dwb5b29ea2/images/full/full_2021_/2021/full_2021_sender-cfr_2251_tm_P5.png"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Kojstantin</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-26 w-36 mx-auto"
                                                            src="https://www.motofichas.com/images/phocagallery/Honda/crf250r-2022/02-honda-crf250r-2022-estudio.jpg"
                                                            alt="">
                                                        <a href="#" class="text-main-color">James</a>
                                                    </div>
                                                    <div class="text-center my-2">
                                                        <img class="h-26 w-36 mx-auto"
                                                            src="https://i.ytimg.com/vi/qmfxU0KMBBg/maxresdefault.jpg"
                                                            alt="">
                                                        <a href="#" class="text-main-color">Natie</a>
                                                    </div>
                                                --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2">
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="flex justify-between mb-2 items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <div>
                                                    <span class="text-red-500">
                                                        <i class="fas fa-film text-white-800"></i>
                                                    </span>
                                                    <span>Curriculum Deportivo</span>
                                                </div>
                                                <div>
                                                    <span class="text-blue-600 font-bold text-sm align-middle"> (Pronto)</span>
                                                </div>   
                                            </div>

                                            <!-- This is an example component -->
                                            @can('Super admin')
                                                
                                            @livewire('socio.curriculum-deportivo',['socio' => $socio2], key('curriculum-deportivo'.$socio2->slug))

                                    
                                            @endcan
                                            <div class="grid grid-cols-4 gap-4 hidden">
                                            
                                                @if ($socio2->user->serie_enrolled)
                                                    
                                                
                                                    @foreach ($socio2->user->serie_enrolled as $serie)
                                                        <div class="text-center my-2">
                                                            <a href="{{route('series.show', $serie)}}" class="text-main-color">
                                                                <img class="h-16 w-20 mx-auto"
                                                                src="{{Storage::url($serie->image->url)}}"
                                                                alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                @endif
                                                                    
                                            </div>
                                        </div>
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <span class="text-red-500">
                                                    <i class="fas fa-film text-white-800"></i>
                                                </span>
                                                <span>MovieCollection</span>
                                                
                                                <a href="{{route('series.index')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                            
                                            </div>
                                            <div class="grid grid-cols-4 gap-4">
                                            
                                                @if ($socio2->user->serie_enrolled)
                                                    
                                                
                                                    @foreach ($socio2->user->serie_enrolled as $serie)
                                                        <div class="text-center my-2">
                                                            <a href="{{route('series.show', $serie)}}" class="text-main-color">
                                                                <img class="h-16 w-20 mx-auto"
                                                                src="{{Storage::url($serie->image->url)}}"
                                                                alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                @endif
                                                    {{-- 
                                                        <div class="text-center my-2">
                                                            <img class="h-16 w-16 rounded-full mx-auto"
                                                                src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png"
                                                                alt="">
                                                            <a href="#" class="text-main-color">James</a>
                                                        </div>
                                                        <div class="text-center my-2">
                                                            <img class="h-16 w-16 rounded-full mx-auto"
                                                                src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                                                alt="">
                                                            <a href="#" class="text-main-color">Natie</a>
                                                        </div>
                                                        <div class="text-center my-2">
                                                            <img class="h-16 w-16 rounded-full mx-auto"
                                                                src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"
                                                                alt="">
                                                            <a href="#" class="text-main-color">Casey</a>
                                                        </div>
                                                    --}}
                                                    
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <!-- End of Experience and education grid -->
                                </div>

                                <div class="my-4">
                                
                                <div class="bg-white pt-3 pb-12 shadow-sm rounded-sm">

                                    <div class="mb-12 grid grid-cols-1 sm:grid-cols-2">
                                    
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                                                <span class="text-red-500">
                                                    <i class="fas fa-dumbbell text-white-800"></i>
                                                </span>
                                                <span>Entrenamientos</span>
                                                
                                                                
                                                                <a href="{{route('socio.entrenamiento',$socio2)}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                            
                                                            
                                                
                                            </div>
                                            <ul class="list-inside space-y-2 ml-2 hidden">
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-dumbbell text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">50 Min Pesas.</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-bicycle text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">70km Bicicleta</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-running"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">10k running</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="text-yellow-600">
                                                            <i class="fas fa-bicycle text-white-800"></i>
                                                        </span>
                                                        <div class="ml-4">
                                                            <div class="text-teal-600">70km Bicicleta</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        
                                        </div>


                                        {{-- commen
                                                <div>
                                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                                        <span clas="text-green-500">
                                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                                <path fill="#fff"
                                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                            </svg>
                                                        </span>
                                                        <span class="tracking-wide">Education</span>
                                                    </div>
                                                    <ul class="list-inside space-y-2">
                                                        <li>
                                                            <div class="text-teal-600">Masters Degree in Oxford</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </li>
                                                        <li>
                                                            <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                                        </li>
                                                    </ul>
                                        </div>t --}}
                                    </div>
                                    
                                </div> 

                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        @else

            <x-jet-authentication-card>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>
        
                <x-jet-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="flex justify-center mt-4 ">

                    <a href="https://riderschilenos.cl/login-google">
                        <button class="btn bg-blue-500 text-white w-full max-w-xs items-center justify-items-center mr-2 mt-2"><svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>Ingresar Con Google<div></div></button>
                    </a>
                
                </div>
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordar mi cuenta') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                            {{ __('Registrarme') }}
                            </a>
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Recuperar contraseña') }}
                            </a>
                        @endif
        
                        <x-jet-button class="ml-4">
                            {{ __('Ingresar') }}
                        </x-jet-button>
                    </div>
                </form>
            </x-jet-authentication-card>

        @endif
    </div>
    
    <div :class="{'block': home, 'hidden': ! home}" class="hidden">


                {{--         <div id="default-carousel" class="hidden sm:block mx-auto relative max-w-7xl md:mt-16" data-carousel="static" style='z-index: 1 ; '>
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <span class="hidden absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                            <img src="{{asset('img/homeslider/carcasas-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/polerones-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/poleras-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('img/homeslider/tienda-min.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 mb-4 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
        comment --}}
    
     

    <div class="hidden md:block mx-auto max-w-7xl">
        <div class="flex items-center justify-cender" style="background-image: url('{{ asset('img/home/fotoicalmach.png') }}'); background-size: 100% auto; background-position: center; height: 450px;">

        </div>
    </div>

    <div class="block md:hidden grid grid-cols-1 gap-4">
        <div class="bg-gray-100 rounded-lg">
            <img src="{{ asset('img/home/fotoicalma8chh.png') }}" alt="Imagen 1" class="w-full">
        </div>
    </div>
    <div class="p-2 md:hidden">
        <iframe width="100%" height="350px" src="https://www.youtube.com/embed/hNvh1yorQiU?si=Avfzhm9snNGOavuD&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div> 
    <div class="flex sm:hidden mx-auto  justify-center mt-2">
                                            
        <a href="https://megaavalancheicalma.cl/checkout/megaavalanche-icalma-2023">
            <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 " >
            
                Inscripciones

            </button>
        </a>
    </div>
    <header class="bg-gray-900 mt-4 mb-6 py-4 text-white text-center">
        <h1 class="text-2xl md:text-4xl font-semibold">MEGA AVALANCHE ICALMA</h1>
        <p class="text-xl">26 de noviembre de 2023 en Batea Mahuida, Icalma</p>
    </header>
    
    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg pt-2">
       
            <h2 class="text-2xl font-semibold mb-4 text-center mt-4 ">Cronograma de Competencia</h2>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-100 rounded-lg">
                    <h3 class="text-xl p-4 font-semibold mb-2 text-center bg-gray-500 text-white rounded-lg">25 de noviembre</h3>
                    <p class="px-4 py-2">Entrega de kit de competencia en Camping Centro de operaciones Icalma de 15:00 a 19:00 hrs.</p>
                </div>

                <div class="bg-gray-100 rounded-lg">
                    <h3 class="text-xl p-4 font-semibold mb-2 text-center bg-gray-500 text-white rounded-lg">26 de noviembre</h3>
                    <p class="px-4 py-2">Inicio de competencia a las 10:00 hrs.</p>
                    <p class="px-4 py-2">Largada oficial de competencia a las 11:00 hrs. desde Batea Mahuida.</p>
                    <p class="px-4 py-2">Premiación a las 13:30 hrs. Aproximadamente.</p>
                </div>
            </div>
 
        
        

            <div class="container mx-auto p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-900 text-white rounded-lg text-center p-6">
                        <h2 class="text-2xl font-semibold">Descripción</h2>
                        <p>Tenemos el agrado de invitar a ENDURO MEGA AVALANCHE ICALMA – BATEA MAHUIDA CHILE, a realizarse el 26 de noviembre, evento internacional en el espectacular escenario de Batea Mahuida Icalma – IX región.</p>
                        <p class="mb-8">"Vive una experiencia inolvidable para todo raiders."</p>
                        <div class="grid grid-cols-2 justify-center">
                            <div class="p-2">
                                <img src="{{ asset('img/home/logos/logo7.png') }}" alt="Auspiciador 1" class="">
                            </div>
                            <div class="p-2">
                                <img src="{{ asset('img/home/logos/logo8.png') }}" alt="Auspiciador 2" class="">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg col-span-2">
                        <img src="{{ asset('img/home/fotoicalma2c.png') }}" alt="Imagen 2" class="w-full h-auto">
                    </div>
                  
                </div>
            </div>
            
    
        <div class="container mx-auto flex p-8">
            <!-- Primera columna con información -->
            <div class="pr-4 mt-6">
    
                <h2 class="text-2xl font-semibold">Logística</h2>
                <p>La logística y organización de este evento incluye un camp a disposición de los competidores en ambos días, para retiro de kit y fiesta raiders. El lugar estará habilitado con baños, foodtruck, cervecería, mecánica neutral, zona de competidores, estacionamiento y largada-meta.</p>
    
                <h2 class="text-2xl font-semibold mt-4">Fecha y Lugar</h2>
                <p>26 de noviembre de 2023 en Batea Mahuida, Icalma.</p>
    
                <h2 class="text-2xl font-semibold mt-4">Distancia</h2>
                <p>Descenso de 6 K</p>
    
                <h2 class="text-2xl font-semibold mt-4">Consideraciones Generales del Circuito</h2>
                <ul>
                    <li>Control de carrera electrónico.</li>
                    <li>Seguridad.</li>
                    <li>Baños.</li>
                    <li>Marcaje del Circuito: cinta plástica, señaléticas, cal y personas.</li>
                </ul>
    
                <h2 class="text-2xl font-semibold mt-4">Valor de Inscripción</h2>
                <p>Valor 1° preventa de inscripciones: $50.000 → Desde el 1 de octubre hasta el 20 de octubre.</p>
                <p>Valor 2° preventa de inscripciones: $58.000 → Desde el 21 de octubre hasta el 10 de noviembre.</p>
                <p>Venta final: $65.000 → Desde el 11 de noviembre hasta el 20 de noviembre.</p>
                <p>Inscripciones a través de <a href="https://megaavalancheicalma.cl/checkout/megaavalanche-icalma-2023" class="text-blue-500">megavalancheicalma.cl</a></p>
                <p>Derechos de inscripción:</p>
                <ul>
                    <li>Número y Chip electrónico.</li>
                    <li>Polera de algodón del evento.</li>
                    <li>Premiación por Categoría.</li>
                    <li>Mega Fest al final del evento.</li>
                </ul>
            </div>
    
            <!-- Segunda columna con imagen -->
          
        </div>

       
        <!-- Cronograma y seguridad -->
        <div class="container mx-auto p-8">
            <h2 class="text-2xl font-semibold mt-4">Cronograma</h2>
            <p><strong>Sábado 25 de noviembre del 2023:</strong></p>
            <ul>
                <li>Entrega de kit de competencia en Camping Centro de operaciones Icalma de 15:00 a 19:00 hrs.</li>
            </ul>
            <p><strong>Domingo 26 de noviembre del 2023:</strong></p>
            <ul>
                <li>Inicio de competencia a las 10:00 hrs.</li>
                <li>Largada oficial de competencia a las 11:00 hrs. desde Batea Mahuida.</li>
                <li>Premiación a las 13:30 hrs. Aproximadamente</li>
            </ul>
    
            <h2 class="text-2xl font-semibold mt-4">Seguridad</h2>
            <ul>
                <li>Ambulancia</li>
                <li>Unidad de rescate</li>
            </ul>
        </div>
    
        <div class="grid grid-cols-6 md:hidden justify-center">
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo1.png') }}" alt="Auspiciador 1" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo2.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo11.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo4.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo5.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo6.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2 col-span-2">
                <img src="{{ asset('img/home/logos/logo9.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo10.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo12.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo13.png') }}" alt="Auspiciador 2" class="">
            </div>
          
            <!-- Repite este patrón para los otros auspiciadores -->
        </div>
        <div class="hidden md:grid grid-cols-6 justify-center">
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo1.png') }}" alt="Auspiciador 1" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo2.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo11.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo4.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo5.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo6.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo10.png') }}" alt="Auspiciador 2" class="">
            </div>
       
            <div class="p-2 col-span-2">
                <img src="{{ asset('img/home/logos/logo9.png') }}" alt="Auspiciador 2" class="">
            </div>
            <div class="p-2">
                <img src="{{ asset('img/home/logos/logo12.png') }}" alt="Auspiciador 2" class="">
            </div> <div class="p-2">
                <img src="{{ asset('img/home/logos/logo13.png') }}" alt="Auspiciador 2" class="">
            </div>
          
            <!-- Repite este patrón para los otros auspiciadores -->
        </div>

    </div>

    <!-- Pie de Página -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Carrera Mega Avalanche en Icalma</p>
        </div>
    </footer>
   
       

       
    </div>

    <div :class="{'block': socio, 'hidden': ! socio}" class="hidden">
        
        <div class="max-w-7xl mx-auto pb-8">

            <div class="card">
                
                    
    
                   

                <div  class="mt-4 text-2xl mb-4 sm:text-xl mx-4 leading-none font-bold text-gray-900 flex justify-between">
                    <div class="flex justify-center">
                       
                        <button class="btn btn-success ml-6 text-center text-base" @click="user = false; home = false; socio = true; registro = false; vendedor = false; base = false" >RIDERS</button>
                               
                    </div>
                    <div class="flex justify-center">
                       
                        <button class="btn btn-danger ml-6 text-center text-base" @click="evento = true; user = false; home = false; socio = false; registro = false; vendedor = false; base = false" >EVENTOS</button>
                               
                    </div>
                    <div class="flex justify-center">
                      
                                
                                    <button class="btn btn-danger mr-6 text-center text-base" @click="user = false; home = false; socio = false; evento = false; registro = true; vendedor = false; base = false" >BIKES</button>
                               
                    </div>
                </div>
    
            
    
                    @livewire('socio.socio-search')
                    
                
            </div>
    
        </div>  

    </div>
    <div :class="{'block': evento, 'hidden': ! evento}" class="hidden">
        
        <div class="max-w-7xl mx-auto pb-8">

            <div class="card">
                
                    
    
                   

                <div  class="mt-4 text-2xl mb-4 sm:text-xl mx-4 leading-none font-bold text-gray-900 flex justify-between">
                    <div class="flex justify-center">
                       
                        <button class="btn btn-danger ml-6 text-center text-base" @click="user = false; home = false; socio = true; registro = false; vendedor = false; base = false" >RIDERS</button>
                               
                    </div>
                    <div class="flex justify-center">
                       
                        <button class="btn btn-success ml-6 text-center text-base" @click="evento = true; user = false; home = false; socio = false; registro = false; vendedor = false; base = false" >EVENTOS</button>
                               
                    </div>
                    <div class="flex justify-center">
                      
                                
                                    <button class="btn btn-danger mr-6 text-center text-base" @click="user = false; home = false; socio = false; evento = false; registro = true; vendedor = false; base = false" >BIKES</button>
                               
                    </div>
                </div>
    
                <div>
                    <h1 class="text-center font-bold mt-4 text-2xl mb-2">¿Cual es tu Próximo Desafío?</h1>
                </div>
    
                @livewire('eventos-index')
                    
                
            </div>
    
        </div>  

    </div>

    <div :class="{'block': registro, 'hidden': ! registro}" class="hidden">
     

        <div class="max-w-7xl mx-auto pb-8 ">      
            <div class="card">
                <div  class="mt-4 text-2xl mb-4 sm:text-xl mx-4 leading-none font-bold text-gray-900 flex justify-between">
                    <div class="flex justify-center">
                       
                        <button class="btn btn-danger ml-6 text-center text-base" @click="user = false; home = false; socio = true; registro = false; vendedor = false; base = false" >RIDERS</button>
                               
                    </div>
                    <div class="flex justify-center">
                       
                        <button class="btn btn-danger ml-6 text-center text-base" @click="evento = true; user = false; home = false; socio = false; registro = false; vendedor = false; base = false" >EVENTOS</button>
                               
                    </div>
                    <div class="flex justify-center">
                      
                                
                                    <button class="btn btn-success mr-6 text-center text-base" @click="user = false; home = false; socio = false; evento = false; registro = true; vendedor = false; base = false" >BIKES</button>
                               
                    </div>
                </div>
                
                <div class=" px-6 pb-4">
                    
                    
                        

                         

                    
                        
                    @livewire('vehiculo.vehiculo-search')
                
                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </div>

    <div :class="{'block': vendedor, 'hidden': ! vendedor}" class="hidden">
        
        @if(auth()->user()) 
            @if(auth()->user()->vendedor) 
                @if(auth()->user()->vendedor->estado==2) 

                    <div x-data="setup()">
                        <div class="grid grid-cols-3 justify-between">
                            <div>

                            </div>
                            <ul class="flex justify-center items-center my-4">
                                <template x-for="(tab, index) in tabs" :key="index">
                                    <li class="cursor-pointer py-3 px-4 rounded transition"
                                        :class="activeTab===index ? 'bg-red-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                                        x-text="tab"></li>
                                </template>
                            
                            </ul>
                          
                           
                            @if (auth()->user()->vendedor->view==0)
                                <div x-show="activeTab===1">
                                    <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                                    </form>
                                </div>
                               
                            @elseif (auth()->user()->vendedor->view==1)
                                <div x-show="activeTab===0">
                                    <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div x-show="activeTab===0">
                            
                            @livewire('vendedor.public-show')
                    
                   
                        </div>
                        <div x-show="activeTab===1">
                            @livewire('vendedor.pedidos-index')
                        </div>
                       
                    </div>

                    @if (auth()->user()->vendedor->view==0)
                        <script>
                                function setup() {
                                return {
                                activeTab: 0,
                                tabs: [
                                    "Público",
                                    "Vendedor"
                                ]
                                };
                            };
                        </script>
                    @elseif (auth()->user()->vendedor->view==1)
                        <script>
                                function setup() {
                                return {
                                activeTab: 1,
                                tabs: [
                                    "Público",
                                    "Vendedor"
                                ]
                                };
                            };
                        </script>
                    @endif
                   
                       
                @else
                    

                        <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
                    
                            <div class="card pb-8 ">
                              
                                  
                    
                                        <div class="justify-between gap-4 bg-red-700">
                                        
                                            <h1 class="px-2 text-3xl font-bold py-4 text-center text-white">Estas a un Paso de Finalizar</h1>
                                            
                                        </div>
                    
                               
                             
                                    <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                                        <article class="hidden  md:block col-span-2 md:col-span-1">
                                            <figure>
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                            </figure>
                                
                                        
                                        </article>
                                        <div class="block  md:hidden col-span-2 md:col-span-1">
                                            <article class="flex justify-center mt-2">
                                                <figure>
                                                    <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                                </figure>
                                            </article>
                                        </div>
                                        <article class="col-span-2 sm:col-span-2">
                                            <figure>
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                                            </figure>
                                        
                                        </article>
                                    
                                    
                                    </div>
                                
                           
                                
                                
                                    <div class="justify-between mt-8 bg-gray-200">
                    
                                        <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                                    
                                            <article>
                                                <figure>
                                                    <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                                    </a>
                                                </figure>
                                            
                                            </article>
                                            <div>
                                                <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                                <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                                    
                                            </div>
                    
                    
                                        </div>
                                
                                    </div>
                                
                                    <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                            
                          
                                    <div class="card-body">
                                      
                                            
                                        
   
                    
                                                    
                                                    <h1 class="text-center">Para activar tu registro como vendedor debes hacer el pago correspondiente</h1>
                    
                                                    <h1 class="text-center text-2xl font-bold my-4">{{auth()->user()->name}}</h1>
                                                    
                                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                                        <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                                    </div>
                    
                                                    <div class="flex justify-center">
                                                        <div class="">
                                                            <form action="{{route('vendedor.perfil.destroy',auth()->user()->vendedor)}}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                
                                                                <button class="btn btn-danger btn-sm" type="submit"> Cancelar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                    
                                                    
                                           
                                    
                                    
                                </div>
                            </div>
                    
                        </div>
                    
                   
                    
                @endif

            @else
           
                {{-- comment
                    @livewire('vendedor.catalogo-productos')
                --}}
            
            
                <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
            
                    <div class="card pb-8 ">
                        
                            
            
                            
            
                                <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
                                    <article class="col-span-2 sm:col-span-2">
                                        <figure>
                                            <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                                        </figure>
                            
                                    
                                    </article>
                                    <article  class="hidden md:block mx-10">
                                        @if (auth()->user())
                                            <figure>
                                                <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                                            </figure>
                                        @else
                                            <div class="bg-red-600 rounded-lg max-w-sm mx-auto">
                                                <h1 class="text-3xl text-center font-bold text-white pt-4">ACCESO RIDERS</h1>
                                                
                                                <div class="flex justify-center mb-4 ">
                                                    
                                                <div class="block w-full mx-4 pb-4">
                                                    
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                            
                                                        <div>
                                                            <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                                        </div>
                                            
                                                        <div class="mt-4">
                                                            <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                                        </div>
                                            
                                                        <div class="block mt-4">
                                                            <label for="remember_me" class="flex items-center">
                                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                                <span class="ml-2 text-sm text-white">{{ __('Recordar mi cuenta') }}</span>
                                                            </label>
                                                        </div>
                                            
                                                        <div class="flex items-center justify-end mt-4">
                                                            @if (Route::has('password.request'))
                                                                <a class="underline text-sm text-white hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                                                                {{ __('Registrarme') }}
                                                                </a>
                                                            
                                                            @endif
                                            
                                                            <x-jet-button class="ml-4">
                                                                {{ __('Ingresar') }}
                                                            </x-jet-button>
                                                        </div>
                                                    </form>
                                                </div> 
                                                </div>
                                            </div>
                                        @endif
            
                                    </article>
                                </div>
            
                           
                       
                            <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                                <article class="hidden  md:block col-span-2 md:col-span-1">
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                    </figure>
                        
                                
                                </article>
                                <div class="block  md:hidden col-span-2 md:col-span-1">
                                    <article class="flex justify-center mt-2">
                                        <figure>
                                            <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                                        </figure>
                                    </article>
                                </div>
                                <article class="col-span-2 sm:col-span-2">
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                                    </figure>
                                
                                </article>
                            
                            
                            </div>
                        
                   
                       
                        
                            <div class="justify-between mt-8 bg-gray-200">
            
                                <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                            
                                    <article>
                                        <figure>
                                            <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                            </a>
                                        </figure>
                                    
                                    </article>
                                    <div>
                                        <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                        <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                            
                                    </div>
            
            
                                </div>
                        
                            </div>
                        
                            <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                        
                       
                   
          
                            <div class="card-body">
                                
                                            <div>
                                                @php
                                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                                @endphp
                                                {!! Form::open(['route'=>'vendedor.home.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                                            
                                                @csrf
                                                    
                                                <div class="max-w-full items-center">
                
                
                                                    <h1 class="text-xl pb-4 text-center">Formulario de Promotor RCH</h1>
                
                                                    <p class="text-center">Indique los datos del titular de la cuenta</p>
                
                                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                                        <div class="md: col-span-2 lg:col-span-2 ">
                                                            <div class="mb-4">
                                                                {!! Form::label('name', 'Nombre completo:') !!}
                                                                {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
                                
                                                                @error('name')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('rut', 'Rut:') !!}
                                                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                                
                                                                @error('rut')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('fono', 'Fono:') !!}
                                                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('localidad', 'Localidad:') !!}
                                                                {!! Form::text('localidad', null , ['class' => 'form-input block w-full mt-1'.($errors->has('localidad')?' border-red-600':'')]) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('disciplina_id', 'Disciplina favorita:') !!}
                                                                {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                    
                                                    </div>
                                                
                
                                                    <h1 class="text-xl pb-4 text-center">Datos Bancarios</h1>
                
                                                    <p class="text-center">Indique en qué cuenta desea recibir sus comisiones por productos vendidos</p>
                
                                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                                        <div class="md: col-span-2 lg:col-span-2 ">
                                                            
                                                            <div class="mb-4">
                                                                {!! Form::label('banco', 'Banco:') !!}
                                                                {!! Form::select('banco', $bancos, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            <div class="mb-4">
                                                                {!! Form::label('tipo_cuenta', 'Tipo de cuenta:') !!}
                                                                {!! Form::select('tipo_cuenta', $cuentas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                                            </div>
                                                            
                                                            <div class="mb-4">
                                                                {!! Form::label('nro_cuenta', 'Nro Cuenta*') !!}
                                                                {!! Form::text('nro_cuenta', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_cuenta')?' border-red-600':'')]) !!}
                                
                                                                @error('nro_cuenta')
                                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                                @enderror
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    
                                                    </div>
                                                
                                                    
                                                </div>
                                                {!! Form::hidden('user_id',auth()->user()->id) !!}
                                            
                                                    <div class="flex justify-center">
                                                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                                    </div>
                                                
                                                {!! Form::close() !!}
                                            </div>
                                            
                                    
            
                            
                                   
                            
                            
                        </div>
                    </div>
            
                </div>
            
               
            @endif
        @else
           
            {{-- comment
                @livewire('vendedor.catalogo-productos')
            --}}
        
        
            <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
        
                <div class="card pb-8 ">
              
                        
                      @livewire('vendedor.public-show')
               
                    <div class="justify-between mt-8 bg-gray-200">
        
                        <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                    
                            <article>
                                <figure>
                                    <a href="https://www.instagram.com/reel/CVyzsrhpZE3/?utm_source=ig_web_copy_link" target="_blank">
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe2.png')}}" alt="">
                                    </a>
                                </figure>
                            
                            </article>
                            <div>
                                <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                    
                            </div>
        
        
                        </div>
                
                    </div>
                
                    <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
                    
           
                        <div class="card-body">
                          
                                    
                                <h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
                                @php
                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                @endphp
                                
                                
                                <h1 class="text-center py-2 font-bold">Una vez que hayas creado tu cuenta con nosotros podras registrarte como vendedor autorizado de RidersChilenos</h1>
                                <div class="flex justify-center mx-4 pb-20 mb-20">
                                    
                                    <form method="POST" action="{{ route('register') }}" class="w-full">
                                        @csrf
                            
                                        <div>
                                            <x-jet-label for="name" value="{{ __('Nombre') }}" />
                                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                        </div>
                            
                                        <div class="mt-4">
                                            <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                        </div>
                            
                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="mt-4">
                                                <x-jet-label for="terms">
                                                    <div class="flex items-center">
                                                        <x-jet-checkbox name="terms" id="terms"/>
                            
                                                        <div class="ml-2">
                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </x-jet-label>
                                            </div>
                                        @endif
                            
                                        <div class="flex items-center justify-end mt-4">
                                            <h1 class="text-sm mr-2">Ya tienes una cuenta? </h1>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-auto" href="{{ route('login') }}">
                                                {{ __('Ingresar') }}
                                            </a>
                            
                                            <x-jet-button class="ml-4">
                                                {{ __('Registrarme') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                    
                                </div>
                         
                        
                        
                    </div>
                </div>
        
            </div>
            

        @endif

    </div>

    <div :class="{'block': base, 'hidden': ! base}" class="hidden">
        {{$slot}}
    </div>
</div>