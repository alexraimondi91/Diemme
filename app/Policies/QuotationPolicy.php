<?php

namespace App\Policies;

use App\User;
use App\models\Quotation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class QuotationPolicy
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
        return Auth::user()->serviceHave()->where('id','=','4')->count()==1;
    }
    /**
     * Determine whether the user can manage
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function destroy(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','4')->count()==1;
    }
    /**
     * Determine whether the user can manage
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','4')->count()==1;
    }
    /**
     * Determine whether the user can manage
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function updateView(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','4')->count()==1;
    }
    /**
     * Determine whether the user can manage
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','4')->count()==1;
    }

    
}
