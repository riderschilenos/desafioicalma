@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
        @if(session('info'))

             <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Exito!</strong> {{session('info')}}
              </div>



        @endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method' => 'put']) !!}

            @include('admin.roles.partials.form')

            

            {!! Form::submit('Actualizar Rol', ['class'=>'btn btn-primary mt-2']) !!}


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