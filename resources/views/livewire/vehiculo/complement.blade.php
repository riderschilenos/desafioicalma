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
    $item->unit_price = 5000;
    }
    else{
        // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Inscripción:';
    $item->quantity = 1;
    $item->unit_price = 10000;

    }

    $preference = new MercadoPago\Preference();
    //...
    
    $preference->back_urls = array(
        "success" => "",
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();

    @endphp

    @if ($vehiculo->status==2)
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="flex justify-center">
                
                <img class="h-24 w-30 object-cover" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
            </div>
                
            @if (is_null($vehiculo->insc))

                <article class="flex items-center">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 pt-10">
                        
                        <div class="py-12 order-3 lg:order-1" wire:click="suscripcion('gratis')">
                          <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden  transition-all duration-500 transform hover:-translate-y-6 hover:scale-105 shadow-xl hover:shadow-2xl cursor-pointer">
                            <div class="px-8 flex justify-between items-center">
                              <h4 class="text-xl font-bold text-gray-800">Gratis</h1>
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              </div>
                              <h1 class="text-4xl text-center font-bold">GRATIS</h1>
                              <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
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
                              <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
                              <ul class="text-center">
                                <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                                <li><a href="#" class="font-semibold">QR Respaldo Identidad</a></li>
                                
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
                                <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
                                <ul class="text-center">
                                    <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                                    <li><a href="#" class="font-semibold">QR Respaldo Identidad</a></li>
                                    <li><a href="#" class="font-semibold">Ficha Online</a></li>
                                </ul>
                                
                                <div class="text-center bg-red-600 ">
                                    <button class="inline-block my-6 font-bold text-white">Seleccionar</button>
                                </div>
                            </div>
                          </div>
                    </div>   
                </article>
            
        @else
            @if ($vehiculo->insc=='1')

            <div class="flex justify-center">
                <div class="max-w-sm mx-auto">
                    <div class="py-12">
                        <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden   shadow-xl ">
                        <div class="px-8 flex justify-between items-center">
                            <h4 class="text-xl font-bold text-gray-800">Gratis</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </div>
                            <h1 class="text-4xl text-center font-bold">GRATIS</h1>
                            <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
                            <ul class="text-center pb-8">
                            <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                            {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                            {!! Form::hidden('insc', null) !!}
                            
                                
                                    {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer bg-white']) !!}
                                
                            {!! Form::close() !!}
                            </ul>
                            
                        </div>
                    </div>

                    <div class="flex justify-center mt-2 mb-4">

                        <form action="{{route('garage.inscribir',$vehiculo)}}" method="POST">
                            @csrf

                            <button class="btn btn-primary" type="submit">Inscribir</button>
                        </form>   

                    </div>

                </div>
            </div>
            

            @elseif($vehiculo->insc=='2')

                <div class="flex justify-center">
                    <div class="max-w-sm mx-auto">
                        <div class="py-12">
                            <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden   shadow-xl ">
                            <div class="px-8 flex justify-between items-center">
                                <h4 class="text-xl font-bold text-gray-800">QR Silver</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                </div>
                                <h1 class="text-4xl text-center font-bold">$5.000</h1>
                                <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
                                <ul class="text-center">
                                <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                                <li><a href="#" class="font-semibold">QR Respaldo Identidad</a></li>

                                {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                {!! Form::hidden('insc', null) !!}
                                
                                    
                                        {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer pb-6 bg-white']) !!}
                                    
                                {!! Form::close() !!}

                            

                                </ul>
                                
                            </div>
                        </div>

                        
                        
                        
                    </div>
                </div>
                
                <div class="cho-container flex justify-center mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>
                
            
            @elseif ($vehiculo->insc=='3')

                <div class="flex justify-center">
                    <div class="max-w-sm mx-auto">
                        <div class="py-12">
                            <div class="bg-white pt-4 rounded-xl space-y-6 overflow-hidden   shadow-xl ">
                            <div class="px-8 flex justify-between items-center">
                                <h4 class="text-xl font-bold text-gray-800">QR Gold</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                </div>
                                <h1 class="text-4xl text-center font-bold">$10.000</h1>
                                <p class="px-4 text-center text-sm ">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem</p>
                                <ul class="text-center">
                                    <li><a href="#" class="font-semibold">Ingreso Base de datos</a></li>
                                    <li><a href="#" class="font-semibold">QR Respaldo Identidad</a></li>
                                    <li><a href="#" class="font-semibold">Ficha Online</a></li>
                            
                                {!! Form::open(['route'=>['garage.precioupdate',$vehiculo] ,'files'=>true , 'autocomplete'=>'off', 'method'=>'put']) !!}
                    
                                {!! Form::hidden('insc', null) !!}
                                
                                    
                                        {!! Form::submit('(EDITAR)', ['class'=>'link-button text-xs ml-2 text-blue-600 cursor-pointer pb-6 bg-white']) !!}
                                    
                                {!! Form::close() !!}

                                

                                </ul>
                                
                                
                            </div>
                        </div>

                        
                        
                    </div>
                    
                </div>

            
                    
                
            
            
                <div class="cho-container flex justify-center mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>
        @endif           

        

        
            
         @endif


    @endif

        


    

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