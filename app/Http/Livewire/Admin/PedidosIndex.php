<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosIndex extends Component
{   
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {   

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();

        $total=0;

        $pedidos=Pedido::where('status',3)
                ->orwhere('status',4)
                ->orwhere('status',5)
                ->orwhere('status',6)
                ->orwhere('status',7)
                ->orwhere('status',8)
                ->orwhere('status',9)
                ->orderby('status','DESC')
                ->paginate(1000);
        $pedidosint=Pedido::all();

        return view('livewire.admin.pedidos-index',compact('pedidos','pedidosint','users','invitados','socios','total'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
