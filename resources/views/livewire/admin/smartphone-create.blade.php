<div>
    @php
$total=0;

foreach ($smartphones->reverse() as $smartphone)
    {$total=$total+$smartphone->stock;
    
    }
@endphp
    <div class="card">
        <div class="card-body">
            
               
                
                <div class="form-group">
                    <Label class="w-80 mt-4">Marca:</Label>
                        <div class="items-center ">
                            
                            <select wire:model="selectedmarca" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Selecciona una opción</option>
                                @foreach ($marcas as $marca)
                    
                                    <option value="{{$marca->id}}">{{$marca->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>


        

                    
                

                   

                {!! Form::open(['route'=>'admin.smartphone.store', 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf


                    {!! Form::hidden('marcasmartphone_id',$selectedmarca) !!}
                  
                 

                    <div class="mb-4 mt-2">
                        {!! Form::label('modelo','Modelo') !!}
                        {!! Form::text('modelo',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del modelo']) !!}
                    </div>

                  
                    @error('modelo')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                    <div class="mb-4">
                        {!! Form::label('stock', 'Stock:') !!}
                        {!! Form::number('stock', null , ['class'=>'form-control', 'placeholder'=>'Ingrese el stock actual']) !!}
                    
                        @error('stock')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                </div>
                {!! Form::submit('Crear Smartphone', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            
            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"><b class="h1">{{$total}}</b>    Stock Total  ( ${{number_format($total*2500)}} ) </div>
                <div class="card-body">
                    @foreach ($marcasmartphones as $marcasmartphone)
                        @php
                            $subtotal=0;
                        @endphp
                        @foreach ($smartphones as $smartphone)
                            @if ($smartphone->marcasmartphone_id==$marcasmartphone->id)
                                @php
                                     $subtotal=$subtotal+$smartphone->stock;
                                @endphp
                               
                                
                            @endif
                            
                        @endforeach
                        <h5 class="card-title">{{$subtotal}}  {{$marcasmartphone->name}} </h5><br>
                    @endforeach
                   
                </div>
                </div>
            </div>
            <div class="col">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Stock Critico</div>
                    <div class="card-body">
                        @php
                            $subcritico=0;
                        @endphp
                        @foreach ($smartphones as $item)
                            @if ($item->stock<3)
                                @php
                                     $subcritico+=1;
                                @endphp
                            
                                <h5 class="card-title"> {{$item->modelo}} Stock: {{$item->stock}}</h5>
                                
                            @endif
                            
                            
                        @endforeach
                        @if ($subcritico==0)

                            <h3>Sin Stock Critico</h1>
                        @endif
                    
                    </div>
                </div>
            </div>
           
            
        </div>
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
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>stock</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($smartphones as $smartphone)
                 
                    <tr>
                        <td>
                            {{$smartphone->id}}
                        </td>
                        <td>
                            {{$smartphone->marcasmartphone->name}}
                        </td>
                        <td>
                            {{$smartphone->modelo}}
                        </td>
                        <td>
                            {{$smartphone->stock}}
                                
                        </td>
                        <td width="10px">
                            @if ($obj==$smartphone->id)
                                    
                            <form wire:submit.prevent="update">
                                <div class="flex items-center mt-4">
                                    <label class="w-32">Nombre:</label>
                                    <input wire:model="editable.stock" class="form-input w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                </div>
        
                                @error('editable.stock')
                                    <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
        
                                
                                <div class="mt-4 flex justify-end">
                                    <button type="submit" class="btn btn-primary text-sm">Actualizar</button>
                                    <button type="button" class="btn btn-danger text-sm ml-2" wire:click="cancel" >Cancelar</button>
                                
                                </div>
                                
                            </form>
        

                            @else
                            
                                
                                <button class="btn btn-primary text-sm" wire:click="edit({{$smartphone->id}})">Editar Stock</button>

                            @endif
                            
         
                        </td>
                        <td width="10px">
                            @can('Super admin')
                                <form action="{{route('admin.smartphone.destroy',$smartphone)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit"> Eliminar</button>
                                </form>
                            @endcan
                           
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
