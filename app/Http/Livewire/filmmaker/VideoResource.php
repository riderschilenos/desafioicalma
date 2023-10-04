<?php

namespace App\Http\Livewire\Filmmaker;
use App\Models\Video;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class VideoResource extends Component
{   
    use WithFileUploads;

    public $video, $file;

    public function mount(Video $video){
        $this->video=$video;
        
    }

    public function render()
    {
        return view('livewire.filmmaker.video-resource');
    }

    public function save(){
        $this->validate([
            'file'=>'required'
        ]);

        $url = $this->file->store('resources');

        $this->video->resource()->create([
            'url'=>$url
        ]);

        $this->video = Video::find($this->video->id);
    }



    
    public function download(){
        return response()->download(storage_path('app/public/'.$this->video->resource->url));
    }

    public function destroy(){
        Storage::delete($this->video->resource->url);
        $this->video->resource->delete();
        $this->video = Video::find($this->video->id);

    }
}
