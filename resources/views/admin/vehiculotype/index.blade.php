@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.vehiculotype.create')}}">Nuevo vehiculo</a>
    <h1>Tipos de Vehiculo</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculotypes as $vehiculotype)
                        <tr>
                            <td>
                                {{$vehiculotype->id}}
                            </td>
                            <td>
                                {{$vehiculotype->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.vehiculotype.edit',$vehiculotype)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.vehiculotype.destroy',$vehiculotype)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop