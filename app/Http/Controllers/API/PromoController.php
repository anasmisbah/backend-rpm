<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;
use Illuminate\Support\Facades\Auth;


class PromoController extends Controller
{
    public function allpromos()
    {
        $promos = Promo::all();
        $data = [];
        foreach ($promos as $key => $promo) {
            $data[]=[
                'id'=> $promo->id,
                'title'=> $promo->name,
                'image'=> url('/uploads/' . $promo->image),
                'description'=> $promo->description,
                'point'=>$promo->point,
                'total'=>$promo->total,
                'view'=>$promo->view,
                'status'=>$promo->status,
                'created_at'=>$promo->created_at->format('d F Y'),
                'created_by'=>$promo->createdby->admin->name,
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
                'title'=> $promo->name,
                'image'=> url('/uploads/' . $promo->image),
                'description'=> $promo->description,
                'point'=>$promo->point,
                'total'=>$promo->total,
                'view'=>$promo->view,
                'status'=>$promo->status,
                'created_at'=>$promo->created_at->format('d F Y'),
                'created_by'=>$promo->createdby->admin->name,
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
                'title'=> $promo->name,
                'image'=> url('/uploads/' . $promo->image),
                'description'=> $promo->description,
                'point'=>$promo->point,
                'total'=>$promo->total,
                'view'=>$promo->view,
                'status'=>$promo->status,
                'created_at'=>$promo->created_at->format('d F Y'),
                'created_by'=>$promo->createdby->admin->name,
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
            'title'=> $promo->name,
            'image'=> url('/uploads/' . $promo->image),
            'description'=> $promo->description,
            'point'=>$promo->point,
            'total'=>$promo->total,
            'view'=>$promo->view,
            'status'=>$promo->status,
            'created_at'=>$promo->created_at->format('d F Y'),
            'created_by'=>$promo->createdby->admin->name,
        ];
        return response()->json($data,200);
    }

    public function takepromo(Request $request)
    {
        $employee = Auth::user()->employee;
        $distributor = $employee->distributor;
        if ($employee->type == 'employee') {
            return response()->json([
                'status'=>false,
                'message'=>'incorrect access'
            ],400);
        }
        $promo = Promo::where('id',$request->promo_id)->first();

        if (!$promo) {
            return response()->json([
                'status'=>false,
                'message'=>'promo not found'
            ], 404);
        }
        if ($distributor->loyalty < $promo->point) {
            return response()->json([
                'status'=>false,
                'message'=>'you dont have enough point to take this promo'
            ], 400);
        }

        $distributor->update([
            'loyalty'=>($distributor->loyalty) - ($promo->point),
            'coupon'=>$distributor->coupon + 1
        ]);
         return response()->json([
            'status'=>true,
            'message'=>'Successfully take promo'
        ], 200);
    }
}
