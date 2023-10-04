<div class="mb-4">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null , ['class' => 'form-input block w-full mt-1'.($errors->has('name')?' border-red-600':'')]) !!}

    @error('name')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('rut', 'Rut') !!}
    {!! Form::text('rut', null , ['class' => 'form-input block w-full mt-1'.($errors->has('rut')?' border-red-600':'')]) !!}

    @error('rut')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('fono', 'Fono') !!}
    {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}

    @error('fono')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null , ['class' => 'form-input block w-full mt-1'.($errors->has('email')?' border-red-600':'')]) !!}

    @error('email')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>


