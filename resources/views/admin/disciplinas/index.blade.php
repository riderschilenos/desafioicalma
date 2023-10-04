@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.disciplinas.create')}}">Nueva Disciplina</a>
    <h1>Lista de disciplinas</h1>
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
                    @foreach ($disciplinas as $disciplina)
                        <tr>
                            <td>
                                {{$disciplina->id}}
                            </td>
                            <td>
                                {{$disciplina->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.disciplinas.edit',$disciplina)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.disciplinas.destroy',$disciplina)}}" method="POST">
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