<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\AdminModel\Product;
use Mail;
class searchController extends Controller
{
    public function  search(Request $request)
    {
         
        $getproducts = Product::where('sub_id' , $request->category )->where('name_ar','like', '%' . $request->search . '%')->limit(15)->get();
        return view('website.searchproducts',compact('getproducts'));
    }
}