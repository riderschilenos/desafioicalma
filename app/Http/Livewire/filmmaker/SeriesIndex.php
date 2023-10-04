<?php

namespace App\Http\Livewire\filmmaker;

use App\Models\Serie;
use Livewire\Component;
use Livewire\WithPagination;

class SeriesIndex extends Component
{   
    use WithPagination;


    public $search;

    public function render()
    {   
        
        $series = Serie::where('titulo','LIKE','%'.$this->search.'%')
                        ->where('user_id',auth()->user()->id)
                        ->orderby('status','DESC')
                        ->latest('id')
                        ->paginate(15);

        return view('livewire.filmmaker.series-index', compact('series'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
