<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Serie;

class SeriePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Serie $serie){
        return $serie->sponsors->contains($user->id);
    }

    public function published(?User $user, Serie $serie){
        if($serie->status ==3){
            return true;
        }else{
            return false;
        }
    }

    public function dicatated(User $user, Serie $serie){
        if($serie->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }

    public function revision(User $user, Serie $serie){
        if($serie->status == 2){
            return true;
        }else{
            return false;
        }

    }

    public function valued(User $user, Serie $serie){
        if (Review::where('user_id', $user->id)->where('serie_id',$serie->id)->count()){
            return false;
        }else{
            return true;
        }

    }
}
