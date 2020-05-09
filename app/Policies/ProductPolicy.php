<?php

namespace App\Policies;

use App\User;
use App\models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\models\Product  $product
     * @return mixed
     */
    public function manage(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','3')->count()==1;;
    }

    

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\models\Product  $product
     * @return mixed
     */
    public function updateView(User $user)
    {
        //
        
        return Auth::user()->serviceHave()->where('id','=','3')->count()==1;;
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\models\Product  $product
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','3')->count()==1;;
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $user
     * @param  \App\models\Product  $product
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','3')->count()==1;;
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\models\Product  $product
     * @return mixed
     */
    public function destroy(User $user)
    {
        //
        
        return Auth::user()->serviceHave()->where('id','=','3')->count()==1;;
    }
}
