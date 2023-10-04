<?php

namespace App\Http\Livewire\Admin;

use App\Models\Marca;
use Livewire\Component;

class MarcaImage extends Component
{   
    public  $brands, $selectedmarca;

    public function render()
    {   
        $marcas=Marca::all();

        $selectedmarca=new Marca();

        return view('livewire.admin.marca-image',compact('marcas'));
    }

   

}
