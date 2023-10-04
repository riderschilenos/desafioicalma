@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Series pendientes de aprobación</h1>
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
                        <th>Titulo</th>
                        <th>Filmmaker</th>
                        <th>Disciplina</th>
                        <th></th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($series as $serie)
                        <tr>
                            <td>{{$serie->id}}</td>
                            <td>{{$serie->titulo}}</td>
                            <td>{{$serie->productor->first()->name}}</td>
                            <td>{{$serie->disciplina->name}}</td>
                            <td>
                                <a class="btn btn-primary"    href="{{route('admin.series.show',$serie )}}">Revisar</a>
                            </td>
                        </tr>
                        
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{$series->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop