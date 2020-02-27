<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use App\Transaction;
use Carbon\Carbon;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('transaction.index',compact('distributor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('transaction.create',compact('distributor'));
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
            'quantity'=>'required',
            'total'=>'required',
            'pricing_date'=>'required',
            'billing_date'=>'required',
            'distributor_id'=>'required',
        ]);

        $transaction = Transaction::create([
            'quantity'=>$request->quantity,
            'total'=>$request->total,
            'pricing_date'=>$request->pricing_date,
            'billing_date'=>$request->billing_date,
            'distributor_id'=>$request->distributor_id,
        ]);

        return redirect()->back()->with('status','successfully created Transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $distributor = $transaction->distributor;
        return view('transaction.detail',compact('transaction','distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $distributor = $transaction->distributor;
        return view('transaction.edit',compact('transaction','distributor'));
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
        $transaction = Transaction::findOrFail($id);
        $request->validate([
            'quantity'=>'required',
            'total'=>'required',
            'pricing_date'=>'required',
            'billing_date'=>'required',
        ]);

        $transaction->update([
            'quantity'=>$request->quantity,
            'total'=>$request->total,
            'pricing_date'=>$request->pricing_date,
            'billing_date'=>$request->billing_date,
        ]);

        return redirect()->back()->with('status','successfully updated Transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('status','successfully Deleted transaction');
    }

    public function chart($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('transaction.chart',compact('distributor'));
    }

    public function datachart(Request $request)
    {
        $transactions = Transaction::where('distributor_id',$request->id)->get()->groupBy(function($val) {
            return Carbon::parse($val->billing_date)->format('Y');
        });
        $data = [];
        foreach ($transactions as $key => $transaction) {
            $data['label'][] = $key;
            $quantity = 0;
            $revenue = 0;
            foreach ($transaction as $item) {
                $quantity += $item->quantity;
                $revenue+=$item->total;
            }
            $data['quantity'][]=$quantity;
            $data['revenue'][]=$revenue;
        }
    //   dd($data);
        return response()->json($data, 200);
    }
}
