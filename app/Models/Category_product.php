<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos

    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }

    public function modelo(){
        return $this->hasMany('App\Models\Modelo');
    }
}
