<?php

namespace App\Http\Livewire\Admin;

use App\Models\Socio;
use Livewire\Component;
use Livewire\WithPagination;

class SociosIndex extends Component
{   
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {   
        $socios=Socio::where('name','LIKE','%'.$this->search.'%')
                ->orwhere('rut','LIKE', '%'.$this->search.'%' )
                ->paginate(200);

        return view('livewire.admin.socios-index',compact('socios'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
