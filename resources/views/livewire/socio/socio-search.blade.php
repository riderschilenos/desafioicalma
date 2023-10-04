<div class="mb-8">
    @php

    $bicicletas=0;
    $motos=0;

        foreach ($sociosfull as $socio) {
            
           
                if ($socio->disciplina_id==2 or $socio->disciplina_id==4 or $socio->disciplina_id==5 or $socio->disciplina_id==8 ) {
                    $bicicletas+=1;}
                else {
                    $motos+=1;
                
                }    
            
            
        }


    @endphp
     <div>
        <h1 class="text-center font-bold mt-4 text-2xl">¿Cuántos Riders Hay en Chile?</h1>
    </div>

            <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4 mx-4">
                
                <div>
            
                </div>
               
                <div class="hidden sm:block">
                    <div class="flex justify-end mr-4 ">
            
                        
                        <div class="grid grid-cols-3 gap-3">
                                <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas+$motos}}<br> TOTAL</button>
                                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
                                <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center">{{$bicicletas}}<br> BICICLETA</button>
                               
                        </div>
                        
            
                    </div>
                </div>
                <div class="block sm:hidden">
                    <div class="flex justify-center ">
            
                        
                            
                            <button class="btn bg-red-600 text-white w-full max-w-xs items-center justify-items-center mr-2">{{$bicicletas+$motos}}<br> TOTAL</button>
                     
                            <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ">{{$motos}}<br> MOTO</button>
                       
                      
                            <button class="btn bg-gray-900 text-white w-full max-w-xs items-center justify-items-center ml-2">{{$bicicletas}}<br> BICICLETA</button>
                            
                        
            
                    </div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 lg:grid-cols-3 gap-x-4">
                   
                <div>

                </div>
               
                <div class="hidden sm:block">
                    <div class="flex justify-center mr-4 ">

                        
                            @if(auth()->user())
                                @if(auth()->user()->socio)
                                    <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('socio.show', auth()->user()->socio) }}">
                                        <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Perfil</button>
                                    </a>
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Suscripción</button>
                                    </a>
                                    </div>
                                @else
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                    </a>
                                @endif
                            @else
                                <a href="{{route('socio.create')}}">
                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                </a>
                            @endif    
                        

                    </div>
                </div>
                <div class="block sm:hidden">
                    <div class="flex justify-center ">

                        
                            @if(auth()->user())
                                @if(auth()->user()->socio)
                                    <a href="{{ route('socio.show', auth()->user()->socio)}}">
                                        <button class="btn btn-primary w-full max-w-xs items-center justify-items-center ">Mi Perfil</button>
                                    </a>
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center ml-2">Suscripción</button>
                                    </a>
                                @else
                                    <a href="{{route('socio.create')}}">
                                        <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                    </a>
                                @endif
                            @else
                                <a href="{{route('socio.create')}}">
                                    <button class="btn btn-success w-full max-w-xs items-center justify-items-center">Crear Perfil Rider</button>
                                </a>
                            @endif    
                        

                    </div>
                </div>
            </div>
        <div class="px-6 py-4">
            <input wire:keydown="limpiar_page" wire:model="search"  class="form-input flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Ingrese el nombre de un rider" autocomplete="off">
        </div>



        @if ($socios->count())

            {{--  
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rut
                        </th>
                    
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($socios as $socio)
                    
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                                
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{ $socio->user->profile_photo_url }}" alt=""  />
                                            
                                                
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm text-gray-900">
                                                {{$socio->name}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$socio->email}}</div>
                                    
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$socio->rut}}</div>
                                    
                                </td>

                                
                                

                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a wire:click="updatesocio_id({{$socio->id}})" class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Seleccionar</a>
                                
                                </td>
                            </tr>

                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>--}}
            <section class="mb-4 pt-2 pb-12">
               
                <div class="max-w-7xl mx-auto px-2 sm:px-2 lg:px-6 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-x-2 gap-y-4">

                    @foreach ($socios as $socio)

                        

                            <x-socio-card :socio="$socio" />

                        
        
                    @endforeach
        
                </div>
            
            </section>
            
            
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 

        <div class="px-6 py-4">
            {{$socios->links()}}
        </div>




</div>
