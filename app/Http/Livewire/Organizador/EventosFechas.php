<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Fecha;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventosFechas extends Component
{   
    use WithFileUploads;

    use AuthorizesRequests;

    public $evento;

    public $selectedcategoria=[];

    public function mount(Evento $evento){
        $this->evento = $evento;
    }

    public function render()
    {   $categorias=Categoria::where('disciplina_id',$this->evento->disciplina_id)->get();
        $now=now();
        return view('livewire.organizador.eventos-fechas',compact('now','categorias'));
    }

    public function selectedcategoria($categoria){
        
        $this->selectedcategoria=[$this->selectedcategoria,$categoria];
    }

    public function destroy(Fecha $fecha){
        $fecha->delete();
    }
}
