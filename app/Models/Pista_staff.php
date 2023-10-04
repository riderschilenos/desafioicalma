<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pista_staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function evento(){
        return $this->belongsTo('App\Models\Evento');
    }
}
