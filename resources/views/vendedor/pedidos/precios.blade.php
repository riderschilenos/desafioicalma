<x-app-layout>

    <x-slot name="tl">
            
        <title>Lista de Precios y Comisiones</title>
        
        
    </x-slot>
    
    <div class="container py-6 mt-12 mb-10">
        
        <a href="{{route('vendedor.home.index')}}" class="font-bold text-lg cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800 mt-2 mb-4"></i> Listado de la pedidos</a>
        <h1 class="text-center font-bold text-2xl mb-6">LISTADO DE PRECIO</h1>
        
            <!-- This example requires Tailwind CSS v2.0+ -->
            <x-table-responsive>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Producto
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                P/ Público
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Comisión Invitados
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Comisión Socio
                </th>
            
            
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($productos as $producto)
                
                        <tr>
                        
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{-- comment <div class="flex-shrink-0 h-10 w-10">
                                        @isset($serie->image)
                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($serie->image->url)}}" alt="">
                                        @else
                                            <img class="h-11 w-11 object-cover object-center rounded-full" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                                        @endisset
                                    </div>--}}
                                    <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$producto->name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{$producto->descripcion}}
                                    </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><i class="fa fa-dollar-sign text-gray-400"></i>{{number_format($producto->precio)}}</div>
                                <div class="text-sm text-gray-500">Pesos</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><i class="fa fa-dollar-sign text-gray-400"></i>{{number_format($producto->comision_invitado)}}</div>
                                <div class="text-sm text-gray-500">Pesos</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><i class="fa fa-dollar-sign text-gray-400"></i>{{number_format($producto->comision_socio)}}</div>
                                <div class="text-sm text-gray-500">Pesos</div>
                            </td>

                        
                            
                        
                        </tr>

                @endforeach
            <!-- More people... -->
            </tbody>
        </table>
        </x-table-responsive>
    
    </div>

</x-app-layout>