<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="et4ybouboiv1kxdkkqknc1zjtsz9qw" />

        @isset($tl)

            {{$tl}}
            
        @else
            <title>{{ config('app.name', 'Laravel') }}</title>

        @endisset

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-92Q72DQR36"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-92Q72DQR36');
        </script>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
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
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        
    </body>
    
</html>
