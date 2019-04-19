<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ImageProduct;
use App\AdminModel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageProductController extends Controller
{
    public function index($id)
    {
        $d = ImageProduct::where('product_id',$id)->get();

        return view('admin.productimage.index',compact('d '));

    }

    public function Create(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            ImageProduct::create($request->except(['file']));
        }
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        ImageProduct::find($request->id)->delete();
        return redirect()->back();
    }
}
