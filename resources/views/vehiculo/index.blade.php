<x-app-layout>

    <x-slot name="tl">
            
        <title>Registro Online Riders Chilenos</title>
        
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
        <h1 class="text-xs font-bold text-center my-1">Registro Nacional de Motos y Bicicletas</h1>
        <div class="max-w-7xl mx-auto pb-8 ">      
            <div class="card">
                <div class="card-body">
                    
                    
                        

                         

                    
                        
                    @livewire('vehiculo.vehiculo-search')
                
                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </x-fast-view>

</x-app-layout>