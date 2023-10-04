<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Gasto;
use App\Models\Retiro;
use App\Models\User;
use Livewire\Component;

class RetirosPay extends Component
{   public $selected=[];
    public $current=null;
    public function render()
    {   $gastos = Retiro::where('estado',1)->paginate(80);
        $gastosok = Retiro::where('estado',2)->latest('id')->paginate(80);
        $users= User::all();

        return view('livewire.organizador.retiros-pay',compact('gastos','gastosok','users'));
    }

    public function show(){
        if($this->current){
            
                $this->reset(['current']);
              
        }else{
           
            $this->current = True;
        }
    }

}
