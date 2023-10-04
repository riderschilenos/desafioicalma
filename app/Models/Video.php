<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Video extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }
    
    // relacion uno a muchos inversa
    //public function serie(){
    //    return $this->BelongsTo('App\Models\Serie');
    //}

    
    public function videoable(){
        return $this->morphTo();
    }

    public function platform(){
        return $this->BelongsTo('App\Models\Platform');
    }
    
    // relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function resource(){
        return $this->MorphOne('App\Models\Resource','resourceable');
    }
    
    public function image(){
        return $this->MorphOne('App\Models\Image','imageable');
    }

    //relacion uno a muchos polimorfica 
    public function comentarios(){
        return $this->morphMany('App\Models\Comentario','comentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }


}
