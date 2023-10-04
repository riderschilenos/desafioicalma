@php
    ob_start();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{public_path('img/logo.png')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{public_path('vendor/fontawesome-free/css/all.min.css')}}">
       
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
          

            <!-- Page Content -->
            <main>
                    <div>
                    
                    <div class="max-w-7xl mx-auto pt-4 px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-32 gap-y-2">
                        @foreach($etiquetas as $etiqueta)
                        @foreach($pedidos as $pedido)
                            @if ($pedido->id==$etiqueta)
                                
                            
                          

                                <div class="flex justify-center">

                                    <div class="flex flex-col w-full pb-2 mx-auto bg-cover" style="background-image: url({{asset('img/despacho/textura.jpeg')}})" >
                                            <div class="flex justify-between ">
                                                <div class="flex flex-col w-full mx-auto">
                                                    <div class="flex @if($pedido->transportista->id == 1 ) bg-green-500 @elseif($pedido->transportista->id == 2) bg-yellow-500 @endif px-4 pt-1">
                                                            @switch($pedido->transportista->id)
                                                                @case(1)
                                                                    
                                                                    <h1 class="text-white mr-2 font-bold">{{$pedido->transportista->name}}</h1>
                                                                    @break
                                                                @case(2)
                                                                    
                                                                    <h1 class="text-white mr-2 font-bold">{{$pedido->transportista->name}}</h1>
                                                                    
                                                                    @break
                                                                @case(3)
                                                                    
                                                                    <h1 class="text-white mr-2 font-bold">{{$pedido->transportista->name}}</h1>
                                                                    
                                                                    @break
                                                        
                                                                @default
                                                            
                                                            @endswitch
                                                        <h1 class="text-xl text-white">ETIQUETA DE DESPACHO #<small>{{1469+$pedido->id}}</small></h1>
                                                    </div>
                                                    {{-- comment
                                                    <div class="flex justify-between">
                                                        <div> 
                                                            FECHA July 6, 2021
                                                        </div> 
                                                    </div> --}}
                                                </div>
                                                
                                            </div>
                                
                                            <div class=" border-t-2 border-gray-200" >
                                
                                            <div class="flex mt-3 px-8">
                                                
                                                <div class="brand">
                                                    <span class="flex justify-center space-x-3 transition-all duration-1000 ease-out transform text-thumeza-500">
                                                        <img class="w-20 h-20 object-contain" src="{{asset('img/logo.png')}}">
                                                    </span>
                                                </div>
                                                <div class="flex flex-col ml-12 text-yellow-300">
                                                    <strong>Remitente:</strong>
                                                    <p class="text-sm">
                                                        <strong>Nombre:</strong> Gonzalo Peñaloza Verdugo<br>
                                                        <strong>Rut:</strong> 18.648.284-0<br>
                                                        <strong>Fono: </strong>+569 631 767 26<br>
                                                        <strong>Email: </strong>gonzaloenmundo@gmail.com<br>
                                                        <strong>Dirección: </strong>Requinoa, Sexta Región<br>
                                                    </p>
                                                </div>
                                                
                                                
                                            </div>
                                            <h1 class="font-bold ml-24 mt-2 px-4 text-yellow-300">Destinatario: </h1>
                                            <div class="flex mt-1 px-8">

                                                <div>
                                                    <h1 class="font-bold text-yellow-300">Nombre: </h1>
                                                    <h1 class="font-bold text-yellow-300">Rut:</h1>
                                                    <h1 class="font-bold text-yellow-300">Fono: </h1>
                                                    <h1 class="font-bold text-yellow-300">Email: </h1>
                                                    <h1 class="font-bold text-yellow-300">Destino: </h1>
                                                </div>


                                                <div class=" flex flex-col">
                                                    <p class="text-sm">
                                                        @if ($pedido->pedidoable_type == "App\Models\Invitado")
                                                            @foreach ($invitados as $invitado)
                                                                @if ($invitado->id == $pedido->pedidoable_id )
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$invitado->name}}<br></h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$invitado->rut}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$invitado->fono}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md"> {{$invitado->email}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$invitado->direccion->calle.' '.$invitado->direccion->numero.' '.$invitado->direccion->comuna.' '.$invitado->direccion->region}}</h1>
                                                                    
                                                                    
                                                             
                                                                   
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                        @if ($pedido->pedidoable_type == "App\Models\Socio")
                                                            @foreach ($socios as $socio)
                                                                @if ($socio->id == $pedido->pedidoable_id )
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$socio->user->name}}<br></h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$socio->rut}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md">{{$socio->fono}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md"> {{$socio->user->email}}</h1>
                                                                <h1 class="ml-4 bg-white mb-1 px-4 rounded-md"> {{$socio->direccion->calle.' '.$socio->direccion->numero.' '.$socio->direccion->comuna.' '.$socio->direccion->region}}</h1>
                                                                             

                                                                

                                                                
                                                              
                                                        
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        
                                                    </p>
                                
                                                </div>

                                            </div>

                                        </div>
                                           
                                    </div>
                                </div>


                            @endif
                        @endforeach
                        @endforeach
                    </div>
                        
                    </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)

            {{$js}}

        @endisset
        
    </body>
</html>

@php
    $html=ob_get_clean();
    echo $html;


@endphp