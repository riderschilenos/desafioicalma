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
    <div class="mb-2 mt-6 max-w-7xl sm:px-6 lg:px-8 bg-white rounded-xl shadow-lg py-10 px-6 mx-4">
                
        <div class="max-w-7xl w-full rounded-lg my-2 mx-4 ">
                <h1 class="text-2xl font-bold"> 
                    @if ($evento->type=='carrera')
                    Fecha y Categorias
                    @else
                    Fechas y Categorias
                    @endif
                </h1>
                <hr class="mt-2 mb-6">

                <div class="flex justify-center mx-auto">
                    @livewire('organizador.fecha-categorias', ['fecha' => $fecha], key($fecha->id))
                </div>
        </div>
    </div>
</div>
</x-app-layout>


