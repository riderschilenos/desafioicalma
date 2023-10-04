<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function direccionable(){
        return $this->morphTo();
    }

    //relacion uno a uno

    public function despacho(){
        return $this->hasOne('App\Models\Despacho');
    }
}
