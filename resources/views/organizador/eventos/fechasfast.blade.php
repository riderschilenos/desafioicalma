<x-app-layout>
    <style>
        :root {
            --main-color: #4a76a8;
        }
    
        .bg-main-color {
            background-color: var(--main-color);
        }
    
        .text-main-color {
            color: var(--main-color);
        }
    
        .border-main-color {
            border-color: var(--main-color);
        }
    </style>

<div class="flex justify-center">
    <div class="mb-2 mt-6 max-w-7xl sm:px-6 lg:px-8 bg-white rounded-xl shadow-lg py-10 px-6 mx-2">
                
        <div class="max-w-7xl w-full rounded-lg my-2 ">

            <h1 class="text-2xl font-bold text-center"> 
                @if ($evento->type=='pista')
                    Entrenamientos y Precios
                @else
                    Fechas y Categorias
                @endif
            </h1>
            <hr class="mt-2 mb-6">
        


    
            @livewire('organizador.eventos-fechas', ['evento' => $evento], key($evento->id))

        </div>
    </div>
</div>
</x-app-layout>