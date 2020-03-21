<?php

namespace App\Http\Controllers;

use App\models\Contatti;
use Illuminate\Http\Request;

class ContattiController extends Controller
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
     * @param  \App\models\Contatti  $contatti
     * @return \Illuminate\Http\Response
     */
    public function show(Contatti $contatti)
    {
        $collection = $contatti::all();
        return view('frontoffice.contatti.contatti',['collection'=>$collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Contatti  $contatti
     * @return \Illuminate\Http\Response
     */
    public function edit(Contatti $contatti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Contatti  $contatti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contatti $contatti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Contatti  $contatti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contatti $contatti)
    {
        //
    }
}
