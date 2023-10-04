<x-app-layout>
    <x-slot name="tl">
            
        <title>Vendedores RidersChilenos</title>
        
        
    </x-slot>
    <x-fast-view :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">
       
        <div x-data="setup()">
            <div class="grid grid-cols-3 justify-between">
                <div>

                </div>
                <ul class="flex justify-center items-center my-4">
                    <template x-for="(tab, index) in tabs" :key="index">
                        <li class="cursor-pointer py-3 px-4 rounded transition"
                            :class="activeTab===index ? 'bg-red-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                            x-text="tab"></li>
                    </template>
                
                </ul>
                @if (auth()->user()->vendedor->view==0)
                    <div x-show="activeTab===1">
                        <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                        </form>
                    </div>
                
                @elseif (auth()->user()->vendedor->view==1)
                    <div x-show="activeTab===0">
                        <form action="{{route('vendedor.view.update', auth()->user()->vendedor)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger max-w-xs items-center mt-5 justify-end ml-12"> <i style="font-size:15px" class="fa">&#xf06e;</i></button>
                        </form>
                    </div>
                @endif
                
            </div>
            <div x-show="activeTab===0">
                
                @livewire('vendedor.public-show')
        
       
            </div>
            <div x-show="activeTab===1">
                @livewire('vendedor.pedidos-index')
            </div>
            
        </div>
        @if (auth()->user()->vendedor->view==0)
            <script>
                    function setup() {
                    return {
                    activeTab: 0,
                    tabs: [
                        "Público",
                        "Vendedor"
                    ]
                    };
                };
            </script>
        @elseif (auth()->user()->vendedor->view==1)
            <script>
                    function setup() {
                    return {
                    activeTab: 1,
                    tabs: [
                        "Público",
                        "Vendedor"
                    ]
                    };
                };
            </script>
        @endif
        
    </x-fast-view>
</x-app-layout>