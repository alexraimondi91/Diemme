<?php

namespace App\Http\Controllers;

use App\models\Layout;
use Exception;
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
        try
        {$this->authorize('factory_index',$layout);
        $collection = $layout
        ->where('final','=','1')
        ->where('status','=',"make")
        ->orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.factoryDashboard.manage', ['collection' => $collection]);}
        catch(Exception $e){
            abort(404);
        }
    }

    /**
     * Show the form for update to send a product
     *
     * @return \Illuminate\Http\Response
     */
    public function toSend(Request $request,Layout $layout)
    {
        //
        try
        {$layout = $layout->find((int)$request->id);
        $this->authorize('factory',$layout);
        $layout->exists = true;
        $layout->id = $request->id;
        $layout->status = 'send';
        $layout->save();
        return redirect(route('makeList'));}
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
    public function rollback(Request $request,Layout $layout)
    {
        //
        try
        {
        $layout = $layout->find((int)$request->id);
        $this->authorize('factory',$layout);
        $layout->exists = true;
        $layout->id = $request->id;
        $layout->final = 0;
        $layout->status = null;
        $layout->save();
        return redirect(route('makeList'));}
        catch(Exception $e){
            abort(404);
        }
    }
}
