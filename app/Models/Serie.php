<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class Serie extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];
    
    protected $withCount = ['sponsors','reviews','videos'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;
    
    //query scopes

    public function scopeDisciplina($query,$disciplina_id){
            if($disciplina_id){
                return $query->where('disciplina_id',$disciplina_id);
            }
    }

    public function scopeFilmmaker($query,$filmmaker_id){
        if($filmmaker_id){
            return $query->where('user_id',$filmmaker_id);
        }
}

    public function getRatingAttribute(){

        if ($this->reviews_count){      
            return round($this->reviews->avg('rating'),1);  
        }
        else{
       return 5;
        }
        }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a uno
    public function observation(){
        return $this->hasOne('App\Models\Observation');
    } 
    
    //relacion uno uno inversa

     public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relacion uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    //relacion uno a uno polimorfica
    public function videos(){
        return $this->morphMany('App\Models\Video','videoable');
    }

    //public function videos(){
    //    return $this->hasMany('App\Models\Video');
    //}


    // relacion uno a muchos inversa
    public function productor(){
        return $this->BelongsTo('App\Models\User','user_id');
    }

    
    public function disciplina(){
        return $this->BelongsTo('App\Models\Disciplina');
    }

    public function precio(){
        return $this->BelongsTo('App\Models\Precio');
    }

    // relacion muchos a muchos inversa
    public function sponsors(){
        return $this->BelongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->MorphOne('App\Models\Image','imageable');
    }

     


}
