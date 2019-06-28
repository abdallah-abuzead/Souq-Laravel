<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

class ClientsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(empty(Clients::all()))         return response()->json(204);
        else return response()->json(Clients::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientsAPI.create');
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
            'email'=>'required',
            'phone'=>'required'
        ]);
        $client = new Clients();
        $client->name = $request->input("name");
        $client->email = $request->input("email");
        $client->phone = $request->input("phone");
        $client->save();
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
        if(empty(Clients::find($id)))         return response()->json(204);
        else return response()->json(Clients::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(Clients::find($id)))         return response()->json(204);
        else {
            $client = Clients::find($id);
            return view('clients.update')->with('client', $client);
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);
        $client = Clients::find($id);
        $client->name = $request->input("name");
        $client->email = $request->input("email");
        $client->phone = $request->input("phone");
        $client->save();
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
        if(empty(Clients::find($id)))         return response()->json(204);
        else {
            $client = Clients::find($id);
            $client->delete();
            return response()->json(200);
        }
    }
}
