<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Marca;
use App\Models\Vehiculo_type;
use Livewire\Component;

class VehiculoInscripcion extends Component

{   public $selectedvehiculotype, $selectedmarca, $marca, $marcas, $name, $modelo, $file, $cilindrada, $año, $aro_front, $aro_back, $slug, $precio;

    public $vehiculo_type;
    
    public function render()
    {   
        

        $vehiculo_types= Vehiculo_type::all();

        return view('livewire.vehiculo.vehiculo-inscripcion',compact('vehiculo_types'));
    }


    public function updatedselectedvehiculotype($vehiculo_type){
        
        if($vehiculo_type==1 or $vehiculo_type==2 or $vehiculo_type==3 or $vehiculo_type==7 or $vehiculo_type==15){
            $disciplina_id=1;
        }

        if($vehiculo_type==9 or $vehiculo_type==10 or $vehiculo_type==11){
            $disciplina_id=2;
        }

        if($vehiculo_type==12 or $vehiculo_type==13 or $vehiculo_type==14){
            $disciplina_id=9;
        }

        

        $this->selecteddisciplina=$disciplina_id;
        
        $this->marcas = Marca::where('disciplina_id',$disciplina_id)->pluck('name','id');
        
        $this->selectedvehiculo_type = $vehiculo_type;
    
    }

    public function updatedselectedmarca($marca){


        $this->selectedmarca = $marca;

    
    }
    
}
