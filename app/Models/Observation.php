<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['body','serie_id'];

    //uno a uno inversa
    public function serie(){
        return $this->belongsTo('App\Models\Serie');
    }
}
