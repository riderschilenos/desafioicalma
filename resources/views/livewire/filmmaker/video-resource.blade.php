<div class="card">
    <div class="card-body bg-gray-100">

            <header>
                <h1>Recursos digitales del Video</h1>
            </header>

            <hr class="my-2">

            @if ($video->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$video->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer "></i>
                </div>
            @else

                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1 bg-gray-200"> 
                        <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                
                    </div>

                    <div class="text-red-500  text-sm font-bold mt-1" wire:loading wire:target="file ">
                        CARGANDO ...
                    </div>

                    @error('file')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </form>
            @endif
            
    </div>
</div>
