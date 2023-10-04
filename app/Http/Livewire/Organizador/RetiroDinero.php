<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use App\Models\Retiro;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class RetiroDinero extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $evento, $search;

    public function mount(Evento $evento){

        $this->evento=$evento;
        
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   $tickets = $this->evento->tickets()->where('status','>=',3)->get();
        $retiros = Retiro::where('evento_id',$this->evento->id)->get();

        return view('livewire.organizador.retiro-dinero',compact('tickets','retiros'));
    }
}
