<x-app-layout>
    <div class="container py-8 ">
        
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Nuevo Proyecto</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'filmmaker.series.store','files'=>true , 'autocomplete'=>'off']) !!}
                    
                    {!! Form::hidden('user_id',auth()->user()->id) !!}

                    {!! Form::hidden('content','serie') !!}

                    <h1 class="text-center font-bold">Tipo de contenido:</h1>

                        <div class="form-group flex justify-center">
                            <div class="form-check">
                              <input type="radio" name="content" id="propio" value="serie">
                              <label class="text-2xl mr-4" for="propio">
                                    Serie
                              </label>
                            </div>
                            <div class="form-check ml-2">
                              <input type="radio" name="content" id="propio" value="curso">
                              <label class="text-2xl mr-4" for="propio">
                                    Curso
                              </label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="radio" name="content" id="propio" value="entrenamiento">
                                <label class="text-2xl mr-4" for="propio">
                                      Entrenamiento
                                </label>
                              </div>
                            


                        </div>

                    @include('filmmaker.series.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nueva serie', ['class'=>'btn btn-primary cursor-pointer']) !!}
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