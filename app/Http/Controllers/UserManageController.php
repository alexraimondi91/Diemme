<?php

namespace App\Http\Controllers;

use App\models\auth\Group;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManageController extends Controller
{

    protected $rules = [
        'name_user' => ['required', 'string', 'max:255'],
        'surname_user' => ['required', 'string', 'max:255'],
        'fiscalCode_user' => ['required', 'string', 'max:20'],
        'address_user' => ['required', 'string', 'max:200'],
        'country_user' => ['required', 'string', 'max:200'],
        'region_user' => ['required', 'string', 'max:200'],
        'city_user' => ['required', 'string', 'max:200'],
        'group' => ['required', 'integer','exists:App\models\auth\Group,id'],
        'email' => ['required', 'email', 'max:255', 'unique:App\User,email'],
        'password' => ['required', 'string', 'confirmed'],
    ];
    protected $rules_update = [
        'id'=>'required|integer',
        'name_user' => ['required', 'string', 'max:255'],
        'surname_user' => ['required', 'string', 'max:255'],
        'fiscalCode_user' => ['required', 'string', 'max:20'],
        'address_user' => ['required', 'string', 'max:200'],
        'country_user' => ['required', 'string', 'max:200'],
        'region_user' => ['required', 'string', 'max:200'],
        'city_user' => ['required', 'string', 'max:200'],
        'group' => ['required', 'integer','exists:App\models\auth\Group,id']
        
    ];
    protected $message = [
        'name_user.required' => ['Nome richiesto'],
        'surname_user.required' => ['Cognome richiesto'],
        'fiscalCode_user.required' => ['Codice fiscale richiesto'],
        'address_user.required' => ['Via richiesta'],
        'country_user.required' => ['Nazione richiesta'],
        'region_user.required' => ['Regione richiesta'],
        'city_user.required' => ['Città richiesta'],
        'email.required' => ['Email richiesta'],
        'password.required' => ['Password richiesta'],
    ];

    protected $rules_delete = [
        'id'=>'required|integer',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        try
        {$this->authorize('index',$users);
        $collection = $users->orderBy('created_at', 'desc')->with('group')->paginate(5);
        return view('backoffice.userManage.manage', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,Group $group)
    {
        try
        {$this->authorize($user);
        $collection = $group->all();
        return view('backoffice.userManage.create',['collection'=>$collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user,Group $group)
    {
        try
        {$this->authorize('store',$user);
        $request->validate($this->rules,$this->message);
        $user->name_user = $request->name_user;
        $user->surname_user = $request->surname_user;
        $user->fiscalCode_user = $request->fiscalCode_user;
        $user->address_user = $request->address_user;
        $user->country_user = $request->country_user;
        $user->region_user = $request->region_user;
        $user->city_user = $request->city_user;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->group_id = $request->group;
        $user->active = 1;
        $user->save();
        $collection = $group->all();
        return view('backoffice.userManage.create',['collection'=>$collection,'success'=>1]);}
        catch(Exception $e){
            abort(404);
        }

    }
    /**
     * Display the specified resource to update.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request,User $user,Group $group)
    {
        try
        {$this->authorize('updateView',$user);
        $request->validate($this->rules_delete);
        $item = $user->find((int)$request->id);
        $collection = $group->all();
        return view('backoffice.userManage.update',['item'=>$item,'collection'=>$collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,Group $group)
    {
        try
        {$this->authorize('update',$user);
        $request->validate($this->rules_update);
        $user->id = $request->id;
        $user->exists = true;
        $user->name_user = $request->name_user;
        $user->surname_user = $request->surname_user;
        $user->fiscalCode_user = $request->fiscalCode_user;
        $user->address_user = $request->address_user;
        $user->country_user = $request->country_user;
        $user->region_user = $request->region_user;
        $user->city_user = $request->city_user;
        $user->group_id = $request->group;
        $user->active = 1;
        $user->save();
        $collection = $group->all();
        return view('backoffice.userManage.update',['item'=>$user,'collection'=>$collection,'success'=>1]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        //
        try
        {$this->authorize('destroy',$user);
        $request->validate($this->rules_delete);
        $user = $user->find((int) $request->id);
        $user->forceDelete();
        return redirect(route('manageUser'));}
        catch(Exception $e){
            abort(404);
        }
    }
}
