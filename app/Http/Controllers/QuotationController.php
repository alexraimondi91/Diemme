<?php

namespace App\Http\Controllers;

use App\models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    protected $rules = [
        'title' => 'required|max:255',
        'description'=>'required|max:400',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $errorMessages = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' =>'Il campo Descrizione è obbligatorio',
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function index(Quotation $quotation)
    {
        $collection = $quotation::all();
        return $collection;
        //return view('/frontoffice/preventivi/preventivi',['collection' => $collection]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function manage(Quotation $quotation)
    {
        $collection = $quotation->orderBy('created_at', 'desc')->paginate(10);
        return view('backoffice.quotationDashboard.manage', ['collection' => $collection]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quotation $quotation)
    {
        $request->validate($this->rules_delete);
        $quotation = $quotation->find((int)$request->id);
        if(isset($quotation->id))
            $quotation->delete(); 
        return redirect(route('manageQuotation'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->rules);
        $quotation = new Quotation;
        $quotation->user_id = Auth::user()->id;
        $quotation->name = $request->title;
        $quotation->description = ($request->description);
        $quotation->save();
        return view('backoffice.quotationDashboard.create', ['success' => 1]);
    }

}
