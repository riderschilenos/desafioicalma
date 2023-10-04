<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />
        <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

                <!-- Google tag (gtag.js) -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=G-92Q72DQR36"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
        
                gtag('config', 'G-92Q72DQR36');
                </script>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100" x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, evento: false, registro: false, user: false, vendedor: false}" >
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">

             

                <aside>
                    <a href="{{route('organizador.eventos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Listado de eventos</a>
        
                    <ul class="text-sm text-gray-600 mt-2 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('organizador.eventos.edit',$evento) border-indigo-400 @else @endif pl-2">
                            @if ($evento->type=='pista')
                                <a href="{{route('organizador.eventos.edit',$evento)}}">
                                    Información de la Pista
                                </a>
                            @else
                                <a href="{{route('organizador.eventos.edit',$evento)}}">
                                    Información del evento
                                </a>
                            @endif
                           

                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('organizador.eventos.terminos',$evento) border-indigo-400 @else @endif pl-2">
                            <a href="{{route('organizador.eventos.terminos',$evento)}}">Terminos y Condiciones</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('organizador.eventos.fechas',$evento) border-indigo-400 @else @endif pl-2">
                            @if ($evento->type=='carrera')
                                <a href="{{route('organizador.eventos.fechas',$evento)}}">Fecha y Categorias</a>
                            @elseif($evento->type=='campeonato')
                                <a href="{{route('organizador.eventos.fechas',$evento)}}">Fechas y Categorias</a>
                            @elseif($evento->type=='pista')
                                <a href="{{route('organizador.eventos.fechas',$evento)}}">Precios y Entrenamientos</a>
                            @else
                                <a href="{{route('organizador.eventos.fechas',$evento)}}">Fechas y Categorias</a>
                            @endif
                            
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('organizador.eventos.inscritos',$evento) border-indigo-400 @else @endif  pl-2">
                            <a href="{{route('organizador.eventos.inscritos',$evento)}}">Listado de Inscritos</a>
                        </li>
                        <li class="hidden leading-7 mb-1 border-l-4  pl-2">
                            <a href="">Resultados</a>
                        </li>
                        <li class="hidden leading-7 mb-1 border-l-4  pl-2">
                            <a href="">Listado de Asistentes</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('organizador.eventos.retiros',$evento) border-indigo-400 @else @endif  pl-2">
                            <a href="{{route('organizador.eventos.retiros',$evento)}}">Retirar dinero</a>
                        </li>

                        
                    </ul>

                    @switch($evento->status)
                        @case(1)
                           
                            @break

                        @case(2)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Esta curso se encuentra en revisión
                                </div>

                            </div>
                            @break
                        
                        @case(3)

                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Esta curso se encuentra en publicado
                                </div>

                            </div>
                            
                            @break

                        @default
                            
                    @endswitch

                    
        
                </aside>
        
                <div class="col-span-4 card">
                    
                    <main class="card-body text-gray-600">
        
                        {{$slot}}
                        
                    </main>
                    
                    
        
                </div>
        
                
            </div>
        
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>
