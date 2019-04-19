<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Package;
use App\UserCase;
class PackageController extends Controller
{
   public function index()
    {
        $packages = Package::all();
        return view('admin.package.index',compact('packages'));

    }

      public function Create(Request $request)
    {
       // dd(implode(',',$request->products));
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
             unset($request['file']);
             Package::create([
                 'img' => $request['img'] ,
                 'name_ar' => $request->name_ar , 
                 'price' => $request->price , 
                 'description' => $request->description , 
                 'age' =>$request->age , 
                 'sex' => $request->sex ,
                 'min_num' => $request->min_num,
                 'discount' => $request->discount,
                 'products' => implode(',',$request->products)]);
            // $requeat['products'] = implode(',',$request->products);
            // dd($requeat['products']);
            // Package::create($request->except(['file']));
        }
        return redirect('17$es12/package');
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
               unset($request['file']);
               Package::whereId($request->id)->update([     
                  'img' => $request['img'] ,
                 'name_ar' => $request->name_ar , 
                 'price' => $request->price , 
                 'description' => $request->description , 
                 'age' =>$request->age , 
                 'sex' => $request->sex ,
                   'min_num' => $request->min_num,
                 'discount' => $request->discount,
                 'products' => implode(',',$request->products)]);
        }else{
             Package::whereId($request->id)->update([     
          
                 'name_ar' => $request->name_ar , 
                 'price' => $request->price , 
                 'description' => $request->description , 
                 'age' =>$request->age , 
                 'sex' => $request->sex ,
                  'min_num' => $request->min_num,
                 'discount' => $request->discount,
                 'products' => implode(',',$request->products)]);
        }
     
           return redirect('17$es12/package');
    }
  
    public function delete(Request $request)
    {
        Package::find($request->id)->delete();
        return redirect()->back();
    }
    
  
}