<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Index;
use App\User;
use Exception;
use PHPHtmlParser\Dom;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    protected $rules_update = [
        'name'=>'required|string',
        'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $errorMessages_update = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' => 'Il campo Descrizione è obbligatorio',
    ];

    protected $rules = [
        'title' => 'required|string|max:255',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $errorMessages = [
        'title.required' => 'Il campo Titolo è obbligatorio',
    ];


    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function index(Index $index)
    {
        try
        {$collection = $index->orderBy('created_at', 'desc')->paginate(4);
        return view('frontoffice.news.multi.multi', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function manage(Index $index)
    {
        try
        {$this->authorize('manage',$index);
        $collection = $index->orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.newsDashboard.manage', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Index $index)
    {
        try
       { $this->authorize('destroy',$index);
        $request->validate($this->rules_delete);
        $index = $index->find((int)$request->id);
        if(isset($index->id))
            $index->delete(); 
        return redirect(route('manageNews'));}
        catch(Exception $e){
            abort(404);
        }

    }
    
    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show_filter(Request $request, Index $index)
    {
        try
       { $filter = $request->input('filter');
        $filter = preg_replace('/^[a-z0-9_-]{1,60}$/', '', $filter);
        if ($filter == '')
            $filter = 1;
        $collection = $index->where('name', $filter)
            ->orWhere('name', 'like', '%' . $filter . '%')->paginate(4);
        return view('/frontoffice/news/multi/multi', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function showSingle($id, Index $index, User $user)
    {
        //$collection = $index->find($id);
        //$user = $collection->$user;
        //return view('/frontoffice/news/singola/singola', ['collection' => $collection, 'user' => $user]);
        try
        {$id = preg_replace('/[^0-9]/', '', $id);
        if ($id == '')
            $id = 1;
        $collection = $index->with('user')->find($id);
        return view('/frontoffice/news/singola/singola', ['collection' => $collection]);}
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
    public function store(Request $request,Index $news)
    {
        try
        {$this->authorize('store',$news);
        $request->validate($this->rules, $this->errorMessages_update);
        $detail = $request->summernoteInput;
        $dom = new Dom;
        $dom->load($detail);
        $images = $dom->getElementsbyTag('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            if (strstr($data, "http") || strstr($data, "https")) {
                $img->setattribute('src', $data);
            } else {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = time() . $k . '.jpg';
                $path = public_path(). '/storage/news/' . Auth::user()->id . '-' . $image_name;
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src', url(''). '/storage/news/' . Auth::user()->id . '-' . $image_name);
            }
        }
        $detail = $dom;
        $news = new Index;
        $news->user_id = Auth::user()->id;
        $news->name = $request->title;
        $news->description = ($detail);
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/news_showcase/';
                $image_name = time().date('Y-m-d'). '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $news->path = '/storage/img/news_showcase/' . Auth::user()->id . $image_name;
                    $news->save();
                    return view('backoffice.newsDashboard.create', ['success' => 1]);
                } else return view('backoffice.newsDashboard.create', ['warning' => 1]);
            }
            else return view('backoffice.newsDashboard.create', ['warning' => 1]);
        }
        return view('backoffice.newsDashboard.create', ['warning' => 1]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Index  $news
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request,Index $news)
    {
        try
        {$this->authorize('updateView',$news);
        $request->validate($this->rules_delete);
        $item = $news::find($request->id);
        return view('backoffice.newsDashboard.update', ['item' => $item]);}
        catch(Exception $e){
            abort(404);
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $news)
    {
        try
        {$this->authorize('update',$news);
        $request->validate($this->rules_update, $this->errorMessages_update);
        $detail = $request->summernoteInput;
        $dom = new Dom;
        $dom->load($detail);
        $images = $dom->getElementsbyTag('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            if (strstr($data, "http") || strstr($data, "https")) {
                $img->setattribute('src', $data);
            } else {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = time() . $k . '.jpg';
                $path = public_path() . '/storage/news/' . Auth::user()->id . '-' . $image_name;
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src', url(''). '/storage/news/' . Auth::user()->id . '-' . $image_name);
            }
        }
        $detail = $dom;
        $news = $news->find((int)$request->id);
        $news->exists = true;
        $news->user_id = Auth::user()->id;
        $news->id = $request->id;
        $news->name = $request->name;
        $news->description = ($detail);
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/news_showcase/';
                $image_name = time().date('Y-m-d'). '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $news->path = '/storage/img/news_showcase/' . Auth::user()->id . $image_name;
                    $news->save();
                    return view('backoffice.newsDashboard.update', ['success' => 1,'item'=>$news]);
                } else return view('backoffice.newsDashboard.update', ['warning' => 1,'item'=>$news]);
            }
            else return view('backoffice.newsDashboard.update', ['warning' => 1,'item'=>$news]);
        }
        $news->save();
        return view('backoffice.newsDashboard.update', ['success' => 1,'item'=>$news]);
    }
    catch(Exception $e){
        abort(404);
    }
}
}
