<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        $distributor = Auth::user()->employee->distributor;
        $voucher = $distributor->vouchers()->with('promo')->get();

        return response()->json($voucher, 200);
    }

    public function detail($id)
    {
        $distributor = Auth::user()->employee->distributor;
        $voucher = $distributor->vouchers()->with('promo')->where('id',$id)->first();

        return response()->json($voucher, 200);
    }
}
