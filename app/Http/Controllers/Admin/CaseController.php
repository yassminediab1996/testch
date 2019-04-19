<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Mcase;
use App\UserCase;
class CaseController extends Controller
{
   public function index()
    {
        $cases = Mcase::all();
        return view('admin.Case.index',compact('cases'));
    }

      public function Create(Request $request)
      {
           $this->validate($request,[
            'name' => 'required',
            'persone' => 'required',
            'max_amount' => 'required',
            'description' => 'required',
            'charity_id'=> 'required',
            'branch_id'=> 'required',
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            session()->flash('success_message','created sucssfully');
            Mcase::create($request->except(['file']));
        }
        return redirect()->back();
     }

    public function update(Request $request)
    {

        unset($request['_token']);
     
        unset($request['_wysihtml5_mode']);
        if(empty($request['description'])) unset($request['description']);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
                    session()->flash('success_message','updated sucssfully');

        Mcase::whereId($request->id)->update($request->except(['file']));
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        // $request['o_price'] = Product::Price($request->id);
        return Mcase::find($request->id);
    }
    public function delete(Request $request)
    {
        Mcase::find($request->id)->delete();
      session()->flash('success_message','deleted sucssfully');

        return redirect()->back();
    }
    
    public function usercases($id)
   {
       $getdonets = UserCase::where('case_id',$id)->get();
       return view('admin.Case.usercase',compact('getdonets'));
       
   }
   
   public function updatecase(Request $request)
   {
       $up = UserCase::find($request->id)->update(['approval' => $request->ap]);
       return 1;
   }
   
   public function deleteusercase(Request $request)
   {
       UserCase::find($request->id)->delete();
       return redirect()->back();
   }
   
   public function approvecase(Request $request)
   {
       $cases = Mcase::where('id', $request->id)->update(['approval' => $request->ap]);
      return 1;
   }
}