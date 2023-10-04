<div>


<div class="container grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
    
    <!-- seccion pequeña -->
    <div class="">
        <div class="bg-gray-200 pb-4 mb-8 mx-auto mt-8">
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex ">
                
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 mt-6 mx-auto ">

                <div class=" col-span-2 lg:col-span-3 mx-auto">
                    <a href="{{route('garage.vehiculo.vender')}}">
                        <button class="btn btn-block bg-red-600 shadow h-10 px-4 rounded-lg text-white mr-4" wire:click="resetFilters">
                        
                            Vende tu Juguete

                        </button>
                    </a>
                </div>
                @if(auth()->user())
                    <div class=" col-span-2 lg:col-span-3 mx-auto">
                        <a href="{{route('garage.vehiculos.index')}}">
                            <button class="w-full btn btn-block bg-blue-800 shadow h-10 px-4 rounded-lg text-white mr-4" wire:click="resetFilters">
                            
                                Administrar Publicaciones

                            </button>
                        </a>
                    </div>
                @endif
                <div class=" lg:col-span-3 mx-auto">
                <button class="btn btn-block bg-white shadow h-14 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                    <i class="fas fa-archway text-xs mr-2"></i>
                    Todos los vehiculos
                </button>
                </div>
                
                <div class=" lg:col-span-3 z-50">
                <!-- Dropdown vehiculo_type -->
                <div class="relative" x-data="{ open: false}" >
                    <div>
                        <button class="btn btn-block z-100 bg-white shadow h-14 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                            <i class="fas fa-biking text-sm mr-2"></i>
                            Tipo de Vehiculo
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                    </div>
                
                    <!--
                    Dropdown menu, show/hide based on menu state.
                
                    Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-on:click.away="open = false">
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        @foreach ($vehiculo_types as $vehiculo_type)
                            <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('vehiculo_types_id',{{$vehiculo_type->id}})" x-on:click="open = false">
                                {{$vehiculo_type->name}}
                            </a>
                        @endforeach
                        
                        
                    </div>
                    </div>
                </div>
                </div>
                
                <!-- Dropdown Disciplina -->
                <div class=" col-span-2 md:col-span-2 lg:col-span-3 z-40">
                    @livewire('search')
                </div>

            </div>

            </div>
        </div>  
    </div>

    <!-- seccion dos columnas -->
    <div class="lg:col-span-2 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
            {{ $vehiculos->links() }}
        </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8">

        @foreach ($vehiculos as $vehiculo)

            <x-vehiculo-card :vehiculo="$vehiculo" />        

        @endforeach

    </div>
    </div>

</div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $vehiculos->links() }}
    </div>
    

</div>

