<?php

namespace App\Http\Livewire\Vehiculo;

use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class VehiculoMantencion extends Component
{   use WithFileUploads;

    use AuthorizesRequests;

    public $vehiculo_id, $mantencion, $control, $titulo, $servicio, $foto, $repuestos, $comprobante;

    public $rating = 5;
    
    public function mount(Vehiculo $vehiculo){

    $this->vehiculo_id=$vehiculo->id;
    
    }
    public function render()
    {   
        $vehiculo = Vehiculo::find($this->vehiculo_id);

        $now = Carbon::now();

        return view('livewire.vehiculo.vehiculo-mantencion',compact('vehiculo','now'));
    }

    public function store(){
        $rules = [
            'titulo'=>'required',
            'servicio'=>'required',
            'foto'=>'image'
        ];
        $this->validate ($rules);

        $vehiculo = Vehiculo::find($this->vehiculo_id);
 
        if($this->foto){
            $foto = Str::random(10).$this->foto->getClientOriginalName();
            $rutafoto = public_path().'/storage/mantencions/'.$foto;
            $img=Image::make($this->foto)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
        }else{
            $foto='';
        }
        

        if($this->repuestos){

            $repuestos = Str::random(10).$this->repuestos->getClientOriginalName();
            $rutarepuestos = public_path().'/storage/mantencions/'.$repuestos;
  
            $img=Image::make($this->repuestos)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutarepuestos);
            $img->orientate();
                
        }else{
            $repuestos='';
        }
        if($this->comprobante){

            $comprobante = Str::random(10).$this->comprobante->getClientOriginalName();
            $rutacomprobante = public_path().'/storage/mantencions/'.$comprobante;
  
            $img=Image::make($this->comprobante)->orientate()
                ->resize(600, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutacomprobante);
            $img->orientate();
                
        }else{
            $comprobante='';
        }




        $vehiculo->mantencions()->create([
            'control' => 'TRUE',
            'titulo' => $this->titulo,
            'servicio' => $this->servicio,
            'user_id' => auth()->user()->id,
            'foto'=>'mantencions/'.$foto,
            'repuestos'=>'mantencions/'.$repuestos,
            'comprobante'=>'mantencions/'.$comprobante
           
        ]);

        $this->reset(['titulo','servicio','foto','repuestos','comprobante']);
        $this->vehiculo = Vehiculo::find($vehiculo->id);
    }
}
