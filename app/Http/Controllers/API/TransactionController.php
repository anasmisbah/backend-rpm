<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $distributor = Auth::user()->employee->distributor;
        $transaction = $distributor->transactions()->get();

        return response()->json($transaction, 200);
    }

    public function detail($id)
    {
        $distributor = Auth::user()->employee->distributor;
        $transaction = $distributor->transactions()->where('id',$id)->first();

        return response()->json($transaction, 200);
    }
}
