<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function despachable(){
        return $this->morphTo();
    }

     //relacion uno uno inversa

     public function direccion(){
        return $this->belongsTo('App\Models\Direccion');
    }

    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    
}
