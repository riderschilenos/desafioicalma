<div class="max-w-7xl mx-auto px-2 pt-2 pb-8">
    <div class="card pb-8 ">    
    <!-- Create By Joker Banny -->

    <!-- Header Navbar -->

    <div class="flex justify-center ">

                                
                                    
        
            <a href="{{route('pagosqr.cliente')}}">
                <button class="hidden btn btn-danger w-full max-w-xs items-center justify-items-center mt-2"><i class="fa-solid fa-camera-web"></i> Pago QR</button>
            </a>
       
        

    </div>
  
  <!-- Title -->
  <div class="hidden flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center   bg-white text-gray-800">
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
        </svg>
        <span>Alpinestar</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 rounded-t-lg text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
        <span>Bianchi</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
        <span>Excepturi</span>
    </a>
    <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <circle cx="12" cy="12" r="10"></circle>
            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
        </svg>
        <span>Consectetur</span>
    </a>
</div>
    
  <div class="bg-white">
    @livewire('vendedor.catalogo-productos')
    <h1 class="text-center text-2xl font-bold text-gray-800 mt-6">Marketplace RidersChilenos</h1>
    <div class="px-6 py-4  my-4">
        <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese nombre, categoria o descripción del producto que busca" required autofocus autocomplete="off">
    </div>
  </div>
  
    @if ($product)
        <!-- Tab Menu -->
        <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
        <div class="min-w-screen min-h-screen bg-yellow-300 flex items-center lg:p-10 overflow-hidden relative">
            <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                <div class="md:flex items-center -mx-10  p-4">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <img src="{{Storage::url($product->image)}}" class="h-48 relative z-10" alt="">
                            <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-10">
                        <div class="mb-10 ml-4">
                            <h1 class="font-bold uppercase text-2xl mb-5 text-center">{{$product->name}}</h1>
                            <p class="text-sm">
                                @if ($product->descripcion)
                                    {{$product->descripcion}}
                                @endif
                            </p>
                        </div>

                    
                        

                        <div class="flex justify-between mx-10">
                            <div class="inline-block align-bottom ml-4 md:ml-8">
                                <span class="text-2xl leading-none align-baseline">$</span>
                                <span class="font-bold text-4xl leading-none align-baseline">{{number_format($product->precio)}}</span>

                            </div>
                            <div class="grid grid-cols-1 gap-y-2 align-bottom mr-4 md:mr-8">
                                <a href= "https://api.whatsapp.com/send?phone=56963176726&text=Hola,%20Deseo%20hacer%20un%20pedido;%20me%20podrias%20enviar%20el%20catalogo%20de%20{{str_replace(' ', '%20', $product->name)}}">
                                    <button class="bg-red-500 opacity-75 hover:opacity-100 text-white hover:text-gray-200 rounded-full px-10 py-2 font-semibold pr-4"><i class="mdi mdi-cart ml-4 mr-2"></i> COMPRAR</button>
                                </a>
                                <a href= "https://api.whatsapp.com/send?phone=56963176726&text=Hola,%20Deseo%20hacer%20un%20pedido;%20me%20podrias%20enviar%20el%20catalogo%20de%20{{str_replace(' ', '%20', $product->name)}}">
                                    <button class="bg-blue-500 opacity-75 hover:opacity-100 text-white hover:text-gray-200 rounded-full px-10 py-2 font-semibold pr-4"><i class="mdi mdi-cart ml-4 mr-2"></i> Agregar al Carro</button>
                                </a>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 relative z-1 rounded overflow-hidden">
                        
                            
                            <div class="flex justify-center mt-6 mb-6">
                            <ul>
                                <li class="flex items-center">
                                <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-umbrella"><path class="primary" d="M11 3.05V2a1 1 0 0 1 2 0v1.05A10 10 0 0 1 22 13c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a2 2 0 1 0-4 0c0 1.33-2 1.33-2 0a10 10 0 0 1 9-9.95z"/><path class="secondary" d="M11 14a1 1 0 0 1 2 0v5a3 3 0 0 1-6 0 1 1 0 0 1 2 0 1 1 0 0 0 2 0v-5z"/></svg>
                                </div>
                                <span class="text-gray-700 text-lg ml-3">Despacho a todo Chile</span>
                                </li>
                                <li class="flex items-center mt-3">
                                <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-shopping-bag"><path class="primary" d="M5 8h14a1 1 0 0 1 1 .92l1 12A1 1 0 0 1 20 22H4a1 1 0 0 1-1-1.08l1-12A1 1 0 0 1 5 8z"/><path class="secondary" d="M9 10a1 1 0 0 1-2 0V7a5 5 0 1 1 10 0v3a1 1 0 0 1-2 0V7a3 3 0 0 0-6 0v3z"/></svg>
                                </div>
                                <span class="text-gray-700 text-lg ml-3">Paga con tarjetas debito y crédito</span>
                                </li>
                                <li class="flex items-center mt-3">
                                <div class="bg-yellow-200 rounded-full p-2 fill-current text-yellow-700">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon-pie-chart"><path class="primary" d="M14 13h6.78a1 1 0 0 1 .97 1.22A10 10 0 1 1 9.78 2.25a1 1 0 0 1 1.22.97V10a3 3 0 0 0 3 3z"/><path class="secondary" d="M20.78 11H14a1 1 0 0 1-1-1V3.22a1 1 0 0 1 1.22-.97c3.74.85 6.68 3.79 7.53 7.53a1 1 0 0 1-.97 1.22z"/></svg>
                                </div>
                                <span class="text-gray-700 text-lg ml-3">2-3 Dias Hábiles en Despachar</span>
                                </li>
                            </ul>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif 
    <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->

    
    <!-- Product List -->
  <section class="py-10 bg-gray-100">
    <div class="mx-auto grid max-w-7xl  grid-cols-2 gap-6 py-6 px-2 md:px-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
      @foreach ($productos as $producto)
        <article  wire:click="set_product({{$producto->id}})" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
            <div class="relative flex justify-center items-end overflow-hidden rounded-xl">
                <img src="{{Storage::url($producto->image)}}" class="h-44" alt="Hotel Photo" />
               
            </div>
    
            <div class="mt-1 p-2">
                <h2 class="text-slate-700">{{$producto->name}}</h2>
                <p class="mt-1 text-sm text-slate-400">Despacho todo Chile</p>
    
                <div class="mt-3 flex items-end justify-between">
                    <p class="text-lg font-bold text-blue-500">${{number_format($producto->precio)}}</p>
    
                <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
    
                    <button class="hidden sm:block text-sm">Comprar</button>
                </div>
                </div>
            </div>
            </a>
        </article>
      @endforeach
     
 
  </section>
  

    

    
      
          

        <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-4 lg:mx-14">
            <article class="col-span-2 sm:col-span-2">
                <figure>
                    <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/first.png')}}" alt=""></a>
                </figure>
    
            
            </article>
            <article  class="hidden md:block mx-10">
                
                    <figure>
                        <a href=""><img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/vend3.png')}}" alt=""></a>
                    </figure>
            {{-- comment
                @if (auth()->user())
                @else
                    <div class="bg-red-600 rounded-lg max-w-sm mx-auto">
                        <h1 class="text-3xl text-center font-bold text-white pt-4">ACCESO RIDERS</h1>
                        
                        <div class="flex justify-center mb-4 ">
                            
                        <div class="block w-full mx-4 pb-4 text-white">
                            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                    
                                <div>
                                    <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
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
                --}}
            </article>
        </div>


        <div class="max-w-7xl sm:px-6 mx-2 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8 mt-8 lg:mx-14">
            <article class="hidden  md:block col-span-2 md:col-span-1">
                <figure>
                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/second3.png')}}" alt="">
                </figure>
    
            
            </article>
            <div class="block  md:hidden col-span-2 md:col-span-1">
                <article class="flex justify-center mt-2">
                    <figure>
                        <img class="h-48 object-contain" src="{{asset('img/vendedores/second3.png')}}" alt="">
                    </figure>
                </article>
            </div>
            <article class="col-span-2 sm:col-span-2">
                <figure>
                    <img class="h-35 w-55 object-cover" src="{{asset('img/vendedores/tree3.png')}}" alt="">
                </figure>
            
            </article>
        
        
        </div>
    
        
   
        
        
        

    
  
            
    </div>

</div>