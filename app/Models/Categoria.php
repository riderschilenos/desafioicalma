<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    protected $withCount = ['fecha_categorias'];

    //relacion uno a muchos

    public function fecha_categorias(){
        return $this->hasMany('App\Models\Fecha_categoria');
    }
    
    
}
