<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        $cupone = Coupon::all();
        return view('admin.coupon.index',compact('cupone'));

    }

    public function Create(Request $request)
    {

        Coupon::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request)
    {

        unset($request['_token']);

        Coupon::where('id',$request->id)->update($request->all());
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        return Coupon::find($request->id);
    }
    public function delete(Request $request)
    {
        Coupon::find($request->id)->delete();
        return redirect()->back();
    }
}
