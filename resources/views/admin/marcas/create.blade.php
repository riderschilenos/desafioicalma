@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Crear nueva Marca</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.marcas.store']) !!}
                @csrf
                
                <div class="form-group">
                    <div class="mb-4">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la marca']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('disciplina_id', 'Disciplina') !!}
                        {!! Form::select('disciplina_id', $disciplinas, null , ['class'=>'form-input block w-full mt-1']) !!}
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                </div>
                {!! Form::submit('Crear Marca', ['class'=>'btn btn-primary']) !!}
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