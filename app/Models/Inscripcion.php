<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    
    const CERRADA = 1;
    const BORRADOR =2;
    const PAGADA =3;
    const ACTIVA =4;
    const USADA =5;


    public function fecha_categoria(){
        return $this->belongsTo('App\Models\Fecha_categoria');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function fecha(){
        return $this->belongsTo('App\Models\Fecha');
    }

    //relacion uno a muchos inversa 

   public function ticket(){
    return $this->belongsTo('App\Models\Ticket');
    }
    

}
