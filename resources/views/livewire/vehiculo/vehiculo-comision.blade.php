<div>
    @php
    // SDK de Mercado Pago
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

  
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    if($vehiculo->comision==1){
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Comision:';
        $item->quantity = 1;
        $item->unit_price = 5000;
    }
    elseif($vehiculo->comision==2){
            // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Comision:';
        $item->quantity = 1;
        $item->unit_price = $vehiculo->precio*0.005;

    }

    

    $preference = new MercadoPago\Preference();
    //...
    if($vehiculo->comision==1){
        $preference->back_urls = array(
        "success" => route('payment.vehiculo', $vehiculo),
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
        );
    }
    elseif($vehiculo->comision==2){
        $preference->back_urls = array(
        "success" => route('payment.vehiculodown', $vehiculo),
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    }
   
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save(); 
    @endphp

    

    
@if(is_null($vehiculo->precio))

            <p class="text-center">Para finalizar la publicacion de su vehiculo debe asignar un valor de venta y la modalidad de comision que desea pagar.</p>
                
            <div class="flex justify-center mt-4">



                <div class="flex items-center mt-4">
                    <Label class="w-80">Tipo de Comisión:</Label>
                    <select wire:model="selectedcomision" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">-Seleccione un tipo de Comision-</option>
                        <option value="1">$5.000 al momento de publicar</option>
                        <option value="2">0.5% al momento de vender</option>
                        
                    </select>
                </div>

            </div>
    
            @if(!is_null($selectedcomision))
            
                {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                    {!! Form::hidden('comision',$selectedcomision) !!}
                    <div class="flex justify-center mt-4">

                        <div class="flex items-center mt-4">
                            {!! Form::label('precio', 'Precio') !!}
                            {!! Form::number('precio', null , ['class' => 'ml-8 form-input w-full block mt-1'.($errors->has('precio')?' border-red-600':'')]) !!}

                            @error('precio')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror

                        </div>
                
                    </div>
                    <div class="flex justify-center mt-6">
                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    </div>
                {!! Form::close() !!}

            @endif       

@else               
                    
            @if ($vehiculo->status==1)
                
            
                
                
                    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
                        <div class="flex justify-center mt-6">
                            
                            <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                        </div>
                            
                    <div class="card"><div class="card-body">
                        <article class="flex items-center">
                            @switch($vehiculo->comision)
                                @case(1)
                                    <h1 class="text-lg ml-2 font-bold">Tipo de comision:</h1>
                                    <h1 class="text-lg ml-2">Pago al momento de publicar</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('precio', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer']) !!}
                                        
                                    {!! Form::close() !!}

                       
                                    <p class="text-xl font-bold ml-auto">$5.000</p>
                                    @break
                                @case(2)
                                    <h1 class="text-lg ml-2">Tipo de comision: 0.5% al momento de vender</h1>
                                    
                                    {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                    {!! Form::hidden('precio', null) !!}
                                       
                                        
                                            {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer']) !!}
                                        
                                    {!! Form::close() !!}
                                    <p class="text-xl font-bold ml-auto">${{number_format($vehiculo->precio*0.005, 0, '.', '.')}}</p>
                                    @break
                                
                                @default
                                    
                            @endswitch
                                
                                
                            
                        </article>
                        
                        
                        
                    </div></div></div>
            
                    @switch($vehiculo->comision)
                                @case(1)
                                    <div class="cho-container flex justify-center mt-2 mb-4">
                                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                    </div>
                                    @break
                                @case(2)
                                    <div class="flex justify-center mt-2 mb-4">

                                        <form action="{{route('garage.publicar',$vehiculo)}}" method="POST">
                                            @csrf
                    
                                            <button class="btn btn-primary" type="submit">Publicar</button>
                                        </form>   

                                    </div>
                                @break
                                @default
                                
                    @endswitch
               
            @else
                @if ($vehiculo->status==4)
                    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
                        <div class="flex justify-center mt-6">
                            
                            <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                        </div>
                            
                    <div class="card"><div class="card-body">
                        <article class="flex items-center">
                            @switch($vehiculo->comision)
                                @case(1)
                                    <h1 class="text-lg ml-2 font-bold">Tipo de comision:</h1>
                                    <h1 class="text-lg ml-2">Pago al momento de publicar</h1>
                                    
                    
                                    <p class="text-xl font-bold ml-auto">$5.000</p>
                                    @break
                                @case(2)
                                    <h1 class="text-lg ml-2">Tipo de comision: 0.5% al momento de vender</h1>
                                    
                    
                                    <p class="text-xl font-bold ml-auto">${{number_format($vehiculo->precio*0.005, 0, '.', '.')}}</p>
                                    @break
                                
                                @default
                                    
                            @endswitch
                                
                                
                            
                        </article>
                        
                        
                        
                    </div></div></div>
                    
                    <div class="cho-container flex justify-center mt-2 mb-4">
                        <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                    </div>


                @else
                <div class="flex justify-center mt-2 mb-4">

                    <button wire:click="vehiculodown({{$vehiculo}})" class="btn btn-primary cursor-pointer">Bajar publicación</button>
                       
                </div>
                @endif
               
            @endif


@endif
                    

                

    

    <script src="https://sdk.mercadopago.com/js/v2"></script>
        @if ($vehiculo->comision==1)
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
                            label: 'Pagar y Publicar', // Cambia el texto del botón de pago (opcional)
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
                            label: 'Pagar y Cerrar Publicación', // Cambia el texto del botón de pago (opcional)
                    }
                });
            </script>
        @endif
       
</div>
