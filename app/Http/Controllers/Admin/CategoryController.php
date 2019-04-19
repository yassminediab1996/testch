<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent',0)->get();
        return view('admin.category.index',compact('categories'));

    }
    public function index2()
    {
        $supcategories = Category::where('parent','!=',0)->get();
        return view('admin.SubCategory.index',compact('supcategories'));
    }
    public function Create(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
            Category::create($request->except(['file']));
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
        Category::whereId($request->id)->update($request->except(['file']));
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        return Category::find($request->id);
    }
    public function delete(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect()->back();
    }
    
    public function getsubs(Request $request)
    {
        return Category::where('parent',$request->id)->get();
    }
}
