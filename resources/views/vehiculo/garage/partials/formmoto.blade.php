
                    <div class="mb-4">
                        
                        {!! Form::label('modelo', 'Modelo:*') !!}
                        {!! Form::text('modelo', null , ['class' => 'form-input block w-full mt-1'.($errors->has('modelo')?' border-red-600':'')]) !!}

                        @error('modelo')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('cilindrada', 'Cilindrada:*') !!}
                        {!! Form::text('cilindrada', null , ['class' => 'form-input block w-full mt-1'.($errors->has('cilindrada')?' border-red-600':'')]) !!}

                        @error('cilindrada')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('año', 'Año:*') !!}
                        {!! Form::text('año', null , ['class' => 'form-input block w-full mt-1'.($errors->has('año')?' border-red-600':'')]) !!}

                        @error('año')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('nro_serie', 'Nro Chasis/Serie: (Opcional)') !!}
                        {!! Form::text('nro_serie', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':'')]) !!}

                        @error('nro_serie')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('aro_front', 'Aro delantero:') !!}
                        {!! Form::number('aro_front', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':''),'step' => '0.5']) !!}

                        @error('aro_front')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        {!! Form::label('aro_back', 'Aro trasero:') !!}
                        {!! Form::number('aro_back', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nro_serie')?' border-red-600':''),'step' => '0.5']) !!}

                        @error('aro_back')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    
                </div>




                

        

                
                
               