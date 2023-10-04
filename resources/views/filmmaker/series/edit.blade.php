<x-filmmaker-layout :serie="$serie">

    


    <h1 class="text-2xl font-bold">INFORMACIÓN DE LA SERIE</h1>
    <hr class="mt-2 mb-6">
    
   
    {!! Form::model($serie, ['route'=>['filmmaker.series.update',$serie],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}
        
        @include('filmmaker.series.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>

</x-filmmaker-layout>