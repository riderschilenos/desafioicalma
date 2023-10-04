<x-vendedor-layout>
    <x-slot name="tl">
            
        <title>Diseños Pedido Nro: {{$pedido->id}}</title>
        
        
    </x-slot>
    <x-slot name="pedido">
        {{$pedido->id}}
    </x-slot>
    
    <x-fast-view-vendedor :riders="$riders" :autos="$autos" :series="$series" :socio2="$socio2" :disciplinas="$disciplinas">

        
        <div class="mb-20">
                   
                    <div class="grid grid-cols-2">
                        <div>
                            <h1 class="text-xl font-bold col-span-3">Diseños del Pedido Nro: {{$pedido->id}}</h1>
                        </div>
                    @if ($pedido->status==1 || $pedido->status==2)
                    
                        <div class="ml-auto">
                            <form action="{{route('vendedor.pedidos.destroy',$pedido)}}" method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                            </form>
                        </div>
                    @endif
                    </div>
                    <hr class="mt-2 mb-6">

                    <div class="max-w-7xl px-4 sm:px-6 lg:px-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-x-2 gap-y-2 ">
                        


                       <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-6 lg:px-8 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 ">

                            @foreach ($pedido->ordens as $orden)
                        
                                @foreach ($orden->lotes as $lote)
                                    
                                    <label class="w-full flex flex-col px-4 pb-4 pt-2 mb-3 bg-white text-blue rounded-lg shadow-lg  uppercase border border-blue hover:bg-blue ">
                                        
                                        <svg class="w-8 h-8 cursor-pointer hover:text-gray-500 mx-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" wire:click="download({{$lote}})">
                                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        
                                        <span class="mt-2 text-base leading-normal text-center">Lote N° {{$lote->id}}</span>
                                        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-y-2">
                                            @foreach($lote->ordens as $orden)
                                                <div class="p-1 mx-1 rounded-lg btn-danger text-center">
                                                    {{$orden->id}}
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                    </label>
                                @endforeach
                                
                                
                            @endforeach

                        </div>
            
                  
                    

                

                <x-slot name="js">
                    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
                    <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
                </x-slot>
        </div>
    </x-fast-view>
</x-vendedor-layout> 