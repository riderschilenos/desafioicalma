
<x-app-layout>
    <x-slot name="tl">
            
        <title>Estadisticas RidersChilenos</title>
        
        
    </x-slot>
    
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 mt-6 lg:px-8">
            @livewire('admin.money-info')
        </div>
        <div class="flex justify-center mb-2 mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="max-w-7xl w-full rounded-lg my-2 mx-4">
                @livewire('admin.contabilidad')
            </div>
        </div>
    </x-fast-view>

   

</x-app-layout > 

