<x-app-layout>
    
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
        <div class="my-12 mb-10">
            @livewire('vendedor.retiro-comisiones')
        </div>
    </x-fast-view>
    
    
</x-app-layout>