<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suscripcionable(){
        return $this->morphTo();
    }
    
}
