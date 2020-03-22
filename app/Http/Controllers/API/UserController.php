<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me()
    {
        $user = Auth::user();

        if ($user->role_id == 3) {
            // $data['user']=[
            //     'id'=>$user->id,
            //     'name'=>$user->employee->name,
            //     'email'=>$user->email,
            //     'avatar'=>url('/uploads/' . $user->employee->avatar),
            //     'address'=>$user->employee->address,
            //     'role'=>$user->role->name,
            //     'type'=>$user->employee->type
            // ];
            $user->employee->avatar = url('/uploads/' . $user->employee->avatar);
            $user->role;
            $user->employee->distributor->logo= url('/uploads/' . $user->employee->distributor->logo);
            $user->employee->distributor->chart= url('/transaction/distributor/chart/' . $user->employee->distributor->id);

            return response()->json($user, 200);

        } else {
            $user->driver->avatar = url('/uploads/' . $user->driver->avatar);
            $user->role;
            $user->driver->delivery;
            foreach ($user->driver->delivery as $key => $del) {
                $user->driver->delivery[$key]->delivery_date = $del->delivery_at->format('l, d F Y H:i:s');
                $user->driver->delivery[$key]->distributor->logo= url('/uploads/' . $del->distributor->logo);
            }

            return response()->json($user, 200);
        }

    }
}
