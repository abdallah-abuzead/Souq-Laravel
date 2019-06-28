<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(empty(Categories::all()))         return response()->json(204);
        else return response()->json(Categories::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriesAPI.create');
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
            'desc'=>'required'
        ]);
        $cat = new Categories();
        $cat->name = $request->input("name");
        $cat->desc = $request->input("desc");
        $cat->save();
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
        if(empty(Categories::find($id)))         return response()->json(204);
        else return response()->json(Categories::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(Categories::find($id)))         return response()->json(204);
        else {
            $cat = Categories::find($id);
            return view('categoriesAPI.update')->with('cat', $cat);
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
        $cat = Categories::find($id);
        $cat->name = $request->input("name");
        $cat->desc = $request->input("desc");
        $cat->save();
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
        if(empty(Categories::find($id)))         return response()->json(204);
        else {
            $cat = Categories::find($id);
            $cat->delete();
            return response()->json(200);
        }
    }
}
