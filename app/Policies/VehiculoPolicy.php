<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiculoPolicy
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

    public function vehiculo_propio(User $user, Vehiculo $vehiculo){
        if($vehiculo->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }
}
