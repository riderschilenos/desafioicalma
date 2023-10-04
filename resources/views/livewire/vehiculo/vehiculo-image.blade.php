<div>

  <div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-8">

    @foreach ($vehiculo->image as $image)
          <div class="flex">
            <img class="h-36 w-full object-contain object-center" src="{{Storage::url($image->url)}}" alt="">
            <span class="relative top-0 bottom-0 right-7" wire:click="destroy({{$image}})">
              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </div>
    @endforeach

</div>
              
</div>
