<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;

class CatalogosCreate extends Component
{   public $selectedcategory;

    public $selectedproducto;

    public $selectedmarca,$marcas;



    public function render()
    {   $disciplinas=Disciplina::all();

        $productos = Producto::all();

        $category_products=Category_product::all();

        return view('livewire.admin.catalogos-create',compact('disciplinas','category_products','productos'));
    }

    public function updatedselectedcategory($category_products){
        
        $this->selectedcategory=$category_products;
    
    }

    public function updatedselectedproducto($products){
        
        $this->selectedproducto=Producto::find($products);

        $this->marcas = Marca::where('disciplina_id',$this->selectedproducto->disciplina_id)->get();

    
    }

    public function updatedselectedmarca($marca){
        
        $this->selectedmarca=$marca;
    
    }

}
