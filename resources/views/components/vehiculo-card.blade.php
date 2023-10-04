@props(['vehiculo'])

<article class="card">
               
               <div class="card-body">
                    @if ($vehiculo->precio)
                        <div class="grid grid-cols-2">
                            <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                <h1 class="card-tittle font-bold">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                            </a>
                                
                            <h1 class="ml-auto card-tittle mr-2 mt-2">${{number_format($vehiculo->precio, 0, '.', '.')}}-.</h1>
                            
                        </div>
                    @else
                        <div class="grid grid-cols-1">
                            <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                <h1 class="card-tittle font-bold">{{$vehiculo->marca->name.' '.$vehiculo->modelo.$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                            </a>
                          
                        </div>


                    @endif
                    <p class="text-gray-500 text-sm mb-2">Dueño: {{$vehiculo->nombre}}</p>
                    <div class="grid grid-cols-5">
                        <div class="col-span-3">
                            <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                @if($vehiculo->image->first())
                                
                                    <img loading="lazy" class="h-46 w-100 object-cover" src=" {{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                @else
                                    <img loading="lazy" class="h-46 w-60 object-cover align-middle" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                                @endif    
                            </a>
                            </div>
                        <div class="col-span-2 ml-2 mt-2">

                            <p class="text-gray-500 text-sm ">Tipo:</p> 
                            <p class="text-gray-500 text-lg mb-2 ">{{$vehiculo->vehiculo_type->name}}</p> 

                            <p class="text-gray-500 text-sm">Año:</p>
                            <p class="text-gray-500 text-lg mb-2">{{$vehiculo->año}}</p>
                            @if($vehiculo->cilindrada)
                            <p class="text-gray-500 text-sm">Cilindrada:</p>
                            <p class="text-gray-500 text-sm mb-2">{{$vehiculo->cilindrada}} <b>cc</b></p>
                            @endif

                            {{-- comment
                            
                            <div class="flex mt-24">
                                
                                <p class="text-sm text-gray-500 ml-auto flex justify-end"> 
                                    <i class="fas fa-users"></i>
                                    (1000)
                                </p>
                            </div>
 --}}
                        </div> 

                        
                    </div>

                    
                    
                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger btn-block">
                        Ver Más Información
                    </a>
                    
               </div>
            </article>