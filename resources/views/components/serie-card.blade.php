@props(['serie'])

<article class="card flex flex-col">
                @isset($serie->image)
                    <a href="{{route('series.show', $serie)}}"><img class="h-36 w-full object-cover" src=" {{Storage::url($serie->image->url)}}" alt=""></a>
                @else
                    <img loading="lazy" class="h-36 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">

               @endisset

               <div class="card-body flex flex-1 flex-col">
                   <a href="{{route('series.show', $serie)}}"><h1 class="card-tittle">{{Str::limit($serie->titulo,40)}}</h1></a>
                   <p class="text-gray-500 text-sm mt-auto">Disciplina: {{$serie->disciplina->name}}</p> 
                   <p class="text-gray-500 text-sm mb-2">Filmmaker: {{$serie->productor->filmmakers->first()->name}}</p>
                   <p class="text-gray-500 text-sm mb-2 "><b>{{$serie->videos_count}}</b> Capítulos </p> 
                   

                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$serie->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$serie->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{$serie->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$serie->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1">
                            <i class="fas fa-star text-{{$serie->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto"> 
                            <i class="fas fa-users"></i>
                            ({{$serie->sponsors_count}})
                        </p>
                    </div>

                    @can('enrolled', $serie)

                        <a href= "{{route('series.show', $serie)}}" class="btn btn-success btn-block mt-10">
                            Ver Serie
                        </a>

                    @else 
                        @if ($serie->precio->value == 0)
                        <p class="my-2 text-green-800 font-bold">GRATIS</p>
                        @else
                            <p class="my-2 text-gray-500 font-bold">${{number_format($serie->precio->value)}}</p>
                        @endif

                        <a href= "{{route('series.show', $serie)}}" class="btn btn-danger btn-block">
                            Obtener
                        </a>

                    @endcan



                    
               </div>
</article>