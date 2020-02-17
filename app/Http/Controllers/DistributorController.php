<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();

        return view('distributor.index',compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'member'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'website'=>'required'
        ]);

        Distributor::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'member'=>$request->member,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'website'=>$request->website
        ]);

        return redirect()->back()->with('status','Successfully created Distributor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('distributor.detail',compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('distributor.edit',compact('distributor'));
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
        $distributor = Distributor::findOrFail($id);

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'member'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'website'=>'required'
        ]);

        $distributor->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'member'=>$request->member,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'website'=>$request->website
        ]);

        return redirect()->back()->with('status','Successfully updated Distributor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->back()->with('status','Successfully deleted Distributor');
    }
}
