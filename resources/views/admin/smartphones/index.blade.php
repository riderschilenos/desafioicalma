@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
    <h1 class="text-center">Carcasas de Smartphone's</h1>
@stop

@section('content')


        <div>
            @livewire('admin.smartphone-create')
        </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop