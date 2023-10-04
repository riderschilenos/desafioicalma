<div >
    

    <H1 class="text-2xl font-bold"> VIDEOS DE LA SERIE</H1>
    
    <hr class="mt-2 mb-6">

    @foreach ($serie->videos as $item)

        <article class="card mb-6">
            <div class="card-body bg-gray-100" x-data="{open: false}">

                <header class="flex justify-between item-center" x-on:click="open=!open" >
                    <h1 class="cursor-pointer"><strong>Video:</strong> {{$item->name}}</h1>
                    <div>
                        <i class="fas fa-eye cursor-pointer text-blue-500 mr-2" ></i>
                        <i class="fas fa-trash cursor-pointer text-red-500" wire:click="destroy({{$item}})" alt="Eliminar"></i>
                    </div>
                </header>
                
                <div x-show="open">
                @if ($video->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center mt-4">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="video.name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>

                        @error('video.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <Label class="w-32">Plataforma:</Label>
                            <select wire:model="video.platform_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                    
                                @endforeach

                            </select>
                        </div>
                        @error('video.platform_id')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-2">
                            <label class="w-32">URL:</label>
                            <input wire:model="video.url" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                        </div>
                        @error('video.url')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="btn btn-primary text-sm">Actualizar</button>
                            <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                        
                        </div>
                        
                    </form>

                    @else

                        <div class="grid grid-cols-3 ">

                                <div>
                                    @if ($item->image)
                                    <img class="h-40 w-full object-cover" src=" {{Storage::url($item->image->url)}}" alt="">
                                    @else
                                    <img class="h-40 w-full object-cover" src=" {{Storage::url($serie->image->url)}}" alt="">
                                    @endif
                                    
                                    
                                </div>
                            
                            <div class="col-span-2 ml-2 mt-0">
                                
                                <div class="">
                                    <div class=" bg-gray-100">
                                
                                            
                                            <div class="flex">
                                                <p class="text-sm">Imagen del Video: 
                                                @if ($videoimage)
                                                    <h5 class="text-red-600 font-bold text-sm cursor-pointer" wire:click="cancelimage" >(Cancelar)</h5>
                                                @endif
                                                </p>
                                            </div> 
                                            @if (is_null($videoimage))
                                                <div class="flex" >
                                                    <p class="text-sm">{{$item->image->url}} <h5 class="text-blue-600 font-bold text-sm cursor-pointer" x-on:click="key=!key" wire:click="editimage({{$item}})">(Editar)</h5></p>
                                                </div>
                                            @endif
                                            @if ($videoimage)
                                                
                                            
                                                <div >
                                                    <form wire:submit.prevent="imageupdate">
                                                        <div class="flex items-center" >
                                                            <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200"> 
                                                            <button type="submit" class="btn btn-primary text-sm ml-2" >Guardar</button>
                                                    
                                                        </div>
                                
                                                        <div class="text-red-500  text-sm font-bold mt-1" wire:loading wire:target="file ">
                                                            CARGANDO ...
                                                        </div>
                                
                                                        @error('file')
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        @enderror
                                                    </form>
                                                </div>

                                            @endif
                                            
                                            
                                    </div>
                                </div>
                                <hr class="my-2">
                                <p class="text-sm">Plataforma: {{$item->platform->name}} </p>
                                <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a> </p>
                                <div class="mt-2">
                                    <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">editar</button>
                                    <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                                </div>
                                    
                        

                            </div>
                        </div>

                        <div class="mt-4">
                            @livewire('filmmaker.video-resource', ['video' => $item], key('video-resource.'.$item->id))
                        </div>
                    @endif


                </div>

            </div>
        </article>
        
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Video
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font bold"></h1>
                
                <div class="flex items-center mt-4">
                    <label class="w-32"><strong>Nombre:</strong></label>
                    <input wire:model="name" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                </div>

                @error('name')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror

                <div class="flex items-center mt-4">
                    <Label class="w-32"><strong> Plataforma:</strong></Label>
                    <select wire:model="platform_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($platforms as $platform)
                            <option value="{{$platform->id}}">{{$platform->name}}</option>
                            
                        @endforeach

                    </select>
                </div>

                @error('platform_id')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror

                <div class="flex items-center mt-2">
                    <label class="w-32"><strong>URL:</strong></label>
                    <input wire:model="url" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                </div>
                @error('url')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
                
                <label class="w-32"><strong>Imagen de Portada: (Max 2 MB)</strong></label>
                <div class="grid grid-cols-3 ">

                    @if ($image)

                        <div class="">
                                      
                            <img src="{{$image->temporaryUrl()}}" alt="">                      
                        
                        </div>
                    @endif

                    <div class="col-span-2 ml-2 mt-6">
                        <div class="flex items-center mt-2">
                            
                            <input type="file" wire:model="image">
                        </div>
                        
                        
                        @error('image')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                            
                

                    </div>
                </div>
               

                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>

                </div>
            </div>
        </article>
    </div>
    
</div>
