
                    <h1 class="text-xl pb-4 text-center">Datos Personales</h1>
                    <div class=" mx-auto px-2 sm:px-2 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-4 gap-y-8">
                        <div class="md: col-span-3 lg:col-span-3 ">
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
                                {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':''), 'id' => 'rut-input']) !!}

                                @error('rut')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('fono', 'Fono*') !!}
                                {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}

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
                    
                    <p class="mb-2 mt-6 hidden">Los datos entregados en la seccion anterior en caso de ser necesario podrian ser validados al momento de querer comprar y vender un vehiculo.</p>
                    
                    <h1 class="text-xl pb-4 text-center">Perfil Rider</h1>

                    @isset($evento)

                        {!! Form::hidden('disciplina_id', $evento->disciplina_id ) !!}
                        
                    @else
                        <div class="mb-4">
                            {!! Form::label('disciplina_id', 'Disciplina') !!}
                            {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                        </div>
                    @endisset

                    
{{-- comment
                    <div class="mb-4">
                        {!! Form::label('nro', 'Numero Rider (Moto/Bicicleta)') !!}
                        {!! Form::text('nro', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}

                        @error('nro')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
 --}}
                    <div class="mb-4">
                        
                        
                            <div>
                                    {!! Form::label('username', 'Nombre de usuario* (puedes usar el mismo de instagram)') !!}
                                    {!! Form::text('username', null , ['class' => 'form-input block w-full mt-1'.($errors->has('titulo')?' border-red-600':'')]) !!}
                                    @error('username')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                            </div>

                            <div>
                                    <div class="mb-4">
                                        {!! Form::label('slug2', 'Slug',['class'=>'hidden']) !!}
                                        {!! Form::text('slug2', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1','placeholder'=>'www.riderschilenos.cl/']) !!}
                                    </div>
                                    <div class="mb-4 hidden">
                                        {!! Form::label('slug', 'Slug',['class'=>'hidden']) !!}
                                        {!! Form::text('slug', null , ['readonly'=>'redonly','class' => 'form-input block w-full mt-1','placeholder'=>'www.riderschilenos.cl/']) !!}
                                    </div>
                                    @error('slug')
                                        <strong class="text-xs text-red-600">{{$message}}</strong>
                                    @enderror
                            </div>
                        
                        
                        
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const rutInput = document.getElementById('rut-input');
                            
                            rutInput.addEventListener('input', function () {
                                // Remover todos los caracteres que no sean números o guiones
                                const cleanedValue = this.value.replace(/[^0-9-]/g, '');
                                
                                // Aplicar el nuevo valor limpio al campo de entrada
                                this.value = cleanedValue;
                            });
                        });
                        </script>
                        
                        
                        
                     {{-- comment 
                    <h1 class="text-xl pb-4 text-center">Datos Médicos</h1>

                    @php
                        $prev=['Fonasa'=>'Fonasa','Isapre'=>'Isapre'];
                    @endphp
                   
                    <div class="mb-4">
                        {!! Form::label('prevision', 'Prevision de Salud (Fonasa o Isapre? En caso de ser isapre, indicar cual)') !!}
                        {!! Form::select('prevision', $prev, null , ['class'=>'form-input block w-full mt-1']) !!}
                    
                        @error('prevision')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
--}}
                    
                    
                </div>
                    