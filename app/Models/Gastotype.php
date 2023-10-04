<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastotype extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Gastos(){
        return $this->hasMany('App\Models\Gasto');
    }
}
