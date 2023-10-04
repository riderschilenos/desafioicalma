@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.precios.create')}}">Agregar Precio</a>
    <h1>Lista de precios:</h1>
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
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($precios as $precio)
                        <tr>
                            <td>{{$precio->id}}</td>
                            <td>{{$precio->name}}</td>
                            <td>{{$precio->value}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.precios.edit', $precio)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.precios.destroy', $precio)}}" method ="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit"> Eliminar</button>
                                
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