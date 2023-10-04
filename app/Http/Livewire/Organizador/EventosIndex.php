<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

class EventosIndex extends Component
{      
    use WithPagination;


    public $search;

    public function render()
    {   
        
        $eventos = Evento::where('titulo','LIKE','%'.$this->search.'%')
                        ->where('user_id',auth()->user()->id)
                        ->orderby('status','DESC')
                        ->latest('id')
                        ->paginate(15);

        return view('livewire.organizador.eventos-index', compact('eventos'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }


    
}
