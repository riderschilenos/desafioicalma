
                    <h1 class="text-xl pb-4 text-center">Datos Personales</h1>
                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-4 gap-y-8">
                        <div class="md: col-span-2 lg:col-span-2 ">
                            <div class="mb-4">
                                {!! Form::label('name', 'Primer Nombre *') !!}
                                {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                                @error('name')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('second_name', 'Segundo/Tercer Nombre (Opcional)') !!}
                                {!! Form::text('second_name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                                @error('second_name')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('last_name', 'Apellidos*') !!}
                                {!! Form::text('last_name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                                @error('last_name')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('born_date', 'Fecha de nacimiento') !!}
                                {!! Form::date('born_date', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nacimiento')?' border-red-600':''),'autocomplete'=>"off"]) !!}
        
                                @error('born_date')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('rut', 'Rut* (Sin puntos y con guión)') !!}
                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                                @error('rut')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('fono', 'Fono (Opcional)') !!}
                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                                @error('fono')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        {{-- comment 
                        
                        <div>
                            <h1 class="text-xl mb-2 text-center">Foto frontal del carnet</h1>
                            <div class="grid grid-cols-1 gap-4">
                                <figure>
                                    @isset($serie->image)
                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="{{Storage::url($serie->image->url)}}" alt="">
                                        @else
                                        <img id="picture" class="h-56 w-100 object-contain object-center"src="https://nyc3.digitaloceanspaces.com/archivos/elmauleinforma/wp-content/uploads/2021/02/01141319/Cedula-de-identidad-2.jpg" alt="">
                                        
                                    
                                    @endisset
                                </figure>

                                <div>
                                    {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                    @error('file')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        --}}
                    </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-4">
                    
                    <p class="mb-2 mt-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, in magnam sunt ipsa blanditiis eaque libero sed aliquam vel perspiciatis, rem cum ratione alias dignissimos totam unde beatae quo nostrum.</p>
                    
                    <h1 class="text-xl pb-4 text-center">Perfil Rider</h1>

                    <div class="mb-4">
                        {!! Form::label('disciplina_id', 'Disciplina') !!}
                        {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('nro', 'Numero Rider (Moto/Bicicleta)') !!}
                        {!! Form::text('nro', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('nro')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        
                        
                            <div>
                                    {!! Form::label('slug', 'Url de tu perfil') !!}
                                    {!! Form::text('slug', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1']) !!}
                                    
                                    @error('slug')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                            </div>

                            <div>
                                    
                                    
                            </div>
                        
                        
                        
                    </div>
                    
                    <h1 class="text-xl pb-4 text-center">Datos Médicos</h1>

                    <div class="mb-4">
                        {!! Form::label('prevision', 'Prevision de Salud (Fonasa o Isapre? En caso de ser isapre, indicar cual)') !!}
                        {!! Form::text('prevision', null , ['class' => 'form-input block w-full mt-1'.($errors->has('subtitulo')?' border-red-600':'')]) !!}

                        @error('prevision')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    
                    
                </div>
                    