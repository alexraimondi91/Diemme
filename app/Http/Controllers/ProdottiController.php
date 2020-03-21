<?php

namespace App\Http\Controllers;

use App\models\Prodotti;
use Illuminate\Http\Request;

class ProdottiController extends Controller
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
     * @param  \App\models\Prodotti  $prodotti
     * @return \Illuminate\Http\Response
     */
    public function show(Prodotti $prodotti)
    {
        $collection = $prodotti::all();
        return view('/frontoffice/prodotti/prodotti',['collection' => $collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Prodotti  $prodotti
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodotti $prodotti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Prodotti  $prodotti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodotti $prodotti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Prodotti  $prodotti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodotti $prodotti)
    {
        //
    }
}
