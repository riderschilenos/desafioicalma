<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\WhatsappMensaje;
use Livewire\Component;

class PedidosCount extends Component
{   public $cliente;

    public function render()
    {   $diseños=Pedido::where('status',4)->get();
        $produccion=Pedido::where('status',5)->get();
        $despacho=Pedido::where('status',6)->get();
        $socios=Socio::all();
        $invitados=Invitado::all();
        $mensajes=WhatsappMensaje::where('id','>',1)->orderby('id')->get();

        return view('livewire.admin.pedidos-count',compact('mensajes','socios','invitados','diseños','produccion','despacho'));
    }

    public function set_cliente(Pedido $pedido){
        if($pedido->pedidoable_type == 'App\Models\Invitado'){
            $this->cliente=Invitado::find($pedido->pedidoable_id);
        }else{
            $this->cliente=Socio::find($pedido->pedidoable_id);
        }
    }

    public function cliente_clean(){
        $this->reset(['cliente']);
    }
}
