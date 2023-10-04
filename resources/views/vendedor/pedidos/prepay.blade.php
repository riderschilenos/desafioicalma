<x-app-layout>

    <x-slot name="tl">
            
        <title>Pagar Pedidos RCH</title>
        
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
        <div class="my-12">
            @livewire('vendedor.pedidos-pay')
        </div>
    </x-fast-view>
    
    
</x-app-layout>