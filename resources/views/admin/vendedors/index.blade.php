@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1 class="text-center">RIDERS CHILENOS</h1>
@stop

@section('content')
   

@if ($vendedors->count())
        @php
            $totalint=0;
            $totalgan=0;
        @endphp
@foreach ($vendedors->reverse() as $vendedor)
   
        @foreach ($vendedor->user->pagos as $pago)
        @php
            $totalint+=$pago->cantidad;
        @endphp               
        @endforeach

        @foreach ($vendedor->user->gastos as $gasto)
        @if ($gasto->gastotype_id==1)
            @php
                $totalgan+=$gasto->cantidad;
            @endphp           
        @endif
        @endforeach



@endforeach 
      
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th style="text-align: center;">Foto</th>
            <th>Nombre</th>
            <th>Fono</th>
            <th>Email</th>
            <th class="text-center">${{number_format($totalint)}}<br>Ventas</th>
            <th class="text-center">${{number_format($totalgan)}}<br>Ganancias</th>
            <th></th>
            
            <th>Estado</th>
            
            <th></th>

        </thead>
        
        <tbody>
            @foreach ($vendedors->reverse() as $vendedor)
                <tr>
                    <td>{{$vendedor->id}}</td>
                    <td style="text-align: center;">                            
                        <img class="object-cover object-center" width="60px" src="{{ $vendedor->user->profile_photo_url }}" alt="">
                    </td>
                    <td>{{$vendedor->user->name}}</td>
                    <td>
                        @if ($vendedor->fono)
                        <a href="https://api.whatsapp.com/send?phone=569{{substr(str_replace(' ', '', $vendedor->fono), -8)}}&text=Hola%20que%20tal" target="_blank">
                            {{str_replace(' ', '', $vendedor->fono)}}
                        </a> 

                        @endif</td>
                    <td>{{$vendedor->user->email}}</td>
                    <td class="text-center">
                        @php
                            $total=0;
                        @endphp
                        @foreach ($vendedor->user->pagos as $pago)
                        
                            @php
                                $total+=$pago->cantidad;
                            @endphp  
                        
                                        
                        @endforeach
                        
                        
                        ${{number_format($total)}}</td>
                    
                    <td class="text-center">
                            @php
                                $total=0;
                            @endphp
                            @foreach ($vendedor->user->gastos as $gasto)
                            @if ($gasto->gastotype_id==1)
                                @php
                                    $total+=$gasto->cantidad;
                                @endphp   
                            @endif
                                            
                            @endforeach
                            
                            
                            ${{number_format($total)}}</td>
                    <td>
                    
                    <td>
                        @if($vendedor->estado==2)
                            {!! Form::open(['route'=>['admin.vendedors.update',$vendedor], 'method'=> 'PUT' ]) !!}
                                @csrf
                            {!! Form::submit('ACTIVO', ['class'=>'btn btn-success cursor-pointer']) !!}
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['route'=>['admin.vendedors.update',$vendedor], 'method'=> 'PUT' ]) !!}
                                @csrf
                            {!! Form::submit('INACTIVO', ['class'=>'btn btn-primary cursor-pointer']) !!}
                            {!! Form::close() !!}
                        @endif
                    
                    </td>
                    <td>
                    </td>
                    <td width="10px">
                        {{-- comment 
                        <a class="btn btn-primary" href="{{route('socio.show', $vendedor)}}">Ver Perfil</a>--}}
                    </td>
                </tr>
                
            @endforeach

        </tbody>
    </table>
</div>


@else
<div class="card-body">
    <strong>No hay registros que coincidan</strong>
</div>


@endif
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop