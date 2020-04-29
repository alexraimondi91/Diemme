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
        'description' => 'required|string',
        'user_id' => 'required|integer',
        'file.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $rules_update = [
        'name' => 'string|max:255',
        'description' => '|string',
        'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $errorMessages_update = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' => 'Il campo Descrizione è obbligatorio',
    ];

    protected $errorMessages = [
        'name.required' => 'Il campo nome è obbligatorio',
        'description.required' => 'Il campo descripzione è obbligatorio',
        'user_id.required' => 'Il campo id utente è obbligatorio',
        'file.required' => 'Il campo file è obbligatorio',
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
        $user = $user->find((int) $request->user_id);

        if ($user && $user->group_id == 4) {

            $layout->name = $request->name;
            $layout->description = $request->description;
            $layout->status = 0;
            $layout->final = 0;
            $file  = array();
            $counter = 1;
            foreach ($request->file as $item) {
                $dir = 'public/layout/';
                $image_name = Auth::user()->id . $counter . time() . date('Y-m-d') . '.jpg';
                $item->storeAs($dir, $image_name);
                array_push($file, '/storage/layout/' . $image_name);
                $counter++;
            }
            $layout->path = json_encode($file);
            $layout->save();

            $layout->user()->attach([Auth::user()->id, $user->id]);
            return view('backoffice.layoutDashboard.create', ['success' => 1]);
        } else return view('backoffice.layoutDashboard.create', ['warning' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        $item = Auth::user()->layout()->get();
        return $item;
        //return view('backoffice.layoutDashboard.manage', ['item' => $item]);
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

    public function manage(Layout $layout)
    {
        $collection = $layout->orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.layoutDashboard.manage', ['collection' => $collection]);
    }

    /**
     * View the specific form update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request, Layout $layout)
    {
        $request->validate($this->rules_delete);
        $item = $layout::find((int) $request->id);
        return view('backoffice.layoutDashboard.update', ['item' => $item]);
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
        $request->validate($this->rules_update, $this->errorMessages_update);

        $layout = $layout->find((int) $request->id);

        if ($layout) {
            $layout->id = $request->id;
            $layout->exists = true;
            $layout->name = $request->name;
            $layout->description = $request->description;
            if (isset($request->status) && isset($request->final)) {
                $layout->status = 0;
                $layout->final = 0;
            }
            $file  = array();
            $counter = 1;
            if (isset($request->file)) {
                foreach ($request->file as $item) {
                    $dir = 'public/layout/';
                    $image_name = Auth::user()->id . $counter . time() . date('Y-m-d') . '.jpg';
                    $item->storeAs($dir, $image_name);
                    array_push($file, '/storage/layout/' . $image_name);
                    $counter++;
                }
                $layout->path = json_encode($file);
            }
            $layout->save();
            return view('backoffice.layoutDashboard.update', ['success' => 1,'item'=>$layout]);
        } else return view('backoffice.layoutDashboard.update', ['warning' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Layout $layout)
    {
        $request->validate($this->rules_delete);
        $layout = $layout->find((int) $request->id);
        if ($layout->id)
            $layout->user()->detach();
        $layout->delete();
        return redirect(route('manageLayout',$layout->id));
    }
}
