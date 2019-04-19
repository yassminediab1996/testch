<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AuthAdminController extends Controller
{
    public function LoginAdmin(Request $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->flash('success_message', 'Login  successful!');
            return redirect('/17$es12/home');
        } else {
            session()->flash('error_message', ' login failed!');
            return back();
        }



    }

    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect('/17$es12/');
    }
}
