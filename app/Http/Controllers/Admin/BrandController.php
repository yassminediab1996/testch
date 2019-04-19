<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands  = Brand::all();
        return view('admin.Brand.index',compact('brands'));
    }
    
    public function Getinfo(Request $request)
    {
        return Brand::find($request->id);
    }
    
    public function create(Request $request)
    {
         if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            Brand::create($request->except(['file']));
        }
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
        Brand::whereId($request->id)->update($request->except(['file']));
        return redirect()->back();
    }
   
    public function delete(Request $request)
    {
        Brand::find($request->id)->delete();
        return redirect()->back();
    }
}
