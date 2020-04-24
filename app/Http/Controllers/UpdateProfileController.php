<?php

namespace App\Http\Controllers;

use App\models\auth\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{
    protected $rules_credential_password = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password_old' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
    ];
    protected $rules_credential_email = [
            'email' => ['required', 'email', 'max:255'],
            'newemail' => ['required','email', 'max:255'],
            'password' => ['required', 'string']
    ];
    protected $rules_profile = [
            'name_user' => ['required', 'string', 'max:255'],
            'surname_user' => ['required', 'string', 'max:255'],
            'address_user' => ['required', 'string', 'max:100'],
            'country_user' => ['required', 'string', 'max:60'],
            'region_user'=>['required','string','max:60'],
            'city_user'=>['required','string','max:60']
    ];

    protected $errorMessages_credential_password = [
            'email.required' => ['Email necessaria'],
            'password.required' => ['Password necessaria'],
            'password.min' => ['Password troppo corta']
    ];
    protected $errorMessages_credential_email = [
            'email.required' => ['Email necessaria'],
            'password.required' => ['Password necessaria']
    ];
    protected $errorMessages_profile = [
            'name.require' => ['Nome necessario'],
            'surname_user.required' => ['Cognome necessario'],
            'address_user.required' => ['Via necessaria'],
            'country_user.required' => ['Nazione necessaria'],
            'region_user.required'=>['Regione necessaria'],
            'city_user.required'=>['Città necessaria']
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }
   
    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function updateView(Group $group)
    {   
        $collection = $group->find(Auth::user()->group_id);
        return view('backoffice.profileDashboard.profile', ['collection' => $collection]);
    }
    
    /**
     * Update credentiale 
     * 
     * @param  \App\models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function updateCredentialEmail(Request $request, User $user,Group $group){
        $request->validate($this->rules_credential_email, $this->errorMessages_credential_email);
        $user::find($request->newemail);
        if( $user->newemail == null && Hash::check($request->password, Auth::user()->password)){
            
            $user::find(Auth::user()->id);
            $user->exists = true;
            $user->id = (Auth::user()->id);
            $user->email = $request->newemail;
            $user->save();
            return redirect(route('profile'));
        }
        $collection = $group->find(Auth::user()->group_id);
        return view('backoffice.profileDashboard.profile', ['collection' => $collection,'warning'=>1]);
    }

    /**
     * Update credentiale 
     * 
     * @param  \App\models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function updateCredentialPassword(Request $request, User $user,Group $group){
        $request->validate($this->rules_credential_password, $this->errorMessages_credential_password);
        //dd($request->email , Auth::user()->email, Hash::check($request->password_old, Auth::user()->password) );
        if( $request->email == Auth::user()->email  && Hash::check($request->password_old, Auth::user()->password)){
            
            $user::find(Auth::user()->id);
            $user->exists = true;
            $user->id = (Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect(route('profile'));
        }
        $collection = $group->find(Auth::user()->group_id);
        return view('backoffice.profileDashboard.profile', ['collection' => $collection,'warning'=>1]);
    }

    //
    /**
     * Update profile user information
     * 
     * @param  \App\models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, User $user,Group $group){
        $request->validate($this->rules_profile, $this->errorMessages_profile);
        $user::find(Auth::user()->id);
        $user->exists = true;
        $user->id = (Auth::user()->id);
        $user->name_user = $request->name_user;
        $user->surname_user = $request->surname_user;
        $user->address_user = $request->address_user;
        $user->country_user = $request->country_user;
        $user->region_user = $request->region_user;
        $user->city_user = $request->city_user;
        $user->save();
        return redirect(route('profile'));
    }
}
