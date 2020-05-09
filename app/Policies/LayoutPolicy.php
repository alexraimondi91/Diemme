<?php

namespace App\Policies;

use App\User;
use App\models\Layout;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LayoutPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any layouts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the layout.
     *
     * @param  \App\User  $user
     * @param  \App\models\Layout  $layout
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create layouts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the layout.
     *
     * @param  \App\User  $user
     * @param  \App\models\Layout  $layout
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','7')->count()>=1;
    }
    /**
     * Determine whether the user can update the layout.
     *
     * @param  \App\User  $user
     * @param  \App\models\Layout  $layout
     * @return mixed
     */
    public function updateView(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','7')->count()>=1;
    }

    /**
     * Determine whether the user can delete the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function destroy(User $user)
    {
        return Auth::user()->serviceHave()->where('id','=','7')->count()>=1;
    }

    /**
     * Determine whether the user can restore the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','7')->count()>=1;
    }

    /**
     * Determine whether the user can permanently show the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function show(User $user)
    {
        return Auth::user()->layout()->count()>=1;
    }

    /**
     * Determine whether the user can permanently delete the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function factory(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','13')->count()>=1;
    }
    /**
     * Determine whether the user can permanently delete the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function factory_index(User $user)
    {
        //
        
        return Auth::user()->serviceHave()->where('id','=','13')->count()>=1;
    }

    /**
     * Determine whether the user can permanently delete the layout.
     *
     * @param  \App\User  $user
     * 
     * @return mixed
     */
    public function orderStateTot(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','10')->count()>=1;
    }

    }

