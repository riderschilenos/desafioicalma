@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    @if ($pagos->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vendedor</th>
                            <th>Pedidos</th>
                            <th>Metodo</th>
                            <th>Cantidad</th>
                            <th>Comprobante</th>
                            <th></th>
                            <th></th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>{{$pago->id}}</td>
                                <td> 
                                    @foreach ($pago->pedidos as $pedido)
                                        {{$pedido->vendedor->name}} <br>
                                    @endforeach
                                    
                                </td>
                                <td> 
                                    @foreach ($pago->pedidos as $pedido)
                                        @php
                                        $subtotal=0;
                                        @endphp
            
                                        @if($pedido->pedidoable_type=="App\Models\Socio")
                                        @foreach ($pedido->ordens as $orden)
                                        @php
                                            
                                            $subtotal+=$orden->producto->precio-$orden->producto->descuento_socio;
            
                                        @endphp    
                                        @endforeach
            
                                        @endif
                                        @if($pedido->pedidoable_type=="App\Models\Invitado")
                                        @foreach ($pedido->ordens as $orden)
                                        @php
                                            
                                            $subtotal+=$orden->producto->precio;
            
                                        @endphp    
                                        @endforeach
            
                                        @endif

                                        Pedido {{$pedido->id}} - ${{$subtotal}} <br>
                                    @endforeach
                                    
                                </td>
                                <td>{{$pago->metodo}}</td>
                                {!! Form::model($pago,['route'=>['admin.pago.approved',$pago], 'method'=>'post']) !!}
                           
                                
                        
                            
                                <td>{!! Form::text('cantidad',null, ['class'=>'form-control','placeholder'=>'Verifique el monto']) !!}
                                </td>
                                <td>
                                    <img class="object-cover object-center" width="60px" src="{{Storage::url($pago->comprobante)}}" alt="">
                                
                                </td>
                                <td>{{$pago->created_at->format('d-m-Y H:i:s')}}</td>
                                <td>
                                
                                    {!! Form::submit('Aprobar', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!} 
                                <form action="{{route('admin.pagos.destroy',$pago)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"> RECHAZAR </button>
                                </form>
                            </td>
                                
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
                
            </div>

            <div class="card-footer">
                {{$pagos->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    @endif
    
    @if ($gastos->count())
        @livewire('admin.comisiones-pay')
    @endif
    @if ($retiros->count())
        @livewire('organizador.retiros-pay')
    @endif

   
    
    @livewire('admin.contabilidad')

    @livewire('admin.pedidos-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop