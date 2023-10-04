<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auspiciador extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
 

    public function auspiciadorable(){
        return $this->morphTo();
    }
    

}
