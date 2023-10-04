@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Crear nuevo tipo de vehiculo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.vehiculotype.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el tipo de vehiculo']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                </div>
                {!! Form::submit('Crear Vehiculo', ['class'=>'btn btn-primary']) !!}
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