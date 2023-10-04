<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcasmartphone extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function smartphone(){
        return $this->hasMany('App\Models\Smartphone');
    }
}
