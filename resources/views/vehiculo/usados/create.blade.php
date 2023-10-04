<x-app-layout>
    <x-slot name="tl">
            
        <title>Vende tu Juguete Rider</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <div class="container pb-8 pt-12 my-12">  
            <div class="card">
                <div class="card-body">
                    <div class="grid grid-cols-3">
                        <a href="{{route('garage.vehiculos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Mis Vehiculos</a>
            
                        <h1 class="text-2xl font-bold text-center">Vende tu Juguete Rider</h1>
                    </div>
                    <hr class="mt-2 mb-6">

                    

                    @livewire('vehiculo.vehiculo-create')
                    
                    
                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        </x-slot>
    </x-fast-view>
    
</x-app-layout>