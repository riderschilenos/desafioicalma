<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use App\Models\Inscripcion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class EventoInscritos extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $evento,$search;

    public function mount(Evento $evento){
        
        $this->evento=$evento;


    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   $sponsors = $this->evento->inscritos()->where('name','LIKE','%'. $this->search .'%')->paginate(50);
        $inscripciones = Inscripcion::join('tickets','inscripcions.ticket_id','=','tickets.id')
                            ->select('inscripcions.*','tickets.evento_id')
                            ->where('evento_id',$this->evento->id)
                            ->where('estado','>=',2)
                            ->orderby('categoria_id','DESC')
                            ->paginate(50);

        return view('livewire.organizador.evento-inscritos',compact('sponsors','inscripciones'));
    }
}
