<x-ticket-layout :evento="$evento">

    


    <h1 class="text-2xl font-bold"> 
       Terminos y condiciones
    </h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($evento, ['route'=>['organizador.eventos.update',$evento],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}
            
        <div class="mb-4">
            {!! Form::label('terminos', 'Terminos',['class'=>'hidden']) !!}
            {!! Form::textarea('terminos', null , ['class' => 'form-input block w-full mt-1']) !!}
            
            @error('terminos')
                <strong class="text-xs text-red-600">{{$message}}</strong>
            @enderror
        </div>

        <div class="flex justify-end">
            {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#terminos' ), {
                        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                        heading: {
                        options: [
                                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                            ]
                        }
                    } )
                    .catch( error => {
                        console.log( error );
                        } );
                //
        </script>
    </x-slot>
    

</x-ticket-layout>


