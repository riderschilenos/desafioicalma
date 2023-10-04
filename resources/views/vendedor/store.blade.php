<x-app-layout>
   
    <x-slot name="tl">
            
        <title>Vendedor {{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
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
           

            <div class="bg-gray-100 min-h-screen pb-48">
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

                <div class="max-w-7xl mx-auto mb-24  p-2 pb-24">
                    <div class="md:flex no-wrap md:-mx-2 ">
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
                                        <a href="{{route('socio.show', $socio)}}">
                                            <p class="ml-2 tracking-wide">{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}
                                        </a>
                                    </div>
                                        @can('perfil_propio', $socio)

                                        
                                            <a href="{{route('socio.edit',$socio)}}" class="ml-2"><h5 class="text-blue-600 font-bold text-sm cursor-pointer ml-4">(Editar)</h5></a>
                                        
                                        @endcan
                                        
                                    </p>
                            </div>

                                <div class="flex">
                                    <div class="content-center">
                                        <div class="image overflow-hidden">
                                            <img class="h-auto w-44 mx-auto object-cover"
                                                src="{{ $socio->user->profile_photo_url }}"
                                                alt="">
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
                                            <a href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20{{str_replace(' ', '%20', $socio->name)}}%20Obtuve%20tu%20contacto%20desde%20RidersChilenos,%20Deseo%20hacer%20una%20consulta%20sobre" target="_blank">
                                                <button class="bg-green-600 block w-full text-white text-sm font-semibold rounded-lg hover:bg-green-500 focus:outline-none focus:shadow-outline focus:bg-green-500 hover:shadow-xs p-3 my-4">Hablemos por Whatsapp</button>
                                            </a>
                                        </div>


                                        
                                    </div>
                                </div>

                               

                                 
                                    <ul class="hidden bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
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
                          
                            <!-- Friends card -->
                            
                            <!-- End of friends card -->
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-0 sm:mx-2">
                      
                            <div class="rounded-sm">

                                <div class="grid grid-cols-1">
                                    <div class="bg-white p-3">
                                        <div class="items-center flex space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                            <span class="text-red-500">
                                                <i class="fas fa-car text-white-800"></i>
                                            </span>
                                            <span>CATÁLOGO DE PRODUCTOS</span>
                                            
                                                          
                                            
                                        </div>
                                        
                                        <div class="grid grid-cols-2 md:grid-cols-4">

                                          
                                                
                                            
                                                @foreach ($productos as $producto)
                                                    @if ($producto->image)
                                                   
                                                    <x-producto-card :producto="$producto" :socio="$socio"/>

                                                    @endif
                                                @endforeach

                                        
                                        </div>
                                    </div>
                                    
                                   
                                <!-- End of Experience and education grid -->
                            

                            <div class="mt-4 mb-12">
                                <h1 class="text-center text-xs text-gray-700 pb-6">Todos Los derechos Reservados</h1>

                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

          

    </x-fast-view>

</x-app-layout>