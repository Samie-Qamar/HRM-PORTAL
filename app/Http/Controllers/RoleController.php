<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Auth;

class RoleController extends Controller
{
    public function index()
    {
        $user=\Auth::user();
       // dd($user);
        $roles=Role::get();
        return view('RoleManagment.index',compact('roles'));
    }


    public function createrolepage()
    {
        return view('RoleManagment.create');
    }


    public function storeroles(Request  $request)
    {
        $request->validate([
            "name"=>"required|string|min:5",
        ]);
        $data=[
            'name'=>$request->name,
            'guard_name'=>$request->guard_name,
        ];

        Role::create($data);

        return redirect()->back()->with("success",'Role Created Succesfully');

    }
}
