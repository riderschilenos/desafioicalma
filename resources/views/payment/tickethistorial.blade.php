<x-app-layout>
    <x-slot name="tl">
            
        <title>Historial de Tickets - {{$user->name}}</title>
    </x-slot>
  
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
        <div class="min-h-screen bg-blue-900">
            @livewire('evento-view', ['user' => $user], key($user->id))
        </div>
    </x-fast-view>

</x-app-layout>