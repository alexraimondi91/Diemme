<?php

namespace App\Http\Controllers;

use App\models\Layout;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LayoutController extends Controller
{
    protected $rules = [
        'name' => 'required|max:255',
        'description'=>'required|string|',
        'user_id'=>'required|integer',
        'file.*'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $errorMessages = [
        'name.required' => 'Il campo nome è obbligatorio',
        'description.required'=>'Il campo descripzione è obbligatorio',
        'user_id.required'=>'Il campo id utente è obbligatorio',
        'file.required'=>'Il campo file è obbligatorio',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Layout $layout, Request $request)
    {   
        $request->validate($this->rules, $this->errorMessages);
        $user = $user->find((int)$request->user_id);
       
        if (isset($user) && $user->group_id == 4)
        {
            $layout->name = $request->name;
            $layout->description = $request->description;
            $layout->status = 0;
            $layout->user_id = $request->user_id;
            $file  = array();
            $counter = 1;
            foreach ($request->file as $item) {
                $dir = 'public/layout/';
                $image_name = Auth::user()->id . $counter . time().date('Y-m-d') . '.jpg';
                $item->storeAs($dir,$image_name);
                array_push($file, '/storage/layout/' . $image_name);
                $counter++;
            }
            $layout->path = json_encode($file);
            $layout->save();
            return view('backoffice.layoutDashboard.create', ['success' => 1]);
        }
        else return view('backoffice.layoutDashboard.create', ['warning' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layout $layout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
