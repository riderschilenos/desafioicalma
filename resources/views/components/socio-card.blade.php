@props(['socio'])

<div class="flex items-center w-full justify-center">

            <article class="flex flex-col">
                <div class="bg-white shadow-xl rounded-lg">

                    <div class="photo-wrapper flex justify-center">
                        <a href= "{{route('socio.show', $socio)}}">
                           
                                <div class="flex justify-end z-10"> <!-- Contenedor de la estrella con z-index -->
           
                                    <span class="bg-red-500 absolute mt-1 p-1 rounded text-white text-xs">{{$socio->disciplina->name}}</span> <!-- Estrella usando Font Awesome (ajusta el tamaño y el color según necesites) -->
                                </div>
                            @if (str_contains($socio->user->profile_photo_url,'https://ui-'))
                                <img loading="lazy" class="cursor-pointer h-44 w-40 object-cover rounded-md mx-auto" src="https://static.vecteezy.com/system/resources/previews/021/155/831/original/motocross-helmet-mascot-logo-racer-rider-cyclist-sport-concept-suitable-for-print-web-avatar-profile-and-more-vector.jpg" alt="{{$socio->name}}">
                                
                            @else
                                 <img loading="lazy" class="cursor-pointer h-44 w-40 object-cover rounded-md mx-auto" src="{{ $socio->user->profile_photo_url }}" alt="{{$socio->name}}">

                            @endif
                           
                        </a>
                    </div>


                    <div class="px-2 flex flex-1 flex-col">
                        <a href= "{{route('socio.show', $socio)}}">
                            @if ($socio->status==1) 
                                <div class="flex justify-between mx-2">
                                    <div>
                                        <h3 class="text-center cursor-pointer text-base font-bold text-gray-900 leading-8">{{strtoupper(Str::limit($socio->name,13))}}  </h3>
                                    </div>
                                    
                                    <div class="star-icon z-10 my-auto"> <!-- Contenedor de la estrella con z-index -->
                                        <i class="fa fa-star text-yellow-400 text-xl my-auto items-center"></i> <!-- Estrella usando Font Awesome (ajusta el tamaño y el color según necesites) -->
                                    </div>
                                    
                                </div>

                            @else
                                <h3 class="text-center cursor-pointer text-base font-bold text-gray-900 leading-8">{{strtoupper(Str::limit($socio->name,13))}}  </h3>
                                    
                            @endif
                   
                        </a>
                        
                        {{-- <div class="text-center text-gray-400 text-xs font-semibold ">
                            <p>Socio RidersChilenos</p>
                        </div> --}}
                        @if(!is_null($socio->direccion))
                        <div class="hidden flex  text-sm justify-between px-2">
                            
                                <div class="px-2 py-2 text-red-500 font-semibold">
                                    <a href="{{route('socio.show', $socio)}}">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <a href="{{route('socio.show', $socio)}}">
                                <div class="px-2 py-2">{{Str::limit($socio->direccion->comuna.', '.$socio->direccion->region,20)}}</div>
                            </a>
                        </div>
                        @endif
                        <a href="{{route('socio.show', $socio)}}" class="flex justify-center hidden">
                            <table class="text-xs mt-auto">
                                <tbody>

                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Disciplina</td>
                                    <td class="px-2 py-2">{{$socio->disciplina->name}}</td>
                                </tr>
                                
                            </tbody></table>
                        </a>
                        <a href="{{route('socio.show', $socio)}}" class="hidden">
                            <div class="flex justify-center mb-3">
                                @switch($socio->status)
                                    @case(1)
                                        <span class="mx-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">{{$socio->disciplina->name}}</span></span>
                                        @break
                                    @case(2)
                                        <span class="mx-auto"><span class="bg-red-500 py-1 px-2 rounded text-white text-sm">{{$socio->disciplina->name}}</span></span>
                                        @break
                                    @default
                                    
                                @endswitch
                            </div>
                            
                        </a>
                        
                        <div class="text-center my-3 hidden">
                            <a href= "{{route('socio.show', $socio)}}" class="text-sm text-red-500 italic hover:underline hover:text-red-600 font-medium" href="#">Ver Perfil</a>
                        </div>
            
                    </div>

                </div>
            </article>
    
</div>