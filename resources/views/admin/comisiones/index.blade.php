@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
<div>
   
        @php
            $total=0;
        @endphp
    
        @foreach ($gastos->reverse() as $ga) 
            @php
                    $total=$total+$ga->cantidad;
                    
            @endphp
    
        @endforeach

        

</div>
    <h1 class="float-right"> ${{number_format($total)}}</h1>
    <h1>Pagos pendientes de aprobación</h1>
    
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    
   @livewire('admin.comisiones-pay')

   @livewire('organizador.retiros-pay')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop