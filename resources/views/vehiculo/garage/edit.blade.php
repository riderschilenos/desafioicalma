<x-app-layout>
    <x-slot name="tl">
            
        <title>Inscripción de tu Juguete Rider</title>
        
        
    </x-slot>
    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-3">
                    <a href="{{route('garage.vehiculos.index')}}" class="font-bold text-lg mb-4 cursor-pointer"><i class="fas fa-arrow-circle-left text-gray-800"></i> Mis Vehiculos</a>
        
                    <h1 class="text-2xl font-bold text-center">Inscripción de tu Juguete Rider</h1>
                </div>
                <hr class="mt-2 mb-6">

                

                {!! Form::model($vehiculo, ['route'=>['garage.vehiculo.update',$vehiculo], 'autocomplete'=>'off', 'method'=> 'POST' ]) !!}
                    @csrf

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-8 mt-6">

                        
                        
                        @if($disciplina_id==1)
                            @include('vehiculo.garage.partials.formmoto')
                        @elseif($disciplina_id==2)
                            @include('vehiculo.garage.partials.formbici')
                        @elseif($disciplina_id==9)
                            @include('vehiculo.garage.partials.formacuatico')
                        @endif

                        <h1 class="text-center font-bold">Propiedad:</h1>


                        <h1 class="text-center mt-6 font-bold">Contacto</h1>

                        <div class="mb-4">
                                
                            {!! Form::label('nombre', 'Nombre:*') !!}
                            {!! Form::text('nombre', null , ['class' => 'form-input block w-full mt-1'.($errors->has('nombre')?' border-red-600':'')]) !!}
                    
                            @error('nombre')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('fono', 'Fono:*') !!}
                            {!! Form::text('fono', null , ['class' => 'form-input block w-full mt-1'.($errors->has('fono')?' border-red-600':'')]) !!}
                    
                            @error('fono')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null , ['class' => 'form-input block w-full mt-1'.($errors->has('email')?' border-red-600':'')]) !!}
                    
                            @error('email')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="mb-4">
                                
                            {!! Form::label('ubicacion', 'Ubicación:*') !!}
                            {!! Form::text('ubicacion', null , ['class' => 'form-input block w-full mt-1'.($errors->has('ubicacion')?' border-red-600':'')]) !!}
                    
                            @error('ubicacion')
                                <strong class="text-xs text-red-600">{{$message}}</strong>
                            @enderror

                      </div>  


                        <div class="flex justify-center">
                          {!! Form::submit('Siguiente', ['class'=>'btn btn-primary cursor-pointer']) !!}
                        </div>

                {!! Form::close() !!}
                
                
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    </x-slot>
    

</x-app-layout>