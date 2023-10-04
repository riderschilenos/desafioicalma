<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{   
    protected $guarded = ['id'];
    
    use HasFactory;

    //relacion uno a muchos inversa 

    public function marcasmartphone(){
        return $this->belongsTo('App\Models\Marcasmartphone');
    }

    //relacion uno a muchos

    public function ordenes(){
        return $this->hasMany('App\Models\Orden');
    }
}
