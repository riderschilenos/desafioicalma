<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />

        <meta property="og:description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, haz click y revisa lo que hay detras de este link."/>  

        <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

        <meta name="description" content="Te invitamos a visualizar el contenido del portal rider más importante del Pais, haz click y revisa lo que hay detras de este link.">
       
        @isset($tl)

            {{$tl}}
            
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>

        @endisset

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
            <!-- Google tag (gtag.js) -->
         
        @livewireStyles

        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        
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

        <div class="min-h-screen bg-gray-100"  x-data="{@routeIs('home') home: true @else home: false @endif, base: true, socio: false, evento: false, registro: false, user: false, vendedor: false}">
            @livewire('navigation-menu')

       
            <div class="h-16 text-white md:hidden">
                Riderschilenos
            </div>
            
            <main style="z-index: 10;"> 
                {{ $slot }}
            </main>
            
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>