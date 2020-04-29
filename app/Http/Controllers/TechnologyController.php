<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{

    protected $rules = [
        'title' => 'required|max:100',
        'description' => 'required|max:400',
        'principalImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $rules_update = [
        'id' => 'requires|integer',
        'title' => 'required|max:100',
        'description' => 'required|max:400',
        'principalImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $errorMessages = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' => 'Il campo Descrizione è obbligatorio',
    ];
    protected $errorMessages_update = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' => 'Il campo Descrizione è obbligatorio',
    ];
    protected $errorMessages_delete = [
        'id.required' => 'Il campo id è obbligatorio',
    ];


    /**
     * Display the specified resource.
     *
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function index(Technology $technology)
    {
        $collection = $technology::all();
        return view('/frontoffice/tecnologie/tecnologie', ['collection' => $collection]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function manage(Technology $technology)
    {
        $collection = $technology->orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.technologyDashboard.manage', ['collection' => $collection]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Technology $technology)
    {
        $request->validate($this->rules_delete, $this);
        $technology = $technology->find((int) $request->id);
        if (isset($technology->id))
            $technology->delete();
        return redirect(route('manageTechnology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules_update, $this->errorMessages_update);
        $technology = new Technology;
        $technology->user_id = Auth::user()->id;
        $technology->name = $request->title;
        $technology->description = $request->description;
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/technology_showcase/';
                $image_name = time() . date('Y-m-d') . '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $technology->path = '/storage/img/technology_showcase/' . Auth::user()->id  . $image_name;
                    $technology->save();
                    return view('backoffice.technologyDashboard.create', ['success' => 1]);
                } else return view('backoffice.technologyDashboard.create', ['warning' => 1]);
            } else return view('backoffice.technologyDashboard.create', ['warning' => 1]);
        }
        return view('backoffice.technologyDashboard.create', ['warning' => 1]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request,Technology $technology)
    {
        $request->validate($this->rules_delete);
        $item = $technology::find($request->id);
        return view('backoffice.technologyDashboard.update', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate($this->rules, $this->errorMessages);
        $technology = $technology->find((int)$request->id);
        $technology->exists=true;
        $technology->id = $request->id;
        $technology->user_id = Auth::user()->id;
        $technology->name = $request->title;
        $technology->description = $request->description;
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/technology_showcase/';
                $image_name = time() . date('Y-m-d') . '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $technology->path = '/storage/img/technology_showcase/' . Auth::user()->id  . $image_name;
                    $technology->save();
                    return view('backoffice.technologyDashboard.update', ['success' => 1,'item' => $technology]);
                } else return view('backoffice.technologyDashboard.update', ['warning' => 1,'item' => $technology]);
            } else return view('backoffice.technologyDashboard.update', ['warning' => 1,'item' => $technology]);
        }
        $technology->save();
        return view('backoffice.technologyDashboard.update', ['success' => 1,'item' => $technology]);
    }
}
