<x-filmmaker-layout :serie="$serie">
    
    <h1 class="text-2xl font-bold">OBSERVACIONES DE LA SERIE</h1>
    <hr class="mt-2 mb-6">

    <div class="text-gray-500">
        {!!$serie->observation->body!!}
    </div>

</x-filmmaker-layout>