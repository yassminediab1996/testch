<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Permission;

class PermissionController extends Controller
{
   public function index()
    {
        $permission = Permission::all();
        return view('admin.permission.index',compact('permission'));
    }
}