<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Marca;
use App\Models\Smartphone;
use Livewire\Component;

class ModelosCreate extends Component
{   public $selectedcategory;

    public $selectedmarca;


    public function render()
    {   $disciplinas=Disciplina::all();

        $marcas = Marca::all();

        $category_products=Category_product::all();

        return view('livewire.admin.modelos-create',compact('disciplinas','category_products','marcas'));
    }

    public function updatedselectedcategory($category_products){
        
        $this->selectedcategory=$category_products;
    
    }
    public function updatedselectedmarca($marca){
        
        $this->selectedmarca=$marca;
    
    }

    
}
