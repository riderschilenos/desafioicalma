<x-app-layout>
   
    <x-slot name="tl">
            
        <title>Editar Perfil {{ $socio->name." ".$socio->second_name }} {{ $socio->last_name }}</title>
        
        
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="card pb-8">
            <div class="card-body">
                

                <div class="justify-between mt-4 grid grid-cols-1 lg:grid-cols-3 gap-4">
               
                    <div>

                    </div>
                    <div>
                        <h1 class="text-2xl font-bold pb-4 text-center">Editar perfil Riders Chilenos</h1>
                        
                    </div>
                   
                </div>

                
                {!! Form::model($socio, ['route'=>['socio.update',$socio],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}                
                
                    
                <div class="max-w-full items-center">

                    @include('socio.partials.formupdate')

                </div>
                
                @error('user_id')
                        <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
                
                <div class="flex justify-center">

                    <a href="{{route('socio.show', $socio)}}"><button type="button" class="btn btn-danger mr-6">Cancelar</button></a>
                    {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}

                
                
            </div>
        </div>

    </div>
    

    {{-- @livewire('vendedor.pedidos-index')--}}
    <x-slot name="js">
        
        <script src="{{asset('js/socio/form.js')}}"></script>
        
    </x-slot>
    
    
</x-app-layout>