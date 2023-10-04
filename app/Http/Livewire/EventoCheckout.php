<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Fecha_categoria;
use App\Models\Inscripcion;
use App\Models\Invitado;
use App\Models\Socio;
use App\Models\Ticket;
use Livewire\Component;

class EventoCheckout extends Component
{   
    public $evento, $selectedcategoria, $categoria_id, $categoria, $nro, $invitado, $search;


    public function mount(Evento $evento,$invitado){
        if($invitado){
            $this->invitado=Invitado::find($invitado->id);
        }

        $this->evento =$evento;        
        
    }

    public function render()
    {   
        $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();
        $disciplinas= Disciplina::pluck('name','id');
        if (auth()->user()) {
            if(auth()->user()->socio)
            {
                $socio = Socio::where('user_id',auth()->user()->id)->first();
                $ticket =null;
            
                                
            }else{
                $socio=null;
                $ticket =null;
            }
        }else{
                $socio=null;
                $ticket =null;
            }

        $fech = Fecha::where('evento_id',$this->evento->id)->first();

        return view('livewire.evento-checkout',compact('fechas','disciplinas','socio','ticket','fech'));
    }
    public function getInvitadosProperty(){
        return  Invitado::where('rut','LIKE','%'. $this->search .'%')
        ->orwhere('email','LIKE','%'. $this->search .'%')
        ->orwhere('name','LIKE','%'. $this->search .'%')
        ->orwhere('fono','LIKE','%'. $this->search .'%')
        ->latest('id')
        ->paginate(3);
    }

   
    public function updatedselectedcategoria($category_product){
       
        $this->categoria_id = $category_product;
    }

    public function enrolled(){
        $this->evento->inscritos()->attach(auth()->user()->id);
    }

    
}
