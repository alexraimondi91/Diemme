<?php

namespace App\Policies;

use App\User;
use App\models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create contacts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function backofficeContact(User $user)
    {
    
        return Auth::user()->serviceHave()->where('id','=','6')->count()==1;
    }

    

    /**
     * Determine whether the user can restore the contact.
     *
     * @param  \App\User  $user
     * @param  \App\models\Contact  $contact
     * @return mixed
     */
    public function store(User $user)
    {
        //
        return Auth::user()->serviceHave()->where('id','=','6')->count()==1;
    }

}


