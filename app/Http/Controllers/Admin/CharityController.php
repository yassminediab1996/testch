<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Mcase;
use App\AdminModel\UserCase;
use App\User;
class CharityController extends Controller
{
    public function index()
    {
        $charity = User::where('type',6)->get();
        return view('admin.charity.index',compact('charity'));
    }

    public function Create(Request $request)
    {
         $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
        ]);
         if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            charity::create($request->except(['file']));
        }
       
        session()->flash('success_message','added succsfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        unset($request['_token']);
         if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
        charity::whereId($request->id)->update($request->except(['file']));
         session()->flash('success_message','updated succsfully');
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        return charity::find($request->id);
    }
    public function delete(Request $request)
    {
        charity::find($request->id)->delete();
        $getall = charity::where('parent',$request->id)->get();
        foreach($getall as $get)
        {
            $get->delete();
        }
        return redirect()->back();
    }
    public function addbranch(Request $request)
    {
         $this->validate($request,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
        ]);
         charity::create($request->all());
        session()->flash('success_message','added succsfully');
        return redirect()->back();
    }
    public function getbranch($id)
    {
       return  charity::where('parent',$id)->get();
    }
    
    public function viewcases($id)
    {
        $cases = Mcase::where('charity_id', $id)->get();
       return view('admin.Case.index',compact('cases'));
    }
}
