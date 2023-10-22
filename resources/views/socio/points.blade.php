<x-app-layout>

    <x-slot name="tl">
            
        <title>Puntos {{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
    </x-slot>

    @php
        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp
    @php
    $total=0;
    @endphp
     @foreach ($socio->pedidos->reverse() as $pedido)
                                               
        @if ($pedido->status>=4)
            
        
            @php
            $subtotal=0;
            @endphp

            @if($pedido->pedidoable_type=="App\Models\Socio")
                @foreach ($pedido->ordens as $orden)
                @php
                    
                    $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;

                @endphp    
                @endforeach

                @endif
                @if($pedido->pedidoable_type=="App\Models\Invitado")
                @foreach ($pedido->ordens as $orden)
                @php
                    
                    $subtotal+=$orden->producto->precio;

                @endphp    
                @endforeach

            @endif
            @php
                $total+=$subtotal;
            @endphp
        @endif
    @endforeach
    @foreach ($invitados as $invitado)
    
        @foreach ($invitado->pedidos->reverse() as $pedido)
         
            @if ($pedido->status>=4)
        
                @php
                $subtotal=0;
                @endphp

                    @foreach ($pedido->ordens as $orden)
                        @php
                            
                            $subtotal+=$orden->producto->precio;

                        @endphp    
                    @endforeach

                @php
                        $total+=$subtotal;
                @endphp
            @endif
        @endforeach
    @endforeach


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
                                        <p class="ml-2 tracking-wide">{{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }} </p>
                                        
                                    </div>
                                        @can('perfil_propio', $socio)

                                        
                                            <a href="{{route('socio.edit',$socio)}}" class="ml-2"><h5 class="text-blue-600 font-bold text-sm cursor-pointer ml-4">(Editar)</h5></a>
                                        
                                        @endcan
                                        
                                   
                            </div>

                                <div class="flex">
                                    <div class="content-center items-center">
                                        <div class="image overflow-hidden">
                                            @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                                                <img class="h-auto w-44 mx-auto object-cover"
                                                src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg"
                                                alt="">
                                            @else
                                                <img class="h-auto w-44 mx-auto object-cover"
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
                                        <div class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                    
                                            <h3 class="text-gray-600 text-sm text-semibold text-center">Recuento al {{$now->format('d-m-Y')}}</h3>
                                            <div class="flex justify-center mt-2">
                                                <h1 class="text-center font-bold text-4xl">
                                                    {{number_format($total*0.01+100,0)}}
                                                </h1>
                                                <h1 class="text-sm items-center my-auto ml-2">
                                                    Ptos
                                                </h1>
                                            </div>
                                        
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
                            <div class="my-4"></div>
                            <!-- Friends card -->
                            
                            <!-- End of friends card -->
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-0 sm:mx-2 h-64">
                            <!-- Profile tab -->
                            <!-- About Section -->
                          

                            <!-- End of about section -->

                           

                            <!-- garage and movie -->
                            <div class="bg-white shadow-sm rounded-sm">

                                <x-table-responsive>
                                    {{-- comment 
                                    
                                   <div class="px-6 py-4 flex">
                                       <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre o rut del cliente">
                                       
                                   </div>--}}
                             
                                   @if ($socio->pedidos)
                             
                                       <table class="min-w-full divide-y divide-gray-200 mb-14">
                                           <thead class="bg-gray-50">
                                           <tr>
                                               <th class="px-6 py-3 text-center text-xs font-medium text-gray-500">
                                               Cliente / Subtotal
                                               </th>
                                            
                                            
                                               <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Fecha
                                               </th>
                                               <th class="relative px-6 py-3">
                                               <span class="sr-only">Edit</span>
                                               </th>
                                           </tr>
                                           </thead>
                                           <tbody class="bg-white divide-y divide-gray-200">
                                               
                                               @foreach ($socio->pedidos->reverse() as $pedido)
                                                    @if ($pedido->status>=4)
                                                       <tr>
                                                         @php
                                                         $subtotal=0;
                                                         @endphp
                             
                                                         @if($pedido->pedidoable_type=="App\Models\Socio")
                                                             @foreach ($pedido->ordens as $orden)
                                                             @php
                                                                 
                                                                 $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;
                             
                                                             @endphp    
                                                             @endforeach
                             
                                                             @endif
                                                             @if($pedido->pedidoable_type=="App\Models\Invitado")
                                                             @foreach ($pedido->ordens as $orden)
                                                             @php
                                                                 
                                                                 $subtotal+=$orden->producto->precio;
                             
                                                             @endphp    
                                                             @endforeach
                             
                                                         @endif
                                                        
                             
                                                           <td class="px-6 py-4 content-center">
                                                               <div class="flex items-center">
                                                                  
                                                                   <div class="ml-2 flex-shrink-0 h-10 w-10">
                                                                     <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                         @isset($pedido->image)
                                                                                 <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                                                         @else
                                                                                 <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                                                         @endisset
                                                                     </a>
                                                                   </div>
                                                                   <div class="ml-4 whitespace-nowrap">
                                                                         <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                             <div class="text-sm font-medium text-gray-900">
                                                                                 
                                                                                     @if($pedido->pedidoable_type=='App\Models\Socio')
                                                                                         @foreach ($socios as $item)
                                                                                                 
                                                                                                 @if($item->id == $pedido->pedidoable_id)
                                                                                                     <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                                                         {{$item->user->name}}
                                                                                                     
                                                                                                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                                             Socio
                                                                                                         </span>
                                                                                                    
                                                                                                 @endif
                                                                                         @endforeach
                                                                                     @endif
                                                                                     @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                                                         @foreach ($invitados as $invitado)
                                                                                                 
                                                                                                 @if($invitado->id == $pedido->pedidoable_id)
                                                                                               
                                                                                                     {{$invitado->name}} 
                                                                                                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                                         Invitado
                                                                                                     </span>
                                                                                              
                                                                                                 @endif
                                                                                         @endforeach
                                                                                     @endif
                             
                             
                                                                             </div>
                                                                             
                                                                             <div class="text-sm text-gray-500">
                             
                                                                            
                                                                                   
                                                                                         @if($pedido->pedidoable_type=='App\Models\Socio')
                                                                                             
                                                                                             @foreach ($socios as $item)
                                                                                                 @if(!is_null($item->direccion))
                                                                                                     @if($item->id == $pedido->pedidoable_id)
                                                                                                         {{$item->direccion->comuna.", ".$item->direccion->region}} 
                                                                                                     @endif
                                                                                                 @endif
                                                                                             @endforeach
                                                                                         @endif
                             
                                                                                         @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                                                             @foreach ($invitados as $invitado)
                                                                                                 
                                                                                                     @if($invitado->id == $pedido->pedidoable_id)
                                                                                                     
                                                                                                         @if(!is_null($invitado->direccion))
                                                                                                             {{$invitado->direccion->comuna.", ".$invitado->direccion->region}}
                                                                                                         @else
                                                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                                                 FALTA DIRECCIÓN DE DESPACHO
                                                                                                             </span>
                                                                                                         @endif
                                                                                                     
                                                                                                     @endif
                                                                                                 
                                                                                             @endforeach
                                                                                         @endif
                                                                                     <br>
                                                                                     @switch($pedido->transportista->id)
                                                                                         @case(1)
                                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                                 {{$pedido->transportista->name}}
                                                                                             </span>
                                                                                             @break
                                                                                         @case(2)
                                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                                 {{$pedido->transportista->name}}
                                                                                             </span>
                                                                                             @break
                                                                                             @case(3)
                                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                                                 {{$pedido->transportista->name}}
                                                                                             </span>
                                                                                             @break
                                                                                         
                                                                                         @default
                                                                                             
                                                                                     @endswitch
                                                                             </div>
                                                                         </a>
                                                                   </div>
                                                                     <div class="ml-auto whitespace-nowrap">
                                                                         <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                             <div class="text-sm text-gray-900 ml-auto text-center mb-3">{{number_format($subtotal*0.01)}} Pts</div>
                                                                            
                                                                         </a>
                                                                         @switch($pedido->status)
                                                                         @case(1)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                 Borrador
                                                                             </span>
                                                                             @break
                                                                         @case(2)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                 Pendiente de Pago
                                                                             </span>
                                                                             @break
                                                                         @case(3)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                                 Procesando Pago
                                                                             </span>
                                                                             @break
                                                                         @case(4)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                 Pendiente de diseño
                                                                             </span>
                                                                             @break
                                                                             @case(5)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                                 Pendiente de producción
                                                                             </span>
                                                                             @break
                                                                             @case(6)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                 Pendiente de despacho
                                                                             </span>
                                                                             @break
                                                                             @case(7)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                 Despachado
                                                                             </span>
                                                                             @break
                                                                             @case(8)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                 Procesando Comisión
                                                                             </span>
                                                                             @break
                                                                             @case(9)
                                                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                                 Cerrado
                                                                             </span>
                                                                             @break
                                                                         @default
                                                                             
                                                                         @endswitch
                                                                     </div>
                                                               </div>
                                                         </td>
                             
                                                      
                             
                                                       
                             
                                                           
                             
                                                        
                                                         
                                                         <td class="px-6 py-4 whitespace-nowrap">
                                                             <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                                             <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                                         </td>
                             
                                                           <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                               <a href="{{route('pedido.seguimiento',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                                             
                                                           </td>
                                                       </tr>
                                                    @endif
                                               @endforeach
                                                @foreach ($invitados as $invitado)
                                                    @foreach ($invitado->pedidos->reverse() as $pedido)
                                                        @if ($pedido->status>=4)
                                                            <tr>
                                                                @php
                                                                $subtotal=0;
                                                                @endphp
                                    
                                                                @if($pedido->pedidoable_type=="App\Models\Socio")
                                                                    @foreach ($pedido->ordens as $orden)
                                                                    @php
                                                                        
                                                                        $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;
                                    
                                                                    @endphp    
                                                                    @endforeach
                                    
                                                                    @endif
                                                                    @if($pedido->pedidoable_type=="App\Models\Invitado")
                                                                    @foreach ($pedido->ordens as $orden)
                                                                    @php
                                                                        
                                                                        $subtotal+=$orden->producto->precio;
                                    
                                                                    @endphp    
                                                                    @endforeach
                                    
                                                                @endif
                                                            
                                    
                                                                <td class="px-6 py-4 content-center">
                                                                    <div class="flex items-center">
                                                                        
                                                                        <div class="ml-2 flex-shrink-0 h-10 w-10">
                                                                            <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                                @isset($pedido->image)
                                                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($pedido->image->url)}}" alt="">
                                                                                @else
                                                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                                                                @endisset
                                                                            </a>
                                                                        </div>
                                                                        <div class="ml-4 whitespace-nowrap">
                                                                                <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                                    <div class="text-sm font-medium text-gray-900">
                                                                                        
                                                                                            @if($pedido->pedidoable_type=='App\Models\Socio')
                                                                                                @foreach ($socios as $item)
                                                                                                        
                                                                                                        @if($item->id == $pedido->pedidoable_id)
                                                                                                            <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                                                                {{$item->user->name}}
                                                                                                            
                                                                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                                                    Socio
                                                                                                                </span>
                                                                                                        
                                                                                                        @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                            @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                                                                @foreach ($invitados as $invitado)
                                                                                                        
                                                                                                        @if($invitado->id == $pedido->pedidoable_id)
                                                                                                    
                                                                                                            {{$invitado->name}} 
                                                                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                                                Invitado
                                                                                                            </span>
                                                                                                    
                                                                                                        @endif
                                                                                                @endforeach
                                                                                            @endif
                                    
                                    
                                                                                    </div>
                                                                                    
                                                                                    <div class="text-sm text-gray-500">
                                    
                                                                                
                                                                                        
                                                                                                @if($pedido->pedidoable_type=='App\Models\Socio')
                                                                                                    
                                                                                                    @foreach ($socios as $item)
                                                                                                        @if(!is_null($item->direccion))
                                                                                                            @if($item->id == $pedido->pedidoable_id)
                                                                                                                {{$item->direccion->comuna.", ".$item->direccion->region}} 
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                    
                                                                                                @if($pedido->pedidoable_type=='App\Models\Invitado')
                                                                                                    @foreach ($invitados as $invitado)
                                                                                                        
                                                                                                            @if($invitado->id == $pedido->pedidoable_id)
                                                                                                            
                                                                                                                @if(!is_null($invitado->direccion))
                                                                                                                    {{$invitado->direccion->comuna.", ".$invitado->direccion->region}}
                                                                                                                @else
                                                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                                                        FALTA DIRECCIÓN DE DESPACHO
                                                                                                                    </span>
                                                                                                                @endif
                                                                                                            
                                                                                                            @endif
                                                                                                        
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            <br>
                                                                                            @switch($pedido->transportista->id)
                                                                                                @case(1)
                                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                                        {{$pedido->transportista->name}}
                                                                                                    </span>
                                                                                                    @break
                                                                                                @case(2)
                                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                                        {{$pedido->transportista->name}}
                                                                                                    </span>
                                                                                                    @break
                                                                                                    @case(3)
                                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                                                        {{$pedido->transportista->name}}
                                                                                                    </span>
                                                                                                    @break
                                                                                                
                                                                                                @default
                                                                                                    
                                                                                            @endswitch
                                                                                    </div>
                                                                                </a>
                                                                        </div>
                                                                            <div class="ml-auto whitespace-nowrap">
                                                                                <a href="{{route('pedido.seguimiento',$pedido)}}">
                                                                                    <div class="text-sm text-gray-900 ml-auto text-center mb-3">{{number_format($subtotal*0.01)}} Pts</div>
                                                                                
                                                                                </a>
                                                                                @switch($pedido->status)
                                                                                @case(1)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                        Borrador
                                                                                    </span>
                                                                                    @break
                                                                                @case(2)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                                        Pendiente de Pago
                                                                                    </span>
                                                                                    @break
                                                                                @case(3)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                                        Procesando Pago
                                                                                    </span>
                                                                                    @break
                                                                                @case(4)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                        Pendiente de diseño
                                                                                    </span>
                                                                                    @break
                                                                                    @case(5)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                                        Pendiente de producción
                                                                                    </span>
                                                                                    @break
                                                                                    @case(6)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                                        Pendiente de despacho
                                                                                    </span>
                                                                                    @break
                                                                                    @case(7)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                        Despachado
                                                                                    </span>
                                                                                    @break
                                                                                    @case(8)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                        Procesando Comisión
                                                                                    </span>
                                                                                    @break
                                                                                    @case(9)
                                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                                                        Cerrado
                                                                                    </span>
                                                                                    @break
                                                                                @default
                                                                                    
                                                                                @endswitch
                                                                            </div>
                                                                    </div>
                                                                </td>
                                    
                                                            
                                    
                                                            
                                    
                                    
                                                            
                                                                
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($pedido->created_at))-1]}}</div>
                                                                    <div class="text-sm text-gray-900">{{$pedido->created_at->format('d-m-Y')}}</div>    
                                                                </td>
                                    
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <a href="{{route('pedido.seguimiento',$pedido)}}" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                                                    
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                           <!-- More people... -->
                                        <tr>
                                         
                
                                              <td class="px-6 py-4 content-center">
                                                  <div class="flex items-center">
                                                     
                                                      <div class="ml-2 flex-shrink-0 h-10 w-10">
                                                        
                                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt="">
                                                        
                                                      </div>
                                                      <div class="ml-4 whitespace-nowrap">
                                                          
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    
                                                                       
                                                                                            {{$socio->user->name}}
                                                                                        
                                                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                                                Socio
                                                                                            </span>
                                                                                  
                                                                      
                
                
                                                                </div>
                                                                
                                                                <div class="text-sm text-gray-500">
                
                                                               
                                                                      
                                                                            @if ($socio->direccion)
                                                                                            {{$socio->direccion->comuna.", ".$socio->direccion->region}} 
                                                                            @endif   
                
                                                                         
                                                                        <br>
                                                                        
                                                                </div>
                                                          
                                                      </div>
                                                        <div class="ml-auto whitespace-nowrap">
                                                                <div class="text-sm text-gray-900 ml-auto text-center mb-3">100 Pts</div>
                                                               
                                                          
                                                        
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                    Registro
                                                                </span>
                                                          
                                                        </div>
                                                  </div>
                                            </td>
                
                                         
                
                                              
                
                                           
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">{{$dias[date('N', strtotime($socio->created_at))-1]}}</div>
                                                <div class="text-sm text-gray-900">{{$socio->created_at->format('d-m-Y')}}</div>    
                                            </td>
                
                                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                  <a href="" class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                                                
                                              </td>
                                        </tr>
                                           </tbody>
                                       </table>
                                   @else
                                       <div class="px-6 py-4 text-center flex justify-center my-10">
                                           No hay registro de compra con acumulación de puntos
                                       </div>
                                   @endif 
                                   
                                 </x-table-responsive>
                                <!-- End of Experience and education grid -->
                            </div>

                          
                            
                        </div>
                    </div>
                </div>
            </div>

    </x-fast-view>

</x-app-layout>