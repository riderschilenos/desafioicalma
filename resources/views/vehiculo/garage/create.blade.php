<x-app-layout>
    <x-slot name="tl">
            
        <title>Inscribe tu Juguete Rider</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
        <div class="container pb-8 pt-12 my-12">
            
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold text-center">Inscribe tu Juguete Rider</h1>
                    <hr class="mt-2 mb-6">

                    
                    @livewire('vehiculo.vehiculo-inscripcion')


                </div>
            </div>

        </div>

        <x-slot name="js">
            <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
            <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
        </x-slot>
    </x-fast-view>

</x-app-layout>