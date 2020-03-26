<?php

namespace App\Http\Controllers;

use App\models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function index(Technology $technology)
    {
        $collection = $technology::all();
        return view('/frontoffice/tecnologie/tecnologie',['collection' => $collection]);
    }
}
