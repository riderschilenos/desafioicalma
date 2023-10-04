@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>RidersChilenos</h1>
@stop

@section('content')
    
    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.products.create')}}">Nuevo Producto</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>image</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Comisión Invitado</th>
                        <th>Comisión Socio</th>
                        
                        <th colspan="2"></th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>
                            @if ($producto->image)
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img width="60" class="object-cover object-center rounded-full" src="{{Storage::url($producto->image)}}" alt="">    
                                    </div>
                                    <div>
                                        {!! Form::open(['route'=>['admin.producto.imageup',$producto],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                            @csrf

                                        
                                            {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                            

                                            <div class="flex justify-center">
                                                {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                            </div>
                                        
                                        {!! Form::close() !!}
                             
                                    </div>
                                </div>
                                
                            @else
                            {!! Form::open(['route'=>['admin.producto.imageup',$producto],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                            @csrf

                              
                                    {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                 

                                <div class="flex justify-center">
                                    {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                </div>
                            
                            {!! Form::close() !!}
                            @endif
                        </td>
                        <td>{{$producto->name}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->comision_invitado}}</td>
                        <td>{{$producto->comision_socio}}</td>


                        <td width='10px'> 
                            <a class="btn btn-secondary" href="{{route('admin.products.edit', $producto)}}">Edit</a>
                        </td>
                        <td width='10px'>
                            <form action="{{route('admin.products.destroy', $producto)}}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger" type='submit'>Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        
                    <tr>
                        <td colspan="4"> No hay ningun producto registrado</td>
                    </tr>

                    @endforelse
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