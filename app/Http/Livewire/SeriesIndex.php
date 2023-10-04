<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Serie;
use App\Models\User;
use App\Models\Disciplina;
use App\Models\Filmmaker;
//use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\WithPagination;

class SeriesIndex extends Component
{   

    use WithPagination;
    public $disciplina_id;
    public $filmmaker_id;
    
    public function render()
    {   
        $disciplinas = Disciplina::all();
        $filmmakers = Filmmaker::all();
        
        $series = Serie::where('status',3)
                        ->Disciplina($this->disciplina_id)
                        ->where('content','serie')
                        ->Filmmaker($this->filmmaker_id)
                        ->latest('id')
                        ->paginate(8);

        return view('livewire.series-index',compact('series','disciplinas','filmmakers'));
    }

    public function resetFilters(){
        $this->resetPage();
        $this->reset('disciplina_id','filmmaker_id');
    }
}
