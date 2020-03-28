<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('employee.index',compact('distributor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('employee.create',compact('distributor'));
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
            'name'=>'required',
            'type'=>'required',
            'address'=>'required|min:5',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>3
        ]);

        $avatar='avatars/default.jpg';
        if ($request->file('avatar')) {
            $request->validate([
                'avatar'=>'mimes:jpeg,bmp,png,jpg,ico',
            ]);
            $avatar = 'avatars/'.time().$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('uploads/avatars', $avatar);
        }

        $user->employee()->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'type'=>$request->type,
            'avatar'=>$avatar,
            'distributor_id'=>$request->distributor_id
        ]);

        return redirect()->back()->with('status','successfully created employee');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $distributor = $employee->distributor;
        return view('employee.detail',compact('employee','distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $distributor = $employee->distributor;
        return view('employee.edit',compact('employee','distributor'));
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
        $employee = Employee::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'address'=>'required|min:5',
            'type'=>'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=>'required|email|unique:users,email,'.$employee->user->id,
        ]);

        if ($request->file('avatar')) {
            $request->validate([
                'avatar'=>'mimes:jpeg,bmp,png,jpg,ico',
            ]);
            if (!($employee->avatar == "avatars/default.jpg") && file_exists('uploads/'.$employee->avatar)) {
                File::delete('uploads/'.$employee->avatar);
            }
            $avatar = 'avatars/'.time().$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('uploads/avatars', $avatar);

            $employee->update([
                'avatar'=> $avatar
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password'=>'min:6',
            ]);
            $employee->user()->update([
                'password'=>Hash::make($request->password),
            ]);
        }
        $employee->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'type'=>$request->type,
        ]);

        $employee->user()->update([
            'email'=>$request->email
        ]);

        return redirect()->back()->with('status','successfully Updated employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $user = $employee->user;
        if (!($employee->avatar == "avatars/default.jpg") && file_exists('uploads/'.$employee->avatar)) {
            File::delete('uploads/'.$employee->avatar);
        }
        $employee->delete();
        $user->delete();

        return redirect()->back()->with('status','successfully Deleted employee');
    }
}
