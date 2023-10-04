<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class PublicShow extends Component
{   use WithPagination;


    public $search, $product;

    public function render()
    {   $productos=Producto::where('name','LIKE','%'. $this->search .'%')
                ->where('image','!=','NULL')
                ->latest('id')
                ->paginate(16);
       
        return view('livewire.vendedor.public-show',compact('productos'));
    }

    

    public function set_product($producto_id){
        $this->product=Producto::find($producto_id);
    }
    
    public function limpiar_page(){
        $this->resetPage();
    }
}
