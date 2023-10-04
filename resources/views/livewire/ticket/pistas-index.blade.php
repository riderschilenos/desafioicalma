<div>
    <div class="bg-gray-200 py-4 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los eventos
            </button>
          
                <!-- Dropdown Filmmaker -->
                <div class="relative" x-data="{ open: false}" >
                    <div>
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                            <i class="fas fa-biking text-sm mr-2"></i>
                            Organizador
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
                        @foreach ($filmmakers as $filmmaker)
                            <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('filmmaker_id',{{$filmmaker->user_id}})" x-on:click="open = false">
                                {{$filmmaker->name}}
                            </a>
                        @endforeach
                        
                        
                    </div>
                    </div>
                </div>

                <!-- Dropdown Disciplina -->
                <div class="relative" x-data="{ open: false}" >
                    <div>
                        <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" x-on:click="open = true">
                            <i class="fas fa-biking text-sm mr-2"></i>
                            Disciplina
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
                        @foreach ($disciplinas as $disciplina)
                            <a class="cursor-pointer text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" wire:click="$set('disciplina_id',{{$disciplina->id}})" x-on:click="open = false">
                                {{$disciplina->name}}
                            </a>
                        @endforeach
                        
                        
                    </div>
                    </div>
                </div>
  

        </div>
    </div>  
    
  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($eventos as $evento)

            <x-evento-card :evento="$evento" />        

        @endforeach

    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $eventos->links() }}
    </div>
    
    <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>

</div>
