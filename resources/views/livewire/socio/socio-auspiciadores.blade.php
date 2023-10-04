<div>
    <div class="@if ($socio->user->auspiciadors->count())bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm @else bg-white @endif">
        @if ($socio->user->auspiciadors->count())
            <h3 class="text-gray-600 text-sm text-semibold text-center">Auspiciadores</h3>
        @endif
        

        <div class="grid grid-cols-3 @if ($socio->user->auspiciadors->count())bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm @else bg-white @endif">
            @if ($socio->user->auspiciadors->count())
            
                @foreach ($socio->user->auspiciadors as $auspiciador)
                    @if ($current)

                        @if ($auspiciador->id!=$current->id)
                            <div class="text-center my-auto" >          
                                <img class="h-20 w-26 mx-auto object-contain"
                                src="{{Storage::url($auspiciador->logo)}}"
                                alt="" wire:click="show({{$auspiciador}})">
                            </div>
                        @endif
                        
                    @else
                        <div class="text-center my-auto" >          
                            <img class="h-20 w-26 mx-auto object-contain"
                            src="{{Storage::url($auspiciador->logo)}}"
                            alt="" wire:click="show({{$auspiciador}})">
                        </div>
                    @endif
                @endforeach
            @else
                <ul class="@can('perfil_propio', $socio)col-span-2 @else col-span-3 @endcan bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                    
                        @can('perfil_propio', $socio)
                            <li class="items-center py-3 mx-auto" wire:click="formulario">
                                <h1 class="text-center text-xs">Agrega tu primer auspiciador</h1>
                            </li>
                        @else
                            <li class="items-center py-3 mx-auto">
                                <h1 class="text-center text-xs">{{$socio->user->name}} aun no cuenta con auspiciadores</h1>
                            </li>
                        @endcan
                                                
                    
                
                </ul>
            @endif
            
            @can('perfil_propio', $socio)
                @if (!$formulario)
                    <div class="rounded text-center m-auto py-auto cursor-pointer items-center bg-white">
                        <img class="h-8 w-12 mx-auto object-contain p-1 my-auto"
                        src="{{asset('img/socio/addnew2.png')}}"
                        alt="" wire:click="formulario">
                        <h1 class="text-center text-xs">Nuevo</h1>
                    </div>
                @endif
            @endcan
        </div>
    </div>

    @if ($current)
        @foreach ($socio->user->auspiciadors as $auspiciador)
            @if ($auspiciador->id==$current->id)
                <div class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow px-3 mt-3">
                    <div class="col-span-3  divide-y rounded shadow-sm" wire:click="show({{$current}})">
                        <div class="grid grid-cols-3">
                            <div>
                                <div class="text-center my-2" >          
                                    <img class="h-16 w-20 mx-auto object-contain"
                                    src="{{Storage::url($current->logo)}}"
                                    alt="">
                                </div>
                            </div>
                            <div class="col-span-2 items-center my-auto mx-auto py-3 px-5">
                                <h1 class="text-center text-xl font-bold cursor-pointer">{{$current->name}}</h1>
                                        
                            </div>
                        </div>
                        <h1 class="text-center py-3 cursor-pointer">{{$current->beneficio}}</h1>
                         
                    </div>
                    @can('perfil_propio', $socio)
                        <h1 class="text-center text-xs py-1 cursor-pointer" wire:click="destroy({{$auspiciador}})">(Eliminar)</h1> 
                    @endcan
                </div>
                
            @endif
        @endforeach
    @endif
        

    @if ($formulario)
        <article class="my-4 text-center">
        
        
            {!! Form::open(['route'=>'socio.auspiciadors.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
            @csrf
    
            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-2 mt-6">
                <div class="">
                        
                    {!! Form::label('name', 'Nombre del auspiciador:*') !!}
                    {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}
            
                    @error('name')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="">
                        
                    
                    <div class="grid grid-cols-1">
                        <h1 class="py-2">Logo*</h1>
                        {!! Form::file('logo', ['class'=>'form-input w-full'.($errors->has('logo')?' border-red-600':''), 'id'=>'logo','accept'=>'image/*']) !!}
                        
                    </div>
                    <hr class="w-full mt-2 mb-4">
    
    
                    @error('logo')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div>
                        
                    {!! Form::label('beneficio', '¿En que te apoya tu auspiciador?') !!}
                    {!! Form::textarea('beneficio', null , ['class' => 'form-input block w-full mt-1'.($errors->has('beneficio')?' border-red-600':''),'placeholder'=>'Describe brevemente como es tu relacion y el apoyo que te brinda especificamente esta marca o persona...']) !!}
            
                    @error('beneficio')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                    @enderror
                </div>
    
                
                    {!! Form::hidden('auspiciadorable_id', $socio->user_id ) !!}

                    {!! Form::hidden('auspiciadorable_type','App\Models\User') !!}

                    {!! Form::hidden('socio_id',$socio->id) !!}
    
                <div class="flex justify-center">
                    <a class="btn btn-danger mr-2 ml-auto" wire:click="formulario">Cancelar</a> 
                    {!! Form::submit('Guardar', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    {!! Form::close() !!}
                </div>
    
            
                                                       
            
        </article>
    @endif 

</div>
