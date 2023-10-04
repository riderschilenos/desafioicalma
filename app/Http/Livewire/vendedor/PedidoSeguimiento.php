<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use Livewire\Component;

class PedidoSeguimiento extends Component
{   
    public function mount(Pedido $pedido){
    $this->pedido=$pedido;
    
    }

    public function render()
    {   $socios=Socio::all();
        $invitados=Invitado::all();
        return view('livewire.vendedor.pedido-seguimiento',compact('socios','invitados'));
    }
}
