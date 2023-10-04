<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use Livewire\Component;
use App\Models\Serie;
use App\Models\Socio;

class Search extends Component
{   
    public $search;

    public function render()
    {   

        return view('livewire.search');
    }

    public function getSeriesProperty(){
        return Serie::where('titulo','LIKE','%'.$this->search.'%')->where('status',3)->take(6)->get();
    }

    public function getEventosProperty(){
        return Evento::where('titulo','LIKE','%'.$this->search.'%')->where('status',1)->take(6)->get();
    }

    public function getRidersProperty(){
        return Socio::
        join('users','socios.user_id','=','users.id')
        ->select('socios.*','users.name','users.email')
        ->where('rut','LIKE','%'. $this->search .'%')
        ->orwhere('email','LIKE','%'. $this->search .'%')
        ->orwhere('socios.name','LIKE','%'. $this->search .'%')
        ->orwhere('users.name','LIKE','%'. $this->search .'%')
        ->orwhere('socios.slug','LIKE','%'. $this->search .'%')
        ->orderby('status')
        ->latest('id')
        ->take(6)->get();
    }
}
