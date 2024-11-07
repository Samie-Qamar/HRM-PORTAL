<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function showcreateuserpage()
    {
       
          return view('UserManagment.createuser');
    }


    public function Manageallusers()
    {
        $users=User::get();
        //dd($users);
        return view('UserManagment.user-management',compact('users'));
    }



    // Store Users // 

    public function createusers(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email',
            'phone' => 'required',
            'location' => 'required|string|max:100',
            'password' => 'required|string|max:8',
            'type'=>'required',
        ]);


        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'password'=>bcrypt($request->password),
            'type'=>$request->type,
        ];
       // dd($data);

        User::create($data);
        return redirect()->back()->with('success','User Register Succesfully!');


    }







}
