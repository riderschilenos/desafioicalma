<x-app-layout>
    <x-slot name="tl">
            
        <title>{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
    </x-slot>
    

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
                    
                
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
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



            <div class="bg-gray-100 min-h-screen pb-6">
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
                                @switch($socio->status)
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
                                        <p class="ml-2 tracking-wide">{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }} </p>
                                            @if ($socio->status==1) 
                                                <div class="star-icon z-10 my-auto ml-2"> <!-- Contenedor de la estrella con z-index -->
                                                    <i class="fa fa-star text-yellow-400 text-xl my-auto items-center"></i> <!-- Estrella usando Font Awesome (ajusta el tamaño y el color según necesites) -->
                                                </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                        @can('perfil_propio', $socio)

                                        
                                            <a href="{{route('socio.edit',$socio)}}" class="ml-2"><h5 class="text-blue-600 font-bold text-sm cursor-pointer ml-4">(Editar)</h5></a>
                                        @else

                                            @can('Super admin')
                                
                            
                                                <div class="flex justify-center mb-3">
                                                    <a href="{{route('socio.points', $socio)}}">
                                                        <span class="bg-red-500 py-1 px-2 rounded text-white text-sm text-center flex">
                                                            @livewire('socio.point-count', ['socio' => $socio]) Pts
                                                        </span>
                                                    </a>
                                                </div>
                                            @endcan

                                        @endcan
                                        
                                   
                            </div>

                                <div class="flex">
                                    <div class="content-center items-center">
                                        <div class="image overflow-hidden">
                                            @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                                                <img class="h-44 w-40 mx-auto object-cover"
                                                src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg"
                                                alt="">
                                            @else
                                                <img class="h-44 w-42 object-cover"
                                                src="{{ $socio->user->profile_photo_url }}"
                                                alt="">
                
                                            @endif
                                           
                                        </div>
                                        @can('perfil_propio', $socio)
                                            <h1 class="text-gray-400 font-bold text-xs leading-8 my-1 ml-auto"><a href="{{ route('profile.show') }}">Editar Foto</a></h1>
                                        @endcan
                                    </div>
                                    <div class="col-spam-3 px-4 w-full">
                                        <a href="{{route('socio.show', $socio)}}">
                                            <h1 class="text-blue-400 font-bold text-lg leading-8 mb-1">{{ '@'.$socio->slug }}</h1>
                                        </a>  
                                        <div class="flex content-center">
                                            <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                <i class="fas fa-birthday-cake content-arount" aria-hidden="true"></i>
                                            </div>
                                            <div class="px-2 py-2 text-sm">{{date('d-m-Y', strtotime($socio->born_date))}}</div>
                                        </div>
                                    
                                        <div class="flex items-center content-center">
                                                    @if($socio->direccion)
                                                        <div class="px-2 py-2 text-red-500 font-semibold content-center">
                                                        <i class="fa fa-map-marker my-auto py-auto" aria-hidden="true"></i>
                                                    </div>
                                                    
                                                        <div class="px-2 py-2">{{Str::limit($socio->direccion->comuna.', '.$socio->direccion->region,20)}}</div>
                                                    @endif
                                        </div>

                                        <div class="text-gray-700">
                                           
                                        
                                            <button x-on:click="open=false" x-show="open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Información de Contácto</button>
                                            <button x-on:click="open=true" x-show="!open" class="bg-gray-100 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Resume</button>
                                        </div>

                                            @if($socio->user->vendedor) 
                                                @if($socio->user->vendedor->estado==2) 
                                                    @if($socio->fono) 
                                                        <div >
                                                            <a href="{{route('socio.store.show', $socio)}}">
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
                                        @if($socio->fono)
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Nro. Contacto</div>
                                                
                                                @can('Ver dashboard')
                                                    <a  href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola" target="_blank">
                                                        <div class="px-4 py-2">{{ $socio->fono }}</div>
                                                    </a> 
                                                @endcan
                                                

                                            </div>
                                        @endif
                                        
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Email.</div>
                                            <div class="px-4 py-2">
                                                <a class="text-blue-800" href="mailto:jane@example.com">{{$socio->user->email}}</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                   
                                
                            
                                    @livewire('socio.socio-auspiciadores',['socio' => $socio], key('socio-auspiciadores.'.$socio->slug))

                                    @can('Super admin')
                                        
                                    
                                        <div class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded-lg shadow-sm ">
                                            <div class="mt-2">
                                                <div class="font-semibold text-center text-sm mb-2">¡¡ AUSPICIA A {{Str::limit(strtoupper($socio->name),10)}} AHORA !!</div>
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
                                                <div class="w-full cursor-pointer rounded-xl bg-blue-800 px-3 py-3 text-center font-semibold text-white hidden">AUSPICIAR A {{Str::limit(strtoupper($socio->name),10)}}</div>
                                            </div>
                                        </div>

                                    @endcan
                                    <ul
                                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm hidden">
                                        <li class="flex items-center py-3">
                                            <span>Suscripción</span>
                                                @switch($socio->status)
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
                                                            @can('perfil_propio', $socio)
                                                            <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm align-middle"> (Inscribir Vehiculo)</span></a>
                                                            @endcan
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="grid grid-cols-2  md:grid-cols-4 gap-1 mt-4 "> 

                                            @if ($socio->user->vehiculos)
                                                
                                            
                                                @foreach ($socio->user->vehiculos as $vehiculo)
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
                                            
                                        @livewire('socio.curriculum-deportivo',['socio' => $socio], key('curriculum-deportivo'.$socio->slug))

                                   
                                        @endcan
                                        <div class="grid grid-cols-4 gap-4 hidden">
                                        
                                            @if ($socio->user->serie_enrolled)
                                                
                                            
                                                @foreach ($socio->user->serie_enrolled as $serie)
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
                                      
                                        @can('perfil_propio', $socio)
                                            @if (auth()->user()->strava)
                                                
                                        
                                                <div class="bg-green-50 p-6 rounded shadow-md items-center ">
                                                  
                                                    <div class="flex items-center justify-between">
                                                        <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                        <div>
                                                            <h2 class="text-lg font-semibold">Perfil de Strava Conectado</h2>
                                                            <p class="text-gray-600 mt-1">¡Tu perfil de Strava ya está conectado y listo para que participes en eventos virtuales!</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 flex justify-between">
                                                        <a href="#" class="text-blue-500 hover:underline hover:text-blue-600 transition duration-300 ml-4">
                                                            Desconectar Perfil
                                                        </a>
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Logo_Strava.png" alt="Logo de Strava" class="object-cover h-6">
                                                    </div>
                                                   
                                                </div>
                                            @else
                                                
                                                

                                                <div class="bg-white p-6 rounded shadow-md">
                                                    <h2 class="text-lg font-semibold mb-2">Enlazar perfil de Strava</h2>
                                                    <div class="my-2">
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8c/Logo_Strava.png" alt="Logo de Strava" class="object-cover h-14">
                                                    </div>
                                                    <p class="text-gray-600">Conecta tu cuenta de Strava para acceder a tus actividades.</p>
                                                    <div class="flex justify-center">
                                                        <a href="https://www.strava.com/oauth/authorize?client_id=112140&response_type=code&redirect_uri=https://riderschilenos.cl/redireccion-strava&scope=profile:read_all,activity:read_all" class=" bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                                                            Enlazar con Strava
                                                        </a>
                                                    </div>
                                                    
                                                    <p class="mt-4 text-sm text-gray-500">
                                                        Al hacer clic en "Enlazar con Strava", serás redirigido a Strava para autorizar la conexión.
                                                    </p>
                                                </div>
                                            @endif
                                        @endcan
                                        <div class="bg-blue-500 py-16">
                                            <div class="container mx-auto text-center">
                                                <h1 class="text-white text-4xl font-semibold mb-4">¡Desafío Strava! 15 y 30Km Online!</h1>
                                                <p class="text-white text-lg mb-8">Demuestra tu constancia montando a la bicicleta y participa de este desafio virtual.</p>
                                                <a href="https://riderschilenos.cl/eventos/desaf-o-riderschilenos-ft-strava" class="bg-white text-blue-500 hover:bg-blue-100 text-lg font-semibold py-2 px-6 rounded-full">Regístrate ahora</a>
                                            </div>
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

                                </div>
                                <!-- End of Experience and education grid -->
                            </div>

                            <div class="my-4">
                            
                            <div class="bg-white pt-3 pb-12 shadow-sm rounded-sm">

                                <div class="mb-12 grid grid-cols-1 sm:grid-cols-2">
                                
                                    <div class="bg-white p-3 hover:shadow">
                                        <div class="flex justify-between items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                           
                                           <div>
                                                <span class="text-red-500">
                                                    <i class="fas fa-film text-white-800"></i>
                                                </span>
                                                <span>MovieCollection</span>
                                            </div> 
                                            <div>
                                                <a href="{{route('series.index')}}"><span class="text-blue-600 font-bold text-sm align-middle"> (Ver más)</span></a>
                                            </div>        
                                        </div>
                                        <div class="grid grid-cols-4 gap-4">
                                        
                                            @if ($socio->user->serie_enrolled)
                                                
                                            
                                                @foreach ($socio->user->serie_enrolled as $serie)
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
                                    <div class="bg-white p-3 hover:shadow">
                                        <div class="items-center flex justify-between space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                                            <div>
                                                <span class="text-red-500">
                                                    <i class="fas fa-dumbbell text-white-800"></i>
                                                </span>
                                                <span>Entrenamientos</span>
                                            </div>
                                                                    
                                        <div>
                                                            
                                                            <a href="{{route('socio.entrenamiento',$socio)}}"><span class="text-blue-600 font-bold text-sm align-middle"> (Ver más)</span></a>
                                                        
                                                        </div> 
                                            
                                        </div>
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

    </x-fast-view>

</x-app-layout>