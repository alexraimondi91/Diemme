<?php

namespace App\Http\Controllers;

use App\models\Index;
use App\models\Contact;
use Exception;

class IndexController extends Controller
{

    /**
     * Display the specified resource.
     *@param \App\models\Contact $contact
     * @param  \App\models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function index(Index $index, Contact $contact)
    {
        //$collection = $index::all();
        try {
            $collection = $index->orderBy('created_at', 'desc')
                ->limit(4)->get();
            $about = $contact->all();
            return view('/frontoffice/home/home', ['collection' => $collection, 'about' => $about]);
        } catch (Exception $e) {
            abort(404);
        }
    }
}
