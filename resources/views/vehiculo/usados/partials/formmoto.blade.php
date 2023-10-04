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

    <div class="mb-4 col-pan-1 md:col-span-2" wire:ignore>
        {!! Form::label('descripcion', 'Descripción') !!}
        {!! Form::textarea('descripcion', null , ['class' => 'form-input block w-full mt-1']) !!}
        
        @error('descripcion')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>

    </div>
{{-- comment
    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del vehiculo</h1>


    
        <div class="grid grid-cols-2 gap-4">
            <figure>
                @isset($vehiculo->image)
                    <img id="picture" class="w-full h-64 object-cover object-contain"src="{{Storage::url($vehiculo->image->url)}}" alt="">
                @else
                    <img id="picture" class="w-full h-64 object-cover object-center"src="https://congresosdeformacion.com/wp-content/uploads/2018/12/fotografia2.jpg" alt="">
                    
                
                @endisset
            </figure>
            <div>
                <p class="mb-2">Saca una foto donde se vea el vehiculo completo y sea facil identidificar sus detalles principales.</p>
                {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                @error('file')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>
        </div>
 --}}
        



    

    
    