@php
 $nav_links =[
     
    /*,[   
        'name'=>'RCH-TV',
        'route'=>route('series.index'),
        'active'=>request()->routeIs('series.*')

    ]*/
    [   
        'name'=>'HOME',
        'route'=>route('home'),
        'active'=>request()->routeIs('socios.*')

    ],[   
        'name'=>'Auspiciadores',
        'route'=>route('socio.index'),
        'active'=>request()->routeIs('socios.*')

    ],
    
    [   'name'=>'Fotos y Videos',
        'route'=>route('multimedia'),
        'active'=>request()->routeIs('multimedia')

    ]
   ,[   
        'name'=>'Contacto',
        'route'=>route('ticket.pistas.index'),
        'active'=>request()->routeIs('ticket.pistas*')
    ] /*
    ,[   
        'name'=>'División Usados',
        'route'=>route('garage.usados'),
        'active'=>request()->routeIs('usados.*')

    ]*/
    ,
    /*[   
        'name'=>'Portal Vendedores',
        'route'=>route('vendedores.index'),
        'active'=>request()->routeIs('vendedor.*')

    ],
    [   
        'name'=>'Diseño',
        'route'=>route('admin.disenos.index'),
        'can'=>'Diseño',
        'active'=>request()->routeIs('admin.disenos.index')

    ]
    ,[   
        'name'=>'Producción',
        'route'=>route('admin.disenos.produccion'),
        'can'=>'Diseño',
        'active'=>request()->routeIs('admin.disenos.produccion')

    ]*/
   
    /*
    ,[   
        'name'=>'Tienda',
        'route'=>'#',
        'active'=>false

    ]*/
 ]   
@endphp

