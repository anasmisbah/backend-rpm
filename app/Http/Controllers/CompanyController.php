<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::first();

        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::first();

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
        $company = Company::findOrFail($id);

        $request->validate([
            'name'=>'required'
        ]);

        if ($request->file('logo')) {
            $request->validate([
                'logo'=>'mimes:jpeg,bmp,png,jpg,ico',
            ]);
            if (!($company->logo == "logos/default.jpg") && file_exists(storage_path('app/public/'.$company->logo))) {
                Storage::delete('public/'.$company->logo);
            }
            $company->update([
                'logo'=> $request->file('logo')->store('logos','public')
            ]);
        }

        if ($request->file('profile')) {
            $request->validate([
                'profile'=>'mimes:pdf',
            ]);
            if ($company->profile && file_exists(storage_path('app/public/'.$company->profile))) {
                Storage::delete('public/'.$company->profile);
            }
            $company->update([
                'profile'=> $request->file('profile')->store('profiles','public')
            ]);
        }


        $company->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'contact'=>$request->contact
        ]);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
