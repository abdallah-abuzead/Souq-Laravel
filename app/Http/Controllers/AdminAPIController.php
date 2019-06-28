<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(empty(Admin::all()))         return response()->json(204);
        else return response()->json(Admin::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminsAPI.create');

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
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'fullname'=>'required'
        ]);
        $admin = new Admin();
        $admin->username = $request->input("username");
        $admin->email = $request->input("email");
        $admin->password = $request->input("password");
        $admin->fullname = $request->input("fullname");
        $admin->save();
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
        if(empty(Admin::find($id)))         return response()->json(204);
         else return response()->json(Admin::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(Admin::find($id)))         return response()->json(204);
        else {
            $admin = Admin::find($id);
            return view('adminsAPI.update')->with('admin', $admin);
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
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'fullname'=>'required'
        ]);
        $admin = new Admin();
        $admin->username = $request->input("username");
        $admin->email = $request->input("email");
        $admin->password = $request->input("password");
        $admin->fullname = $request->input("fullname");
        $admin->save();
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
        if(empty(Admin::find($id)))         return response()->json(204);
        else {
            $admin = Admin::find($id);
            $admin->delete();
            return response()->json(200);
        }
    }
}
