<x-app-layout>
    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVA PISTA</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'organizador.eventos.store','files'=>true , 'autocomplete'=>'off']) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}

                    {!! Form::hidden('type','pista') !!}

                    @include('organizador.eventos.partials.formpistas')

                    <div class="flex justify-end mb-6">
                        {!! Form::submit('Crear nuevo evento', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>
    
</x-app-layout>