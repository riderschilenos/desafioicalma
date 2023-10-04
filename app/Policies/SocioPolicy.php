<?php

namespace App\Policies;

use App\Models\Socio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocioPolicy
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

    public function perfil_propio(User $user, Socio $socio){
        if($socio->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }
}
