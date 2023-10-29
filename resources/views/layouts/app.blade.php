<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
                <!-- Google tag (gtag.js) -->
              
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />
        <meta name="description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, haz click y revisa lo que hay detras de este link.">
        <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
        
        @isset($tl)

            {{$tl}}
            
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>

        @endisset
       

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app4.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        {{-- comment<script src="{{ asset('js/instascan.min.js')}}"></script>

        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> --}}
        <!-- include the library -->
            <script src="{{asset('js/html5scan5.js')}}" type="text/javascript"></script>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- 
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />         --}}


        @livewireStyles

        @yield('css')
    </head>
    <body class="font-sans antialiased">
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
            .custom-bg {
        background-image: url('{{ asset('img/home/homemegaavalanche2.jpeg') }}');
        background-size: cover; /* Estira la imagen para que cubra todo el fondo sin repetirse */
        background-position: center; /* Centra la imagen en el elemento */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        border: 10px solid white; /* Agrega un borde blanco de 10px alrededor de la imagen */
        height: 1000px;
    }
        </style>
        
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100"  x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, evento: false,registro: false, user: false, vendedor: false}">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="h-16 text-white sm:hidden">
                Riderschilenos
            </div>
       

            <main style="z-index: 10;" class="pt-2"> 
                {{ $slot }}
            </main>
            
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        {{--         <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        comment --}}

        
    </body>
</html>
