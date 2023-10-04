<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-table-responsive>
            <div class="px-6 py-4 flex">
                <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de una serie">
                <a class="btn btn-danger ml-2" href="{{route('organizador.eventos.create')}}">Crear nuevo evento</a>
            </div>

            @if ($eventos->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fechas
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Inscritos
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cupos
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

                        @foreach ($eventos as $serie)
                        
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <a href="{{route('organizador.eventos.edit',$serie)}}">
                                                    @isset($serie->image)
                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="{{Storage::url($serie->image->url)}}" alt="">
                                                    @else
                                                        <img class="h-11 w-11 object-cover object-center rounded-full" src="https://raindance.org/wp-content/uploads/2019/10/filmmaking-1080x675-1.jpg" alt="">
                                                    @endisset
                                                </a>
                                            </div>
                                            <div class="ml-4">
                                                <a href="{{route('organizador.eventos.edit',$serie)}}">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$serie->titulo}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$serie->disciplina->name}}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$serie->fechas->count()}}<i class="fas fa-video text-gray-400"></i></div>
                                        <div class="text-sm text-gray-500">Fechas</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($serie->inscritos)
                                            <div class="text-sm text-gray-900 text-center">{{$serie->inscritos->count()}}</div>
                                            <div class="text-sm text-gray-500 text-center">Inscritos</div>
                                        @endif
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
                                        <div class="text-sm text-gray-500">Capacidad del evento</div>
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
                                        <a href="{{route('organizador.eventos.edit',$serie)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                      
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
                {{$eventos->links()}}
            </div>
    </x-table-responsive>
  
</div>