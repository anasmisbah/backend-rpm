<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use App\Distributor;
use App\News;
use App\Event;
use App\User;
use App\Transaction;
use App\Coupon;
use App\Voucher;

class HomeController extends Controller
{
    public function index()
    {
        $promo = Promo::count();
        $distributor = Distributor::count();
        $news = News::count();
        $event = Event::count();
        $user = User::count();
        $transaction = Transaction::count();
        $coupon = Coupon::count();
        $voucher = Voucher::count();

        $total = Transaction::sum('quantity');
        $revenue = Transaction::sum('total');

        return view('home',compact('promo','distributor','news','event','user','transaction','coupon','voucher','total','revenue'));
    }

    public function chart()
    {
        $distributors = Distributor::all();

        $data['label']=[];
        $data['transaction']=[];
        $data['revenue']=[];
        foreach ($distributors as  $distributor) {
            $data['label'][] = $distributor->name;
            $data['transaction'][] = $distributor->transactions()->sum('quantity');
            $data['revenue'][] = $distributor->transactions()->sum('total');
        }

        return response()->json($data, 200);
    }
}
