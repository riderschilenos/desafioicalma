<x-ticket-layout :evento="$evento">

    


    <h1 class="text-2xl font-bold"> 
        Retiros de dinero: {{$evento->titulo}}
    </h1>
    <hr class="mt-2 mb-6">

   @livewire('organizador.retiro-dinero', ['evento' => $evento], key('evento.'.$evento->id))
    

</x-ticket-layout>


