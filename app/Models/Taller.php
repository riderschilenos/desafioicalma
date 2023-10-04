<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    //relacion uno a muchos

    public function mantencions(){
        return $this->hasMany('App\Models\Mantencion');
    }
}
