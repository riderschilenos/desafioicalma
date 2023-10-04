<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantencion extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    // relacion uno a muchos inversa
    
    public function tallers(){
        return $this->BelongsTo('App\Models\Taller');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function vehiculo(){
        return $this->belongsTo('App\Models\Vehiculo');
    }

}
