<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];

    const PENDIENTE =1;
    const FINALIZADO =2;

    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // relacion muchos a muchos inversa
    
    public function ordens(){
        return $this->BelongsToMany('App\Models\Orden');
    }

    //relacion uno a uno polimorfica
    public function resource(){
        return $this->MorphOne('App\Models\Resource','resourceable');
    }
}
