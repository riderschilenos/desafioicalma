<x-app-layout>
    <section class="bg-gray-700 py-12 mb-8 ">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @isset($serie->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($serie->image->url)}}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
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

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">

                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ocurrio un error!</strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg x-on:click="open=false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>

            </div>
            
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">¿Que podrás ver en esta producción?</h1>

                    <p class="text-gray-700 text-base">{!!$serie->descripcion!!}</p>

                    <h1 class="font-bold text-xl my-4">Si te haces Sponsor, automáticamente tendrás acceso a {{$serie->videos_count}} videos exclusivos.</h1>
                    <ul class="grid grid-cols-4 gap-x-4 gap-y-2 mt-8">
                        @foreach ($videos as $video)
                            @if ($video->image)
                            <li><img class="h-24 w-full object-cover" src=" {{Storage::url($video->image->url)}}" alt="">{{$video->name }} </li>
                            
                            @else
                            <li>
                            <div class="embed-responsive my-6">      
                                {!!$video->iframe !!}
                            </div>
                            {{$video->name }} </li>
                            @endif
                            
                            
                        @endforeach
                    </ul>
                </div>

            </section>

            <section class="mb-8">
                

                <header class="border border-gray-200 px-4 py-2 cursor bg-gray-200 mt-6">
                    <h1 class="font-bold text-lg text-gray-600">Sponsors</h1>
                </header>
                @isset($serie->image)
                    <div class="bg-white py-2 px-4">
                        <ul class="sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-4 gap-y-6 mt-8">
                            @foreach ($serie->sponsors as $sponsor)
                                <li><img class="flex ml-3 h-12 w-12 rounded-full object-cover" src="{{ $sponsor->profile_photo_url }}" alt=""  />{{ Str::limit($sponsor->name, 10) }}</li>
                                @endforeach
                        </ul>
                        
                    </div>
                @else
                   
                @endisset
                
            </section>

        </div>


        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="flex h-14 w-14 rounded-full shadow-lg object-cover" src="{{ $serie->productor->profile_photo_url }}" alt="{{ $serie->productor->name }}"  />
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Filmmaker: {{ $serie->productor->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($serie->productor->first()->name,'')}}</a>
                        </div>
                    </div>

                    <form action="{{route('admin.series.approved',$serie)}}" class="mt-4" method="POST">

                        @csrf

                        <button type="submit" class="btn btn-primary w-full"> Aprobar serie</button>
                    </form>

                    <a href="{{route('admin.series.observation',$serie)}}" class="btn btn-danger w-full block text-center mt-4">Observar Serie</a>

                </div>
            </section>

            
        </div>

    </div>

</x-app-layout>