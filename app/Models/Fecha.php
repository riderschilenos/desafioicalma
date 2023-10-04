<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relacion uno a muchos inversa
    public function evento(){
        return $this->BelongsTo('App\Models\Evento');
    }

    public function fecha(){
        return $this->BelongsTo('App\Models\Fecha');
    }


    //relacion uno a uno polimorfica
    public function image(){
        return $this->MorphOne('App\Models\Image','imageable');
    }


    // relacion uno a muchos inversa

    public function categorias(){
        return $this->hasMany('App\Models\Fecha_categoria');
    }

   

}
