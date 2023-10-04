<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;

    //relacion uno a muchos

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function ordenes(){
        return $this->hasMany('App\Models\Orden');
    }

    //relacion uno a muchos inversa 

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina');
    }

    public function category_product(){
        return $this->belongsTo('App\Models\Category_product');
    }
}
