<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];
    
    protected $withCount = ['inscripcions'];
    
    const BORRADOR =1;
    const CERRADO =2;
    const PAGADO =3;
    const COBRADO =4;
    

    public function ticketable(){
        return $this->morphTo();
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    //relacion uno a muchos

    public function inscripcions(){
        return $this->hasMany('App\Models\Inscripcion');
    }


    public function gasto(){
        return $this->hasMany('App\Models\Gasto');
    }

    public function pago(){
        return $this->hasMany('App\Models\Pago');
    }


   //relacion uno a muchos inversa 

   public function evento(){
    return $this->belongsTo('App\Models\Evento');
    }

    public function socio(){
        return $this->belongsTo('App\Models\Socio');
        }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
            
    

}
