<x-app-layout>

    <x-slot name="tl">
            
        <title>Catalogo Carcasas RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">



        <section class=" mt-12 sm:mt-16">
            

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                <article>
                    <figure>
                        <a href="catalogos/catalogomotos_compressed.pdf"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('catalogos/mx-min.jpg')}}" alt=""></a>
                    </figure>
        
                
                </article>
                <article>
                    <figure>
                        <a href="catalogos/catalogomtb_compressed.pdf"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('catalogos/mtb-min.jpg')}}" alt=""></a>
                    </figure>
                
                </article>
                <article>
                    <figure>
                        <a href="catalogos/catalogomultimarca_compressed.pdf"><img class="rounded-xl h-35 w-55 object-cover" src="{{asset('catalogos/Multimarca-min.jpg')}}" alt=""></a>
                    </figure>
                
                </article>
               
            
            </div>
        
        </section>

        <h1 class="text-center text-xs text-gray-400 py-12">Todos Los derechos Reservados</h1>
        

    </x-fast-view>


</x-app-layout>