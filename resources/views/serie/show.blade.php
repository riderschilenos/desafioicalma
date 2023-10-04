<x-app-layout>
    <x-slot name="tl">
            
        <title>{{$serie->titulo}}</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <section class="bg-gray-700 py-12 mb-8 ">
            <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
                <figure>
                    @isset($serie->image)
                        <img class="h-60 w-full object-cover object-center" src="{{Storage::url($serie->image->url)}}" alt="">
                    @else
                        <img class="h-60 w-full object-cover object-center" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                    @endisset
                </figure>

                <div class="text-white">
                    <h1 class="text-4xl">{{$serie->titulo}}</h1>
                    <h2 class="text xl mb-3">{{$serie->subtitulo}}</h2>
                    <p class="mb-2"><i class="fas fa-film"></i> <b>{{$serie->videos_count}}</b> Capitulos</p>
                    <p class="mb-2"><i class="fas fa-biking"></i> Disciplina: {{$serie->disciplina->name}}</p>
                    <p class="mb-2"><i class="fas fa-camera"></i> Filmmaker: {{$serie->user->name}}</p>
                    <p class="mb-2"><i class="fas fa-users"></i> Sponsors: {{$serie->sponsors_count}}</p>
                    <p class="mb-2"><i class="fas fa-star"></i> Calificación: {{$serie->rating}}</p>

                </div>

            </div>

        </section>

        <div class="container mb-20 pb-20 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="order-2 lg:col-span-2 lg:order-1 mb-24 pb-24">
                <section class="card">
                    <div class="card-body">
                        <h1 class="font-bold text-2xl mb-2 text-gray-800">¿Que podrás ver en esta producción?</h1>

                        
                    
                        <p class="text-gray-700 text-base">{!!$serie->descripcion!!}</p>

                        <h1 class="font-bold text-xl my-4 text-gray-800">Si te haces Sponsor, automáticamente tendrás acceso a {{$serie->videos_count}} videos exclusivos.</h1>
                        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-x-4 gap-y-2 mt-8">
                            @foreach ($videos as $video)
                                @if ($video->image)
                                <li><img class="h-24 w-full object-cover" src=" {{Storage::url($video->image->url)}}" alt="">{{$video->name }} </li>
                                @else
                                <li><img class="h-24 w-full object-cover" src=" {{Storage::url($serie->image->url)}}" alt="">{{$video->name }} </li>
                                @endif
                                
                                
                            @endforeach
                        </ul>
                    </div>

                </section>

                

                <section class="mb-8">
                    

                    <header class="border border-gray-200 px-4 py-2 cursor bg-gray-200 mt-6">
                        <h1 class="font-bold text-lg text-gray-800">Sponsors</h1>
                    </header>

                    <div class="bg-white py-2 px-4">
                        <ul class="sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-4 gap-y-6 mt-8">
                            @foreach ($serie->sponsors->reverse() as $sponsor)
                                
                            @if($sponsor->socio)
                                <a class="text-blue-400 text-sm font-bold" href="{{route('socio.show', $sponsor->socio)}}"> 
                                    <li><img class="flex ml-3 h-12 w-12 rounded-full object-cover" src="{{ $sponsor->profile_photo_url }}" alt=""  />{{ Str::limit($sponsor->name, 10) }}</li>
                                </a>
                            @else
                                <li><img class="flex ml-3 h-12 w-12 rounded-full object-cover" src="{{ $sponsor->profile_photo_url }}" alt=""  />{{ Str::limit($sponsor->name, 10) }}</li>
                            @endif
                               
                            
                            @endforeach
                        </ul>
                        
                    </div>
                </section>
                <div class="mb-12 py-20">
                    @livewire('series-reviews',['serie' => $serie])
                </div>
            </div>


            <div class="order-1 lg:order-2">
                <section class="card mb-4">
                    <div class="card-body">
                        <div class="flex items-center">
                            <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $serie->productor->profile_photo_url }}" alt="{{ $serie->productor->name }}"  />
                            <div class="ml-4">
                                <h1 class="font-fold text-gray-500 text-lg">Filmmaker: {{ $serie->productor->name }}</h1>
                                <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($serie->productor->filmmakers->first()->name,'')}}</a>
                            </div>
                        </div>
                        @can('enrolled', $serie)

                            <a class="btn btn-danger btn-block mt-4" href="{{route('series.status',$serie)}}">Ver la Serie</a>

                        @else 
                            @if ($serie->precio->value == 0)
                                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2 text-center">GRATIS</p>
                                
                                <form action="{{route('serie.enrolled',$serie)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-block" type="submit">Obtener serie</button>
                                </form>

                            @else
                                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2 text-center">${{number_format($serie->precio->value)}}</p>
                                <a href="{{route('payment.checkout', $serie)}}" class="btn btn-danger btn-block"> Ser Sponsor </a>
                            @endif
                    @endcan
                    </div>
                </section>

                <aside class="hidden lg:block">
                    @foreach ($similares as $similar)
                        <article class="flex mb-6">
                            <img class="h-32 w-40 object-cover"src="{{Storage::url($similar->image->url)}}" alt="">
                            <div class="ml-3">
                                <h1>
                                    <a class="font-bold text-gray-500 mb-3" href="{{route('series.show', $similar)}}">{{Str::limit($similar->titulo, 40)}}</a>
                                </h1>

                                <div class="flex items-center mb-2">
                                    <img class="h-8 w-8 rounded-full shadow-lg object-cover" src="{{$similar->productor->profile_photo_url}}" alt="">
                                    <p class="text-gray-700 text-sm ml-2">{{$similar->productor->name}}</p>
                                </div>

                                <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                            </div>
                        </article>
                    @endforeach
                </aside>
            </div>

            

        </div>

        <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>
        

    </x-fast-view>
</x-app-layout>