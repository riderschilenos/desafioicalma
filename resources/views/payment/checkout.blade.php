<x-app-layout>
    <x-slot name="tl">
            
        <title>Checkout {{$serie->titulo}}</title>
        
        
    </x-slot>
    @php
        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

      
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Serie:';
        $item->quantity = 1;
        $item->unit_price = $serie->precio->value;

        

        $preference = new MercadoPago\Preference();
        //...
        $preference->back_urls = array(
            "success" => route('payment.serie', $serie),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();

    @endphp


    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold mb-2">Detalles del pedido</h1>
        
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($serie->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$serie->titulo}}</h1>
                    <p class="text-xl font-bold ml-auto">${{number_format($serie->precio->value)}}</p>
                </article>
                <div class="cho-container flex justify-end mt-2 mb-4">
                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                </div>

                <hr>

                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam soluta ipsum tenetur beatae esse placeat eos, inventore quod amet tempora voluptas dicta, reprehenderit aliquid praesentium earum magnam est sequi fugiat? <a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
            </div>
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
</x-app-layout>