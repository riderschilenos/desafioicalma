<div class="">
    <div class="" x-data="{ catalogo: false }">

        <div class="w-full relative pt-4 mb-4" x-on:click="catalogo=!catalogo" x-show="!catalogo">
            <div class="bg-white  px-5 py-3.5 rounded-lg shadow hover:shadow-xl max-w-sm mx-auto transform hover:-translate-y-[0.125rem] transition duration-100 ease-linear">
                <div class="w-full flex items-center justify-center">
                    <span class="font-medium text-sm text-slate-400 text-center" >Buscas productos Personalizados?</span>
                    <button class="-mr-1 bg-slate-100 hover:bg-slate-200 text-slate-400 hover:text-slate-600 h-5 w-5 rounded-full flex justify-center items-center hidden">
                        <svg class="h-2 w-2 fill-current items-center" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
                    </button>
                </div>
                <div class="flex items-center mt-2 rounded-lg px-1 py-1 cursor-pointer">
                    <div class="relative flex flex-shrink-0 items-end">
                        <img class="h-16 w-16 rounded-full" src="{{asset('img/mobileslider/carcasas-min.png')}}">    
                        <span class="absolute h-4 w-4 bg-green-400 rounded-full bottom-0 right-0 border-2 border-white"></span>
                    </div>
                    <div class="ml-3">
                        <span class="font-semibold tracking-tight text-xs">Catalogo de Productos</span>
                        <span class="text-xs leading-none opacity-50">a un Click.</span>
                        <p class="text-xs leading-4 pt-2 italic opacity-70">"Carcasas, Polerones, Llaveros y mucho más"</p>
                        <span class="text-[10px] text-blue-500 font-medium leading-4 opacity-75">Solo Pedidos Por Whatsapp e Instagram</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Social Network notification:light -->

        <div class="pt-4 pb-2 sm:py-4 lg:max-w-7xl lg:mx-auto lg:px-8"  x-show="catalogo">

           

                <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-2">

                    

                    @if(!is_null($selectedcategory))
                        <div class="w-full bg-indigo-600 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Categoria: {{$selectedcategory->name}} </span>
                                    <span class="hidden md:inline"> Categoria: {{$selectedcategory->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelcategory">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif

                    @if($producto)
                        <div class="w-full bg-red-600 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Producto: {{$producto->name}} </span>
                                    <span class="hidden md:inline"> Producto: {{$producto->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelproducto">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    @endif
                    @if($selectedmarca)
                        <div class="w-full bg-gray-800 rounded-full my-2">
                            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                            <div class="flex items-center justify-between flex-wrap">
                                <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <!-- Heroicon name: outline/speakerphone -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:hidden"> Marca: {{$selectedmarca->name}} </span>
                                    <span class="hidden md:inline"> Marca: {{$selectedmarca->name}} </span>
                                </p>
                                </div>
                                
                                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" wire:click="cancelmarca">
                                    <span class="sr-only">Dismiss</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    @endif


                </div>
            

                @if(is_null($selectedcategory))
                    <h1 class="text-center mb-4"> ¿Qué Tipo de producto buscas?</h1>
                    <div class="flex justify-center mx-4">
                        <div class="max-w-4xl mx-auto px-2 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-x-4 gap-y-2">
                        
                            <article class="cursor-pointer" wire:click="category(1)">
                                <figure>
                                        <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/carcasas.jpg')}}" alt="">
                                </figure>
                            </article>

                            <article class="cursor-pointer" wire:click="category(2)">
                                <figure>
                                        <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/accesorios.jpg')}}" alt="">
                                </figure>
                            </article>

                            <article class="cursor-pointer" wire:click="category(3)">
                                <figure>
                                        <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{asset('img/home/poleras.jpeg')}}" alt="">
                                </figure>               
                            </article>


                        </div>
                    </div>

                @endif
                
                @if(!is_null($marcas))

                @if($selectedmarca)
                <h1 class="text-center py-10 font-bold">CATALOGO DE LA MARCA {{$selectedmarca->name}}</h1>
                <a href= "https://api.whatsapp.com/send?phone=56963176726&text=Hola,%20Deseo%20hacer%20un%20pedido;%20me%20podrias%20enviar%20el%20catalogo%20de%20Carcasas">
                                     
                    @if ($selectedcategory->id==1)             
                        <img class="w-full object-cover object-center rounded-lg" src="{{Storage::url($selectedmarca->catalogocarcasas)}}" alt="">    
                    @endif
                </a>
                <a href= "https://api.whatsapp.com/send?phone=56963176726&text=Hola,%20Deseo%20hacer%20un%20pedido;%20me%20podrias%20enviar%20el%20catalogo%20de">
               
                    @if ($selectedcategory->id==2)             
                    <img class="w-full object-cover object-center rounded-lg" src="{{Storage::url($selectedmarca->catalogoaccesorios)}}" alt="">    
                    @endif
                </a>

                @else
                    <h1 class="text-center mb-12"> Seleccione una marca </h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
                        @foreach ($marcas as $marca)
                            @if ($selectedcategory->id==1)
                                @if ($marca->catalogocarcasas)
                                    @if ($marca->image)
                                        <div class="flex h-screen cursor-pointer" wire:click="marca({{$marca->id}})">
                                            <div class="m-auto">
                                                <img class="h-38 mx-auto w-44 object-contain" src="{{Storage::url($marca->image->url)}}" alt="">
                                            </div>
                                        </div>
                                    @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer" wire:click="marca({{$marca->id}})">
                                        <div class="m-auto p-1">
                                        <h3 class="text-center text-white my-4 font-bold">{{$marca->name}}</h3>
                                        </div>
                                    </div>
                                    @endif
                                @endif 
                            @endif
                            @if ($selectedcategory->id==2)
                                @if ($marca->catalogoaccesorios)
                                    @if ($marca->image)
                                        <div class="flex h-screen cursor-pointer" wire:click="marca({{$marca->id}})">
                                            <div class="m-auto">
                                                <img class="h-38 mx-auto w-44 object-contain" src="{{Storage::url($marca->image->url)}}" alt="">
                                            </div>
                                        </div>
                                    @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer" wire:click="marca({{$marca->id}})">
                                        <div class="m-auto p-1">
                                        <h3 class="text-center text-white my-4 font-bold">{{$marca->name}}</h3>
                                        </div>
                                    </div>
                                    @endif
                                @endif 
                            @endif 
                                    
                            

                        @endforeach

                    </div>
                
                @endif

                @elseif(!is_null($selectedcategory))
                <h1 class="text-center mb-12"> Seleccione un producto </h1>
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-2 gap-y-2">
                        @foreach ($products as $product)    
                                @if ($product->image)
                                    <article class="cursor-pointer" wire:click="producto({{$product->id}})">
                                        <figure>
                                                <img class="rounded-xl h-38 mx-auto w-44 object-contain" src="{{Storage::url($product->image)}}" alt="">
                                        </figure>
                                    </article>
                                @else
                                    <div class="flex h-screen bg-gray-800 cursor-pointer col-span-3" wire:click="producto({{$product->id}})">
                                        <div class="m-auto p-1">
                                            <h3 class="text-center text-white my-4 font-bold">{{$product->name}}</h3>
                                        </div>
                                    </div>
                                @endif
                        @endforeach

                    </div>
                @endif

                
       
                <h1 class="text-center my-4 font-bold">Nuestros Trabajos Anteriores </h1>
                <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-x-2 gap-y-2">
                   
                    @foreach ($ordens->reverse() as $orden)  
                        @if ($orden->status==3)
                            
                        
                            @if ($orden->images)
                                @foreach ($orden->images as $image)

                                   
                                    <div class="flex items-center w-full justify-center">

                                                <article class="flex flex-col">
                                                    <div class="bg-white shadow-xl rounded-lg">
                                    
                                                        <div class="photo-wrapper flex justify-center">
                                                           
                                                                
                                                                    <img loading="lazy" class="cursor-pointer h-44 object-cover rounded-md mx-auto" src="{{Storage::url($image->url)}}" alt="">
                                    
                                                            
                                                      
                                                        </div>
                                    
                                    
                                                        <div class="px-2 flex flex-1 flex-col mb-3">
                                                            

                                                                @if($orden->smartphone)
                                                                
                                                                    <h3 class="text-center cursor-pointer text-sm font-bold text-gray-900 leading-8">{{Str::limit($orden->producto->name,12)}}</h3>
                                                          
                                                                @else
                                                                     <h3 class="text-center cursor-pointer text-sm font-bold text-gray-900 leading-8">{{Str::limit($orden->producto->name,12)}}</h3>
                                                          
                                                                    
                                                                @endif
                                                            
                                                            
                                                            {{-- <div class="text-center text-gray-400 text-xs font-semibold ">
                                                                <p>Socio RidersChilenos</p>
                                                            </div> --}}
                                                          
                                                            
                                                            <div class="flex justify-center mb-3 hidden">
                                                               
                                                                        <span class="mx-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Ver</span></span>
                                                                
                                                            </div>
                                                            @can('Super admin')
                                                                <div class="text-center my-3">
                                                                    <a href= "" wire:click="imagedestroy({{$image}})" class="text-sm text-red-500 italic hover:underline hover:text-red-600 font-medium" >Eliminar<br>(id:{{$image->id}})</a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                    
                                                    </div>
                                                </article>
                                        
                                    </div>

                                @endforeach
                            @else
                            {{-- comment
                                <div class="flex h-screen bg-gray-800 cursor-pointer col-span-3" wire:click="producto({{$product->id}})">
                                    <div class="m-auto p-1">
                                        <h3 class="text-center text-white my-4 font-bold">{{$product->name}}</h3>
                                    </div>
                                </div> --}}
                            @endif
                        @endif  
                    @endforeach

                </div>
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
                    {{ $ordens->links() }}
                </div>
                <div class="flex justify-center">
                    <button class="btn btn-danger" x-on:click="catalogo=!catalogo">Cerrar Catalogo</button>
                </div>
        </div>

    </div>
    
</div>
