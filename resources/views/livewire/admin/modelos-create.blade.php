<div>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.modelos.store']) !!}
                @csrf
                
                <div class="form-group">
                    
                    <Label class="w-80">Categoria de producto:</Label>
                    <div class="items-center">
                        
                        <select wire:model="selectedcategory" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Selecciona una opción</option>
                            @foreach ($category_products as $category_product)
                
                                <option value="{{$category_product->id}}">{{$category_product->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    
                        <Label class="w-80 mt-4">Marcas:</Label>
                        <div class="items-center ">
                            
                            <select wire:model="selectedmarca" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Selecciona una opción</option>
                                @foreach ($marcas as $marca)
                    
                                    <option value="{{$marca->id}}">{{$marca->name.'; '.$marca->disciplina->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                   

                    {!! Form::open(['route'=>'admin.modelos.store', 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf

                    {!! Form::hidden('category_product_id',$selectedcategory) !!}

                    {!! Form::hidden('marca_id',$selectedmarca) !!}
                  
                 

                    <div class="mb-4 mt-2">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del modelo']) !!}
                    </div>

                  
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                        
                    @enderror

                </div>
                {!! Form::submit('Crear Modelo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
