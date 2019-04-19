<?php
namespace App\Http\Controllers;

use App\AdminModel\Package;
use App\UserCase;
use DB;
use Illuminate\Http\Request;
use App\UserPackage;
use App\CartPackage;
use Auth;
class PackageController extends Controller
{
   public function GetPackge(Request $request)
      {
         $package = Package::where(['age' => $request->age , 'sex' => $request->sex])->get();
        return view('website.getpackage',compact('package'));
      }
      
      public function addpackageuser(Request $request)
      {
           $pac = Package::find($request->id);
           if(! UserPackage::where('package_id' , $pac->id)->exists()){
           $getpac = UserPackage::create(['user_id' => Auth()->user()->id , 'package_id' => $request->id , 'products' => $pac->products]);
           }else{
            $getpac =  UserPackage::where('package_id' , $request->id)->first();
           }
           return view('website.viewpackage',compact('getpac','pac')); 
      }
      
      public function EditUserPac(Request $request)
      {
          
             $arr = array();
             $getpac = UserPackage::find($request->id);
              $pac = Package::find($getpac->package_id);
              
             foreach(explode(',',$getpac->products) as $val => $product)
             {
                 if($product != $request->productid )
                 {
                     $arr[$val] = $product;
                 }
             }
             if(count($arr) > $pac->min_num){
              UserPackage::where('package_id' , $getpac->package_id)->update(['products' => implode(',',$arr)]);
             }else{
                return 1 ;
             }
                 
             
               $getpac =  UserPackage::where('package_id' , $getpac->package_id)->first();    
               return view('website.viewpackage',compact('getpac','pac')); 
      }
      
      public function AddPackagetoCart(Request $request)
      {
          if(! CartPackage::where(['user_id' => Auth()->user()->id ,'package_id' =>$request->id])->exists())
          CartPackage::create(['user_id' => Auth()->user()->id ,'package_id' =>$request->id]);
          
      }
} 
 