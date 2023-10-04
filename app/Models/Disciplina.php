<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    //relacion 1 a muchos

    public function series(){
        return $this->hasMany('App\Models\Serie');
    }

    public function socios(){
        return $this->hasMany('App\Models\Socio');
    }

    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }

    public function marcas(){
        return $this->hasMany('App\Models\Marca');
    }
}
