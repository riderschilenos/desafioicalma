<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gasto;
use App\Models\User;
use App\Models\Vendedor;
use Livewire\Component;

class ComisionesPay extends Component
{   public $selected=[];
    public $current=null;
    public function render()
    {   $gastos = Gasto::where('estado',1)->paginate(80);
        $gastosok = Gasto::where('estado',2)->latest('id')->paginate(80);
        $users= User::all();

        return view('livewire.admin.comisiones-pay',compact('gastos','gastosok','users'));
    }

    public function show(){
        if($this->current){
            
                $this->reset(['current']);
              
        }else{
           
            $this->current = True;
        }
    }
}
