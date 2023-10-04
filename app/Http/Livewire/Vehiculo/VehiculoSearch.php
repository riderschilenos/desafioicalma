<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Livewire\Component;
use Livewire\WithPagination;

class VehiculoSearch extends Component
{   
    use WithPagination;

    public $search;

    public function render()
    {   
        $vehiculos = Vehiculo::join('users', 'vehiculos.user_id', '=', 'users.id')
                        ->select('vehiculos.*', 'users.name', 'users.email')
                        ->where('vehiculos.status', 6) // Filtro por estado
                        ->where(function($query) {
                            $query->where('name', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('users.email', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('vehiculos.modelo', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('vehiculos.nro_serie', 'LIKE', '%' . $this->search . '%');
                        })
                        ->orderBy('updated_at', 'desc') // Ordenar por fecha de modificación más reciente
                        ->paginate(8);
        $vehiculosall = Vehiculo::all();

        return view('livewire.vehiculo.vehiculo-search',compact('vehiculos','vehiculosall'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
