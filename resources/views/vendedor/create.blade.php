<x-app-layout>
    <x-slot name="tl">
            
        <title>Tienda RidersChilenos</title>
        
        
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
    $item->title = 'Suscripción Vendedor RiderChilenos:';
    $item->quantity = 1;
    $item->unit_price = 29990;

    //...
    if (auth()->user()){
        if (auth()->user()->vendedor){

            $preference->back_urls = array(
            "success" => route('payment.vendedor', auth()->user()->vendedor),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending");
        }
        else{
            $preference->back_urls = array(
            "success" => "http://www.tu-sitio/success",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
            );
        }
    }else{
        $preference->back_urls = array(
            "success" => "http://www.tu-sitio/success",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
            );
    }

    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();
        
    @endphp
{{-- comment
    @livewire('vendedor.catalogo-productos')
 --}}
 

 
    <div class="max-w-7xl mx-auto px-2 pt-2 pb-8">

        <div class="card ">
            @if (auth()->user())
                @if (auth()->user()->vendedor)

                    <div class="justify-between gap-4 bg-red-700">
                    
                        <h1 class="px-2 text-3xl font-bold py-4 text-center text-white">Estas a un Paso de Finalizar</h1>
                        
                    </div>

                @else

                

                    <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
                        <article class="col-span-2 sm:col-span-2">
                            <figure>
                                <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                            </figure>
                
                        
                        </article>
                        <article  class="hidden md:block mx-10">
                            @if (auth()->user())
                                <figure>
                                    <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                                </figure>
                            @else
                                <div class="bg-red-600 rounded-lg max-w-sm mx-auto">
                                    <h1 class="text-3xl text-center font-bold text-white pt-4">ACCESO RIDERS</h1>
                                    
                                    <div class="flex justify-center mb-4 ">
                                        
                                    <div class="block w-full mx-4 pb-4">
                                        
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                
                                            <div>
                                                <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                                            </div>
                                
                                            <div class="mt-4">
                                                <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                            </div>
                                
                                            <div class="block mt-4">
                                                <label for="remember_me" class="flex items-center">
                                                    <x-jet-checkbox id="remember_me" name="remember" />
                                                    <span class="ml-2 text-sm text-white">{{ __('Recordar mi cuenta') }}</span>
                                                </label>
                                            </div>
                                
                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-white hover:text-gray-900 mr-auto" href="{{ route('register') }}">
                                                    {{ __('Registrarme') }}
                                                    </a>
                                                
                                                @endif
                                
                                                <x-jet-button class="ml-4">
                                                    {{ __('Ingresar') }}
                                                </x-jet-button>
                                            </div>
                                        </form>
                                    </div> 
                                    </div>
                                </div>
                            @endif

                        </article>
                    </div>

                @endif
            @else

                
                @livewire('vendedor.public-show')

            @endif

                
            
        @if (auth()->user())
            @if (auth()->user()->vendedor)

            @else
             
            @livewire('vendedor.public-show')
            
                <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
            
            @endif
        @else
          
        
            <h1 class="text-3xl font-bold text-center my-8">Formulario de Inscripción</h1>
               
        @endif 
                <div class="card-body mb-12">
                        @if (auth()->user())
                        
                     
                            @if (auth()->user()->vendedor)

                                
                                <h1 class="text-center">Para activar tu registro como vendedor debes hacer el pago correspondiente</h1>

                                <h1 class="text-center text-2xl font-bold my-4">{{auth()->user()->name}}</h1>
                                
                                <div class="cho-container flex justify-center mt-2 mb-4">
                                    <!-- Esto es <a href="" class="btn btn-primary">Pagar</a> un comentario -->
                                </div>

                                <div class="flex justify-center">
                                    <div class="">
                                        <form action="{{route('vendedor.perfil.destroy',auth()->user()->vendedor)}}" method="POST">
                                            @csrf
                                            @method('delete')
                            
                                            <button class="btn btn-danger btn-sm" type="submit"> Cancelar</button>
                                        </form>
                                    </div>
                                </div>

                                
                            @else

                            <div>
                                @php
                                    $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                                    $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                                @endphp
                                {!! Form::open(['route'=>'vendedor.home.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                            
                                @csrf
                                    
                                <div class="max-w-full items-center">


                                  

                                    <p class="text-center">Indique los datos del titular de la cuenta</p>

                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                        <div class="md: col-span-2 lg:col-span-2 ">
                                            <div class="mb-4">
                                                {!! Form::label('name', 'Nombre completo:') !!}
                                                {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
                
                                                @error('name')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('rut', 'Rut:') !!}
                                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}
                
                                                @error('rut')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('fono', 'Fono:') !!}
                                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('localidad', 'Localidad:') !!}
                                                {!! Form::text('localidad', null , ['class' => 'form-input block w-full mt-1'.($errors->has('localidad')?' border-red-600':'')]) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('disciplina_id', 'Disciplina favorita:') !!}
                                                {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            
                                         
                                        </div>
                                    
                                    </div>
                                

                                    <h1 class="text-xl pb-4 text-center">Datos Bancarios</h1>

                                    <p class="text-center">Indique en qué cuenta desea recibir sus comisiones por productos vendidos</p>

                                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-8">
                                        <div class="md: col-span-2 lg:col-span-2 ">
                                            
                                            <div class="mb-4">
                                                {!! Form::label('banco', 'Banco:') !!}
                                                {!! Form::select('banco', $bancos, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            <div class="mb-4">
                                                {!! Form::label('tipo_cuenta', 'Tipo de cuenta:') !!}
                                                {!! Form::select('tipo_cuenta', $cuentas, null , ['class'=>'form-input block w-full mt-1']) !!}
                                            </div>
                                            
                                            <div class="mb-4">
                                                {!! Form::label('nro_cuenta', 'Nro Cuenta*') !!}
                                                {!! Form::text('nro_cuenta', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_cuenta')?' border-red-600':'')]) !!}
                
                                                @error('nro_cuenta')
                                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                                @enderror
                                            </div>
                                            
                                            
                                        </div>
                                    
                                    </div>
                                
                                    
                                </div>
                                {!! Form::hidden('user_id',auth()->user()->id) !!}
                            
                                    <div class="flex justify-center">
                                        {!! Form::submit('Siguiente paso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                                    </div>
                                
                                {!! Form::close() !!}
                            </div>
                                
                            @endif

                
                        @else
                            
                        {{-- comment<h1 class="text-center 3xl font-bold">Para registrarte como vendedor debes <a href="{{ route('login') }}">INICIAR SESIÓN</a> en nuestra plataforma y podras rellenar el siguiente formulario </h1>
                         --}}
                        @php
                            $bancos=['Banco Estado'=>'Banco Estado','Banco Santander'=>'Banco Santander','Banco de Chile'=>'Banco de Chile','Banco Falabella'=>'Banco Falabella','Banco BCI'=>'Banco BCI'];
                            $cuentas=['Cuenta Vista'=>'Cuenta Vista','Cuenta Corriente'=>'Cuenta Corriente','Cuenta Ahorro'=>'Cuenta Ahorro','Cuenta Rut'=>'Cuenta Rut'];
                        @endphp
                        
                    
                    <h1 class="text-center py-2 font-bold">Una vez que hayas creado tu cuenta con nosotros podras registrarte como vendedor autorizado de RidersChilenos</h1>
                    <div class="flex justify-center mx-4 pb-20 mb-20">
                        
                        <form method="POST" action="{{ route('register') }}" class="w-full">
                            @csrf
                
                            <div>
                                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autocomplete="name" />
                            </div>
                
                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                
                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>
                
                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>
                
                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif
                
                            <div class="flex items-center justify-end mt-4">
                                <h1 class="text-sm mr-2">Ya tienes una cuenta? </h1>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-auto" href="{{ route('login') }}">
                                    {{ __('Ingresar') }}
                                </a>
                
                                <x-jet-button class="ml-4">
                                    {{ __('Registrarme') }}
                                </x-jet-button>
                            </div>
                        </form>
                        
                    </div>
                        @endif  
                
                
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