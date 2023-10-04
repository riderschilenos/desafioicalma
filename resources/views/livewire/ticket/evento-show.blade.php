<div>
    
       
    <section class="bg-white py-12 mb-8 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="flex justify-center">
                @isset($evento->image)
                    <img class="h-72 w-72 object-center" src="{{Storage::url($evento->image->url)}}" alt="">
                @else
                    <img class="h-72 w-72 object-center" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                @endisset
            </div>

            <div class="text-gray-100 items-center my-auto bg-gray-700 p-4 rounded-2xl  ">
                <h1 class="text-4xl">{{$evento->titulo}}</h1>
                <h2 class="text xl mb-3">{{$evento->subtitulo}}</h2>
                <p class="mb-2"><i class="fas fa-calendar"></i> <b>{{$evento->fechas_count}}</b> Fechas</p>
                <p class="mb-2"><i class="fas fa-biking"></i> Disciplina: {{$evento->disciplina->name}}</p>
                <p class="mb-2"><i class="fas fa-user"></i> Organizador: {{$evento->user->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Limite de inscritos: {{$evento->Inscritos_count}}</p>
               

            </div>

        </div>

    </section>

    <div class="container mb-20 pb-20 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1 mb-24 pb-24">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 text-gray-800">¿Que podrás disfrutar en este evento?</h1>

                    
                
                    <p class="text-gray-700 text-base">{!!$evento->descripcion!!}</p>

                    <h1 class="font-bold text-xl my-4 text-gray-800">La organización estipula {{$evento->fechas_count}} fechas para este campeonato.</h1>
                    <ul class="grid grid-cols-2 lg:grid-cols-4 gap-x-4 gap-y-2 mt-8">
                        @foreach ($fechas as $fecha)
                            @if ($fecha->image)
                            <li class="text-center"><img class="h-40 w-full object-contain" src=" {{Storage::url($fecha->image->url)}}" alt="">{{$fecha->name }} </li>
                            @else
                            <li class="text-center"><img class="h-40 w-full object-contain" src=" {{Storage::url($evento->image->url)}}" alt="">{{$fecha->name }} </li>
                            @endif
                            
                            
                        @endforeach
                    </ul>
                </div>

            </section>

            

            <section class="mb-8">
                

                <header class="border border-gray-200 px-4 py-2 cursor bg-gray-200 mt-6">
                    <h1 class="font-bold text-lg text-gray-800">Inscritos</h1>
                </header>

                <div class="bg-white py-2 px-4">
                    <ul class="sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-4 gap-y-6 mt-8">
                        @foreach ($evento->Inscritos->reverse() as $sponsor)
                            <li><img class="flex ml-3 h-12 w-12 rounded-full object-cover" src="{{ $sponsor->profile_photo_url }}" alt=""  />{{ Str::limit($sponsor->name, 10) }}</li>
                            @endforeach
                    </ul>
                    
                </div>
            </section>
            <div class="mb-12 py-20">
                {{-- comment
                @livewire('eventos-reviews',['evento' => $evento]) --}}
            </div>
        </div>


        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $evento->organizador->profile_photo_url }}" alt="{{ $evento->organizador->name }}"  />
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Organizador: {{ $evento->organizador->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($evento->organizador->first()->name,'')}}</a>
                        </div>
                    </div>
                    @can('enrolled', $evento)

                        <a class="btn btn-danger btn-block mt-4" href="{{route('eventos.status',$evento)}}">Ver mis tickets</a>

                    @else 

                    @php
                        $min=0;
                        $max=0;
                    @endphp
                    @foreach ($fechas as $fecha)
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

                            @if ($min == 0 && $max==0)
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripcion GRATIS</p>
                            @elseif($min==$max)
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                <a href= "" class="btn bg-gray-100 my-2 btn-block">
                                    ${{number_format($min)}}
                                </a>
                            @else
                                <p class="text-center text-gray-500 text-sm mb-1 mt-2">Inscripciones</p>
                                <a href= "" class="btn bg-gray-100 my-2 btn-block">
                                    ${{number_format($min)}} - ${{number_format($max)}}
                                </a>
                        @endif
                        
                            
                            <a href="{{route('checkout.evento', $evento)}}" class="btn btn-danger btn-block">Inscribirme</a>
                        
                        
                            <p class="text-center text-gray-500 text-sm mb-1 mt-2">Entradas</p>
                            <div class="flex justify-between mb-4">
                                <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                    <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada_niño)}}</p>
                                    <p class="text-gray-500 text-sm text-center">Niños</p> 
                                </div>
                                <div class="bg-gray-100 p-1 rounded-3xl w-full mx-1">
                                    <p class="mt-2 text-gray-500 font-bold text-center">${{number_format($evento->entrada)}}</p>
                                    <p class="text-gray-500 text-sm text-center">Adultos</p> 
                                </div>
                               
                            </div>
                            
                            <a href="{{route('checkout.evento', $evento)}}" class="btn btn-danger btn-block">Obtener Entradas</a>                       
                           
                            
                       
                @endcan
                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover"src="{{Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('ticket.evento.show', $similar)}}">{{Str::limit($similar->titulo, 40)}}</a>
                            </h1>

                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 rounded-full shadow-lg object-cover" src="{{$similar->organizador->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->organizador->name}}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

        

    </div>

    <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>
    

</div>
