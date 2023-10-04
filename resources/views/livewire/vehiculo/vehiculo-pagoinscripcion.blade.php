<div>
    @php
    // SDK de Mercado Pago
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

  
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    if($vehiculo->insc==2){
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Inscripción:';
    $item->quantity = 1;
    $item->unit_price = 50;
    }
    else{
        // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Inscripción:';
    $item->quantity = 1;
    $item->unit_price = 100;

    }
    

    $preference = new MercadoPago\Preference();
    //...
    
    $preference->back_urls = array(
        "success" => route('payment.vehiculo.inscribir', $vehiculo),
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
        );
    
    
   
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save(); 
    @endphp

    

    
@if(is_null($vehiculo->insc))

            <h4 class="text-xl text-gray-800 text-center mt-6">¿Tienes un KitQR fisicamente?</h1>
            
                <article class="flex justify-center">
                    
                        
                    <div class="pb-4 order-2 lg:order-2 max-w-sm" wire:click="suscripcion('qr')">
                    <div class="bg-white mt-8 rounded-xl space-y-6 overflow-hidden transition-all duration-500 transform hover:-translate-y-6 hover:scale-105 shadow-xl hover:shadow-2xl cursor-pointer">
                       
                        <p class="px-4 text-center text-sm pt-4">Para activar tu KitQR debes indicar el NRO y PASS que viene al interior del kit para activarlo.</p>
                       
                        <div class="text-center bg-blue-900 ">
                            <button class="inline-block my-4 font-bold text-white">Activalo Aquí</button>
                        </div>
                    </div>
                    </div>
                  
            </article>

            <h4 class="text-xl text-gray-800 text-center mt-6">Si no tienes un KIT QR puedes comprarlo de forma online y sera despachado segun lo solicites.</h1>

            <article class="flex items-center">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <div class="py-12 order-3 lg:order-1" wire:click="suscripcion('gratis')">
                    <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden  transition-all duration-500 transform hover:-translate-y-6 hover:scale-105 shadow-xl hover:shadow-2xl cursor-pointer">
                        <div class="px-8 flex justify-between items-center">
                        <h4 class="text-xl font-bold text-gray-800">Gratis</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        </div>
                        <h1 class="text-4xl text-center font-bold">GRATIS</h1>
                        <p class="px-4 text-center text-sm ">La Moto o Bicicleta es publicada de manera Gratuita</p>
                        <ul class="text-center">
                            <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                    
                        </ul>
                        <div class="text-center bg-gray-200 ">
                            <button class="inline-block my-6 font-bold text-gray-800">Seleccionar</button>
                        </div>
                    </div>
                    </div>
                    
                    <div class="py-12 order-2 lg:order-2" wire:click="suscripcion('5000')">
                    <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden transition-all duration-500 transform hover:-translate-y-6 hover:scale-105 shadow-xl hover:shadow-2xl cursor-pointer">
                        <div class="px-8 flex justify-between items-center">
                        <h4 class="text-xl font-bold text-gray-800">QR Silver</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h1 class="text-4xl text-center font-bold">$5.000</h1>
                        <p class="px-4 text-center text-sm ">Al pagar tu QR SILVER recibiras 4 sticker que te permitiran leer el respectivo codigo qr y este sera enlazado a la ficha online de tu vehiculo.</p>
                        <ul class="text-center">
                            <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                            <li><a href="#" class="font-semibold">Lectura por Codigo QR</a></li>
                            
                        </ul>
                        <div class="text-center bg-gray-200 ">
                            <button class="inline-block my-6 font-bold text-gray-800">Seleccionar</button>
                        </div>
                    </div>
                    </div>
                    <div class="py-12 order-1 lg:order-3" wire:click="suscripcion('10000')">
                        <div class="bg-white  pt-4 rounded-xl space-y-6 overflow-hidden transition-all duration-500 transform hover:-translate-y-6 -translate-y-2 scale-105 shadow-xl hover:shadow-2xl cursor-pointer">
                        <div class="px-8 flex justify-between items-center">
                            <h4 class="text-xl font-bold text-gray-800">QR Gold</h1>
                        </div>
                            <h1 class="text-4xl text-center font-bold">$10.000</h1>
                            <p class="px-4 text-center text-sm ">Al pagar tu QR GOLD recibiras 4 sticker que te permitiran leer el respectivo codigo qr, ademas de incorporar la tecnologia NFC para su lectura</p>
                            <ul class="text-center">
                                <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                                <li><a href="#" class="font-semibold">Lectura por Codigo QR</a></li>
                                <li><a href="#" class="font-semibold">Lectura NFC</a></li>
                            </ul>
                            
                            <div class="text-center bg-red-600 ">
                                <button class="inline-block my-6 font-bold text-white">Seleccionar</button>
                            </div>
                        </div>
                    </div>
                </div>   
            </article>



