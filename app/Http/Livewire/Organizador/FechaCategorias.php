<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Fecha_categoria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class FechaCategorias extends Component
{
    use WithFileUploads;

    use AuthorizesRequests;

    public $fecha,$inscripcion, $limite, $fecha_categorias;

    public $evento;

    public $selected=[];

    public function mount(Fecha $fecha){
        $this->fecha = $fecha;
        $this->evento = Evento::find($fecha->evento_id);
        
    }

    public function render()
    {   
        if($this->evento->type=='pista'){
            $categorias=Categoria::where('disciplina_id',$this->fecha->evento->disciplina_id)
                                    ->where('descripciopn','pista')->get();
        }else{
            $categorias=Categoria::where('disciplina_id',$this->fecha->evento->disciplina_id)
                                    ->where('descripciopn','race')->get();
        }
        
        $items=Fecha_categoria::where('fecha_id',$this->fecha->id)->get();

        return view('livewire.organizador.fecha-categorias',compact('categorias','items'));
    }

    public function selectedcategoria($categoria){   
        $this->selectedcategoria=[$this->selectedcategoria,$categoria];
    }

    public function agregarcategoria()
    {
        
        foreach ($this->selected as $item){
            $fecha_categoria = Fecha_categoria::create([
                'fecha_id'=> $this->fecha->id,
                'categoria_id'=> $item,
                'inscripcion'=> $this->inscripcion,
                'valor'=> $this->inscripcion*1.072,
                'limite'=> $this->limite
            ]);
        }

        $this->reset(['selected']);
        
    }

    public function categoria_destroy(Fecha_categoria $fecha_categoria){
        $fecha_categoria->delete();
    }

}
