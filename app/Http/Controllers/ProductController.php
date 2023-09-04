<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
        $this->middleware('auth:api', ['except' => ['create']]);
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
    public function create(Request $request)
    {
        $this->product->name = $request->name;
        $this->product->quantity = $request->quantity;
        $this->product->brand = $request->brand;
        $this->product->bussines_unit_id = $request->bussines_unit_id;
        $res = $this->product->save();
        return response()->json(['product'=>$res]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
