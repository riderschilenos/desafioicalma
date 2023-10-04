@props(['producto','socio'])

<div class="flex items-center w-full justify-center  p-5">

            <article class="flex flex-col">
                <div class="bg-white shadow-xl rounded-lg  p-2  hover:shadow  hover:bg-gray-100">

                    <div class="photo-wrapper">
                        <a href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20{{str_replace(' ', '%20', $socio->name)}}%20Deseo%20hacer%20un%20pedido%20de%20RidersChilenos;%20me%20podrias%20enviar%20el%20catalogo%20de%20{{str_replace(' ', '%20', $producto->name)}}" target="_blank">
                            <img loading="lazy" class="cursor-pointer h-48 w-full object-cover rounded-md" src="{{Storage::url($producto->image)}}" alt="{{$producto->name}}">
                        </a>
                    </div>


                    <div class="px-2 flex flex-1 flex-col">
                        <a href= "https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20{{str_replace(' ', '%20', $socio->name)}}%20Deseo%20hacer%20un%20pedido%20de%20RidersChilenos;%20me%20podrias%20enviar%20el%20catalogo%20de%20{{str_replace(' ', '%20', $producto->name)}}">
                            <div class="flex justify-between">
                                <h3 class="text-left cursor-pointer text-base font-bold text-gray-900">{{Str::limit($producto->name,16)}}</h3>
                                <h3 class="text-center items-center my-auto cursor-pointer text-base font-bold text-gray-900 ">${{number_format($producto->precio)}}</h3>
                          
                            </div>
                        </a>
                        
                        {{-- <div class="text-center text-gray-400 text-xs font-semibold ">
                            <p>Socio RidersChilenos</p>
                        </div> --}}
                       
                        
                        <div class="flex justify-center mt-2">
                            <a href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $socio->fono), -8)}}&text=Hola%20{{str_replace(' ', '%20', $socio->name)}}%20Deseo%20hacer%20un%20pedido%20de%20RidersChilenos;%20me%20podrias%20enviar%20el%20catalogo%20de%20{{str_replace(' ', '%20', $producto->name)}}" target="_blank">
                        
                                    <span class="mx-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm cursor-pointer">Comprar</span></span>
                            </a>
                        </div>

                    </div>

                </div>
            </article>
    
</div>