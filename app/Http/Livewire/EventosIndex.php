<?php

namespace App\Http\Livewire;

use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Filmmaker;
use App\Models\Serie;
use Livewire\Component;
use Livewire\WithPagination;

class EventosIndex extends Component
{   
    use WithPagination;
    public $disciplina_id;
    public $filmmaker_id;


    public function render()
    {   $disciplinas = Disciplina::all();
        $filmmakers = Filmmaker::all();
        
        $eventos = Evento::where('status', 1)
                            ->where(function($query) {
                                $query->where('type', 'carrera')
                                    ->orWhere('type', 'campeonato')
                                    ->orWhere('type', 'desafio');
                            })
                            ->Disciplina($this->disciplina_id)
                            ->Organizador($this->filmmaker_id)
                            ->latest('id')
                            ->paginate(8);

        return view('livewire.eventos-index',compact('eventos','disciplinas','filmmakers'));
    }

    public function resetFilters(){
        $this->resetPage();
        $this->reset('disciplina_id','filmmaker_id');
    }
}
