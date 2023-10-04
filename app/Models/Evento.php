<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];
    
    protected $withCount = ['inscritos','fechas'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;

    public function scopeDisciplina($query,$disciplina_id){
        if($disciplina_id){
            return $query->where('disciplina_id',$disciplina_id);
        }
    }

    public function scopeOrganizador($query,$filmmaker_id){
        if($filmmaker_id){
            return $query->where('user_id',$filmmaker_id);
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // relacion muchos a muchos inversa
    public function inscritos(){
        return $this->BelongsToMany('App\Models\User');
    }

    // relacion uno a muchos inversa
    public function organizador(){
        return $this->BelongsTo('App\Models\User','user_id');
    }

    public function fechas(){
        return $this->hasMany('App\Models\Fecha');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }

    public function staffs(){
        return $this->hasMany('App\Models\Pista_staff');
    }

    public function retiros(){
        return $this->hasMany('App\Models\Retiro');
    }
    
    
    public function disciplina(){
        return $this->BelongsTo('App\Models\Disciplina');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->MorphOne('App\Models\Image','imageable');
    }

}
