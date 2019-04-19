<?php

namespace App\Http\Controllers;

use App\AdminModel\Product;
use App\FavPro;
use Illuminate\Http\Request;
use Cookie;
use Response;
use DB;
use App\Review;
use App\Temp_Fav;
class ProductController extends Controller
{
    public function GetDetails($id)
    {
        $getall_pro = Product::find($id);
       return view('website.detail',compact('getall_pro'));
    }
    public function Review(Request $request)
    {
        Review::create($request->all());
        return redirect()->back();
    }
    public function updtfree(Request $request)
    {
      Product::where('id',$request->pro)->update(['checkfree' => $request->id]);
      return 1;
    }
    public function updtview(Request $request)
    {
      Product::where('id',$request->pro)->update(['checkview' => $request->id]);
      return 1;
    }
    
    public function updateFavUser(Request $request)
    {
  
        if(Auth()->check() and Cookie::get('fav') == null){
               if(FavPro::where(['user_id' => auth()->user()->id , 'product_id' => $request->id])->exists())
                       FavPro::where(['user_id' => auth()->user()->id , 'product_id' => $request->id])->update(['fav'=>$request->fav]);
                else
                        FavPro::create(['product_id' => $request->id , 'user_id' => auth()->user()->id , 'fav' => 1]);
        }elseif(Auth()->check() and Cookie::get('fav') != null)
        {
             if(Temp_Fav::where(['anonim' => Cookie::get('fav') , 'product_id' => $request->id])->exists())
                       Temp_Fav::where(['anonim' => Cookie::get('fav') , 'product_id' => $request->id])->update(['fav'=>$request->fav]);
                else
                        Temp_Fav::create(['product_id' => $request->id , 'anonim' => Cookie::get('fav') , 'fav' => 1]);
        }
        
        elseif( !Auth()->check()  and Cookie::get('fav') != null ){
             
                 if(Temp_Fav::where(['anonim' => Cookie::get('fav') , 'product_id' => $request->id])->exists())
                       Temp_Fav::where(['anonim' => Cookie::get('fav') , 'product_id' => $request->id])->update(['fav'=>$request->fav]);
                else
                        Temp_Fav::create(['product_id' => $request->id , 'anonim' => Cookie::get('fav') , 'fav' => 1]);
          }else{
              
             $response = new Response('Hello World');
             
                $value=DB::table("temp_fav")->max("anonim");
                if($value == null){
                    $value=0;
                }else{
                    $value += 1;
                }
                  Cookie::queue(Cookie::make('fav', $value, 40000));
                Temp_Fav::create(['product_id' => $request->id , 'anonim' => $value , 'fav' => 1]);
          }
        
     
    }
    public function GetAll($id)
    {
        $products = Product::where('sub_id',$id)->paginate(10);
        return view('website.products',compact('products'));
    }
}
