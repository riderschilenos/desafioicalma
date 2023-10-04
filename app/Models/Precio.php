<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos

    public function serie(){
        return $this->hasMany('App\Models\Serie');
    }
}
