<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Index;
use App\User;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function index(Index $index)
    {
        $collection = $index->orderBy('created_at', 'desc')->paginate(4);
        return view('/frontoffice/news/multi/multi', ['collection' => $collection]);
    }

    /**
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show_filter(Request $request, Index $index)
    {
        $filter = $request->input('filter');
        $filter = preg_replace('/^[a-z0-9_-]{1,60}$/', '', $filter);
        if ($filter == '')
            $filter = 1;
        $collection = $index->where('name', $filter)
            ->orWhere('name', 'like', '%' . $filter . '%')->paginate(4);
        return view('/frontoffice/news/multi/multi', ['collection' => $collection]);
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
        $id = preg_replace('/[^0-9]/', '', $id);
        if ($id == '')
            $id = 1;
        $collection = $index->with('user')->find($id);
        return view('/frontoffice/news/singola/singola', ['collection' => $collection]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'principalImage' => ['required','max:1024'],
            'summernoteInput' => ['required','max:10240'],
            'title' => 'required',
        ]);

        $detail = $request->summernoteInput;
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

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
                $image_name = time() . $k . '.png';
                $path = public_path() . '/storage/news/' . Auth::user()->id . '-' . $image_name;
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src', '/storage/news/' . Auth::user()->id . '-' . $image_name);
            }
        }
        $detail = $dom->savehtml();
        $news = new Index;
        $news->user_id = Auth::user()->id;
        $news->name = $request->title;
        $news->description = ($detail);
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/news_showcase/';
                $image_name = time() . '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $news->path = '/storage/img/news_showcase/' . Auth::user()->id . $image_name;
                    $news->save();
                    return view('backoffice.newsDashboard.create', ['success' => 1]);
                }
            }
        }
        return view('backoffice.newsDashboard.create', ['warning' => 1]);
    }
}
