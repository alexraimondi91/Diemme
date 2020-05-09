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

    protected $rules_update = [
        'id' => 'required|integer',
        'title' => 'required|max:100',
        'description' => 'required|max:400',
        'principalImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $rules_delete = [
        'id' => 'required',
    ];

    protected $errorMessages_update = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'dascription.required' => 'Il campo Descrizione è obbligatorio',
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
        $this->authorize($collection);
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
        $this->authorize($product);
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
        $this->authorize($product);
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
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request,Product $product)
    {
        $this->authorize('updateView',$product);
        $request->validate($this->rules_delete);
        $item = $product::find($request->id);
        return view('backoffice.productDashboard.update', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize($product);
        $request->validate($this->rules_update, $this->errorMessages_update);
        $product = $product->find((int)$request->id);
        $product->exists=true;
        $product->id = $request->id;
        $product->user_id = Auth::user()->id;
        $product->name = $request->title;
        $product->description = $request->description;
        //check image
        if ($request->hasFile('principalImage')) {
            if ($request->file('principalImage')->isValid()) {
                $dir = 'public/img/product_showcase/';
                $image_name = time() . date('Y-m-d') . '.jpg';
                if ($request->principalImage->storeAs($dir, Auth::user()->id . $image_name)) {
                    $product->path = '/storage/img/product_showcase/' . Auth::user()->id  . $image_name;
                    $product->save();
                    return view('backoffice.productDashboard.update', ['success' => 1,'item' => $product]);
                } else return view('backoffice.productDashboard.update', ['warning' => 1,'item' => $product]);
            } else return view('backoffice.productDashboard.update', ['warning' => 1,'item' => $product]);
        }
        $product->save();
        return view('backoffice.productDashboard.update', ['success' => 1,'item' => $product]);
    }
}
