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
}
