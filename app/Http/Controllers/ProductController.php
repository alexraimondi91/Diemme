<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $collection = $product::all();
        return view('/frontoffice/prodotti/prodotti',['collection' => $collection]);
    }
}
