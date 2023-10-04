<x-app-layout>
    <x-slot name="tl">
            
        <title>Videos RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
    
        <section class="bg-cover bg-center" style="background-image: url({{asset('img/home/video.jpg')}})">

            <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-8 py-16">
                <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">RidesChilenos</h1>
                <p class="text-white text-lg mt-2 mb-4">Busca las mejores series riders del país.</p>
                    <!-- component -->
                    <!-- This is an example component -->
                    
                    @livewire('search')

                    
                </div>
            </div>

        </section>

        @livewire('series-index')

    </x-fast-view>

</x-app-layout>