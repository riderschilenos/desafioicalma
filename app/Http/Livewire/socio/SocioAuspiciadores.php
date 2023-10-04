<?php

namespace App\Http\Livewire\Socio;

use App\Models\Auspiciador;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class SocioAuspiciadores extends Component
{   
    use WithFileUploads;

    use AuthorizesRequests;

    public $socio , $socioid, $current=NULL, $formulario=FALSE;

    public function mount(Socio $socio){
        $this->socio= $socio;}

    public function render()
    {   
        return view('livewire.socio.socio-auspiciadores');
    }

    public function show(Auspiciador $auspiciador){
        if($this->current){
            if($this->current->id!=$auspiciador->id){
                $this->reset(['formulario']);
                $this->current = $auspiciador;
            }else{
                $this->current=NULL;
            }
        }else{
            $this->reset(['formulario']);
            $this->current = $auspiciador;
        }
    }

    public function formulario(){
        if($this->formulario){
            $this->reset(['formulario']);
        }else{
            $this->reset(['current']);
            $this->formulario = TRUE;
        }
    }

    public function destroy(Auspiciador $auspiciador){

        Storage::delete($auspiciador->logo);
        $auspiciador->delete();

        $this->reset(['current']);
        $this->socio=Socio::find($this->socio->id);

        return redirect()->route('socio.show',$this->socio);
       
    }
}
