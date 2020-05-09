<?php

namespace App\Policies;

use App\models\auth\Group;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the group.
     *
     * @param  \App\User  $user
     * @param  \App\models\auth\Group  $group
     * @return mixed
     */
    public function index(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;
    }

    /**
     * Determine whether the user can update the group.
     *
     * @param  \App\User  $user
     * @param  \App\models\auth\Group  $group
     * @return mixed
     */
    public function updateView(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;;
    }
    /**
     * Determine whether the user can update the group.
     *
     * @param  \App\User  $user
     * @param  \App\models\auth\Group  $group
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;;
    }

    /**
     * Determine whether the user can delete the group.
     *
     * @param  \App\User  $user
     * @param  \App\models\auth\Group  $group
     * @return mixed
     */
    public function destroy(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;;
    }

    /**
     * Determine whether the user can restore the group.
     *
     * @param  \App\User  $user
     * @param  \App\models\auth\Group  $group
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','1')->count()==1;;
    }
}
