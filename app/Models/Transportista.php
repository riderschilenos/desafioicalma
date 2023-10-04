<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportista extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     //relacion uno a muchos
     public function Pedidos(){
        return $this->hasMany('App\Models\pedido');
    }



}
