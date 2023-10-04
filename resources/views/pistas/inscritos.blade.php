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


<div class="flex justify-center mb-2 mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            
    <div class="max-w-7xl w-full rounded-lg my-2 mx-4">

        <h1 class="text-2xl font-bold text-center"> 
            Riders con Entrada para: {{$evento->titulo}}
        </h1>
        <hr class="mt-2 mb-6">


  
        @livewire('organizador.evento-inscritos', ['evento' => $evento], key('evento.'.$evento->id))

    </div>
</div>

</x-app-layout>