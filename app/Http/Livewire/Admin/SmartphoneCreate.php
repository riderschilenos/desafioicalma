<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category_product;
use App\Models\Disciplina;
use App\Models\Marca;
use App\Models\Marcasmartphone;
use App\Models\Smartphone;
use Livewire\Component;

class SmartphoneCreate extends Component
{   public $selectedcategory;

    public $selectedmarca, $obj, $stock, $editable;

    protected $rules = [
        'editable.stock'=>'required',
         ];
    

    public function render()
    {   $disciplinas=Disciplina::all();

        $marcas = Marcasmartphone::all();

        $category_products=Category_product::all();

        $smartphones=Smartphone::all();

        

        $marcasmartphones=Marcasmartphone::all();

        return view('livewire.admin.smartphone-create',compact('disciplinas','category_products','marcas','smartphones','marcasmartphones'));
    }


    public function updatedselectedmarca($marca){
        
        $this->selectedmarca=$marca;
    
    }

    public function edit($value){
        $this->obj = $value;
        $this->editable = Smartphone::find($value);
    }

    public function update(Smartphone $editable){
         
         $this->editable->save();
         $this->reset(['obj','editable']);
     }

     public function cancel(){
         
        $this->reset(['obj','editable']);
    }




}
