<x-ticket-layout :evento="$evento">

    


    <h1 class="text-2xl font-bold"> 
            Listado de Inscritos: {{$evento->titulo}}
    </h1>
    <hr class="mt-2 mb-6">

   @livewire('organizador.evento-inscritos', ['evento' => $evento], key('evento.'.$evento->id))
    

</x-ticket-layout>


