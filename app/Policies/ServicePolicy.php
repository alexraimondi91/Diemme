<?php

namespace App\Policies;

use App\User;
use App\models\auth\Service;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ServicePolicy
{
    use HandlesAuthorization;

    

    /**
     * Determine whether the user can create services.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

}
