<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    //relacion uno a uno polimorfica
    public function direccion(){
        return $this->MorphOne('App\Models\Direccion','direccionable');
    }

       //relacion uno a uno polimorfica

       public function pedidos(){
        return $this->MorphMany('App\Models\Pedido','pedidoable');
    }
    
}
