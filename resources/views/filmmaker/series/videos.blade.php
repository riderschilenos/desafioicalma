<x-filmmaker-layout :serie="$serie">

    @livewire('filmmaker.series-videos', ['serie' => $serie], key('series-videos.'.$serie->id))

</x-filmmaker-layout>