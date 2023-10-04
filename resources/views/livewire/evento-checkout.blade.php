<div>



    @php

        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

      
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Inscripción ';
        $item->quantity = 1;
        $item->unit_price = 100000;

        

        $preference = new MercadoPago\Preference();
        //...
        if($ticket){
        $preference->back_urls = array(
            "success" => route('payment.ticketaprov', $ticket),
            "failure" => route('checkout.evento', $evento),
            "pending" => route('checkout.evento', $evento)
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
        }
    @endphp

<style>
    
    scroll-container {
      display: block;
      width: 100%;
      height: 200px;
      overflow-y: scroll;
      scroll-behavior: smooth;
      background: #ffffff;
      padding-left: 0.5rem;
    }
    scroll-page {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      height: 100%;
      font-size: 5em;
    }
        </style>


    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        
            <h1 class="text-gray-500 text-3xl font-bold mx-2 text-center mb-4">Proceso de Inscripción</h1>

            <div class="mx-2 card text-gray-600">
                <div class="card-body">
                    <article class="grid grid-cols-1 md:grid-cols-2 items-center">
                        <div class="flex">
                            <img class="h-28 w-24 object-contain" src="{{Storage::url($evento->image->url)}}" alt="">
                            <div class="ml-2 mt-5">
                                <h1 class="text-lg ml-2">{{$evento->titulo}}</h1>
                                <h2 class="text-md ml-2 mb-3">{{$evento->subtitulo}}</h2>
                            </div>
                        </div>
                        <div class="">
                            @php
                            $min=0;
                            $max=0;
                        @endphp
                        @foreach ($fechas as $fecha)
                            @foreach($fecha->categorias as $categoria)
                                @php
                                    if ($min==0) {
                                        $min=$categoria->inscripcion;
                                        $max=$categoria->inscripcion;
                                    }else{
                                        if ($categoria->inscripcion<$min) {
                                            $min=$categoria->inscripcion;
                                        }elseif($categoria->inscripcion>$max){
                                            $max=$categoria->inscripcion;
                                        }
                                    }
                                
                                @endphp    
                            @endforeach
                        @endforeach
                            <div class="mx-24 grid grid-cols-1 md:grid-cols-1 w-full">
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                
                                    <div class="grid grid-cols-3 gap-2 mx-auto mb-4 w-full  px-24">
                                        @foreach ($fech->categorias as $item)
                                            <div class="bg-gray-100 p-1 rounded-3xl w-full mx-2">
                                                @if ($item->inscripcion==0)
                                                    <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                                @else
                                                    <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($item->inscripcion)}}</p>
                                                @endif
                                                <p class="text-gray-500 text-sm text-center">{{$item->categoria->name}}</p> 
                                            </div>
                                        @endforeach

                                        <div class="hidden bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                            @if ($max==0)
                                                <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                            @else
                                                <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($max)}}</p>
                                            @endif
                                           
                                            <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                        </div>
                                        
                                    </div>
                                    
                                @if ($evento->entrada || $evento->entrada_niño)
                                    <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                
                                    <div class="flex mx-auto mb-4 w-72   px-24">
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full">
                                            @if ($evento->entrada_niño==0)
                                                <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                            @else
                                                <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada_niño)}}</p>
                                            @endif
                                            <p class="text-gray-500 text-sm text-center">Niños</p> 
                                        </div>
                                        <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                            @if ($evento->entrada==0)
                                                <p class="mt-2 text-gray-500 font-bold text-center">Gratis</p>
                                            @else
                                                <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada)}}</p>
                                            @endif
                                            
                                            <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                        </div>
                                        
                                    </div>
                                @endif
                            </div>
                        </div>
                    </article>
                
                    <hr>

                    {{-- comment
                    <p class="text-sm mt-4 hidden">{!!$evento->descripcion!!}</p> --}}
                </div>
            </div>

            

        <div class="mx-2 mt-6 grid grid-cols-1 gap-y-4 xl:mt-12" x-data="condiciones:false">
            <section id="datos">   
                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if (IS_NULL($socio)) text-blue-600 @else text-green-600 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>

                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="px-2 text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">1) Datos del Competidor</h2>
                                
                            </div>

                        
                        </div>

                        <h2 class="hidden text-2xl font-semibold text-gray-500 sm:text-4xl dark:text-gray-300"><span class="text-base font-medium">Editar</span></h2>
            
                    
                    </div>


                        
                        @if (!IS_NULL($socio))
                            <div class="flex justify-between items-center mx-auto my-4 bg-gray-100 rounded-lg pb-6 max-w-2xl">
                                <p class="mx-auto items-center mt-6 text font-bold flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 w-9 h-9 text-blue-600 my-auto mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg> Sus datos estan Registrados</p>
                                <div style="line-height: 1.3rem;" class="mx-auto mt-6 pr-8">
                                    <h1 style="font-size: 1.5rem;" class="text-center font-bold">{{$socio->name}} </h1>
                                    <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center font-bold inline w-full" >{{$socio->rut}} </h1>
                                  
                                </div>
                            </div>

                        @else
                            
                                
                                    <div class="flex items-center pb-6 lg:pt-5 pt-2 px-8">
                                        <div class="w-full">

                                            

                                        

                                            <p class="text-xl leading-normal text-gray-800 dark:text-white">Bienvenido @if (auth()->user()) {{auth()->user()->name}} @endif, a continuacion ingresaras los datos para tu primera inscripción en RidersChilenos, con esta Información ademas de proporcionarte la inscripción para este evento te entregaremos un perfil donde podras llevar todo el historial de tu carrera deportiva</p>
                                        
                                        </div>
                                    </div>

                                    <hr class="mt-2 mb-4">

                                   
                                @if (auth()->user())
                                    
                                
                                    {!! Form::open(['route'=>'socio.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                        
                                        @csrf
                                            
                                        <div class="max-w-full items-center">
                                            @include('socio.partials.form')
                                        </div>
                                        @if (auth()->user())
                                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                                        @endif
                                        

                                        {!! Form::hidden('evento_id', $evento->id ) !!}

                            

                                        @error('user_id')
                                                <strong class="text-xs text-red-600">{{$message}}</strong>
                                        @enderror
                                        
                                        <div class="flex justify-center">
                                            {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                        </div>
                        
                                    {!! Form::close() !!}
                                
                                @else
                                    @if ($invitado)
                                        <div class="flex justify-between items-center mx-auto my-4 bg-gray-100 rounded-lg pb-6 max-w-2xl">
                                            <p class="mx-auto items-center mt-6 text font-bold flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 w-9 h-9 text-blue-600 my-auto mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg> Sus datos estan Registrados</p>
                                            <div style="line-height: 1.3rem;" class="mx-auto mt-6 pr-8">
                                                <h1 style="font-size: 1.5rem;" class="text-center font-bold">{{$invitado->name}}</h1>
                                                <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center font-bold inline w-full" >{{$invitado->rut}} </h1>
                                            
                                            </div>
                                        </div>
                                    @else
                                        <div>
                                            {!! Form::open(['route' => 'ticket.invitado.store', 'method'=> 'POST']) !!}
                                            @csrf
                                            {{-- comment 
                                                        {!! Form::hidden('user_id',auth()->user()->id) !!}
                                            --}}
                                            {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}
                                
                                            {!! Form::hidden('evento_id',$evento->id) !!}

                                            {!! Form::hidden('name',$search) !!}
                                
                                            <div class="mb-4">
                                                {!! Form::label('nombre', 'Nombre') !!}
                                                <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm"
                                                type="search" name="search" style="z-index: 10;">
                                
                                                @if ($search)
                                                    <ul class="relative z-1 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden px-4">
                                                        @forelse ($this->invitados as $invitado)
                                                            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                                                <a href="{{route('checkout.evento.invitado', ['evento' => $evento, 'invitado' => $invitado])}}">{{$invitado->name}}-{{$invitado->rut}}-{{$invitado->email}}</a>
                                                            </li>
                                                            @empty
                                                           
                                                                
                                                        
                                                        @endforelse
                                                    
                                                        
                                                    </ul>
                                        
                                                
                                            @else
                                                
                                            @endif
                                                                
                                             
                                                @error('name')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-4">
                                                {!! Form::label('rut', 'Rut') !!}
                                                {!! Form::text('rut', null , ['class' => 'w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm'.($errors->has('rut')?' border-red-600':'')]) !!}
                                            
                                                @error('rut')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-4">
                                                {!! Form::label('fono', 'Fono') !!}
                                                {!! Form::text('fono', null , ['class' => 'w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm'.($errors->has('fono')?' border-red-600':'')]) !!}
                                            
                                                @error('fono')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-4">
                                                {!! Form::label('email', 'Email') !!}
                                                {!! Form::text('email', null , ['class' => 'w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm'.($errors->has('email')?' border-red-600':'')]) !!}
                                            
                                                @error('email')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                                    
                                                    <div class="flex justify-end">
                                                    
                                                        {!! Form::submit('Siguiente', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                                                    </div>
                                                {!! Form::close() !!}
                                        </div>
                                    @endif
                                @endif
                        @endif

                            
                </div>
            </section>
            
                          
                            
                            

           
                 

              
                 
              

            

                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 @if (IS_NULL($ticket)) text-blue-600 @else text-green-600 @endif sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
    
                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">2) Terminos y Condiciones</h2>
                            
                            </div>

                            
                        </div>
                        @if (!IS_NULL($ticket))
                                <div class="flex flex-col items-center mx-5 my-auto">
                                    <h2 class="text-xs font-medium text-gray-700 sm:text-xs dark:text-gray-200">Ha aceptado los terminos {{$evento->created_at->format('d-m-Y')}}</h2>
                                
                                </div>

                        @endif
                        
                     
                    </div>
                    @if (auth()->user())
                        @if (auth()->user()->socio )
                            @if (IS_NULL($ticket))
                                    <p class="text-sm mt-4">A continuacion encontrara los terminos y condiciones que la organizacion a estipulado para el evento:</a></p>
                                

                                        <div class="max-w-4xl mt-2 py-2 px-3  bg-gray-100">

                                            <scroll-container>
                                                <p class="text-sm my-2 mx-2 px-2">{!!$evento->terminos!!}</p>
                                            </scroll-container>
                            
                                        
                                        </div>

                                        <hr>
                                    {!! Form::open(['route' => 'organizador.tickets.store', 'method'=> 'POST']) !!}
                                        @csrf

                                        <p class="text-sm mt-4 text-center">  <input type="checkbox" name="seleccionable" value="TRUE"> Acepto los terminos y condiciones</p>
                                    
                                        @error('seleccionable')
                                            <p class="text-xs text-red-600 text-center font-bold">{{$message}}</p>
                                        @enderror
                                        @if (auth()->user())
                                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                                        @endif

                                        {!! Form::hidden('evento_id',$evento->id) !!}

                                        {!! Form::hidden('pedidoable_type','App\Models\Socio') !!}
                                        
                                        @if (!IS_NULL($socio))
                                            {!! Form::hidden('pedidoable_id',$socio->id) !!}
                                        @endif
                            
                                        @if (!IS_NULL($socio))
                                            <div class="flex justify-center my-4">
                                            
                                                {!! Form::submit('Siguiente', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                        @endif

                                {!! Form::close() !!}
                            @endif
                        @endif
                    @endif
                    @if ($invitado)
                            @if (IS_NULL($ticket))
                                    <p class="text-sm mt-4">A continuacion encontrara los terminos y condiciones que la organizacion a estipulado para el evento:</a></p>
                                

                                        <div class="max-w-4xl mt-2 py-2 px-3  bg-gray-100">

                                            <scroll-container>
                                                <p class="text-sm my-2 mx-2 px-2">{!!$evento->terminos!!}</p>
                                            </scroll-container>
                            
                                        
                                        </div>

                                        <hr>
                                    {!! Form::open(['route' => 'organizador.tickets.store', 'method'=> 'POST']) !!}
                                        @csrf

                                        <p class="text-sm mt-4 text-center">  <input type="checkbox" name="seleccionable" value="TRUE"> Acepto los terminos y condiciones</p>
                                    
                                        @error('seleccionable')
                                            <p class="text-xs text-red-600 text-center font-bold">{{$message}}</p>
                                        @enderror
                                        @if (auth()->user())
                                            {!! Form::hidden('user_id',auth()->user()->id) !!}
                                        @endif

                                        {!! Form::hidden('evento_id',$evento->id) !!}
                                        
                                        @if ($invitado)

                                           {!! Form::hidden('ticketable_type','App\Models\Invitado') !!}
                                           {!! Form::hidden('ticketable_id',$invitado->id) !!}

                                        @else
                                            {!! Form::hidden('ticketable_type','App\Models\Socio') !!}
                                            {!! Form::hidden('ticketable_id',$socio->id) !!}
                                        @endif
                                        
                                     
                                        @if (!IS_NULL($socio) || $invitado)
                                            <div class="flex justify-center my-4">
                                            
                                                {!! Form::submit('Siguiente', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                        @endif

                                {!! Form::close() !!}
                            @endif
                        
                    @endif
                    
                </div>
             <section id="pago">   
                <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                    <div class="flex justify-between">
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>

                            <div class="flex flex-col items-center mx-5 space-y-1">
                                <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">
                                    @if ($evento->type=='pista')
                                        3) Entradas por Entrenamiento
                                    @else
                                        3) Inscripciones por Fecha
                                    @endif
                                    
                                
                                </h2>
                            
                            </div>
                            
                        </div>

                    
                    
                    </div>
                    @if (!IS_NULL($ticket))
                        @php
                            $n=0;
                        @endphp
                    @foreach ($evento->fechas as $fecha)
                        
                        @if ($fecha->fecha>=now()->subDays(1))
                            @php
                                $n+=1;
                            @endphp
                        @endif
                    @endforeach
                        @if ($n==0)
                            <div class="text-center">
                                <div class="flex items-center justify-center pb-5 bg-red-600 p-2 text-white py-2">
                                    @php
                                        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                    @endphp
                                    @if ($fecha->name=='keyname')
                                        <label class="mx-auto text-center font-bold"> No hay Entranamientos Anunciados
                                        </label>
                                    @else
                                        <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                                    @endif
                                        
                                </div>
                            </div>
                        @else
                            <div class="max-w-4xl px-10 py-2">
                            <div class="flex">
                                @if ($evento->type=='pista')
                                    <p class="text-base leading-none my-auto mx-auto">En qué Cilindrada vas entrenar?</p>
                                @else
                                    <p class="text-base leading-none my-auto mx-auto">En que categoria deseas competir?</p>
                                @endif
                                            
                                <select wire:model="selectedcategoria" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    
                                    @if ($evento->type=='pista')
                                        <option value="">--Cilindrada--</option>
                                    @else
                                        <option value="">--Categoria--</option>
                                    @endif
                                    
                                    
                                    @foreach ($fecha->categorias as $item)

                                        <option value="{{$item->id}}">{{$item->categoria->name}}-${{number_format($item->inscripcion)}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>

                                @foreach ($evento->fechas as $fecha)
                                    <div class="flex items-center justify-between pb-5 px-8 bg-blue-900 text-white py-2 my-4">
                                        <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                                                        
                                
                                        
                                        
                                        @if ($categoria_id)  
                                            <div class="block">
                                                <p class="text-base leading-none mx-auto text-center">Categoria:  </p>
                                                <h1 style="font-size: 1rem;white-space: nowrap;" class="text-center">{{$fechacategoria->categoria->name}}</h1>
                                            </div>
                                        
                                            <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                                                <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                            </div>
                                            <div class="block">
                                                <p class="ml-4">Número de Moto: </p>
                                            
                                                <input wire:model="nro" type="number" class="w-24 border-2 border-gray-300 bg-white h-10 px-5 text-gray-900 ml-4 rounded-lg">
                                                <div class="text-white  text-md font-bold px-4" wire:loading wire:target="nro">
                                                    <img class="h-5" src="{{asset('img/cargando.gif')}}" alt="">
                                                </div>

                                            </div>

                                            <form action="{{route('ticket.inscripcions.store')}}" method="POST">
                                                @csrf
                                                

                                                <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                                                <input name="fecha_categoria_id" type="hidden" value="{{$categoria_id}}">
                                                <input name="nro" type="hidden" value="{{$nro}}">
                                                <input name="fecha_id" type="hidden" value="{{$fecha->id}}">

                                                <button class="btn btn-primary" type="submit">Agregar</button>
                                            </form>   

                                            <p wire:click="add({{$fecha}})" class="hidden btn btn-primary">Agregar</p>



                                        @else
                                            <div class="text-white  text-md font-bold px-4" wire:loading wire:target="selectedcategoria">
                                                <img class="h-14" src="{{asset('img/cargando.gif')}}" alt="">
                                            </div>
                                            @if ($evento->type=='pista')
                                                <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una cilindrada</p>
                                            @else
                                                <p class="bg-white text-gray-900 py-2 px-4 rounded-lg">Ingrese una categoria</p>
                                            @endif
                                        
                                        @endif        
                                    </div>
                                @endforeach

                                    {{-- PREFICHA --}}

                                    <x-table-responsive>

                

                                
                                            <table class="min-w-full divide-y divide-gray-200 mb-20 pb-20">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Fecha
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Categoria
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Número
                                                </th>
                                                
                                                    <th  class="text-center mr-4 text-xs font-medium text-gray-500 uppercase tracking-wider justify-end ml-auto">
                                                        Precio
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    
                                                

                                                                    @foreach($ticket->inscripcions as $inscripcion)
                                                                    
                                                                            <tr>
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                                    @if ($inscripcion->fecha->name=='keyname')
                                                                                        <label class="mx-4"> Entrenamiento {{$inscripcion->fecha->fecha}}</label>
                                                                                    @else
                                                                                        <label class="mx-4"> {{$inscripcion->fecha->name}}</label>
                                                                                    @endif
                                                                                    

                                                                                </td>
                                                                            
                                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                                
                                                                                        {{$inscripcion->fecha_categoria->categoria->name}}
                                                                                    
                                                                                    </td>
                                                                        
                                                                            
                                                
                                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                                        <div class="items-center">
                                                                                            <p class="mx-4 text-center">{{$inscripcion->nro}}</p>
                                                                                        </div>
                                                                                    </td>
                                                                                
                                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                                        <div class="items-center">
                                                                                            
                                    
                                                                                                <form action="{{route('ticket.inscripcions.destroy',$inscripcion)}}" method="POST">
                                                                                                    @csrf
                                                                                                    @method('delete')
                                                                                                    <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                                                                                                    <p class="mx-4 text-center" > ${{number_format($inscripcion->fecha_categoria->inscripcion)}} 
                                                                                                    <button class="" ><i class="fas fa-trash cursor-pointer text-red-500 ml-6" type="submit" alt="Eliminar"></i> </button>
                                                                                                    
                                                                                                </form>
                                                                                                </p>
                                                                                        </div>
                                                                                    </td>
                                                                                
                                            
                                
                                                                            </tr>
                                                                    @endforeach
                                                            
                                                </tbody>
                                            </table>
                                
                                    </x-table-responsive>

                            </div>
                        @endif
                    
                    @endif

                
                    
                </div>
            </section>
           

            

            <div class="w-full bg-white items-center px-8 py-4 mx-auto border border-blue-500 cursor-pointer rounded-xl">
                <div class="flex justify-between">
                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>

                        <div class="flex flex-col items-center mx-5 space-y-1">
                            <h2 class="text-lg font-medium text-gray-700 sm:text-2xl dark:text-gray-200">4) Pago</h2>
                        
                        </div>
                    </div>
                    
                 
                </div>
                @if ($ticket>0)
                    <section>
                        <div class="max-w-4xl px-10 mt-6 py-2 bg-gray-100">
                            <div class="flex items-center justify-between px-8">
                            <p class="text-base leading-none text-gray-800 dark:text-white">Inscripción</p>
                            <p class="text-base leading-none text-gray-800 dark:text-white">${{number_format($alfa)}}</p>
                            </div>
                        

                            <div class="flex items-center justify-between pt-5 px-8">
                            <p class="text-base leading-none text-gray-800 dark:text-white">Costos del Servicio</p>
                            <p class="text-base leading-none text-gray-800 dark:text-white">${{number_format($valor-$alfa)}}</p>
                            </div>
                        
                        </div>
                            <div>
                                <div class="flex items-center pb-6 justify-between lg:pt-5 pt-2 px-8">
                                <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                                <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">${{number_format($valor)}}</p>
                                </div>
                            </div>

                            <div class="cho-container flex justify-center mt-2 mb-4">
                                <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                            </div>

                            <div>
                                @if ($ticket)
                                    <form action="{{route('ticket.enrolled',$ticket)}}" method="POST">
                                        @csrf
                                    
                                        <button class="btn btn-primary" >Agregar </button>
                                        
                                    </form>
                                @endif
                            </div>
                    
                        


                                <hr>

                            <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
                    </section>
                
                    
                @endif
            </div>
           

            <div class="flex justify-center mb-2">
                <a href="{{route('home')}}">
                        <button class="bg-gray-800 px-8 py-2 tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Volver Atras
                        </button>
                </a>
                
            </div>

            
            <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>
        
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
</div>
