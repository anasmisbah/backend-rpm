<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cpdistributor;

class CpdistributorController extends Controller
{
                /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpdistributors = Cpdistributor::all();

        return view('cpdistributor.index',compact('cpdistributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpdistributor.create');
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
            'contact'=>'required',
            'url'=>'required'
        ]);

        Cpdistributor::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Added Contact Person Distributor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cpdistributor = Cpdistributor::findOrFail($id);

        return view('cpdistributor.detail',compact('cpdistributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cpdistributor = Cpdistributor::findOrFail($id);

        return view('cpdistributor.edit',compact('cpdistributor'));
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
        $cpdistributor = Cpdistributor::findOrFail($id);

        $request->validate([
            'name'=>'required',
            'contact'=>'required',
            'url'=>'required'
        ]);

        $cpdistributor->update([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Updated Contact Person Distributor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cpdistributor = Cpdistributor::findOrFail($id);
        $cpdistributor->delete();

        return redirect()->route('cpdistributor.index')->with('status','Successfully Delete Contact Person Distributor');
    }
}
