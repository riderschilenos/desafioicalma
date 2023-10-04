@props(['vehiculo'])

<article class="card flex flex-col">
               
               <div class="px-2 py-4">
                    @if ($vehiculo->precio)

                        <div class="grid grid-cols-2">
                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                            <h1 class="text-md">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).$vehiculo->cilindrada.' '.$vehiculo->año}}</h1>
                        </a>
                    
                        <h1 class="ml-auto card-tittle mr-2 mt-2">${{number_format($vehiculo->precio, 0, '.', '.')}}-.</h1>
                        </div>
                    @else
                        <div class="grid grid-cols-1 jus">
                        <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                            <h1 class="text-md text-center font-bold py-2">{{$vehiculo->marca->name.' '.strtoupper($vehiculo->modelo).'-'.$vehiculo->cilindrada.'cc '.$vehiculo->año}}</h1>
                        </a>
                    
                        </div>
                    @endif
                    
                  
                            
                                @if($vehiculo->image->first())
                                <a href="{{route('garage.vehiculo.show', $vehiculo)}}">
                                    <img loading="lazy" class="h-44 w-full object-cover" src=" {{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                </a>
                                @else
                                <a href="{{route('garage.image', $vehiculo)}}">
                                    <img loading="lazy" class="h-44 w-full object-cover" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                                </a>
                                @endif
                    

                <div class="flex flex-1 flex-col">
                    @if($vehiculo->status==1)
                        @if($vehiculo->image->first())
                            <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                            Continuar Editando
                            </a>
                        @else
                            <a href= "{{route('garage.image', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                Continuar Editando
                            </a>
                        @endif
                    @else
                        @if($vehiculo->status==3 || $vehiculo->status==4)

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                        Ver Publicacion
                                    </a>
                                </div>
                                <div>
                                    <a href= "{{route('garage.comision', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                        Bajar/Editar Publicación
                                    </a>
                                </div>
                            </div>


                        @elseif($vehiculo->status==2)


                            @if($vehiculo->image->first())



                            <div class="grid grid-cols-2">
                                <div>
                                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                        Ver ficha
                                    </a>
                                </div>
                                <div>
                                    
                                        <a href= "{{route('garage.inscripcion', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                            Terminar Inscripción
                                        </a>
                                    
                                    
                                </div>
                            </div>
                            @else
                            <a href= "{{route('garage.image', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                Terminar Inscripción
                            </a>
                            @endif

                        @elseif($vehiculo->status==5 || $vehiculo->status==6)

                            @routeIs('garage.vehiculos.index') 
                            <div class="grid grid-cols-2">
                                <div>
                                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                        Ver ficha
                                    </a>
                                </div>
                                <div>
                                    <a href= "{{route('garage.inscripcion', $vehiculo)}}" class="mt-4 btn btn-danger ml-2 text-xs btn-block">
                                        Estado suscripción
                                    </a>
                                </div>
                            </div>
                            
                            @else
                                <div class="">
                                    <div class="px-4 pt-2 text-sm font-semibold text-center">Dueño</div>
                                    
                                    <div class="flex justify-center text-sm">
                                        @if ($vehiculo->user->socio)
                                            {{ $vehiculo->user->socio->name.' '.$vehiculo->user->socio->last_name}}
                                        @else
                                            {{ $vehiculo->user->name}}
                                        @endif
                                        
                                    
                                    </div>
                                </div>

                                <div>
                                    <a href= "{{route('garage.vehiculo.show', $vehiculo)}}" class="mt-4 btn btn-danger text-xs btn-block">
                                        Ver ficha
                                    </a>
                                </div>
                            @endif
                        @endif
                    
                        
                    @endif
                </div>
               </div>
            </article>