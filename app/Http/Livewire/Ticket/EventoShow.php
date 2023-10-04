<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class EventoShow extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $evento;

    public function mount(Evento $evento){
        $this->evento=$evento;
    }

    public function render()
    {   $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();
        $similares = Evento::where('disciplina_id',$this->evento->disciplina_id)
                            ->where('id','!=',$this->evento->id)
                            ->where('status',1)
                            ->latest('id')
                            ->take(5)
                            ->get();      

        return view('livewire.ticket.evento-show',compact('fechas','similares'));
    }
}
