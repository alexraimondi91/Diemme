<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $collection = $product::all();
        return view('/frontoffice/prodotti/prodotti',['collection' => $collection]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function manage(Product $product)
    {
        $collection = $product->orderBy('created_at', 'desc')->paginate(10);
        return view('backoffice.productDashboard.manage', ['collection' => $collection]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $request->validate($this->rules_delete);
        $product = $product->find((int)$request->id);
        if(isset($product->id))
            $product->delete(); 
        return redirect(route('manageProduct'));

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
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->name = $request->title;
        $product->description = ($request->description);
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/product_showcase/';
                $image_name = time().date('Y-m-d'). '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $product->path = '/storage/img/product_showcase/' . Auth::user()->id . $image_name;
                    $product->save();
                    return view('backoffice.productDashboard.create', ['success' => 1]);
                } else return view('backoffice.productDashboard.create', ['warning' => 1]);
            }
            else return view('backoffice.productDashboard.create', ['warning' => 1]);
        }
        return view('backoffice.productDashboard.create', ['warning' => 1]);
    }
}
