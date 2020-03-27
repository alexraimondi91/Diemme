<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Index;
use App\User;

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
        $collection = $index->paginate(4);
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
        $id = preg_replace( '/[^0-9]/', '', $id );
        $collection = $index->with('user')->find(1);
        return view('/frontoffice/news/singola/singola', ['collection' => $collection]);
    }
}
