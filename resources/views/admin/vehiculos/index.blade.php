@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.vehiculo.create')}}">Nueva Vehiculo</a>
    <h1>Lista de Vehiculos</h1>
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
                        <th style="text-align: center;">Imagen</th>
                        <th>Marca</th>
                        
                        
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Usuario</th>
                        <th>Estado</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculos->reverse() as $vehiculo)
                        <tr>
                            <td>
                                {{$vehiculo->id}}
                            </td>
                            <td style="text-align: center;">
                                @if($vehiculo->image->first())
                
                                    <img class="object-cover object-center" width="60px" src="{{Storage::url($vehiculo->image->first()->url)}}" alt="">
                                    
                                @else
                                    <img class="object-cover object-center" width="60px" src="https://www.greenmedical.cl/wp-content/uploads/2019/10/producto-sin-imagen.png" alt="">
                                
                                @endif
                               

                            </td>
                            <td>
                                {{$vehiculo->marca->name}}
                            </td>
                            
                            
                            <td>
                                {{$vehiculo->modelo}}
                            </td>
                            <td>
                                {{$vehiculo->año}}
                            </td>
                            <td>
                                {{$vehiculo->user->name}}
                            </td>

                            <td>
                                
                                @switch($vehiculo->status)
                                        @case(0)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Desactivado
                                            </span>
                                            @break
                                        @case(1)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Borrador
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pre-Inscripción
                                            </span>
                                            @break
                                        @case(3)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado Ok
                                            </span>
                                            @break
                                        @case(4)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Publicado Pendiente
                                          </span>
                                          @break
                                        @case(5)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Registrado
                                          </span>
                                          @break
                                        @case(6)
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              Registrado-Venta
                                          </span>
                                          @break
                                          
                                      @default
                                          
                                    @endswitch
                            </td>
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('garage.vehiculo.show',$vehiculo)}}">
                                    <svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('garage.image',$vehiculo)}}">Fotos</a>
                            </td>
                            <td width="10px">
                                @switch($vehiculo->status)
                                        
                                        @case(1)
                                            <a class="btn btn-primary btn-sm" href="{{route('garage.comision',$vehiculo)}}">Comision</a>
                                            @break
                                        @case(2)
                                            <a class="btn btn-primary btn-sm" href="{{route('garage.comision',$vehiculo)}}">Comision</a>
                                            @break
                                        @case(3)
                                            <a class="btn btn-primary btn-sm" href="{{route('garage.comision',$vehiculo)}}">Comision</a>
                                            @break
                                        @case(4)
                                        <a class="btn btn-primary btn-sm" href="{{route('garage.comision',$vehiculo)}}">Comision</a>
                                          @break
                                        @case(5)
                                        <a class="btn btn-primary btn-sm" href="{{route('garage.inscripcion',$vehiculo)}}">Inscripción</a>
                                          @break
                                        @case(6)
                                        <a class="btn btn-primary btn-sm" href="{{route('garage.inscripcion',$vehiculo)}}">Inscripción</a>
                                          @break
                                          
                                      @default
                                          
                                    @endswitch
                                
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.vehiculo.destroy',$vehiculo)}}" method="POST">
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