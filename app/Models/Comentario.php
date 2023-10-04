<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function comentable(){
        return $this->morphTo();
    }

     //relacion uno a muchos polimorfica 

     public function comentarios(){
        return $this->morphMany('App\Models\Comentario','comentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }

    // relacion uno a muchos inversa
    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    
  



}
