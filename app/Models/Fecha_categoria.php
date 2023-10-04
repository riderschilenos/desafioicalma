<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha_categoria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    //relacion uno a muchos inversa 

    public function fecha(){
        return $this->belongsTo('App\Models\Fecha');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    
    public function inscripcions(){
        return $this->hasMany('App\Models\Inscripcion');
    }
}
