<?php

namespace App\Http\Livewire\Socio;

use App\Models\Invitado;
use App\Models\Socio;
use Livewire\Component;

class PointCount extends Component
{   public $socio;
    public function mount(Socio $socio){
        $this->socio=$socio;
    }
    public function render()
    {    $invitados = Invitado::where('rut',$this->socio->rut)->orwhere('fono',$this->socio->fono)->get();
        return view('livewire.socio.point-count',compact('invitados'));
    }
}
