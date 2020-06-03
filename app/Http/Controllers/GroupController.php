<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\auth\Group;
use App\models\auth\Service;
use Exception;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    protected $rules = [
        'name'=>'required|string|max:100',
        'service.*'=>'required'
    ];
    protected $message = [
        'name.required'=>'Necessario',
        'service.required'=>'Necessario'
    ];
    protected $rules_delete = [
        'id' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Group $group)
    {
        try
        {$this->authorize('index',$group);
        $collection = $group->where('id','!=',4)->paginate(5);
        return view('backoffice.serviceDashboard.manage', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\models\auth\Service $service
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        try
        {$this->authorize('create',$service);
        $collection = $service->all();
        return view('backoffice.serviceDashboard.create',['collection'=>$collection]);}
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
    public function store(Request $request, Group $group,Service $service)
    {
        try
        {$this->authorize('store',$group);
        $request->validate($this->rules,$this->message);
        $group->name = $request->name;
        $group->save();
        $group->services()->attach($request->service);
        $collection = $service->all();
        return view('backoffice.serviceDashboard.create',['collection'=>$collection,'success'=>1]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\models\auth\Group $group
     * @return \Illuminate\Http\Request 
     */
    public function updateView(Request $request,Group $group,Service $service)
    {
        try
        {$this->authorize('updateView',$group);
        $request->validate($this->rules_delete);
        $group = $group::find((int) $request->id);
        $collection = $service->all();
        $active = $group->services()->orderBy('id','asc')->get();
        return view('backoffice.serviceDashboard.update', ['group' => $group,'collection'=>$collection,'active'=>$active]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group,Service $service)
    {
        try
        {$this->authorize('update',$group);
        $request->validate($this->rules_delete);
        $group = $group::find((int) $request->id);
        $group->services()->sync($request->service);
        $active = $group->services()->get();
        $collection = $service->all();
        return view('backoffice.serviceDashboard.update',['group' => $group,'collection'=>$collection,'active'=>$active,'success'=>1]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Group $group,Service $service)
    {
        try
        {$this->authorize('destroy',$group);
        $request->validate($this->rules_delete);
        $group = $group->find((int) $request->id);
        if ($group->id && $request->id!=1 && $request->id!=4)
            $group->services()->detach();
        else return redirect(route('manageGroup'));
        $group->delete();
        return redirect(route('manageGroup'));}
        catch(Exception $e){
            abort(404);
        }
    }
}
