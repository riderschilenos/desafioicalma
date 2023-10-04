<?php

namespace App\Http\Livewire\Pistas;

use App\Models\Evento;
use App\Models\Inscripcion;
use App\Models\Pedido;
use App\Models\Pista_staff;
use App\Models\Retiro;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPistaHome extends Component
{   use WithPagination;

    public $search, $user_id, $pistas ,$pista;

    public function render()
    {   $this->pistas=Evento::where('user_id',auth()->user()->id)->get();
       // $this->pista=Evento::where('type','pista')->where('user_id',auth()->user()->id)->first();
        $inscripciones = Inscripcion::join('tickets','inscripcions.ticket_id','=','tickets.id')
                    ->select('inscripcions.*','tickets.evento_id')
                    ->where('estado','>=',3)
                    ->orderby('categoria_id','DESC')
                   ->paginate(50);
        //$tickets = $this->pista->tickets()->where('status','>=',3)->get();
        //$retiros = Retiro::where('evento_id',$this->pista->id)->get();
        $socios=Socio::join('users','socios.user_id','=','users.id')
                    ->select('socios.*','users.name','users.email')
                    ->where('rut','LIKE','%'. $this->search .'%')
                    ->orwhere('email','LIKE','%'. $this->search .'%')
                    ->orwhere('socios.name','LIKE','%'. $this->search .'%')
                    ->orwhere('users.name','LIKE','%'. $this->search .'%')
                    ->orwhere('socios.slug','LIKE','%'. $this->search .'%')
                    ->latest('id')
                    ->paginate(3);

        return view('livewire.pistas.admin-pista-home',compact('socios','inscripciones'));
    }

    public function admin(User $user){
        

        Pista_staff::create([
                        'user_id'=>$user->id,
                        'evento_id'=>$this->pista->id,
                        'rol'=>'admin'
        ]);
       
    }
    public function cobrar(User $user){
     
        Pista_staff::create([
                        'user_id'=>$user->id,
                        'evento_id'=>$this->pista->id,
                        'rol'=>'cobrar'
        ]);
       
    }
    public function set_pista($id){
        $this->pista=Evento::find($id);
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
