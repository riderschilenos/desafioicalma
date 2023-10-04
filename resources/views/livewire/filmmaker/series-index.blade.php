<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-table-responsive>
            <div class="px-6 py-4 flex">
                <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de una serie">
                <a class="btn btn-danger ml-2" href="{{route('filmmaker.series.create')}}">Nuevo Proyecto</a>
            </div>

            @if ($series->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Videos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sponsors
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($series as $serie)
                        
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @isset($serie->image)
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($serie->image->url)}}" alt="">
                                                @else
                                                    <img class="h-11 w-11 object-cover object-center rounded-full" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                                                @endisset
                                            </div>
                                            <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$serie->titulo}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{$serie->disciplina->name}}
                                            </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$serie->Videos->count()}} <i class="fas fa-video text-gray-400"></i></div>
                                        <div class="text-sm text-gray-500">Videos</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$serie->Sponsors->count()}}</div>
                                        <div class="text-sm text-gray-500">Sponsors</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 flex items-center">{{$serie->rating}}
                                            <ul class="ml-2 flex text-sm">
                                            <li class="mr-1">
                                                <i class="fas fa-star text-{{$serie->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1">
                                            <i class="fas fa-star text-{{$serie->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1">
                                                <i class="fas fa-star text-{{$serie->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1">
                                            <i class="fas fa-star text-{{$serie->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1">
                                            <i class="fas fa-star text-{{$serie->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="text-sm text-gray-500">Valoración del curso</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">    

                                        @switch($serie->status)
                                            @case(1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Borrador
                                                </span>
                                                @break
                                            @case(2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Revisión
                                                </span>
                                                @break
                                            @case(3)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Publicado
                                                </span>
                                                @break
                                            @default
                                                
                                        @endswitch
                                            
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('filmmaker.series.edit',$serie)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                      
                                    </td>
                                </tr>

                        @endforeach
                    <!-- More people... -->
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningun registro coincidente
                </div>
            @endif 
            <div class="px-6 py-4">
                {{$series->links()}}
            </div>
    </x-table-responsive>
  
</div>
