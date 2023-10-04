<x-app-layout>

    <x-slot name="tl">
            
        <title>Portal Riders Chilenos</title>
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
    </x-fast-view>

</x-app-layout > 

