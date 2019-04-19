<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monthly;
use App\AdminModel\Admin;
use Hash;
class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::all();
        return view('admin.partner.index',compact('partner'));

    }

    public function Create(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:admins',
        ]);
       Partner::create($request->all());
       $per = json_encode(19);
       Admin::create(['name' => $request->name , 'email' => $request->email , 'password' => Hash::make($request->password) , 'permission' => $per])  ;   
        session()->flash('success_message','added succssfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
      
        unset($request['_token']);
       
        Partner::whereId($request->id)->update($request->all());
                session()->flash('success_message','updated succssfully');

        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
       // $request['o_price'] = Product::Price($request->id);
        return Partner::find($request->id);
    }
    public function delete(Request $request)
    {
        $Partner = Partner::find($request->id)->email;
        Partner::find($request->id)->delete();
        $getall = Monthly::where('type_id' , $request->id)->get();
        Admin::where('email' , $Partner)->delete();
        foreach($getall as $all)
        {
            $all->delete();
        }
       session()->flash('success_message','deleted succssfully');

        return redirect()->back();
    }
}
