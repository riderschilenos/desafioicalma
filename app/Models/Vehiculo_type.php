<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo_type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos
    public function vehiculos(){
        return $this->hasMany('App\Models\Vehiculo');
    }
}
