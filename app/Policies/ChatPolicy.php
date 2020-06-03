<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ChatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the models chat.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        
        return Auth::user()->serviceHave()->where('id','=','9')->count()==1;
    }


    /**
     * Determine whether the user can delete the models chat.
     *
     * @param  \App\User  $user
     * @param  \App\models\Chat  $modelsChat
     * @return mixed
     */
    public function destroy(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','9')->count()==1;
    }

}
