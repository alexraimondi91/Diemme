<?php

namespace App\Http\Controllers;

use App\models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{

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
}
