@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
    <a class="btn btn-secondary btn-sm mx-2 float-right" href="{{route('admin.marcas.create')}}">Nueva Marca</a> 
    
    <h1>Lista de marcas</h1>
    

@stop

@section('content')

    @livewire('admin.marca-image')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop