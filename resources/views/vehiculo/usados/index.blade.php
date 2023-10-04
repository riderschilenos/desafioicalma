<x-app-layout>
    <x-slot name="tl">
            
        <title>Usados RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        @livewire('usados-index')

    </x-fast-view>

</x-app-layout>