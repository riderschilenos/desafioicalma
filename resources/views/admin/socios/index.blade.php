@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Riders</h1>
@stop

@section('content')

    @livewire('admin.socios-index')

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop