<x-ticket-layout :evento="$evento">

    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: center;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
   

    <div class="@if($evento->type=='pista') hidden @else flex @endif  justify-between">
        <h1 class="text-2xl font-bold">INFORMACIÓN DEL EVENTO</h1>
        <h1 class="justify-end text-2xl font-bold text-red-600">
            @if ($evento->type=='carrera')
            CARRERA
            @else
            CAMPEONATO
            @endif
        </h1>
    </div>
    <hr class="mt-2 mb-6">
    
   
    {!! Form::model($evento, ['route'=>['organizador.eventos.update',$evento],'method' => 'put', 'files'=> true , 'autocomplete'=>'off']) !!}
        
        @include('organizador.eventos.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar Información', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/filmmaker/series/form.js')}}"></script>
    </x-slot>

</x-ticket-layout>