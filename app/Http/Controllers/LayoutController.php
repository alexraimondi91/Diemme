<?php

namespace App\Http\Controllers;


use App\models\FileLayout;
use App\models\Layout;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LayoutController extends Controller
{
    protected $rules = [
        'name' => 'required|max:255',
        'description' => 'required|string',
        'user_id' => 'required|integer',
        'file' => 'required',
        'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $rules_update = [
        'name' => 'required|string',
        'description' => 'string',
        'owner' => 'integer',
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
        try {
            $layout = Auth::user()->layout()->orderBy('created_at', 'desc')->paginate(5);
            if ($layout == null)
                return redirect(route('dashboard'));
            return view('backoffice.layoutDashboard.manage_customer', ['collection' => $layout]);
        } catch (Exception $e) {
            abort(404);
        }
    }
    /**
     * Display a listing Layout Foctory send for total
     *
     * @return \Illuminate\Http\Response
     */
    public function orderStateTot(Layout $layout)
    {
        try {
            $this->authorize('orderStateTot', $layout);
            $layout = $layout->orderBy('created_at', 'desc')
                ->where('final', '=', 1)
                ->paginate(5);
            if ($layout == null)
                return redirect(route('dashboard'));
            return view('backoffice.factoryDashboard.manageStatus', ['collection' => $layout]);
        } catch (Exception $e) {
            abort(404);
        }
    }
    /**
     * Display a listing Layout Foctory send for Single user
     *
     * @return \Illuminate\Http\Response
     */
    public function orderStateCustomer(Layout $layout)
    {
        try {
            $layout = Auth::user()->layout()->orderBy('created_at', 'desc')
                ->where('final', '=', 1)
                ->orwhere('status', '=', 'make')
                ->where('status', '=', 'send')
                ->paginate(5);
            if ($layout == null)
                return redirect(route('dashboard'));
            return view('backoffice.factoryDashboard.manageStatus', ['collection' => $layout]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Layout $layout)
    {
        //
        try {
            $this->authorize('store', $layout);
            $users = $user->forService()
                ->where('service.id', '=', 14)
                ->get();
            return view('backoffice.layoutDashboard.create', ['users' => $users]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Layout $layout, FileLayout $file, Request $request)
    {
        try {
            $this->authorize('store', $layout);
            $request->validate($this->rules, $this->errorMessages);
            $user = $user->find((int) $request->user_id);
            if ($user) {
                $layout->name = $request->name;
                $layout->description = $request->description;
                $layout->status = 0;
                $layout->final = 0;
                $filetosave  = array();
                $counter = 0;
                foreach ($request->file as $item) {
                    $dir = 'public/layout/';
                    $image_name = Auth::user()->id . $counter . time() . date('Y-m-d') . '.jpg';
                    $item->storeAs($dir, $image_name);
                    $path = '/storage/layout/' . $image_name;
                    $filetosave[] = new FileLayout(['path' => $path]);
                    $counter++;
                }
                $layout->save();
                $layout->files()->saveMany($filetosave);
                $layout->user()->attach([Auth::user()->id, $user->id]);
                return view('backoffice.layoutDashboard.create', ['success' => 1]);
            } else return view('backoffice.layoutDashboard.create', ['warning' => 1]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Layout $layout)
    {
        try {
            $this->authorize('show', $layout);
            $request->validate(['id' => 'required|integer']);
            $layout = $layout->find((int) $request->id);
            $users = $layout->user()->get();
            $photos = $layout->files()->get();
            return view('backoffice.layoutDashboard.view', ['item' => $layout, 'photos' => $photos, 'users' => $users]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    public function manage(Layout $layout)
    {
        try {
            $collection = Auth::user()->layout()->where('final', '!=', '1')->orderBy('created_at', 'desc')->paginate(5);
            return view('backoffice.layoutDashboard.manage', ['collection' => $collection]);
        } catch (Exception $e) {
            abort(404);
        }
    }
    /**
     * View the specific form update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request, User $users)
    {
        try {
            $this->authorize('updateView', Layout::class);
            $request->validate($this->rules_delete);
            $item = Auth::user()->layout()->find((int) $request->id);
            $owners = $item->user()->get();
            $users = $users->forService()->where('service.id', '=', '7')->get();
            return view('backoffice.layoutDashboard.update', ['item' => $item, 'users' => $users, 'owners' => $owners]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layout $layout, FileLayout $file)
    {
        try {
            $this->authorize('update', $layout);
            $users = User::forService()->where('service.id', '=', '7')->get();
            $request->validate($this->rules_update, $this->errorMessages_update);
            $layout = $layout->find((int) $request->id);
            if ($layout) {
                $layout->id = $request->id;
                $layout->exists = true;
                $layout->name = $request->name;
                $layout->description = $request->description;
                if (isset($request->owner)) {
                    $layout->user()->detach([Auth::user()->id]);
                    $layout->user()->attach([(int) $request->owner]);
                }
                $filetosave  = array();
                $counter = 1;
                if (isset($request->file)) {
                    foreach ($request->file as $item) {
                        $dir = 'public/layout/';
                        $image_name = Auth::user()->id . $counter . time() . date('Y-m-d') . '.jpg';
                        $item->storeAs($dir, $image_name);
                        $path = '/storage/layout/' . $image_name;
                        $filetosave[] = new FileLayout(['path' => $path]);
                        $counter++;
                    }

                    $layout->save();
                    $layout->files()->detach();
                    $layout->files()->delete();
                    $layout->files()->saveMany($filetosave);
                    return view('backoffice.layoutDashboard.update', ['success' => 1, 'item' => $layout, 'users' => $users]);
                } else $layout->save();
                return view('backoffice.layoutDashboard.update', ['success' => 1, 'item' => $layout, 'users' => $users]);
            } else return view('backoffice.layoutDashboard.update', ['warning' => 1, 'item' => $layout, 'users' => $users]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Layout $layout)
    {
        try
        {$this->authorize('destroy', $layout);
        $request->validate($this->rules_delete);
        $layout = $layout->find((int) $request->id);
        if ($layout->id) {
            $layout->user()->detach();
            $layout->files()->detach();
            $layout->files()->delete();
            $layout->delete();
        }
        return redirect(route('manageLayout', $layout->id));}
        catch(Exception $e){
            abort(404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function sendIntoProduction(Request $request, Layout $layout)
    {
        try
        {$this->authorize('factory', $layout);
        $request->validate($this->rules_delete);
        $layout = $layout->find((int) $request->id);
        if ($layout->id) {
            $layout->final = 1;
            $layout->status = 'make';
            $layout->save();
        } else redirect(route('dashboard'));
        return redirect(route('manageLayout', $layout->id));}
        catch(Exception $e){
            abort(404);
        }
    }
}
