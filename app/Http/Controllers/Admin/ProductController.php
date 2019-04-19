<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));

    }

    public function Create(Request $request)
    {
           $this->validate($request, [
             'file' => 'max:300',
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            Product::create($request->except(['file']));
        }
        session()->flash('success_message','added succssfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
      $this->validate($request, [
             'file' => 'max:300',
        ]);
        unset($request['_token']);
        unset($request['_wysihtml5_mode']);
        if(empty($request['description_ar'])) unset($request['description_ar']);
        if(empty($request['description_en'])) unset($request['description_en']);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
        Product::whereId($request->id)->update($request->except(['file']));
                session()->flash('success_message','updated succssfully');

        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
       // $request['o_price'] = Product::Price($request->id);
        return Product::find($request->id);
    }
    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
                        session()->flash('success_message','deleted succssfully');

        return redirect()->back();
    }
}
