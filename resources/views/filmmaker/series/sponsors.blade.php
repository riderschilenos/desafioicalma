<x-filmmaker-layout :serie="$serie">

    @livewire('filmmaker.series-sponsors', ['serie' => $serie], key('series-videos.'.$serie->id))

</x-filmmaker-layout>