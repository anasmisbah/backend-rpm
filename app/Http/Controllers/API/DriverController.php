<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\DriverCode;
use App\Driver;
class DriverController extends Controller
{
    public function arrival()
    {
        $user = Auth::user();
        $random = Str::random(4);
        $unique = strtoupper('D'.$user->id.$random);

        $hash = Hash::make($unique);

        $user->driver->code()->create([
            'code'=>$hash,
            'status'=>'active'
        ]);

        return response()->json([
            'code'=>$unique,
            'status' => 'active'
        ]);
    }

    public function history()
    {
        $user = Auth::user();
        $deliveries = $user->driver->delivery;
        foreach ($deliveries as $key => $del) {
            $deliveries[$key]->delivery_date = $del->delivery_at->format('l, d F Y H:i:s');
            $deliveries[$key]->distributor->logo= url('/uploads/' . $del->distributor->logo);;
        }

        return response()->json($deliveries);
    }


}
