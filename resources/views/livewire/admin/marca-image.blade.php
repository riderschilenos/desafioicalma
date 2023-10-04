<div>
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
                        <th>Disciplina</th>
                        <th>Nombre</th>
                        <th>Logo</th>
                        <th>Catalogo Carcasas</th>
                        <th>Catalogo Accesorios</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>
                                {{$marca->id}}
                            </td>
                            <td>
                                {{$marca->disciplina->name}}
                            </td>
                            <td>
                                {{$marca->name}}
                            </td>

                            
                            <td>
                                    @isset($marca->image)
                                        <img width="60" class="object-cover object-center rounded-full" src="{{Storage::url($marca->image->url)}}" alt="">
                                    @else
                                        <img width="60" class="object-cover object-center rounded-full" src="https://www.directorioindustrialfarmaceutico.com/images/logos/sin-logo.jpg" alt="">
                                    @endisset
                            </td>
                            <td>
                                @if ($marca->catalogocarcasas)
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <img width="60" class="object-cover object-center rounded-full" src="{{Storage::url($marca->catalogocarcasas)}}" alt="">    
                                        </div>
                                        <div>
                                            {!! Form::open(['route'=>['admin.marca.catalogocarcasas',$marca],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                @csrf
    
                                            
                                                {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                                
    
                                                <div class="flex justify-center">
                                                    {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                </div>
                                            
                                            {!! Form::close() !!}
                                 
                                        </div>
                                    </div>
                                    
                                @else
                                {!! Form::open(['route'=>['admin.marca.catalogocarcasas',$marca],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                @csrf
    
                                  
                                        {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                     
    
                                    <div class="flex justify-center">
                                        {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                    </div>
                                
                                {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                @if ($marca->catalogoaccesorios)
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <img width="60" class="object-cover object-center rounded-full" src="{{Storage::url($marca->catalogoaccesorios)}}" alt="">    
                                        </div>
                                        <div>
                                            {!! Form::open(['route'=>['admin.marca.catalogoaccesorios',$marca],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                                @csrf
    
                                            
                                                {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                                
    
                                                <div class="flex justify-center">
                                                    {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                                </div>
                                            
                                            {!! Form::close() !!}
                                 
                                        </div>
                                    </div>
                                    
                                @else
                                {!! Form::open(['route'=>['admin.marca.catalogoaccesorios',$marca],'files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                                @csrf
    
                                  
                                        {!! Form::file('file', ['class'=>'form-input w-full mt-6'.($errors->has('file')?' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
                                     
    
                                    <div class="flex justify-center">
                                        {!! Form::submit('Enviar', ['class'=>'btn btn-primary cursor-pointer mt-4']) !!}
                                    </div>
                                
                                {!! Form::close() !!}
                                @endif
                            </td>
                            
                            <td width="10px">
                                
                                <a class="btn btn-secondary btn-sm" href="{{route('admin.marca.imageform',$marca)}}">Agregar logo</a>
                            </td>
                            {{-- comment 
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.marcas.edit',$marca)}}">Editar</a>
                            </td>--}}
                            
                            <td width="10px">
                                <form action="{{route('admin.marcas.destroy',$marca)}}" method="POST">
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

</div>
