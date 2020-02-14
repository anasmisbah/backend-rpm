<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactperson;


class ContactpersonController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactpersons = Contactperson::all();

        return view('contactperson.index',compact('contactpersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactperson.create');
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
            'contact'=>'required',
            'url'=>'required'
        ]);

        Contactperson::create([
            'contact'=>$request->contact,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Added Contact Person');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactperson = Contactperson::findOrFail($id);

        return view('contactperson.detail',compact('contactperson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactperson = Contactperson::findOrFail($id);

        return view('contactperson.edit',compact('contactperson'));
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
        $contactperson = Contactperson::findOrFail($id);

        $request->validate([
            'contact'=>'required',
            'url'=>'required'
        ]);

        $contactperson->update([
            'contact'=>$request->contact,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Updated Contact Person');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactperson = Contactperson::findOrFail($id);
        $contactperson->delete();

        return redirect()->route('contactperson.index')->with('status','Successfully Delete Contact Person');
    }
}
