<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Serie;
use App\Models\User;
use App\Models\Disciplina;
use App\Models\Filmmaker;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
//use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\WithPagination;

class UsadosIndex extends Component
{
    use WithPagination;
    public $disciplina_id;
    public $filmmaker_id;
    public $vehiculo_types_id;
    
    public function render()
    {   
        $disciplinas = Disciplina::all();
        $filmmakers = Filmmaker::all();

        $vehiculo_types = Vehiculo_type::all();
        
        $vehiculos = Vehiculo::where('status',4)
                        ->orwhere('status',5)
                        ->orwhere('status',7)
                        ->Vehiculo_type($this->vehiculo_types_id)
                        ->latest('id')
                        ->paginate(5);

        return view('livewire.usados-index',compact('disciplinas','filmmakers','vehiculos','vehiculo_types'));
    }

    public function resetFilters(){
        $this->resetPage();
        $this->reset('disciplina_id','filmmaker_id','vehiculo_types_id');
    }
}
