<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use App\Coupon;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('coupon.index',compact('distributor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('coupon.create',compact('distributor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distributor = Distributor::findOrFail($request->distributor_id);
        $last = $distributor->coupons->last();
        $id = 0;

        if ($last != null) {
            $id = $last->id;
        }

        $request->validate([
            'coupon'=>'required'
        ]);

        $total = $request->coupon;

        for ($i=0; $i < $total; $i++) {
            $code_coupon = 'C0'.$distributor->id.'00'.(++$id);
            $distributor->coupons()->create([
                'code_coupon'=>$code_coupon
            ]);
        }

        return redirect()->route('distributor.coupon.index',$distributor->id)->with('status',"successfully added $total Coupon");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('distributor.coupon.index',$coupon->distributor->id)->with('status',"successfully deleted Coupon");
    }

    public function deleteall($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->coupons()->delete();
        return redirect()->route('distributor.coupon.index',$distributor->id)->with('status',"successfully deleted All Coupon");
    }

    public function print($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('coupon.print',compact('distributor'));
    }
}
