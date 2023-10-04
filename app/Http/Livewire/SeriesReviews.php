<?php

namespace App\Http\Livewire;

use App\Models\Serie;
use Livewire\Component;

class SeriesReviews extends Component
{   public $serie_id, $comment;

    public $rating = 5;

    public function mount(Serie $serie){
        $this->serie_id=$serie->id;
    }

    public function render()
    {   
        $serie = Serie::find($this->serie_id);

        return view('livewire.series-reviews', compact('serie'));
    }

    public function store(){
        $serie = Serie::find($this->serie_id);
        $serie->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id 
        ]);
    }
}
