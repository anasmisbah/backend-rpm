<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PromoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();

        return view('promo.index',compact('promos'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo.create');    }

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
            'description'=>'required',
            'point'=>'required',
            'status'=>'required',
            'total'=>'required'
        ]);

        $image='';
        if ($request->file('image')) {
            $request->validate([
                'image'=>'mimes:jpeg,bmp,png,jpg,ico',
            ]);
            $image = $request->file('image')->store('images','public');
        }

        $promo = Promo::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image,
            'slug'=>Str::slug($request->title),
            'point'=>$request->point,
            'status'=>$request->status,
            'total'=>$request->total
        ]);


        return redirect()->back()->with('status','Successfully Added Promo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promo.detail',compact('promo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promo = Promo::findOrFail($id);

        return view('promo.edit',compact('promo'));
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
        $promo = Promo::findOrFail($id);
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'point'=>'required',
            'status'=>'required',
            'total'=>'required'
        ]);
        if ($request->file('image')) {
            $request->validate([
                'image'=>'mimes:jpeg,bmp,png,jpg,ico',
            ]);
            if (!($promo->image == "images/default.jpg") && file_exists(storage_path('app/public/'.$promo->image))) {
                Storage::delete('public/'.$promo->image);
            }
            $promo->update([
                'image'=> $request->file('image')->store('images','public')
            ]);
        }

        $promo->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title),
            'point'=>$request->point,
            'status'=>$request->status,
            'total'=>$request->total
        ]);

        return redirect()->back()->with('status','Successfully Updated Promo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();

        return redirect()->route('promo.index');
    }
}
