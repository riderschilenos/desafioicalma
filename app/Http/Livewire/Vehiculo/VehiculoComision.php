<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class VehiculoComision extends Component
{   use AuthorizesRequests;
    
    public $selectedcomision, $vehiculoupdate;
    

    public function mount(Vehiculo $vehiculo){

        $this->vehiculo = $vehiculo;

    }

    public function render()
    {
        return view('livewire.vehiculo.vehiculo-comision');
    }

    public function updatedselectedcomision($comision){
        
        
        $this->selectedcomision = $comision;
    
    }

    public function edit(Vehiculo $vehiculo){

        $vehiculo->precio=null;

        $vehiculo->save();

        $this->vehiculo = $vehiculo;

    }

    public function publicar(Vehiculo $vehiculo){

        $vehiculo->status=5;

        $vehiculo->save();

        return redirect()->route('garage.vehiculo.show',$vehiculo);

    }

    public function vehiculodown(Vehiculo $vehiculo){

        $vehiculo->status=1;

        $vehiculo->save();

        return redirect()->route('garage.vehiculos.index');

    }
}
