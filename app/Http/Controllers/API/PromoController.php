<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;

class PromoController extends Controller
{
    public function allpromos()
    {
        $promos = Promo::all();
        $data = [];
        foreach ($promos as $key => $promo) {
            $data[]=[
                'id'=> $promo->id,
                'name'=> $promo->name,
                'status'=>$promo->status,
                'image'=> url('/storage/' . $promo->image),
                'point'=> $promo->point
            ];
        }
        return response()->json($data,200);
    }

    public function promonormal()
    {
        $promo = Promo::where('status','normal')->get();
        $data = [];
        foreach ($promo as $key => $promo) {
            $data[]=[
                'id'=> $promo->id,
                'name'=> $promo->name,
                'image'=> url('/storage/' . $promo->image),
                'point'=> $promo->point
            ];
        }
        return response()->json($data,200);
    }

    public function promohot()
    {
        $promo = Promo::where('status','hot')->get();
        $data = [];
        foreach ($promo as $key => $promo) {
            $data[]=[
                'id'=> $promo->id,
                'name'=> $promo->name,
                'image'=> url('/storage/' . $promo->image),
                'point'=> $promo->point
            ];
        }
        return response()->json($data,200);
    }

    public function detail($id)
    {
        $promo = Promo::where('id',$id)->first();
        if (!$promo) {
                return response()->json([
                    'status'=>false,
                    'message'=>'Promo not found'
                ],404);
        }
        $data=[
            'id'=> $promo->id,
            'name'=> $promo->name,
            'description'=>$promo->description,
            'status'=>$promo->status,
            'image'=> url('/storage/' . $promo->image),
            'point'=> $promo->point,
            'total'=>$promo->total,
            'created_at'=>$promo->created_at->format('d F Y'),
        ];
        return response()->json($data,200);
    }
}
