<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const ACTIVE =1;
    const INACTIVE =2;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function disciplina(){
        return $this->BelongsTo('App\Models\Disciplina');
    }

    // relacion muchos a muchos

    public function vehiculos(){
        return $this->belongsToMany('App\Models\Vehiculo');
    }

    //relacion uno a uno polimorfica
    public function direccion(){
        return $this->MorphOne('App\Models\Direccion','direccionable');
    }

    public function tickets(){
        return $this->MorphOne('App\Models\Ticket','ticketable');
    }

    public function suscripcions(){
        return $this->morphMany('App\Models\Suscripcion','suscripcionable');
    }

        //relacion uno a uno polimorfica

        public function pedidos(){
            return $this->MorphMany('App\Models\Pedido','pedidoable');
        }
    


}