<nav x-data="{ open: false }" class="border-b border-gray-100" style="z-index: 20;">
    <!-- Primary Navigation Menu -->
    <div class="fixed sm:hidden top-0 bg-gray-900 w-full md:relative md:bg-white sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="bg-gray-900 md:hidden">
                 <!-- Logo -->
                <div class="hidden top-4 left-4 md:hidden">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>
                </div>

                <div class="w-full text-white bg-gray-900 block md:hidden">
                    <div class="flex flex-col max-w-screen-xl pt-3 pb-4 md:py-0 px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                        <div class="flex flex-row items-center my-auto content-center justify-center">
                            <a href="{{ route('home') }}">
                                <h1 class="text-2xl text-center font-bold my-2">
                                    MegaAvalanche Icalma
                                </h1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="fixed top-4 right-4 md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <h1 class="text-center hidden">hola mundo</h1>

    <div class="hidden sm:block top-0 bg-gray-900 w-full md:relative sm:bg-gray-900 sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="flex justify-between h-20">
                
                <div class="hidden sm:flex">
                    <!-- Logo -->
                    <div class="hidden">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-14 sm:flex">
                        
                        @foreach ($nav_links as $nav_link)

                            @if ($nav_link['name']=='Diseño')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                                
                            @elseif($nav_link['name']=='Producción')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                            @elseif($nav_link['name']=='Eventos')     
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                            @else
                                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endif
                                

                        @endforeach  

                        <a href="https://megaavalancheicalma.cl/checkout/megaavalanche-icalma-2023" class="btn btn-danger h-10 my-auto">INSCRIPCIONES</a>
                    

                    </div>
                    
                </div>
                
                

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    
                    @auth
                    
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-jet-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative  text-white">

                        
                                
                            
                            <x-jet-dropdown align="right" width="48" class="bg-white">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> <p class="mt-2 ml-1">{{ Auth::user()->name }}</p>
                                        </button>
                                        
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content" class="bg-white">
                                    <!-- Account Management -->
                                    @if(auth()->user()->socio)
                                        <x-jet-dropdown-link href="{{ route('socio.show', auth()->user()->socio) }}" class="bg-white">
                                            {{ __('Mi Perfil') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                    <x-jet-dropdown-link href="{{ route('socio.create') }}">
                                        {{ __('Suscripción') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('garage.vehiculos.index') }}">
                                        {{ __('Mis vehiculos') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Configuración y Privacidad') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Configuración') }}
                                    </x-jet-dropdown-link>

                                    @can('Ver dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            {{ __('Admin') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Leer series')
                                        <x-jet-dropdown-link href="{{ route('filmmaker.series.index') }}">
                                            {{ __('Creador de Contenido') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Crear evento')
                                        <x-jet-dropdown-link href="{{ route('organizador.eventos.index') }}">
                                            {{ __('Organizador') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>

                        
                            

                        </div>

                    @else

                    <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-200 underline">Ingresar</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-gray-200 underline">Registro</a>
                    
                    @endauth

                    


                </div>

            </div>
        </div>
    </div>
    <div class="hidden sm:hidden bottom-0 bg-red-600 w-full md:relative md:bg-white sm:pt-3" style="z-index: 20;">
        <div class="container mb-0 sm:mb-6" >
            <div class="flex justify-between h-16">
                <div class="hidden sm:flex">
                    <!-- Logo -->
                    <div class="hidden">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-14 sm:flex">
                        @foreach ($nav_links as $nav_link)
                                
                            @if ($nav_link['name']=='Diseño')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                                
                            @elseif($nav_link['name']=='Producción')
                                @can('Diseño')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endcan
                            @elseif($nav_link['name']=='Eventos')
                              
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                              
                            @else
                                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endif
                                

                        @endforeach  
                        

                    </div>
                    
                </div>
                
                

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    
                    @auth
                    
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-jet-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">

                        
                                
                            
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> <p class="mt-2 ml-1">{{ Auth::user()->name }}</p>
                                        </button>
                                        
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    @if(auth()->user()->socio)
                                        <x-jet-dropdown-link href="{{ route('socio.show', auth()->user()->socio) }}">
                                            {{ __('Mi Perfil') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                    <x-jet-dropdown-link href="{{ route('socio.create') }}">
                                        {{ __('Suscripción') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('garage.vehiculos.index') }}">
                                        {{ __('Mis vehiculos') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Configuración y Privacidad') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Configuración') }}
                                    </x-jet-dropdown-link>

                                    @can('Ver dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            {{ __('Admin') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Leer series')
                                        <x-jet-dropdown-link href="{{ route('filmmaker.series.index') }}">
                                            {{ __('Creador de Contenido') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Crear evento')
                                        <x-jet-dropdown-link href="{{ route('organizador.eventos.index') }}">
                                            {{ __('Organizador') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>

                        
                            

                        </div>

                    @else

                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                    
                    @endauth

                    


                </div>







                <!-- Hamburger -->
                <div class="-mr-2 flex items-center hidden">
                    
                        <button @click="home = true; socio = false; evento = false; registro = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </button>
                      
                </div>

                <!-- Search -->
                <div class="-mr-2 flex items-center hidden">
                    <button @click="socio = true; home = false; registro = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            {{-- comment <a href="{{ route('socio.index') }}"> --}}   
                                    
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        
                    </button>
                </div>
                <!-- Database -->
                <div class="-mr-2 flex items-center hidden">
                 
                        <button @click="registro = true; home = false; socio = false; evento = false; user = false; vendedor = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">          
                        
                            <div :class="{'flex':! registro, 'hidden': registro}" class="hidden sm:hidden">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 1280.000000 1280.000000"
    
                                            preserveAspectRatio="xMidYMid meet" fill="#ffffff" stroke="none">
    
                                            <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                            <path d="M72 12780 c-18 -11 -41 -34 -52 -52 -20 -33 -20 -64 -20 -6328 0
                                            -6264 0 -6295 20 -6328 11 -18 34 -41 52 -52 33 -20 64 -20 6328 -20 6264 0
                                            6295 0 6328 20 18 11 41 34 52 52 20 33 20 64 20 6328 0 6264 0 6295 -20 6328
                                            -11 18 -34 41 -52 52 -33 20 -64 20 -6328 20 -6264 0 -6295 0 -6328 -20z
                                            m12518 -6380 l0 -6190 -6190 0 -6190 0 0 6190 0 6190 6190 0 6190 0 0 -6190z"/>
                                            <path d="M4360 9099 c-275 -7 -367 -12 -407 -24 -76 -23 -153 -97 -200 -193
                                            -35 -71 -38 -83 -41 -183 -5 -119 11 -189 64 -283 40 -71 136 -169 223 -227
                                            42 -28 77 -52 79 -54 2 -1 -24 -92 -57 -201 -58 -195 -117 -403 -280 -989
                                            -111 -398 -117 -420 -127 -418 -5 1 -40 14 -79 29 -224 84 -406 116 -655 116
                                            -243 0 -407 -27 -630 -107 -356 -126 -684 -385 -905 -715 -68 -102 -163 -292
                                            -204 -411 -247 -714 -25 -1521 551 -2005 341 -286 749 -434 1193 -434 1175 2
                                            2045 1091 1789 2239 -34 151 -72 260 -144 406 -101 208 -211 357 -390 528
                                            l-107 103 31 108 c18 59 35 107 39 107 5 1 481 -322 1060 -717 579 -394 1053
                                            -718 1054 -719 1 0 -5 -28 -14 -60 -26 -92 -23 -279 5 -378 59 -208 197 -377
                                            385 -471 51 -26 117 -54 147 -62 86 -23 252 -29 335 -11 39 8 71 14 72 13 1 0
                                            28 -58 61 -128 l61 -128 -90 0 -89 0 0 -130 0 -130 365 0 365 0 0 115 0 115
                                            -182 2 -181 3 -83 165 c-46 91 -83 168 -83 172 -1 3 19 18 44 33 57 33 164
                                            133 209 194 42 57 93 157 110 213 l12 43 86 3 85 3 7 -60 c30 -267 175 -612
                                            353 -844 313 -407 756 -658 1268 -718 124 -15 396 -6 518 16 761 138 1352 730
                                            1492 1492 22 120 31 394 16 518 -76 645 -457 1183 -1033 1460 -434 208 -920
                                            238 -1386 83 -67 -22 -124 -39 -126 -37 -2 2 -139 253 -305 558 l-303 555 114
                                            265 113 265 90 12 c138 19 216 60 266 140 12 20 41 99 64 175 l42 139 -876 0
                                            -876 0 -52 -35 c-62 -42 -88 -83 -73 -117 18 -43 37 -58 131 -102 162 -75 376
                                            -137 636 -182 56 -9 107 -21 114 -25 8 -4 -18 -73 -84 -220 l-95 -214 -1691
                                            -5 c-930 -3 -1691 -2 -1691 2 0 4 27 105 61 225 56 203 59 221 49 263 -25 101
                                            -93 177 -229 256 -44 25 -86 52 -92 60 -17 21 -7 46 30 71 34 23 35 23 407 23
                                            l374 0 0 230 0 230 -177 -2 c-98 0 -338 -5 -533 -9z m3277 -1801 c-17 -39
                                            -166 -413 -411 -1029 l-276 -696 -73 -6 c-39 -4 -103 -16 -142 -28 -118 -35
                                            -106 -43 -185 119 l-69 142 150 0 149 0 0 130 0 130 -375 0 -375 0 0 -117 0
                                            -118 140 3 140 3 96 -198 95 -198 -25 -22 -26 -22 -63 43 c-34 24 -528 357
                                            -1097 741 -569 384 -1041 703 -1048 709 -10 9 1 54 49 219 l62 207 1644 0
                                            c1312 0 1644 -3 1640 -12z m724 -495 c106 -197 206 -381 221 -409 l28 -50 -64
                                            -47 c-142 -105 -302 -274 -410 -436 -146 -218 -260 -512 -291 -748 l-7 -53
                                            -92 0 -93 0 -46 94 c-34 67 -67 115 -118 170 -61 66 -70 79 -62 99 24 69 729
                                            1736 734 1737 3 0 93 -161 200 -357z m-5199 -672 c48 -11 108 -27 133 -35 42
                                            -15 167 -65 172 -70 4 -4 -86 -269 -162 -479 l-69 -188 -185 -176 c-241 -227
                                            -273 -262 -299 -317 -42 -89 -20 -175 56 -212 41 -20 173 -31 248 -19 112 16
                                            433 288 551 465 96 144 186 344 234 523 13 48 27 87 31 87 18 0 144 -186 192
                                            -285 96 -194 137 -371 137 -588 0 -219 -42 -399 -137 -589 -206 -413 -600
                                            -682 -1070 -729 -281 -29 -600 53 -844 216 -284 190 -475 465 -562 810 -19 78
                                            -22 116 -23 290 0 186 2 208 28 309 46 183 134 366 242 506 51 65 182 195 245
                                            243 168 126 368 212 590 253 108 19 378 11 492 -15z m6805 -5 c386 -96 694
                                            -338 871 -684 173 -336 196 -703 66 -1067 -123 -343 -437 -656 -782 -780 -353
                                            -126 -723 -105 -1052 60 -326 164 -569 454 -675 807 -23 75 -41 167 -34 169 2
                                            1 303 5 669 9 741 7 728 6 790 76 26 30 30 43 30 92 0 36 -9 80 -25 122 -14
                                            36 -160 308 -324 605 l-299 540 32 14 c40 17 165 49 241 61 33 5 134 7 225 5
                                            135 -3 184 -8 267 -29z m-890 -646 c118 -217 217 -401 220 -407 4 -10 -93 -13
                                            -467 -13 l-472 0 7 33 c51 256 180 494 372 685 57 57 109 102 115 100 6 -2
                                            107 -181 225 -398z m-2238 -182 c-12 -29 -26 -68 -32 -85 -6 -18 -13 -33 -17
                                            -33 -6 0 -73 131 -68 135 6 6 104 34 120 34 16 1 16 -3 -3 -51z m564 -207 l18
                                            -31 -74 0 -75 0 27 65 26 66 30 -35 c17 -19 38 -48 48 -65z m-795 -304 c101
                                            -69 205 -133 232 -143 l48 -17 81 -170 c45 -94 80 -172 78 -174 -2 -2 -33 -6
                                            -69 -10 -228 -21 -466 129 -549 346 -10 27 -23 80 -29 118 -13 77 -4 187 14
                                            180 6 -3 93 -61 194 -130z m807 -225 c-19 -37 -58 -91 -86 -119 -50 -51 -126
                                            -109 -133 -102 -9 10 -136 270 -136 279 0 6 70 10 196 10 l195 0 -36 -68z"/>
                                            </g>
                                </svg>
                            </div>
                            <div :class="{'flex': registro, 'hidden': ! registro}" class="hidden sm:hidden">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 1280.000000 1280.000000"
    
                                            preserveAspectRatio="xMidYMid meet" fill="#A8A8A8" stroke="none">
    
                                            <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)">
                                            <path d="M72 12780 c-18 -11 -41 -34 -52 -52 -20 -33 -20 -64 -20 -6328 0
                                            -6264 0 -6295 20 -6328 11 -18 34 -41 52 -52 33 -20 64 -20 6328 -20 6264 0
                                            6295 0 6328 20 18 11 41 34 52 52 20 33 20 64 20 6328 0 6264 0 6295 -20 6328
                                            -11 18 -34 41 -52 52 -33 20 -64 20 -6328 20 -6264 0 -6295 0 -6328 -20z
                                            m12518 -6380 l0 -6190 -6190 0 -6190 0 0 6190 0 6190 6190 0 6190 0 0 -6190z"/>
                                            <path d="M4360 9099 c-275 -7 -367 -12 -407 -24 -76 -23 -153 -97 -200 -193
                                            -35 -71 -38 -83 -41 -183 -5 -119 11 -189 64 -283 40 -71 136 -169 223 -227
                                            42 -28 77 -52 79 -54 2 -1 -24 -92 -57 -201 -58 -195 -117 -403 -280 -989
                                            -111 -398 -117 -420 -127 -418 -5 1 -40 14 -79 29 -224 84 -406 116 -655 116
                                            -243 0 -407 -27 -630 -107 -356 -126 -684 -385 -905 -715 -68 -102 -163 -292
                                            -204 -411 -247 -714 -25 -1521 551 -2005 341 -286 749 -434 1193 -434 1175 2
                                            2045 1091 1789 2239 -34 151 -72 260 -144 406 -101 208 -211 357 -390 528
                                            l-107 103 31 108 c18 59 35 107 39 107 5 1 481 -322 1060 -717 579 -394 1053
                                            -718 1054 -719 1 0 -5 -28 -14 -60 -26 -92 -23 -279 5 -378 59 -208 197 -377
                                            385 -471 51 -26 117 -54 147 -62 86 -23 252 -29 335 -11 39 8 71 14 72 13 1 0
                                            28 -58 61 -128 l61 -128 -90 0 -89 0 0 -130 0 -130 365 0 365 0 0 115 0 115
                                            -182 2 -181 3 -83 165 c-46 91 -83 168 -83 172 -1 3 19 18 44 33 57 33 164
                                            133 209 194 42 57 93 157 110 213 l12 43 86 3 85 3 7 -60 c30 -267 175 -612
                                            353 -844 313 -407 756 -658 1268 -718 124 -15 396 -6 518 16 761 138 1352 730
                                            1492 1492 22 120 31 394 16 518 -76 645 -457 1183 -1033 1460 -434 208 -920
                                            238 -1386 83 -67 -22 -124 -39 -126 -37 -2 2 -139 253 -305 558 l-303 555 114
                                            265 113 265 90 12 c138 19 216 60 266 140 12 20 41 99 64 175 l42 139 -876 0
                                            -876 0 -52 -35 c-62 -42 -88 -83 -73 -117 18 -43 37 -58 131 -102 162 -75 376
                                            -137 636 -182 56 -9 107 -21 114 -25 8 -4 -18 -73 -84 -220 l-95 -214 -1691
                                            -5 c-930 -3 -1691 -2 -1691 2 0 4 27 105 61 225 56 203 59 221 49 263 -25 101
                                            -93 177 -229 256 -44 25 -86 52 -92 60 -17 21 -7 46 30 71 34 23 35 23 407 23
                                            l374 0 0 230 0 230 -177 -2 c-98 0 -338 -5 -533 -9z m3277 -1801 c-17 -39
                                            -166 -413 -411 -1029 l-276 -696 -73 -6 c-39 -4 -103 -16 -142 -28 -118 -35
                                            -106 -43 -185 119 l-69 142 150 0 149 0 0 130 0 130 -375 0 -375 0 0 -117 0
                                            -118 140 3 140 3 96 -198 95 -198 -25 -22 -26 -22 -63 43 c-34 24 -528 357
                                            -1097 741 -569 384 -1041 703 -1048 709 -10 9 1 54 49 219 l62 207 1644 0
                                            c1312 0 1644 -3 1640 -12z m724 -495 c106 -197 206 -381 221 -409 l28 -50 -64
                                            -47 c-142 -105 -302 -274 -410 -436 -146 -218 -260 -512 -291 -748 l-7 -53
                                            -92 0 -93 0 -46 94 c-34 67 -67 115 -118 170 -61 66 -70 79 -62 99 24 69 729
                                            1736 734 1737 3 0 93 -161 200 -357z m-5199 -672 c48 -11 108 -27 133 -35 42
                                            -15 167 -65 172 -70 4 -4 -86 -269 -162 -479 l-69 -188 -185 -176 c-241 -227
                                            -273 -262 -299 -317 -42 -89 -20 -175 56 -212 41 -20 173 -31 248 -19 112 16
                                            433 288 551 465 96 144 186 344 234 523 13 48 27 87 31 87 18 0 144 -186 192
                                            -285 96 -194 137 -371 137 -588 0 -219 -42 -399 -137 -589 -206 -413 -600
                                            -682 -1070 -729 -281 -29 -600 53 -844 216 -284 190 -475 465 -562 810 -19 78
                                            -22 116 -23 290 0 186 2 208 28 309 46 183 134 366 242 506 51 65 182 195 245
                                            243 168 126 368 212 590 253 108 19 378 11 492 -15z m6805 -5 c386 -96 694
                                            -338 871 -684 173 -336 196 -703 66 -1067 -123 -343 -437 -656 -782 -780 -353
                                            -126 -723 -105 -1052 60 -326 164 -569 454 -675 807 -23 75 -41 167 -34 169 2
                                            1 303 5 669 9 741 7 728 6 790 76 26 30 30 43 30 92 0 36 -9 80 -25 122 -14
                                            36 -160 308 -324 605 l-299 540 32 14 c40 17 165 49 241 61 33 5 134 7 225 5
                                            135 -3 184 -8 267 -29z m-890 -646 c118 -217 217 -401 220 -407 4 -10 -93 -13
                                            -467 -13 l-472 0 7 33 c51 256 180 494 372 685 57 57 109 102 115 100 6 -2
                                            107 -181 225 -398z m-2238 -182 c-12 -29 -26 -68 -32 -85 -6 -18 -13 -33 -17
                                            -33 -6 0 -73 131 -68 135 6 6 104 34 120 34 16 1 16 -3 -3 -51z m564 -207 l18
                                            -31 -74 0 -75 0 27 65 26 66 30 -35 c17 -19 38 -48 48 -65z m-795 -304 c101
                                            -69 205 -133 232 -143 l48 -17 81 -170 c45 -94 80 -172 78 -174 -2 -2 -33 -6
                                            -69 -10 -228 -21 -466 129 -549 346 -10 27 -23 80 -29 118 -13 77 -4 187 14
                                            180 6 -3 93 -61 194 -130z m807 -225 c-19 -37 -58 -91 -86 -119 -50 -51 -126
                                            -109 -133 -102 -9 10 -136 270 -136 279 0 6 70 10 196 10 l195 0 -36 -68z"/>
                                            </g>
                                </svg>  
                            </div>        
                                
                        </button>
                   
                </div>
                <!-- Portal Vendedores -->
                <div class="-mr-2 flex items-center hidden">
                    <button @click="vendedor = true; home = false; socio = false; evento = false; user = false; registro = false; base = false" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        
                    </button>
                </div>
                <!-- Perfil -->
                
                        <div class="-mr-2 flex items-center hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                @if(auth()->user())
                                    @if(auth()->user()->socio)
                                        <svg @click="user = true; home = false; socio = false; evento = false; registro = false; vendedor = false; base = false" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    @else
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <a href="{{route('socio.create')}}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></a>
                                        </svg>
                                    @endif
                                @else
                                    <svg @click="user = true; home = false; socio = false; evento = false; registro = false; vendedor = false; base = false"  class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @endif
                            </button>
                        </div>

                       
                    
                    
            </div>
        </div>
    </div>

    

    <!-- Responsive Navigation Menu -->
    
    <h1 class="text-center text-xs font-bold my-1 hidden">Obtén tu suscripción de RidersChilenos</h1>
    <div class="flex justify-end z-20" style="z-index: 20;">
        <div :class="{'fixed': open, 'hidden': ! open}" class="hidden md:hidden">
            <div class="space-y-1 bg-white z-20" style="z-index: 20;">
                <x-jet-responsive-nav-link href="{{route('vendedores.index')}}" :active="$nav_link['active']">
                    Tienda
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{route('vendedores.index')}}" :active="$nav_link['active']">
                    Tienda
                </x-jet-responsive-nav-link>
                
                @foreach ($nav_links as $nav_link)

                    @if ($nav_link['name']=='Diseño')
                        @can('Diseño')
                           {{-- comment
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link>
                             --}}
                        @endcan

                    @elseif($nav_link['name']=='Producción')
                        @can('Diseño')
                        {{-- comment
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link> --}}
                        @endcan

                    @elseif($nav_link['name']=='Eventos')
                        
                            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link>
                
                        
                    @else
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endif
                


                @endforeach
                
                    

            </div>

            <!-- Responsive Settings Options -->
            
            @auth        
            
                <div class="pt-4 pb-1 border-t border-gray-200 bg-white">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1  bg-white">
                        <!-- Account Management --> 
                        @if(auth()->user()->socio)
                            <x-jet-responsive-nav-link href="{{ route('socio.show', auth()->user()->socio) }}" :active="request()->routeIs('socio.show')">
                                {{ __('Mi Perfil') }}
                            </x-jet-responsive-nav-link>
                        @endif
                        <x-jet-responsive-nav-link href="{{ route('socio.create') }}" :active="request()->routeIs('socio.create')">
                            {{ __('Suscripción') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('garage.vehiculos.index') }}" :active="request()->routeIs('garage.vehiculos.index')">
                            {{ __('Mis vehiculos') }}
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Configuración') }}
                        </x-jet-responsive-nav-link>
                        @can('Ver dashboard')
                            <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                                {{ __('Admin') }}
                            </x-jet-responsive-nav-link>
                        @endcan
                        @can('Leer series')
                            <x-jet-responsive-nav-link href="{{ route('filmmaker.series.index') }}" :active="request()->routeIs('filmmaker.series.index')">
                                {{ __('Creador de Contenido') }}
                            </x-jet-responsive-nav-link>
                        @endcan
                        

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-jet-responsive-nav-link>
                            @endcan

                            <div class="border-t border-gray-200"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        @endif
                    </div>
                </div>
                
            

            @else
            <div class="py-1 border-t border-gray-200 bg-white">
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Ingresar
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                Registro
                </x-jet-responsive-nav-link>

            </div>
            @endauth
            
        </div>
    </div>
    
</nav>
