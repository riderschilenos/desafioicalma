@props(['series','riders','autos','socio2','disciplinas'])
<div>  
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
        @endif
    </div>
    
    <div :class="{'block': home, 'hidden': ! home}" class="hidden">
        
        <section class="bg-cover bg-center hidden sm:block" style="background-image: url({{asset('img/home/homefotomini.png')}})">

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 pt-64 pb-8">
                
                    <h1 class="text-white font-fold text-4xl text-center">RidersChilenos</h1>
                    <p class="text-white text-lg mt-2 mb-4 text-center">Bienvenido al Portal Rider Más Grande del País.</p>
                        <!-- component -->
                        <!-- This is an example component -->
                
                    
                
            </div>

        </section>
       

        <section class="mt-12 sm:mt-16">
            

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                <article>
                    <figure>
                        <a href="{{route('socio.index')}}"><img loading="lazy" class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home4.jpeg')}}" alt=""></a>
                    </figure>

                
                </article>
                <article>
                    <figure>
                        <a href="{{route('garage.vehiculos.registerindex')}}"><img loading="lazy" class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/REGISTRO.png')}}" alt=""></a>
                    </figure>
                
                </article>
                <article>
                    <figure>
                        <a href="{{route('garage.usados')}}"><img loading="lazy" class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/USADOS.png')}}" alt=""></a>
                    </figure>
                
                </article>
                <article>
                    <figure>
                        <a href="{{route('series.index')}}"><img loading="lazy" class="rounded-xl h-35 w-55 object-cover" src="{{asset('img/home/home3.jpeg')}}" alt=""></a>
                    </figure>
                    
                </article>
            
            </div>

        </section>
        
        <section class="mt-16 bg-gray-700 pt-6">
           
            <h1 class="text-center text-white text-3xl">Ultimos Riders Registrados</h1>
            <p class="text-center text-white pb-4">Unete a la comunidad rider más grande del país</p>
            

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                @foreach ($riders as $rider)

                    <x-socio-card :socio="$rider" />
                    
                @endforeach

            </div>

            <div class="flex justify-center mt-2">
                <a href="{{route('socio.create')}}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">
                    REGISTRARME AHORA
                </a>
            </div>
            <div class="flex justify-center mt-2 pt-2">
                <a href="{{route('socio.index')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                    Ver Todos
                </a>
            </div>
        
        </section>

       

        <section class="my-4  py-12">
            <h1 class="text-center text-3xl text-gray-600">Últimos Videos y Carreras</h1>
            <p class="text-center text-gray-500 text-sm ">Compra y apoya las producciones nacionales</p>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

                @foreach ($series as $peli)

                    <x-serie-card :serie="$peli" />
                    
                @endforeach

            </div>
        
        </section>

        <section class="my-4  py-12">
            <h1 class="text-center text-3xl text-gray-600 font-bold">Compra y Venta Rider</h1>
            <p class="text-center text-gray-500 text-sm mb-6">Bicicletas, Motos y Otros.</p>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8">

                @foreach ($autos as $auto)

                    <x-vehiculo-card :vehiculo="$auto" />
                    
                @endforeach

            </div>

            <div class="flex justify-center mt-4 pt-4">
                <div class="grid grid-cols-2 gap-2">
                <a href="{{route('garage.vehiculo.vender')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                    Publicar
                </a>
                <a href="{{route('garage.usados')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ">
                    Ver todos
                </a>

                </div>
        
        </section>
    </div>

    <div :class="{'block': socio, 'hidden': ! socio}" class="hidden">
        
        <div class="max-w-7xl mx-auto pb-8">

            <div class="card">
                
                    
    
                    <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
                   
                        <div>
    
                        </div>
                       
                        <div class="hidden sm:block">
                            <div class="flex justify-center mr-4 ">
    
                                
                                    @if(auth()->user())
                                        @if(auth()->user()->socio)
                                            <div class="grid grid-cols-2 gap-2">
                                            <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                                <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                            </a>
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Mi Suscripción</button>
                                            </a>
                                            </div>
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                        </a>
                                    @endif    
                                
    
                            </div>
                        </div>
                        <div class="block sm:hidden">
                            <div class="flex justify-center ">
    
                                
                                    @if(auth()->user())
                                        @if(auth()->user()->socio)
                                            <a href="{{ route('socio.show', auth()->user()->socio)}}">
                                                <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                            </a>
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center ml-2">Mi Suscripción</button>
                                            </a>
                                        @else
                                            <a href="{{route('socio.create')}}">
                                                <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{route('socio.create')}}">
                                            <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                        </a>
                                    @endif    
                                
    
                            </div>
                        </div>
                    </div>
    
            
    
                    @livewire('socio.socio-search')
                    
                
            </div>
    
        </div>  

    </div>

    <div :class="{'block': registro, 'hidden': ! registro}" class="hidden">
        
        <div class="max-w-7xl mx-auto pb-8 ">
    
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center">Registro RCH</h1>
                    
                            <div class="mx-auto flex justify-center mt-4">
                                            
                                <a href="{{route('garage.vehiculo.create')}}">
                                    <button class="btn max-w-sm btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4 mb-2" wire:click="resetFilters">
                                    
                                        Inscribe tu Juguete
    
                                    </button>
                                </a>
                            </div>
                    
                   
                    <hr class="mt-2 mb-6">
    
                        
                        
                    @livewire('vehiculo.vehiculo-search')
                   
                </div>
            </div>
    
        </div>

    </div>

    <div :class="{'block': vendedor, 'hidden': ! vendedor}" class="hidden">
        
        @if(auth()->user()) 
            @if(auth()->user()->vendedor) 
                @if(auth()->user()->vendedor->estado==2) 

                <div x-data="setup()">
                    <ul class="flex justify-center items-center my-4">
                        <template x-for="(tab, index) in tabs" :key="index">
                            <li class="cursor-pointer py-3 px-4 rounded transition"
                                :class="activeTab===index ? 'bg-green-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                                x-text="tab"></li>
                        </template>
                    </ul>
                    <div x-show="activeTab===0">
                           @livewire('vendedor.pedidos-index')
                    </div>
                    <div x-show="activeTab===1">
                        <h1>hola mundo</h1>
                 </div>
                </div>
                        <script>
                                function setup() {
                                return {
                                activeTab: 0,
                                tabs: [
                                    "Por Usuario",
                                    "Por Categoria"
                                ]
                                };
                            };
                        </script>
                @else
                    
                    @php
                        // SDK de Mercado Pago
                        require base_path('/vendor/autoload.php');
                        // Agrega credenciales
                        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


                        // Crea un objeto de preferencia
                        $preference = new MercadoPago\Preference();

                        // Crea un ítem en la preferencia
                        $item = new MercadoPago\Item();
                        $item->title = 'Suscripción Vendedor Rider Chilenos:';
                        $item->quantity = 1;
                        $item->unit_price = 14990;

                        

                        $preference = new MercadoPago\Preference();
                        //...
                        if (auth()->user()){
                            if (auth()->user()->vendedor){

                                $preference->back_urls = array(
                                "success" => route('payment.vendedor', auth()->user()->vendedor),
                                "failure" => "http://www.tu-sitio/failure",
                                "pending" => "http://www.tu-sitio/pending");
                            }
                            else{
                                $preference->back_urls = array(
                                "success" => "http://www.tu-sitio/success",
                                "failure" => "http://www.tu-sitio/failure",
                                "pending" => "http://www.tu-sitio/pending"
                                );
                            }
                        }else{
                            $preference->back_urls = array(
                                "success" => "http://www.tu-sitio/success",
                                "failure" => "http://www.tu-sitio/failure",
                                "pending" => "http://www.tu-sitio/pending"
                                );
                        }

                        $preference->auto_return = "approved";

                        $preference->items = array($item);
                        $preference->save();
                            
                    @endphp
                    <div class="max-w-7xl mx-auto px-4 pb-16">

                        <div class="card pb-8 ">
                    
                            

                            <div class="justify-between gap-4 bg-red-700">
                        
                                    <h1 class="text-3xl font-bold py-4 text-center text-white">Haz Parte del Equipo Riders Chilenos</h1>
                                    
                                
                            
                            </div>

                            <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                                <article>
                                    <figure>
                                        <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend1.png')}}" alt=""></a>
                                    </figure>
                        
                                
                                </article>
                                <article>
                                    <figure>
                                        <a href="" wire:click="download('catalogoportanumeros.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend2.png')}}" alt=""></a>
                                    </figure>
                                
                                </article>
                                <article>
                                    <figure>
                                        <a href="" wire:click="download('polerasmx.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                                    </figure>
                                
                                </article>
                            </div>

                            <div class="justify-between bg-gray-900 mt-8 px-4 lg:px-12">

                                    <h1 class="text-2xl py-4 text-center text-white">Hazte Promotor de Nuestros Productos y Gana Dinero Haciendo lo Que Amas!! Solo debes obtener la membresia y podras recibir comisión en efectivo por cada producto que vendas.</h1>
                            
                            </div>

                            <h1 class="text-3xl font-bold text-center my-8">Nuestros productos</h1>

                            <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                                    </figure>
                        
                                
                                </article>
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                                    </figure>
                                
                                </article>
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                                    </figure>
                                
                                </article>
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                                    </figure>
                                
                                </article>
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                                    </figure>
                                
                                </article>
                                <article>
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                                    </figure>
                                
                                </article>
                                <div class="hidden md:block">

                                </div>
                                <article class="hidden md:block">
                                    <figure>
                                        <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                                    </figure>
                                
                                </article>
                            </div>

                            <div class="block  md:hidden">
                                <article class="flex justify-center mt-2">
                                    <figure>
                                        <img class="w-44 object-contain" src="{{asset('img/vendedores/7.png')}}" alt="">
                                    </figure>
                                </article>
                            </div>
                        
                            <div class="justify-between mt-8 bg-gray-200">

                                <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                            
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <div>
                                        <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                        <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                            
                                    </div>


                                </div>
                        
                            </div>
                        
                            

                                <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>

                                <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                                        </figure>
                            
                                    
                                    </article>
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <article>
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                    <div class="hidden md:block">
                
                                    </div>
                                    <article class="hidden md:block">
                                        <figure>
                                            <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                                        </figure>
                                    
                                    </article>
                                </div>
                            
                                <div class="card-body">
                                    @if (auth()->user())
                                    
                                        @if (auth()->user()->vendedor)

                                            
                                            <h1 class="text-center">Para activar tu registro como vendedor debes aceptar los terminos y condiciones y hacer el pago correspondiente</h1>

                                            <h1 class="text-center">{{auth()->user()->name}}</h1>
                                            
                                            <div class="cho-container flex justify-center mt-2 mb-4">
                                                <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                            </div>

                                            
                                        @else

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
                                            
                                        @endif

                            
                                    @else
                                        
                                    <h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
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
                                                {!! Form::text('name', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
                
                                                @error('name')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('rut', 'Rut:') !!}
                                                {!! Form::text('rut', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                
                                                @error('rut')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        
                                        
                                        </div>
                                    
                                    </div>
                                

                                    
                                </div>
                                {!! Form::close() !!}
                                <h1 class="text-center py-2 font-bold">Para desbloquear el formulario debes ingresar a tu cuenta RCH</h1>
                                <div class="flex justify-center">
                                    
                                    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                                    
                                </div>
                                    @endif  
                            
                            
                        </div>
                        </div>

                    </div>
                    <script src="https://sdk.mercadopago.com/js/v2"></script>
                    <script>
                        // Agrega credenciales de SDK
                        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                                locale: 'es-AR'
                        });
                        
                        // Inicializa el checkout
                        mp.checkout({
                            preference: {
                                id: '{{ $preference->id }}'
                            },
                            render: {
                                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
                            }
                        });
                    </script>
                        
                @endif

            @endif
        @else


          
            <div class="max-w-7xl mx-auto px-4 py-8">

                <div class="card pb-8 my-8 sm:my-2">
            
                    

                    <div class="justify-between gap-4 bg-red-700">
                
                            <h1 class="text-3xl font-bold py-4 text-center text-white">Haz Parte del Equipo Riders Chilenos</h1>
                            
                        
                    
                    </div>

                    <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
                        <article>
                            <figure>
                                <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend1.png')}}" alt=""></a>
                            </figure>
                
                        
                        </article>
                        <article>
                            <figure>
                                <a href="" wire:click="download('catalogoportanumeros.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend2.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <a href="" wire:click="download('polerasmx.pdf')"><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                            </figure>
                        
                        </article>
                    </div>

                    <div class="justify-between bg-gray-900 mt-8 px-4 lg:px-12">

                            <h1 class="text-2xl py-4 text-center text-white">Hazte Promotor de Nuestros Productos y Gana Dinero Haciendo lo Que Amas!! Solo debes obtener la membresia y podras recibir comisión en efectivo por cada producto que vendas.</h1>
                    
                    </div>

                    <h1 class="text-3xl font-bold text-center my-8">Nuestros productos</h1>

                    <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                            </figure>
                
                        
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                            </figure>
                        
                        </article>
                        <article>
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                            </figure>
                        
                        </article>
                        <div class="hidden md:block">

                        </div>
                        <article class="hidden md:block">
                            <figure>
                                <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                            </figure>
                        
                        </article>
                    </div>

                    <div class="block  md:hidden">
                        <article class="flex justify-center mt-2">
                            <figure>
                                <img class="w-44 object-contain" src="{{asset('img/vendedores/7.png')}}" alt="">
                            </figure>
                        </article>
                    </div>
                
                    <div class="justify-between mt-8 bg-gray-200">

                        <h1 class="text-2xl py-4 text-center font-bold">Vendedor Destacado</h1>
                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2 lg:mx-14 pb-10">
                    
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/felipe.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <div>
                                <h1 class="text-2xl py-4 text-center mt-6 md:ml-10">"...El poder ganar dinero desde su smartphone, de manera rapida y accesible es algo que todos pueden hacer..."</h1>
                                <h1 class="text-xl pb-4 pt-6 ml-4">Felipe Caerols<br>Santiago</h1>
                    
                            </div>


                        </div>
                
                    </div>
                
                    

                        <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>

                        <div class="max-w-7xl px-4 sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-2 gap-y-2 lg:mx-14">
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/1.png')}}" alt="">
                                </figure>
                    
                            
                            </article>
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/2.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/3.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/4.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/5.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <article>
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/6.png')}}" alt="">
                                </figure>
                            
                            </article>
                            <div class="hidden md:block">
        
                            </div>
                            <article class="hidden md:block">
                                <figure>
                                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/7.png')}}" alt="">
                                </figure>
                            
                            </article>
                        </div>
                    
                        <div class="card-body">
                            @if (auth()->user())
                            
                                @if (auth()->user()->vendedor)

                                    
                                    <h1 class="text-center">Para activar tu registro como vendedor debes aceptar los terminos y condiciones y hacer el pago correspondiente</h1>

                                    <h1 class="text-center">{{auth()->user()->name}}</h1>
                                    
                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                        <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                    </div>

                                    
                                @else

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

                                        <p class="text-center">Indique en que cuenta desea recibir sus comisiones por productos vendidos</p>

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
                                    
                                @endif

                    
                            @else
                                
                            <h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
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
                                        {!! Form::text('name', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
        
                                        @error('name')
                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        {!! Form::label('rut', 'Rut:') !!}
                                        {!! Form::text('rut', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
        
                                        @error('rut')
                                            <strong class="text-xs text-red-600">{{$message}}</strong>
                                        @enderror
                                    </div>
                                                                    
                                
                                </div>
                            
                            </div>
                        
                        
                            
                        </div>
                        {!! Form::close() !!}
                        <h1 class="text-center py-2 font-bold">Para desbloquear el formulario debes ingresar a tu cuenta RCH</h1>
                        <div class="flex justify-center">
                            
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                            
                        </div>
                            @endif  
                    
                    
                </div>
                </div>

            </div>
         

        @endif

    </div>

    <div :class="{'block': base, 'hidden': ! base}" class="hidden">
        {{$slot}}
    </div>
    
    
    
</div>