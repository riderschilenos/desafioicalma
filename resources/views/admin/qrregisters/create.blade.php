@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Agregar nueva suscripcion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.qrregister.store']) !!}
                @csrf
                
                <div class="form-group">
                    {!! Form::label('type', 'Tipo:') !!}

                        <div class="form-group flex justify-center">
                            <div class="form-check">
                              <input type="radio" name="type" id="propio" value="5000">
                              <label for="propio">
                               QR SILVER
                              </label>
                            </div>
                            <div class="form-check">
                              <input type="radio" name="type" id="propio" value="10000">
                              <label for="propio">
                                QR GOLD
                              </label>
                            </div>
                            


                        </div>
                   

                    <div class="mb-4">
                        {!! Form::label('cant', 'Cuantos desea generar?(Max 12 Unid)') !!}
                        {!! Form::number('cant', null , ['class'=>'form-control', 'placeholder'=>'Ingrese el numero de codigos que desea generar']) !!}
                    
                        @error('cant')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                </div>
                {!! Form::submit('Crear Qrs', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop