<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companyprofile;

class CompanyprofileController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companyprofile::all();

        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'url'=>'required'
        ]);

        Companyprofile::create([
            'name'=>$request->name,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Added Company Profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companyprofile::findOrFail($id);

        return view('company.detail',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companyprofile::findOrFail($id);

        return view('company.edit',compact('company'));
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
        $company = Companyprofile::findOrFail($id);

        $request->validate([
            'name'=>'required',
            'url'=>'required'
        ]);

        $company->update([
            'name'=>$request->name,
            'url'=>$request->url
        ]);

        return redirect()->back()->with('status','Successfully Updated Company Profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companyprofile::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')->with('status','Successfully Delete Company Profile');
    }
}
