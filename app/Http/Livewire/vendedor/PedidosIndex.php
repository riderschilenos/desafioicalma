<?php

namespace App\Http\Livewire\vendedor;

use App\Models\Invitado;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosIndex extends Component
{   
    use WithPagination;

    public $search, $periodo="mensual";

    public function render()
    {   $invitados= Invitado::all();
        $socios= Socio::all();
        $periodo=$this->periodo;

        if($this->periodo=="mensual"){
        
        $pedidos= Pedido::where('user_id',auth()->user()->id)
                        ->where('status', '<=', 8)
                        ->orderby('status','DESC')
                        ->get();
                    }
        if($this->periodo=="anual"){
        
            $pedidos= Pedido::where('user_id',auth()->user()->id)
                            ->orderby('status','DESC')
                            ->get();
                       }
        


        return view('livewire.vendedor.pedidos-index',compact('pedidos','invitados','socios','periodo'));
    }
    
    public function limpiar_page(){
        $this->resetPage();
    }

    public function periodo(){
        if ($this->periodo=="mensual"){
            $this->periodo="anual";
        }else{
            $this->periodo="mensual";
     }
    }

    public function download($catalogo){
        return response()->download(public_path('catalogos/'.$catalogo));
    }

    
}
