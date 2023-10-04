<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosPay extends Component
{   public $selected=[];
    use WithPagination;

    public $selectedTransfencia, $selectedMercadopago,$transferencia, $mercadopago;

    public function render()
    {   $invitados= Invitado::all();
        $socios= Socio::all();
 
        $pedidos= Pedido::where('user_id',auth()->user()->id)
                            ->orderby('status','DESC')
                            ->latest('id')
                            ->get();

        $pagos=Pago::where('user_id',auth()->user()->id)
                                ->orderby('id','DESC')
                                ->latest('id')
                                ->paginate(5);
                    

        $pago=Pago::where('user_id',auth()->user()->id)
                            ->where('estado',3)
                            ->first();
        

        return view('livewire.vendedor.pedidos-pay',compact('pedidos','invitados','socios','pagos','pago'));
    }

    public function updateselectedtransferencia(Socio $socio){

        $this->transferencia= True;

        $this->reset(['mercadopago']);
    }

    public function updateselectedmercadopago(Socio $socio){

        $this->mercadopago= True;
        $this->reset(['transferencia']);
    }
}
