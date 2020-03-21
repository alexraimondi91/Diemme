<?php

namespace App\Http\Controllers;

use App\models\Tecnologie;
use Illuminate\Http\Request;

class TecnologieController extends Controller
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
     * @param  \App\models\Tecnologie  $tecnologie
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnologie $tecnologie)
    {
        $collection = $tecnologie::all();
        return view('/frontoffice/tecnologie/tecnologie',['collection' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Tecnologie  $tecnologie
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnologie $tecnologie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Tecnologie  $tecnologie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnologie $tecnologie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Tecnologie  $tecnologie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnologie $tecnologie)
    {
        //
    }
}
