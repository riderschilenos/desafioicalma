@extends('adminlte::page')

@section('title', 'RidersChilenos')

@section('content_header')
    <h1>IMPRESIÓN QR REGISTER'S</h1>
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
                        <th class="text-center">Tipo</th>
                        <th class="text-center">QR</th>
                        <th class="text-center">Numero</th>
                        <th class="text-center">Numero</th>
                        <th class="text-center">PASS</th>
                        
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qrregisters as $qrregister)
                    @if($qrregister->proceso==4)
                        <tr>
                            <td>
                                {{$qrregister->id}}
                            </td>
                            <td class="text-center">
                                ${{number_format($qrregister->value)}}
                                
                            </td>
                            <td class="text-center">
                                <img class="object-cover object-center" width="60px" src="{{asset('img/qrregister/qrregister2.png')}}" alt="">
                                
                                
                            </td>
                            <td class="text-center">
                                <p class="h4"><b>{{$qrregister->nro}}</b></p>

                            </td>
                            <td class="text-center">
                                <p class="h2"><b>{{$qrregister->nro}}</b></p>
                            </td>
                            <td class="text-center">
                                <p class="h2"><b>{{$qrregister->pass}}</b></p>
                            </td>
                           
                           
                            
                        </tr>
                    @endif
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