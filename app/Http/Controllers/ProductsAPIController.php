<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
class ProductsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(empty(Products::all()))         return response()->json(204);
        else return response()->json(Products::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsAPI.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'category'=>'required'
        ]);
        $product = new Products;
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->cat_id = $request->input("category");
        $product->save();
        return response()->json(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(empty(Products::find($id)))         return response()->json(204);
        else return response()->json(Products::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(Products::find($id)))         return response()->json(204);
        else {
            $product = Products::find($id);
            return view('productsAPI.update')->with('product', $product);
        }
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
        $product = Products::find($id);
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->cat_id = $request->input("category");
        $product->save();
        return response()->json(200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(empty(Products::find($id)))         return response()->json(204);
        else{
            $product = Products::find($id);
            $product->delete();
            return response()->json(200);
        }
    }

    public function search(Request $request){
        $products = [];
        $names=[];
        $nameSearch = Products::all()->where('name', $request->input('search'));
        foreach ($nameSearch as $name){
            $products[] = $name;
            $names[] = $name->name;
        }
        $priceSearch = Products::all()->where('price', $request->input('search'));
        foreach ($priceSearch as $price){
            $products[] = $price;
            $names[] = $price->name;
        }
        $cats = Categories::all()->where('name', $request->input('search'));
        foreach ($cats as $cat){
            $prods = Products::all()->where('cat_id', $cat->id);
            foreach ($prods as $prod) {
                if(!in_array($prod->name, $names))
                    $products[] = $prod;
            }
        }
        if(empty($products))         return response()->json(204);
        else return response()->json($products);
    }
}