@else               
                    
            @if ($vehiculo->status==2)
                
            
                
                
                    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
                        <div class="flex justify-center mt-6">
                            
                            <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                        </div>
                            
                    <div class="card"><div class="card-body">
                        <article class="flex items-center">
                            @switch($vehiculo->insc)
                                @case(1)
                                    <h1 class="text-lg ml-2 font-bold">Tipo de inscripción:</h1>
                                    <h1 class="text-lg ml-2">GRATIS</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('insc', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                        
                                    {!! Form::close() !!}

                       
                                    <p class="text-xl font-bold ml-auto">GRATIS</p>
                                    @break
                                @case(2)
                                    <h1 class="text-lg ml-2 font-bold">Tipo de inscripción:</h1>
                                    <h1 class="text-lg ml-2">QR SILVER</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('insc', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                        
                                    {!! Form::close() !!}

                       
                                    <p class="text-xl font-bold ml-auto">$5.000</p>
                                    @break
                                @case(3)
                                    <h1 class="text-lg ml-2">Tipo de inscripción: QR GOLD</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('insc', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs text-blue-600 cursor-pointer mx-2']) !!}
                                        
                                    {!! Form::close() !!}
                                    <p class="text-xl font-bold ml-auto">$10.000</p>
                                    @break

                                @case(4)
                                    <h1 class="text-lg ml-2 text-center">Tipo de inscripción: Activación KitQR</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('insc', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs mx-2 text-blue-600 cursor-pointer']) !!}
                                        
                                    {!! Form::close() !!}
                                    
                                    @break
                                
                                @default
                                    
                            @endswitch
                                
                                
                            
                        </article>
                        
                        
                        
                    </div></div></div>
            
                    @switch($vehiculo->insc)
                                @case(1)
                                    <div class="flex justify-center mt-2 mb-4">

                                        <form action="{{route('garage.inscribir',$vehiculo)}}" method="POST">
                                            @csrf
                    
                                            <button class="btn btn-primary" type="submit">Publicar</button>
                                        </form>   

                                    </div>
                                @break
                                @case(2)
                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                    </div>
                                    @break
                                
                                @case(3)
                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                    </div>
                                    @break
                                @case(4)
                                    @if (session('info'))
                                    <div class="flex justify-center text-red-700 mb-4 font-bold">
                                        {{session('info')}}
                                    </div>
                                    @endif
                                    <div class="bg-blue-900 rounded-lg max-w-sm mx-auto ">
                                        <h1 class="text-center font-bold text-2xl text-white pt-6">Activar QR:</h1>
                                        <div class="flex justify-center mt-2 mb-4 ">
                                            
                                        <form action="{{route('garage.activarqr',$vehiculo)}}" method="POST">
                                            @csrf
                                            
                                            <div class="mb-4">
                                                
                                                <h1 class="text-center font-bold text-white mt-6">NRO:</h1>
                                                {!! Form::number('nro', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro')?' border-red-600':'')]) !!}
                        
                                                @error('nro')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <h1 class="text-center font-bold text-white ">PASS:</h1>
                                                {!! Form::password('pass', null , ['class' => 'form-input block w-full mt-1'.($errors->has('pass')?' border-red-600':'')]) !!}
                        
                                                @error('pass')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="flex justify-center">
                                                <button class="btn btn-primary my-4" type="submit">Activar</button>
                                            </div>
                                        </form>   

                                    </div>

                                @break
                                @default
                                
                    @endswitch
               
            @else
                @if ($vehiculo->status==5)
                    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
                        <div class="flex justify-center mt-6">
                            
                            <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                        </div>
                            
                    <div class="card"><div class="card-body">
                        <article class="flex items-center">
                            @switch($vehiculo->insc)
                                @case(1)
                                    <h1 class="text-lg ml-2 font-bold">Tipo de inscripción:</h1>
                                    <h1 class="text-lg ml-2">GRATIS</h1>
                                    
                    
                                    <p class="text-xl font-bold ml-auto">GRATIS</p>
                                    @break
                                @case(2)
                                    <h1 class="text-lg ml-2">Tipo de inscripción: QR SILVER</h1>
                                    
                    
                                    <p class="text-xl font-bold ml-auto">$5.000</p>
                                    @break
                                
                                @case(3)
                                    <h1 class="text-lg ml-2">Tipo de inscripción: QR GOLD</h1>
                                    
                    
                                    <p class="text-xl font-bold ml-auto">$10.000</p>
                                    @break
                                
                                @default
                                    
                            @endswitch
                                
                                
                            
                        </article>

                        @switch($vehiculo->insc)
                                @case(1)
                                {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                {!! Form::hidden('insc', null) !!}
                                {!! Form::hidden('status', 2) !!}
                                   
                                    
                                        {!! Form::submit('Haz click aqui para desactivar y luego cambiar de suscripción', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer']) !!}
                                    
                                {!! Form::close() !!}
                        
                                 
                                    
                    
                                    @break
                                @case(2)
                                    <hr class="w-full mb-4">
                                    <div class="flex">
                                        <div>
                                            @if ($qr)
                                                <img class="object-cover object-center ml-6 mr-8 mt-2" width="60px" src="{{Storage::url($qr->qr)}}" alt="">
                                            @endif
                                            
                                        </div>
                                        <div class="ml-2">
                                    
                                        @if ($qr)                                        
                                            <h1 class="text-lg ml-2 font-bold">QR Nro: @if ($qr)
                                                {{$qr->nro}}
                                                @endif</h1>
                                            <h1 class="text-lg ml-2 ">Fecha de Vencimiento: @if ($qr)
                                                @if ($qr->active_date)
                                                    {{$qr->active_date}}
                                                @endif
                                                
                                            @endif</h1>
                                        @else
                                        {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                            {!! Form::hidden('insc', null) !!}
                                            {!! Form::hidden('status', 2) !!}
                                            
                                                
                                            {!! Form::submit('SOLICITAR KIT QR', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer']) !!}
                                                
                                        {!! Form::close() !!}
                                        @endif
                                        </div>
                                    </div>
                    
                                  
                                    @break
                                
                                @case(3)
                                <hr class="w-full mb-4">
                                <div class="flex">
                                    <div>
                                        @if ($qr)
                                            <img class="object-cover object-center ml-6 mr-8 mt-2" width="60px" src="{{Storage::url($qr->qr)}}" alt="">
                                        @endif
                                    </div>
                                    <div class="ml-2">
                                
                                    @if ($qr)                                        
                                        <h1 class="text-lg ml-2 font-bold">QR Nro: @if ($qr)
                                            {{$qr->nro}}
                                            @endif</h1>
                                        <h1 class="text-lg ml-2 ">Fecha de Vencimiento: @if ($qr)
                                            @if ($qr->active_date)
                                                {{$qr->active_date}}
                                            @endif
                                            
                                        @endif</h1>
                                    @else
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                            {!! Form::hidden('insc', null) !!}
                                            {!! Form::hidden('status', 2) !!}
                                            
                                                
                                            {!! Form::submit('SOLICITAR KIT QR', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer']) !!}
                                                
                                        {!! Form::close() !!}
                                    
                                    @endif
                                    </div>
                                </div>
                
                              
                                @break
                                
                                @default
                                    
                            @endswitch

                        
                        
                        
                    </div></div></div>
                    
                    


                @else
                <div class="flex justify-center mt-2 mb-4">

                    <button  class="btn btn-primary cursor-pointer">Bajar publicación</button>
                       
                </div>
                @endif
               
            @endif


@endif
                    

                

    

    <script src="https://sdk.mercadopago.com/js/v2"></script>
        @if ($vehiculo->insc==2)
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
                            label: 'Pagar e Inscribir', // Cambia el texto del botón de pago (opcional)
                    }
                });
            </script>
        @else
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
                            label: 'Pagar e Inscribir', // Cambia el texto del botón de pago (opcional)
                    }
                });
            </script>
        @endif
       
</div>
