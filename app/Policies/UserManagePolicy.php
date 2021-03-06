<?php

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserManagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $users
     * @return mixed
     */
    public function index(User $users)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function updateView(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function destroy(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function store(User $user, User $model)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }
}
