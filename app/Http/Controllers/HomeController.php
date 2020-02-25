<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use App\Distributor;
use App\News;
use App\Event;

class HomeController extends Controller
{
    public function index()
    {
        $promo = Promo::count();
        $distributor = Distributor::count();
        $news = News::count();
        $event = Event::count();

        return view('home',compact('promo','distributor','news','event'));
    }
}
