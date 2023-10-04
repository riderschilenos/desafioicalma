<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Filmmaker;
use Livewire\Component;
use Livewire\WithPagination;

class PistasIndex extends Component
{   use WithPagination;
    public $disciplina_id;
    public $filmmaker_id;

    public function render()
    {   $disciplinas = Disciplina::all();
        $filmmakers = Filmmaker::all();
        
        $eventos = Evento::where('status',1)
                        ->where('type','pista')
                        ->Disciplina($this->disciplina_id)
                        ->Organizador($this->filmmaker_id)
                        ->latest('id')
                        ->paginate(8);
        return view('livewire.ticket.pistas-index',compact('eventos','disciplinas','filmmakers'));
    }
    public function resetFilters(){
        $this->resetPage();
        $this->reset('disciplina_id','filmmaker_id');
    }
}
