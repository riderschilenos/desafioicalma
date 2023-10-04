<?php

namespace App\Http\Livewire\Filmmaker;

use App\Models\Serie;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SeriesSponsors extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $serie,$search;

    public function mount(Serie $serie){
        
        $this->serie=$serie;

        $this->authorize('dicatated',$serie);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   
        $sponsors = $this->serie->sponsors()->where('name','LIKE','%'. $this->search .'%')->paginate(5);

        return view('livewire.filmmaker.series-sponsors',compact('sponsors'))->layout('layouts.filmmaker',['serie'=> $this->serie]);
    }
}
