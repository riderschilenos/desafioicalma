<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Serie;
use App\Models\Video;
use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Auth\AuthManager;

class SerieStatus extends Component
{      
    use AuthorizesRequests;

    public $serie, $current;

    public function mount(Serie $serie){
        
        $this->serie =$serie;

        foreach ($serie->videos as $video){
            if (!$video->completed){
                $this->current = $video;
              
                
               
                break;
            }
        }
        
        if(!$this->current){
            $this->current = $serie->videos->first();
            }

        $this->authorize('enrolled',$serie);
        
    }

 
    public function render()
    {
        return view('livewire.serie-status');
    }

    public function changevideo(Video $video){
        $this->current = $video;
        $this->serie = Serie::find($this->serie->id);
        $this->index = $this->serie->videos->pluck('id')->search($this->current->id);
        
    }

    public function completed(){
        if ($this->current->completed){
            $this->current->users()->detach(auth()->user()->id);
        }else{
            $this->current->users()->attach(auth()->user()->id);
     }

     $this->current = Video::find($this->current->id);
     $this->serie = Serie::find($this->serie->id);
     $this->index = $this->serie->videos->pluck('id')->search($this->current->id);
     
    }

    public function getIndexProperty(){
        return $this->index = $this->serie->videos->pluck('id')->search($this->current->id);
    }

    public function getPreviusProperty(){
        if($this->index==0){
            return null;
        }else{
            return $this->serie->videos[$this->index-1]; 
        }
    }

    public function getNextProperty(){
        if($this->index==$this->serie->videos->count()-1){
            return null;
        }else{
            return $this->serie->videos[$this->index+1]; 
        }
    }
    public function getAdvanceProperty(){
        $i=0;

        foreach ($this->serie->videos as $video){
            if($video->completed){
                $i++;
            }
        }
        $advance = ($i*100)/($this->serie->videos->count());

        return round($advance,2);
    }

    public function download(){
        return response()->download(storage_path('app/public/'.$this->current->resource->url));
    }
}

