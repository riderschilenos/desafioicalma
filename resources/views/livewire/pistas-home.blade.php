<div class="mt-2 mb-6 flex justify-center">
    <div class="max-w-6xl px-2 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-y-4 gap-x-4 mx-4">

            @foreach ($pistas as $pista)

                <article class=" grid grid-cols-6 shadow-lg rounded-lg bg-main-color">

                    <div class="col-span-2 items-center content-center my-auto px-2 py-2">
                        @if ($pista->type=='pista')
                            <a href="{{route('ticket.pista.show', $pista)}}"><h1 class="text-white text-base mb-2 py-2 font-bold text-center">{{Str::limit($pista->titulo,40)}}</h1>
                        @else
                            <a href="{{route('ticket.evento.show', $pista)}}"><h1 class="text-white text-base mb-2 font-bold">{{Str::limit($pista->titulo,40)}}</h1>
                        @endif
                            @isset($pista->image)
                                    @if ($pista->type=='pista')
                                        <a href="{{route('ticket.pista.show', $pista)}}"><img class="w-full h-32 object-contain my-auto content-center items-center" src=" {{Storage::url($pista->image->url)}}" alt=""></a>
                                    @else
                                        <a href="{{route('ticket.evento.show', $pista)}}"><img class="w-full h-32 object-contain my-auto content-center items-center" src=" {{Storage::url($pista->image->url)}}" alt=""></a>
                                    @endif
                            @else
                                <img loading="lazy" class="h-80 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">

                        @endisset
                    </div>
                        <div class="px-2 py-2 col-span-4 bg-white">
                            <a href="{{route('ticket.pista.show', $pista)}}">
                                        <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$pista->disciplina->name}}</p> 
                                        <p class="text-gray-500 text-sm mb-2">Organizador: {{$pista->user->name}}</p>
                                        <p class="text-gray-500 text-sm mb-2 "><b>+{{$pista->fechas_count}}</b> Entrenamiento Realizado </p> 
                                        

                                        </a>

                                        @php
                                        $min=0;
                                        $max=0;
                                    @endphp
                                @if ($pista->fechas->count()>0)
                                    
                               
                                    @foreach ($pista->fechas as $fecha)
                                        @foreach($fecha->categorias as $categoria)
                                            @php
                                                if ($min==0) {
                                                    $min=$categoria->inscripcion;
                                                    $max=$categoria->inscripcion;
                                                }else{
                                                    if ($categoria->inscripcion<$min) {
                                                        $min=$categoria->inscripcion;
                                                    }elseif($categoria->inscripcion>$max){
                                                        $max=$categoria->inscripcion;
                                                    }
                                                }
                                            
                                            @endphp    
                                        @endforeach
                                    @endforeach
                               
                                    
                                @endif    
                                        @if ($pista->type=='pista')
                                            
                                        
                                            @if ($min == 0 && $max==0)
                                            
                                                <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    Inscripcion GRATIS
                                                    </a>
                                                    
                                            @elseif($min==$max)
                                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                                
                                                <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    ${{number_format($min)}}
                                                </a>

                                            @else
                                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                                                
                                                <a href= "{{route('ticket.pista.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                    ${{number_format($min)}} - ${{number_format($max)}}
                                                </a>

                                            @endif
                                        @else
                                                @if ($min == 0 && $max==0)
                                                        
                                                    <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                        Inscripcion GRATIS
                                                        </a>
                                                        
                                                @elseif($min==$max)
                                                    <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                    
                                                    <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                        ${{number_format($min)}}
                                                    </a>

                                                @else
                                                    <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                                    
                                                    <a href= "{{route('ticket.evento.show', $pista)}}" class="btn bg-gray-300 btn-block">
                                                        ${{number_format($min)}} - ${{number_format($max)}}
                                                    </a>

                                                @endif                                  
                                        @endif
                                            <a href="{{route('ticket.evento.show', $pista)}}">
                                                <div class="flex mt-2">
                                                    <p class="text-gray-500 text-md ">Riders c/ Entrada</p>
                                                    <p class="text-sm text-gray-500 ml-auto"> 
                                                        <i class="fas fa-users"></i>
                                                        ({{$pista->inscritos_count}})
                                                    </p>
                                                </div>
                                            </a>

                                            <ul class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 gap-y-2 mt-4">
                                                @php
                                                    $n=0;
                                                @endphp
                                            @foreach ($pista->fechas as $fecha)
                                                
                                                @if ($fecha->fecha>=now()->subDays(1))
                                                    <li class="text-center">
                                                        <div class="pb-5 bg-red-600 text-white py-2 rounded-lg">
                                                            @php
                                                                $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                                            @endphp
                                                            <a href="{{route('ticket.evento.show', $pista)}}">
                                                                @if ($fecha->name=='keyname')
                                                                <div class="flex">
                                                                    <p class="font-bold text-white mx-4 my-auto items-center">¿Cuando?</p>
                                                                    <p class="sm:hidden font-bold text-white ml-auto mr-4"> 
                                                                    {{date('d/m/Y', strtotime($fecha->fecha))}}
                                                                    </p>
                                                                    <p class="hidden sm:block font-bold text-white ml-auto mr-4"> 
                                                                        {{$dias[date('N', strtotime($fecha->fecha))-1]}} {{date('d/m/Y', strtotime($fecha->fecha))}}
                                                                    </p>
                                                                </div>
                                                            
                                                                @else
                                                                    <p class="text-base leading-none dark:text-white"> {{$fecha->name}}</p>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </li>
                                                
                                                    @php
                                                        $n+=1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                                    @if ($n==0)
                                                        <div class="text-center">
                                                            <div class="flex items-center justify-center pb-5 bg-red-600 p-2 text-white py-2 rounded-lg">
                                                                @php
                                                                    $dias=['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                                                @endphp
                                                                
                                                               <label class="mx-auto text-center font-bold"> No hay Entranamientos Anunciados
                                                                    
                                                            </div>
                                                        </div>
                                                    @endif
                                        </ul>



                                
                        </div>

                </article>
                
            @endforeach

    </div>
</div>
