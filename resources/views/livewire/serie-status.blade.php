<div class="mt-8">
    <x-slot name="tl">
            
        <title>{{$serie->titulo}}</title>
        
        
    </x-slot>
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                @if ($current)
                {!!$current->iframe!!}
                @endif
            </div>

            <div class="card-body flex " wire:click="completed" >
                <a class="cursor-pointer" href="">@if ($current){{$current->name}}@endif</a>

                <a class="ml-auto cursor-pointer text-gray-500 font-bold">
                        @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                        @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                        @endif
                    Visto
                </a>
            </div>

            @if ($current->resource)
                <div class="card-body flex items-center justify-end cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="text-sm ml-2">Descargar recurso</p>
                    
                </div>
            @endif

            
            <div class="card">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previus)
                    <a class="cursor-pointer " wire:click='changevideo({{$this->previus}})'> Video Anterior</a>
                    @endif    
                    @if ($this->next)
                    <a class="ml-auto cursor-pointer" wire:click='changevideo({{$this->next}})' >Siguiente video</a>
                    @endif
                    
                    
                </div>
            </div>


            
            
            
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-1">{{$serie->titulo}}</h1>
                <p class="text-sm text-gray-500 ml-auto text-center mb-3"> 
                    <i class="fas fa-users"></i>
                    {{$serie->sponsors_count}} Sponsors
                </p>
                <div class="flex items-center">
                    <figure>
                        <img class="h-14 w-14 rounded-full shadow-lg object-cover mr-4"src="{{$serie->productor->profile_photo_url}}" alt="{{$serie->productor->name}}">
                    </figure>
                    <div>
                        <p>{{$serie->productor->name}}</p>
                        <a class="text-sm" href="">{{'@'.Str::slug($serie->productor->name,'')}}</a>
                    </div>
                </div>

                <p class="text-gray-600 text-sm mt-4 "> {{$this->advance}}% completado</p>
                <div class="relative pt-1 pb-4">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                      <div style="width: {{$this->advance}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500">
                        </div>
                    </div>
                </div>

                <a class="font-bold text-base inline-block mb-2">{{$serie->titulo}}</a>
                <ul>
                    
                    @foreach ($serie->videos as $video)
                        <li class="flex">
                            <div>
                                @if ($video->completed)
                                    
                                    @if ($current->id==$video->id)
                                        <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                    @else
                                            <span class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2 mt-1"></span>
                                    @endif
                                @else
                                    @if ($current->id==$video->id)
                                        <span class="inline-block w-4 h-4 border-2 border-gray-300 rounded-full mr-2 mt-1"></span>
                                    @else
                                        <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                    @endif
                                @endif
                                    
                            </div>
                            <a class="cursor-pointer" wire:click="changevideo({{$video}})">{{$video->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
   
</div>
