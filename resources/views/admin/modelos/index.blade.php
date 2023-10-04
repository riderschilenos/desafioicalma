@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
    <h1 class="text-center">Lista de modelos</h1>
@stop

@section('content')
    

        <div>
            @livewire('admin.modelos-create')
        </div>
   
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
                        <th>Categoria de producto</th>
                        <th>Marca</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modelos->reverse() as $modelo)
                        <tr>
                            <td>
                                {{$modelo->id}}
                            </td>
                            <td>
                                {{$modelo->category_product->name}}
                            </td>
                            <td>
                                {{$modelo->marca->name}}
                            </td>
                            <td>
                                {{$modelo->name}}
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.disciplinas.edit',$modelo)}}">Agregar Foto</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.modelos.destroy',$modelo)}}" method="POST">
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