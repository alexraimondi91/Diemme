<?php

namespace App\Policies;

use App\User;
use App\models\Technology;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TechnologyPolicy
{
    use HandlesAuthorization;

    

    /**
     * Determine whether the user can view the technology.
     *
     * @param  \App\User  $user
     * @param  \App\models\Technology  $technology
     * @return mixed
     */
    public function manage(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }

    /**
     * Determine whether the user can create technologies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }

    /**
     * Determine whether the user can update the technology.
     *
     * @param  \App\User  $user
     * @param  \App\models\Technology  $technology
     * @return mixed
     */
    public function update(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }
    /**
     * Determine whether the user can update the technology.
     *
     * @param  \App\User  $user
     * @param  \App\models\Technology  $technology
     * @return mixed
     */
    public function updateView(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }

    /**
     * Determine whether the user can delete the technology.
     *
     * @param  \App\User  $user
     * @param  \App\models\Technology  $technology
     * @return mixed
     */
    public function destroy(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }

    /**
     * Determine whether the user can restore the technology.
     *
     * @param  \App\User  $user
     * @param  \App\models\Technology  $technology
     * @return mixed
     */
    public function store(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','5')->count()>=1;
    }
}
