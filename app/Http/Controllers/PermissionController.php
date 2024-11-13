<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Auth;

class PermissionController extends Controller
{
    public function index()
    {
   
     if(\Auth::user()->can('permission index')){
        $permissions = Permission::get();
        $roles=Role::get();

        return view ('PermissionManagement.index',compact('permissions','roles'));
        
        
    }
    else
    {
        abort(401);
    }



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
           // 'user_id'=>\Auth::user()->id,

        ];
        $role = Role::find(1);
        $permission=Permission::create($data); 
        $permission->roles()->attach($role->id);
     //  dd($rrr);

       
        return redirect()->back()->with('success','Permission Created Succesfully');

    }



    
}
