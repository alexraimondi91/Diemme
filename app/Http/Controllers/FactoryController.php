<?php

namespace App\Http\Controllers;

use App\models\Layout;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Layout $layout)
    {
        $collection = $layout
        ->where('final','!=','1')
        ->where('status','=',"make")
        ->orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.factoryDashboard.manage', ['collection' => $collection]);
    }

    /**
     * Show the form for update to send a product
     *
     * @return \Illuminate\Http\Response
     */
    public function toSend(Request $request,Layout $layout)
    {
        //
        $layout = $layout->find((int)$request->id);
        $layout->exists = true;
        $layout->id = $request->id;
        $layout->status = 'send';
        $layout->save();
        return redirect(route('makeList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rollback(Request $request,Layout $layout)
    {
        //
        $layout = $layout->find((int)$request->id);
        $layout->exists = true;
        $layout->id = $request->id;
        $layout->status = null;
        $layout->save();
        return redirect(route('makeList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
