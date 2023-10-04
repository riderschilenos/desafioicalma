@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Observaciones de la serie: <strong>{{$serie->titulo}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.series.reject', $serie]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones de la serie') !!}
                    {!! Form::textarea('body', null ) !!}
                    @error('body')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Rechazar serie', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop