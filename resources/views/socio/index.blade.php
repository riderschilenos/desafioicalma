<x-app-layout>

    <x-slot name="tl">
            
        <title>Lista de Riders</title>
        
        
    </x-slot>

    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2"  :disciplinas="$disciplinas">
    
        <div class="max-w-7xl mx-auto py-8">

            <div class="card">
                
                    

                  

                   
                <h1 class="text-center text-2xl font-bold my-4">Auspiciadores</h1>   
                <div class="grid grid-cols-3 md:hidden justify-center">
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo1.png') }}" alt="Auspiciador 1" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo2.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo3.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo4.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo5.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo6.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2 col-span-3">
                        <img src="{{ asset('img/home/logos/logo9.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <!-- Repite este patrón para los otros auspiciadores -->
                </div>
                <div class="hidden md:grid grid-cols-6 justify-center">
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo1.png') }}" alt="Auspiciador 1" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo2.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo3.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo4.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo5.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('img/home/logos/logo6.png') }}" alt="Auspiciador 2" class="">
                    </div>
                    <div class="p-2 col-span-2">
        
                    </div>
                    <div class="p-2 col-span-2">
                        <img src="{{ asset('img/home/logos/logo9.png') }}" alt="Auspiciador 2" class="">
                    </div>
                  
                    <!-- Repite este patrón para los otros auspiciadores -->
                </div>

                
            </div>

        </div>  

    </x-fast-view>

</x-app-layout>