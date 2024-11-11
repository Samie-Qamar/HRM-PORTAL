<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Permission;

use App\Models\RolePermission;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function index()
    {
       // checkPermission('create-role');
      //  $permissions =Permission::get();
        $permissions = Permission::get();

       // dd($permissions);

       // $permissions=Permission::get();
        $roles=Role::get();
        //dd($permission->roles());
        return view ('PermissionManagement.index',compact('permissions','roles'));
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
        $role = Role::find(1);
        $permission=Permission::create($data); 
        $permission->roles()->attach($role->id);
     //  dd($rrr);

       
        return redirect()->back()->with('success','Permission Created Succesfully');

    }



    
}
