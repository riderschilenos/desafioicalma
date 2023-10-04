<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];

    

    const PENDIENTE =1;
    const APROBADO =2;

    // relacion muchos a muchos inversa
    
    public function pedidos(){
        return $this->BelongsToMany('App\Models\Pedido');
    }

    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
