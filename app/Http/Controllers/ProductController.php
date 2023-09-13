<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\BussinesUnit;

use App\Http\Requests\ProductRequest;



class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
        $this->middleware('auth:api', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->all();

        return response()->json(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(ProductRequest $request)
    {
        $this->product->name = $request->name;
        $this->product->quantity = $request->quantity;
        $this->product->brand = $request->brand;
        $this->product->bussines_unit_id = $request->bussines_unit_id;
        $this->product->save();

        return response()->json(['product'=>$this->product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function productByBussinesUnitId($id)
    {
        $product = $this->product->where('bussines_unit_id','=',$id)->get();
        return response()->json(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = $this->product->find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->brand = $request->brand;
        $product->bussines_unit_id = $request->bussines_unit_id;
        $product->save();
       return response()->json(['product'=>$product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = $this->product->destroy($id);
        return response()->json(['response'=> $res]);
    }
}
