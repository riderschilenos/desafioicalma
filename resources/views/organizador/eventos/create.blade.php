<x-app-layout>
    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO EVENTO</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'organizador.eventos.store','files'=>true , 'autocomplete'=>'off']) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}


                    <h1 class="text-center font-bold">Tipo de evento:</h1>

                        <div class="form-group flex justify-center">
                            <div class="form-check">
                              <input type="radio" name="type" id="type" value="carrera">
                              <label class="text-2xl mr-4" for="type">
                                    Carrera
                              </label>
                            </div>
                            <div class="form-check ml-2">
                              <input type="radio" name="type" id="type" value="campeonato">
                              <label class="text-2xl mr-4" for="type">
                                    Campeonato
                              </label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="radio" name="type" id="type" value="desafio">
                                <label class="text-2xl mr-4" for="type">
                                      Desafio
                                </label>
                              </div>
                        </div>


                    @include('organizador.eventos.partials.form')

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