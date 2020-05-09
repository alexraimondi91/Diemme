<?php

namespace App\Policies;

use App\User;
use App\models\Index;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class IndexPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manage(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','2')->count()==1;;
    }

    /**
     * Determine whether the user can create indices.
     *
     * @param  \App\User  $user
     * @param  \App\models\Index  $index
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','2')->count()==1;;
    }

    /**
     * Determine whether the user can update the index.
     *
     * @param  \App\User  $user
     * @param  \App\models\Index  $index
     * @return mixed
     */
    public function updateView(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','2')->count()==1;;
    }
    /**
     * Determine whether the user can update the index.
     *
     * @param  \App\User  $user
     * @param  \App\models\Index  $index
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','2')->count()==1;;
    }

    /**
     * Determine whether the user can delete the index.
     *
     * @param  \App\User  $user
     * @param  \App\models\Index  $index
     * @return mixed
     */
    public function destroy(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','2')->count()==1;;
    }


   
}
