<div>
    @if (is_null($selectedSocios) && is_null($invitados))
        <div class="bg-gray-100 border-t-4 mb-6 mx-3 border-gray-500 rounded-b text-gray-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
            <div>
        
            <p class="text-base ">
                Debe indicar si el pedido sera para un invitado o un rider registrado. En caso de ser este último, podrá acceder a la información ya registrada, de lo contrario, puede buscar si el invitado a comprado anteriormente o registrar al nuevo cliente como invitado.
            </p>
        </div>
            </div>
        </div>
    @endif
        

    <div class="flex my-auto items-center justify-center" >
        @if(is_null($selectedSocios))   
            <a class="btn btn-danger form-control cursor-pointer" wire:click="updateselectedInvitado">Invitado</a>    
        @endif
        @if(is_null($invitados))
            <a class="btn btn-success ml-2 form-control cursor-pointer" wire:click="updateselectedSocios">Rider Registrado</a>
        @endif
    </div>

    @if(!is_null($invitados))

    @if ($invitado_id)  

        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 pl-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm" role="alert">
                    
            <div class="flex">
                <div class="py-1">
                    @foreach ($guess as $invitado)
                        @if ($invitado->id == $invitado_id)

                            <img class="h-11 w-11 object-cover object-center rounded-full mr-4" src="{{asset('img/compras.jpg')}}" alt=""  />
                    
                        @endif

                    @endforeach
                </div>
                
                <div>
                    
                    @foreach ($guess as $invitado)
                        @if ($invitado->id == $invitado_id)
                            <p class="font-bold">{{$invitado->name.", ".$invitado->rut}}</p>
                            @if ($invitado->direccion)
                                <p class="text-sm">{{$invitado->direccion->comuna.", ".$invitado->direccion->region}} </p>  
                            @endif
                        @endif

                    @endforeach
                </div>

                <span class="relative top-0 bottom-0 right-0 ml-8 py-3" wire:click="resetsocio">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>

        {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
            @csrf
        {!! Form::hidden('user_id',auth()->user()->id) !!}

        {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}

        {!! Form::hidden('invitado_status','asociado') !!}

        {!! Form::hidden('pedidoable_id',$invitado_id) !!}

        <div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm">

                <div class="flex items-center mt-4">
                    <Label class="w-80">Despacho:</Label>
                    <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">--Despacho--</option>

                            <option value="1">Domicilio</option>
                            <option value="2">Sucursal</option>
                            <option value="3">Retiro en tienda</option>
    
                    </select>
                </div>

                <div>
                    @if(!is_null($transportistas))
                        {!! Form::label('transportista_id', 'Transportista') !!}
                        {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                    @endif
                </div>

        </div>


        <div class="flex justify-end">

            {!! Form::submit('Ingresar Pedido', ['class'=>'btn btn-success cursor-pointer ml-2 my-2']) !!}
        </div>
        {!! Form::close() !!}
    @else
    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:keydown="limpiar_page" wire:model="search"  class=" flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg focus:outline-none" placeholder="Buscar..." required autofocus autocomplete="off">
        </div>

        @if ($guess->count())

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

                    @foreach ($guess as $invitado)
     
                            
                            <tr wire:click="updateinvitado_id({{$invitado->id}})">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                                
                                                <img class="h-11 w-11 object-cover object-center rounded-full" src="{{asset('img/compras.jpg')}}" alt=""  />
                                            
                                                
                                            
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm text-gray-900">
                                                {{$invitado->name}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$invitado->email}}</div>
                                    
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$invitado->rut}}</div>
                                    
                                </td>

                                
                                

                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a wire:click="updateinvitado_id({{$invitado->id}})" class="text-indigo-600 hover:text-indigo-900 cursor-pointer">Seleccionar</a>
                                
                                </td>
                            </tr>

                    
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
            
        @else
            <div class="px-6 py-4">
                No hay ningun registro
            </div>
        @endif 

        <div class="px-6 py-4">
            {{$guess->links()}}
        </div>
    </x-table-responsive>

        <h1 class="text-center my-4"> Crea un nuevo invitado a continuacion</h1>
        <div>
            {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
            @csrf
            {!! Form::hidden('user_id',auth()->user()->id) !!}

            {!! Form::hidden('pedidoable_type','App\Models\Invitado') !!}

            {!! Form::hidden('invitado_status','creado') !!}

            @include('vendedor.pedidos.partials.form')


                    <div class="grid grid-cols-2 gap-4">
                    
                    
                        <div class="items-center mt-4">
                            
                            <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Despacho--</option>

                                    <option value="1">Domicilio</option>
                                    <option value="2">Sucursal</option>
                                    <option value="3">Retiro en tienda</option>
            
                            </select>
                        </div>

                        <div>
                            @if(!is_null($transportistas))
                                {!! Form::label('transportista_id', 'Transportista:') !!}
                                {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                            @endif
                        </div>
                    
                        <div>
                        </div>
            
                    </div>
                    <div class="flex justify-end">
                    
                        {!! Form::submit('Ingresar Pedido', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
                    </div>
                {!! Form::close() !!}
        </div>
        
    @endif
       

            <div class="flex justify-end">
                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
           
            </div>

       
        
        
        
    @endif

    @if(!is_null($selectedSocios))
        @if(is_null($socio_id))
        
            <x-table-responsive>
                <div class="px-6 py-4">
                    <input wire:keydown="limpiar_page" wire:model="search"  class="flex-1 w-full shadow-sm  border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg" placeholder="Buscar..." required autofocus autocomplete="off">
                </div>

                @if ($socios->count())

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
                              
                                    
                                    <tr wire:click="updatesocio_id({{$socio->id}})" >
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
                    </table>
                    
                @else
                    <div class="px-6 py-4">
                        No hay ningun registro
                    </div>
                @endif 

                <div class="px-6 py-4">
                    {{$socios->links()}}
                </div>
            </x-table-responsive>

            <div class="flex justify-end">
                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                
            </div>
        @else    

            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-teal-900 pl-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm" role="alert">
                
                <div class="flex">
                    <div class="py-1">
                        @foreach ($selectedSocios as $socio)
                            @if ($socio->id == $socio_id)

                                <img class="h-11 w-11 object-cover object-center rounded-full mr-4" src="{{ $socio->user->profile_photo_url }}" alt=""  />
                        
                            @endif

                        @endforeach
                    </div>
                    
                    <div>
                        
                        @foreach ($selectedSocios as $socio)
                            @if ($socio->id == $socio_id)
                                <p class="font-bold">{{$socio->user->name.", ".$socio->rut}}</p>
                                @if ($socio->direccion)
                                    <p class="text-sm">{{$socio->direccion->comuna.", ".$socio->direccion->region}} </p>  
                                @endif
                               
                            @endif

                        @endforeach
                    </div>

                    <span class="relative top-0 bottom-0 right-0 ml-8 py-3" wire:click="resetsocio">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cancelar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>

            {!! Form::open(['route' => 'vendedor.pedidos.store', 'method'=> 'POST']) !!}
                @csrf
            {!! Form::hidden('user_id',auth()->user()->id) !!}

            {!! Form::hidden('pedidoable_type','App\Models\Socio') !!}

            {!! Form::hidden('pedidoable_id',$socio_id) !!}

            <div class="bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-4 mx-auto items-center max-w-sm">

                    <div class="flex items-center mt-4">
                        <Label class="w-80">Despacho:</Label>
                        <select wire:model="selecteddespacho" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight  focus:bg-white focus:border-gray-500">
                            <option value="">--Despacho--</option>

                                <option value="1">Domicilio</option>
                                <option value="2">Sucursal</option>
                                <option value="3">Retiro en tienda</option>
          
                        </select>
                    </div>

                    <div>
                        @if(!is_null($transportistas))
                            {!! Form::label('transportista_id', 'Transportista') !!}
                            {!! Form::select('transportista_id', $transportistas, null , ['class'=>'form-input block w-full mt-1']) !!}
                        @endif
                    </div>
        
            </div>


            <div class="flex justify-end">
                <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                {!! Form::submit('Ingresar Pedido', ['class'=>'btn btn-success cursor-pointer ml-2']) !!}
            </div>

        {!! Form::close() !!}
            
            
                    

        @endif 

        

    @endif

</div>