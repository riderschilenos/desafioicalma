<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\PseudoTypes\False_;

class VendedorPolicy
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

    public function vendedor_activo(User $user){
        if ($user->vendedor()) {
            if($user->vendedor->estado==2){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
        
    }
}
