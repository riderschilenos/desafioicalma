<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Image;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class VehiculoImage extends Component
{   
    public $images;

    public function mount(Vehiculo $vehiculo){

        $this->vehiculo = $vehiculo;

    }

    public function render()
    {   
        
        return view('livewire.vehiculo.vehiculo-image');
    }

    public function destroy(Image $image){

        Storage::delete($image->url);
        $image->delete();

        $this->vehiculo = Vehiculo::find($image->imageable_id);

    }
}
