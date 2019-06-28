<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Products;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        return view('products.details')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.update')->with('product', $product);
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
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect('/products');
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
        return view('products.search')->with('products', $products);
    }
}
