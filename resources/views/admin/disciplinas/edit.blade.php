@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Editar Disciplina</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary">
            {{session('info')}}

        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($disciplina,['route'=>['admin.disciplinas.update',$disciplina], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la disciplina']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                </div>
                {!! Form::submit('Actualizar Disciplina', ['class'=>'btn btn-primary']) !!}
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