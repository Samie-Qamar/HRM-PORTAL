<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {
        return view ('PermissionManagement.index');
    }



    public function showcreatepage()
    {

        return view ('PermissionManagement.create');
    }



    public function storepremission(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'guard_name'=>'required',

        ]);
        $data=[
            'name'=>$request->name,
            'guard_name'=>$request->guard_name,
            'user_id'=>\Auth::user()->id,

        ];
        Permission::create($data);
        return redirect()->back()->with('success','Permission Created Succesfully');

    }
}
