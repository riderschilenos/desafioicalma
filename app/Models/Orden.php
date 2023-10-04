<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    
    protected $guarded = ['id','status'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;

    //relacion uno a muchos inversa 

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    public function modelo(){
        return $this->belongsTo('App\Models\Modelo');
    }
    public function smartphone(){
        return $this->belongsTo('App\Models\Smartphone');
    }
    //relacion uno a uno polimorfica

    public function images(){
        return $this->MorphMany('App\Models\Image','imageable');
    }

    public function referencia(){
        return $this->MorphOne('App\Models\Image','imageable');
    }
    //relacion uno a muchos polimorfica 
    public function comentarios(){
        return $this->morphMany('App\Models\Comentario','comentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }

    //relacion uno a muchos

    public function lote(){
        return $this->hasMany('App\Models\Lote');
    }

    public function lotes(){
        return $this->belongsToMany('App\Models\Lote');
    }

    public function gasto(){
        return $this->hasMany('App\Models\Gasto');
    }

}
