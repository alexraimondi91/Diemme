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

    protected $rules_update = [
        'id' => 'requires|integer',
        'title' => 'required|max:100',
        'description' => 'required|max:400'
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
        return view('/frontoffice/preventivi/preventivi',['collection' => $collection]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function manage(Quotation $quotation)
    {
        $collection = $quotation->orderBy('created_at', 'desc')->paginate(5);
        $this->authorize('manage',Quotation::class);
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
        $this->authorize('destroy',$quotation);
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
        $this->authorize('store',$quotation);
        $this->validate($request, $this->rules);
        $quotation = new Quotation;
        $quotation->user_id = Auth::user()->id;
        $quotation->name = $request->title;
        $quotation->description = ($request->description);
        $quotation->save();
        return view('backoffice.quotationDashboard.create', ['success' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request,Quotation $quotation)
    {
        $this->authorize('updateView',$quotation);
        $request->validate($this->rules_delete);
        $item = $quotation::find($request->id);
        return view('backoffice.quotationDashboard.update', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        $this->authorize('update',$quotation);
        $request->validate($this->rules_update, $this->errorMessages_update);
        $quotation = $quotation->find((int)$request->id);
        $quotation->exists=true;
        $quotation->id = $request->id;
        $quotation->user_id = Auth::user()->id;
        $quotation->name = $request->title;
        $quotation->description = $request->description;
        $quotation->save();
        return view('backoffice.quotationDashboard.update', ['success' => 1,'item'=>$quotation]);
    }
}
