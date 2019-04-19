<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monthly;
use App\AdminModel\Admin;
use Hash;
class PatientController extends Controller
{
    public function index()
    {
        $email = auth()->guard('admin')->user()->email;
        $idpartner = Partner::where('email' ,$email)->first()->id;
        $getmon = Monthly::where('type_id' , $idpartner)->get();
        return view('admin.Monthly.index',compact('getmon' , 'id'));

    }

    public function Create(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            Monthly::create($request->except(['file']));
        }
       
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
