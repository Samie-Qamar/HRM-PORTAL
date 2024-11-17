<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;


use Auth;

class PermissionController extends Controller
{
    public function index()
    {
       
   
       
        if(\Auth::user()->can('permission index'))
        {
     
        $permissions = Permission::get();
        $roles=Role::get();
        $users=User::get();
        //dd($users)

        return view ('PermissionManagement.index',compact('permissions','roles','users'));
        }
        else
        {
            abort(403);
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
        $user=\Auth::user();
        $role = Role::find(1);
        $user->assignRole($role);
        // $permission=Permission::create($data); 
        $permission = Permission::firstOrCreate($data);
        $rr=$permission->assignRole($role);
        $role->givePermissionTo($permission);
        return redirect()->back()->with('success','Permission Created Succesfully');

    }





    // Edit & Update Permission // 

    public function update(Request $request,$id)
    {
        //dd($id);
    // dd($request->all());
     // $user=$request->user_id;
      $user = User::findOrFail($request->user_id);


      $selectedroles=array_unique($request->role);
      $role=Role::find($selectedroles);
      $user->assignRole($role);
      $permission_update=Permission::where('id',$id)->first();
      $updatepermission=$permission_update->roles()->sync($role);
      if ($updatepermission) {
        Artisan::call('optimize:clear');
        return redirect()
            ->route('manage.all.permission')
            ->with('success', 'Permission updated successfully');
    }
    return back()->with('error', 'Failed to update permission');

    }


    
}
