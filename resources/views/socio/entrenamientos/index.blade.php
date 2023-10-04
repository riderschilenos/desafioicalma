<x-app-layout>
    <x-slot name="tl">
            
        <title>Entrenamientos {{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
           {{-- comment
        <iframe width='100%' height='480' src='https://my.matterport.com/show/?m=cKjHiEQ22cu&brand=0' frameborder='0' allowfullscreen allow='xr-spatial-tracking'></iframe>
 --}}
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
            <div class="bg-gray-100">
                <div class="w-full text-white bg-main-color">
                        <div x-data="{ open: false }"
                            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                            <div class="p-4 flex flex-row items-center justify-between">
                                <a href="{{route('socio.show',$socio)}}"
                                    class="hidden md:inline text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline cursor-pointer"><i class="fas fa-arrow-circle-left text-white-800"></i> Perfil Rider</a>
                            
                            </div>
                        </div>
                    </div>
                    <!-- End of Navbar -->

                    <div class="container mx-auto my-5 p-5">
                        <div class="md:flex no-wrap md:-mx-2 ">
                            <!-- Left Side -->
                            <div class="w-full md:w-3/12 md:mx-2">
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
                                
                                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                                        <span clas="text-green-500">
                                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </span>
                                                        <p class="tracking-wide">{{ $socio->name." ".$socio->second_name }}
                
                                                            @can('perfil_propio', $socio)
                
                                                            
                                                                <a href="{{route('socio.edit',$socio)}}"><h5 class="text-blue-600 font-bold text-sm cursor-pointer">(Editar)</h5></a>
                                                            
                                                            @endcan
                                                            
                                                            </p>
                                                    </div>
                                                    <div class="image overflow-hidden mt-4">
                                                        <img class="h-40 w-30 mx-auto object-cover rounded-lg"
                                                            src="{{ $socio->user->profile_photo_url }}"
                                                            alt="">
                                                    </div>
                                    <div class="flex">
                                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Ficha Deportiva</h1>
                                    @can('perfil_propio', $socio)
                                        <h1 class="text-gray-400 font-bold text-xs leading-8 my-1 ml-auto"><a class="btn btn-success ml-2 text-center" href="">+ Agregar</a></h1>
                                    @endcan
                                    </div>
                                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Ultimos Entrenamientos:</h3>
                                    
                                    <div class="container mx-auto p-4">
                                        <h1 class="text-2xl font-bold mb-4">Actividad de Strava</h1>
                                        <div class="grid gap-4 grid-cols-1">
                                            @if ($activities)
                                                @foreach ($activities as $activity)
                                                    <div class="bg-white p-4 rounded shadow">
                                                        <p class="text-lg font-semibold">{{ $activity['name'] }}</p>
                                                        <p class="text-sm text-gray-600">{{ $activity['type'] }}</p>
                                                        @if (isset($activity['photos']) && count($activity['photos']) > 0)
                                                            <img src="{{ $activity['photos'][0]['urls']['100'] }}" alt="Activity Photo" class="mt-2 w-full h-auto">
                                                        @endif
                                                        <p class="text-sm text-gray-600">Fecha: {{ $activity['start_date_local'] }}</p>
                                                        <p class="text-sm text-gray-600">Duración: {{ gmdate("H:i:s", $activity['moving_time']) }}</p>
                                                        <p class="text-sm text-gray-600">Distancia: {{ number_format(($activity['distance']/1000), 2, '.', '.') }} kms</p>
                                                        <p class="text-sm text-gray-600">Elevation Gain: {{ number_format($activity['total_elevation_gain'], 2, '.', ',') }} metros</p>
                                                        <p class="text-sm text-gray-600">Velocidad Promedio: {{ number_format($activity['average_speed'], 2) }} m/s</p>
                                                        <p class="text-sm text-gray-600">Velocidad Máxima: {{ number_format($activity['max_speed'], 2) }} m/s</p>
                                                        <p class="text-sm text-gray-600">Commute: {{ $activity['commute'] ? 'Yes' : 'No' }}</p>
                                                        <p class="text-sm text-gray-600">Private: {{ $activity['private'] ? 'Yes' : 'No' }}</p>
                                                        <p class="text-sm text-gray-600">Achievements: {{ $activity['achievement_count'] }}</p>
                                                    
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="bg-white p-4 rounded shadow">
                                                    <p class="text-lg font-semibold">  No Registra Actividad</p>
                                                </div>
                                            @endif
                                        </div>
        
                                    </div>
                                    <ul class="list-inside space-y-2">
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
                                <!-- End of profile card -->
                                <div class="my-4"></div>
                                <!-- Friends card -->
                                
                                <!-- End of friends card -->
                            </div>
                            <!-- Right Side -->
                            <div class="w-full md:w-9/12 mx-2 h-64">
                                <!-- Profile tab -->
                                <!-- About Section -->
                                <div class="bg-white p-3 shadow-sm rounded-sm">
                                   
                                    <div class="text-gray-700">
                                        <div class="grid grid-cols-2 md:grid-cols-4 text-sm">
                                            
                                            <div class="grid grid-cols-2 col-span-2">
                                                <div class="px-4 py-2 font-semibold">IMC</div>
                                                <div class="px-4 py-2">22.9</div>
                                                <div class="px-4 py-2 font-semibold">Peso</div>
                                                <div class="px-4 py-2">--</div>
                                                <div class="px-4 py-2 font-semibold">Talla</div>
                                                    <div class="px-4 py-2">--</div>
                                                    <button class="col-span-2 block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">+ Registro</button>
                                            </div>
                                            <div class="grid grid-cols-2 col-span-2 mt-6 sm:mt-4">
                                                <div class="">
                                                    <div class="w-24 h-24 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                                        <span class="text-center text-gray-600 w-full">
                                                            <svg class="w-full px-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        </span>
                                                    </div>
                                                    <div class="px-4 py-2 font-semibold text-center">Entrenamientos</div>
                                                </div>
                                                <div class="">
                                                    <div class="w-24 h-24 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
                                                        <span class="text-center text-gray-600 w-full">
                                                            <svg class="w-full px-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                                        </span>
                                                    </div>
                                                    <div class="px-4 py-2 font-semibold text-center">Estadisticas</div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <button
                                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">GYM ONLINE</button>
                                </div>
                                <!-- End of about section -->

                                <div class="my-4"></div>

                                <!-- garage and movie -->
                                <div class="bg-white p-3 shadow-sm rounded-sm mb-14">
                                    <h1 class="text-center font-bold py-2">GEOLOCALIZACIÓN PARA ENTRENAMIENTOS</h1>
                                  <!--    <div id='map'  style='width: 100%; height: 300px; z-index: 1 ;'></div>

               
                                    <div class="grid grid-cols-1 sm:grid-cols-2">
                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <span class="text-red-500">
                                                    <i class="fas fa-car text-white-800"></i>
                                                </span>
                                                <span>Mi Garage</span>
                                                
                                                                @can('perfil_propio', $socio)
                                                                <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Inscribir Vehiculo)</span></a>
                                                                @endcan
                                                            
                                                
                                            </div>
                                            
                                            <div class="grid grid-cols-2">

                                                @if ($socio->user->vehiculos)
                                                    
                                                
                                                    @foreach ($socio->user->vehiculos as $vehiculo)
                                                        @if($vehiculo->status==5 || $vehiculo->status==6)
                                                        <div class="text-center my-2">
                                                            <a href="{{route('garage.vehiculo.show', $vehiculo)}}" class="text-main-color">
                                                                <img class="h-24 w-34 mx-auto"
                                                                src="{{Storage::url($vehiculo->image->first()->url)}}"
                                                                alt="">
                                                                <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                                                    <h1 class="text-md">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
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

                                        <div class="bg-white p-3 hover:shadow">
                                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                                <span class="text-red-500">
                                                    <i class="fas fa-film text-white-800"></i>
                                                </span>
                                                <span>MovieCollection</span>
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
                                    </div>
                                End of Experience and education grid -->
                                </div>

                                <div class="my-4">
                                
                                <div class="bg-white p-3 shadow-sm rounded-sm">
                {{-- comment 
                                    <div class="grid grid-cols-1 sm:grid-cols-2">
                                        <div>
                                            <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                                                <span class="text-red-500">
                                                    <i class="fas fa-car text-white-800"></i>
                                                </span>
                                                <span>Mi Entrenamiento</span>
                                                
                                                                @can('perfil_propio', $socio)
                                                                <a href="{{route('garage.vehiculo.create')}}"><span class="text-blue-600 font-bold text-sm ml-12 align-middle"> (Ver más)</span></a>
                                                                @endcan
                                                            
                                                
                                            </div>
                                            <ul class="list-inside space-y-2">
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
                                        </div>
                                    </div>
                                    --}}
                                </div> 

                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
          {{--   <script>
                mapboxgl.accessToken = 'pk.eyJ1IjoiZ29uemFwdjIzIiwiYSI6ImNsM2NwYXdsYjAwcW4zanBoZ3IzZHdya2kifQ.PfJs-vZuxkQRGavx9Czz8Q';
                var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11'
                });

                
                // Add geolocate control to the map.
                map.addControl(
                new mapboxgl.GeolocateControl({
                positionOptions: {
                enableHighAccuracy: true
                },
                // When active the map will receive updates to the device's location as it changes.
                trackUserLocation: true,
                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                showUserHeading: true
                })
                );
            </script>comment --}}

    </x-fast-view>
      
    
</x-app-layout>