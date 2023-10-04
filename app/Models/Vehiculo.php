<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const DESACTIVADO =0;
    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADOOK =3;
    const PUBLICADOPENDIENTE=4;
    const REGISTRADO =5;
    const REGISTRADOVENTA =6;

    const PAGO =1;
    const PORCENTAJE =2;

    

    public function scopeVehiculo_type($query,$vehiculo_type_id){
        if($vehiculo_type_id){
            return $query->where('vehiculo_type_id',$vehiculo_type_id);
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion uno a muchos
    public function mantencions(){
        return $this->hasMany('App\Models\Mantencion');
    }

    // relacion uno a muchos inversa
    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    public function vehiculo_type(){
        return $this->BelongsTo('App\Models\Vehiculo_type');
    }

    public function marca(){
        return $this->BelongsTo('App\Models\Marca');
    }


     // relacion muchos a muchos

     public function socios(){
        return $this->belongsToMany('App\Models\Socio');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphMany('App\Models\Image','imageable');
    }

    public function suscripcion(){
        return $this->morphMany('App\Models\Suscripcion','suscripcionable');
    }
    
}
