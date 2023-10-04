<div>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.modelos.store']) !!}
                @csrf
                
                {{$selectedproducto}}<br>
                {{$selectedmarca}}
                <div class="form-group">
                    
                    @if(IS_NULL($selectedproducto))
                        <Label class="w-80 mt-4">Producto:</Label>
                        <div class="items-center ">
                            
                            <select wire:model="selectedproducto" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Selecciona una opción</option>
                                @foreach ($productos as $producto)
                    
                                    <option value="{{$producto->id}}">{{$producto->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    @endif
                       
                   

                    {!! Form::open(['route'=>'admin.catalogos.store','files'=>true , 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                        @csrf

                    {!! Form::hidden('producto_id',$selectedmarca) !!}
                  
                    <div class="mb-4 mt-2">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del modelo']) !!}
                    </div>

                    <div class="mb-4 mt-2">
                        {!! Form::label('imagen','Imagen') !!}
                        {!! Form::file('imagen', ['class'=>'form-input w-full'.($errors->has('imagen')?' border-red-600':''), 'id'=>'logo','accept'=>'image/*']) !!}
                    </div>


                </div>
                {!! Form::submit('Crear Catalogo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
