@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
<div>
   
        @php
            $total=0;
        @endphp
    
        @foreach ($gastosok->reverse() as $ga) 
            @if ($ga->gastotype_id>3)
                @php
                    $total=$total+$ga->cantidad;
                @endphp
            @endif
            
    
        @endforeach

        

</div>
    <h1 class="float-right"> ${{number_format($total)}}</h1>
    <h1>Gastos</h1>
    
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
                {!! Form::open(['route'=>'admin.gastos.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                @csrf
                {!! Form::hidden('user_id', NULL ) !!}
                {!! Form::hidden('metodo', 'TRANSFERENCIA' ) !!}
                {!! Form::hidden('estado', '2' ) !!}
                    <thead>
                        <tr>
                            
                            <th>{!! Form::label('gastotype_id', 'Tipo de gastos:') !!}{!! Form::select('gastotype_id', $gastotypes, null , ['class'=>'form-input ml-2']) !!}</th>
                            <th>{!! Form::label('detalle','Detalle: ') !!}{!! Form::text('detalle',null, ['class'=>'form-input ml-2','placeholder'=>'Detalle']) !!}</th>
                            <th>{!! Form::label('cantidad','Cantidad: ') !!}{!! Form::text('cantidad',null, ['class'=>'form-input ml-2','placeholder'=>'Cantidad en pesos $']) !!}</th>
                            <th>Boleta <input type="file" name="file" id=""></th>
                            
                            
                            <th>
                                <form action="" >
                            

                                    <button class="btn btn-primary" type="submit">Nuevo Gasto</button>
                                </form> 
                            </th>
                        </tr>
                    </thead>
                {!! Form::close() !!}
                
            </table>
            
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                        <th>Metodo</th>
                        <th>Cantidad</th>
                        <th>Comprobante</th>
                        
                        <th>Fecha</th>


                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($gastosok as $gasto)

                    @if ($gasto->gastotype_id>3)
                        <tr>
                            <td>{{$gasto->id}}</td>                       
                            <td>{{$gasto->gastotype->name}}</td>
                            <td>
                                @if ($gasto->detalle)
                                    {{$gasto->detalle}}
                                @endif
                            </td>
                            <td>{{$gasto->metodo}}</td>
                            <td>${{number_format($gasto->cantidad)}}</td>
                            <td>
                                <img class="object-cover object-center" width="60px" src="{{Storage::url($gasto->comprobante)}}" alt="">
                            
                            </td>
                            <td>{{$gasto->created_at->format('d-m-Y H:i:s')}}</td>
                           
                            
                        </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
            
        </div>

        <div class="card-footer">
            {{$gastosok->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop