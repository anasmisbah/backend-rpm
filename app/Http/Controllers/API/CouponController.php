<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CouponController extends Controller
{

        public function index()
        {
            $distributor = Auth::user()->employee->distributor;
            $coupon = $distributor->coupons()->get();

            return response()->json($coupon, 200);
        }
}
