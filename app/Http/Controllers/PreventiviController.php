<?php

namespace App\Http\Controllers;

use App\models\Preventivi;
use Illuminate\Http\Request;

class PreventiviController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Preventivi  $preventivi
     * @return \Illuminate\Http\Response
     */
    public function show(Preventivi $preventivi)
    {
        $collection = $preventivi::all();
        return view('/frontoffice/preventivi/preventivi',['collection' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Preventivi  $preventivi
     * @return \Illuminate\Http\Response
     */
    public function edit(Preventivi $preventivi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Preventivi  $preventivi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preventivi $preventivi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Preventivi  $preventivi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preventivi $preventivi)
    {
        //
    }
}
