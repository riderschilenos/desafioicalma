<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;


    protected $withCount = ['ordens'];

    
    public function pedidoable(){
        return $this->morphTo();
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
    //relacion uno a uno

    public function despacho(){
        return $this->hasOne('App\Models\Despacho');
    }


    //relacion uno a muchos

    public function ordens(){
        return $this->hasMany('App\Models\Orden');
    }


    public function gasto(){
        return $this->hasMany('App\Models\Gasto');
    }

    public function pago(){
        return $this->hasMany('App\Models\Pago');
    }

     //relacion uno a muchos inversa 

    public function transportista(){
        return $this->belongsTo('App\Models\Transportista');
    }

    public function vendedor(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    //relacion uno a uno polimorfica

    public function image(){
        return $this->MorphOne('App\Models\Image','imageable');
    }

    

    



}
