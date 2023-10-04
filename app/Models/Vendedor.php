<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const BORRADOR =1;
    const ACTIVO =2;
    const BLOQUEADO =3;

    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
    
    public function suscripcions(){
        return $this->morphMany('App\Models\Suscripcion','suscripcionable');
    }
}
