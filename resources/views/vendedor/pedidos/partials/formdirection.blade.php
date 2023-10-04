<div class="mb-4">
    {!! Form::label('calle', 'Calle') !!}
    {!! Form::text('calle', null , ['class' => 'form-input block w-full mt-1'.($errors->has('calle')?' border-red-600':'')]) !!}

    @error('calle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('numero', 'Nro:') !!}
    {!! Form::text('numero', null , ['class' => 'form-input block w-full mt-1'.($errors->has('numero')?' border-red-600':'')]) !!}

    @error('numero')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('block', 'Block (Opcional)') !!}
    {!! Form::text('block', null , ['class' => 'form-input block w-full mt-1'.($errors->has('block')?' border-red-600':'')]) !!}

    @error('block')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('comuna', 'Comuna') !!}
    {!! Form::text('comuna', null , ['class' => 'form-input block w-full mt-1'.($errors->has('comuna')?' border-red-600':'')]) !!}

    @error('comuna')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('region', 'Región / Sucursal') !!}
    {!! Form::text('region', null , ['class' => 'form-input block w-full mt-1'.($errors->has('region')?' border-red-600':'')]) !!}

    @error('region')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

    