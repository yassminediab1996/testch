<?php

namespace App\Http\Controllers;

use App\AdminModel\Coupon;
use App\AdminModel\Product;
use App\Cart;
use App\TotalCart;
use App\User;
use App\Temp_cart;
use Illuminate\Http\Request;
use Cookie;
use DB;
use Auth;
use App\FinalCart;
use App\AdminModel\Package;
use Illuminate\Http\Response;
use App\CouponOrder;
class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        if(Auth()->check()){
            $asum = 0;
            $bsum = 0;
             $anonim = Cookie::get('cart');
             $shipping = User::GetFees(auth()->user()->id);
               $t = Cart::create(['user_id' => Auth()->user()->id, 'product_id' => $request->id, 'quantity' => $request->qty]);
               $sum =  $request->qty *  Product::Price($t->product_id);
               if(TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->exists() and TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists()){
               TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $sum ,'a_total' => $sum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                 $gettotauth = TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->get();
                 $getnotauth = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                 foreach($gettotauth as $getauth)
                 {
                      $asum += $getauth->b_total;
                      $bsum +=  $getauth->a_total ; 
                 }
                 foreach($getnotauth as $getnauth)
                 {
                      $asum += $getnauth->b_total;
                      $bsum +=  $getnauth->a_total; 
                 }
                 TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $bsum ,'a_total' => $asum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                  foreach($gettotauth as $getauthd)
                 {
                      $getauthd->delete();
                 }
                 foreach($getnotauth as $getnauthd)
                 {
                     $getnauthd->delete();
                 }
                
               }elseif(TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->exists() and !TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists()){
                      TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $sum ,'a_total' => $sum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                 $gettotauth = TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->get();
                 $getnotauth = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                 foreach($gettotauth as $getauth)
                 {
                      $asum += $getauth->b_total;
                      $bsum +=  $getauth->a_total ; 
                 }
                 foreach($getnotauth as $getnauth)
                 {
                      $asum += $getnauth->b_total;
                      $bsum +=  $getnauth->a_total; 
                 }
                 TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $bsum ,'a_total' => $asum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                  foreach($gettotauth as $getauthd)
                 {
                      $getauthd->delete();
                 }
                 foreach($getnotauth as $getnauthd)
                 {
                     $getnauthd->delete();
                 }
               }elseif(!TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->exists() and TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists()){
                      TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $sum ,'a_total' => $sum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                 $gettotauth = TotalCart::where([ 'user_id' => auth()->user()->id , 'product_id' =>  $request->id])->get();
                 $getnotauth = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                 foreach($gettotauth as $getauth)
                 {
                      $asum += $getauth->b_total;
                      $bsum +=  $getauth->a_total ; 
                 }
                 foreach($getnotauth as $getnauth)
                 {
                      $asum += $getnauth->b_total;
                      $bsum +=  $getnauth->a_total; 
                 }
                 TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $bsum ,'a_total' => $asum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
                  foreach($gettotauth as $getauthd)
                 {
                      $getauthd->delete();
                 }
                 foreach($getnotauth as $getnauthd)
                 {
                     $getnauthd->delete();
                 }
               }else{
                      TotalCart::create([ 'user_id' => auth()->user()->id , 'b_total' => $sum ,'a_total' => $sum, 'shipping' =>$shipping, 'product_id' =>  $request->id  ]); 
               }
                     Cart::Insertcart();
            
         }else{
             $sumb =0;
             $suma=0;
              $sum = 0;
             $id = $request->id;
             $value = 0;
            if( Cookie::get('cart')!== null ){
                $anonim = Cookie::get('cart');
                    DB::table("temp_carts")->insert(["anonim"=>$anonim,"product_id"=>$id,"quantity"=>$request->input('qty')]);
                      $sum = $request->input('qty') * Product::Price($id);
                            if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                 TotalCart::create(['anonim' => $anonim , 'b_total' => $sum , 'a_total' => $sum,'product_id' =>  $request->id ]);
                                   $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([ 'anonim' => $anonim ,'b_total' => $sumb , 'a_total' => $suma,'product_id' =>  $request->id  ]);
                                   
                            }else{
                                  TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                            }
                         
                   Cart::Insertcart();

                
            }else{
                $response = new Response('Hello World');
                $value=DB::table("temp_carts")->max("anonim")+1;
                  $sum = 0;
                if(empty($value)){
                    $value=0;
                }
                    DB::table("temp_carts")->insert(["anonim"=>$value,"product_id"=>$id,"quantity"=>$request->input('qty')]);
                        $sum = $request->input('qty') * Product::Price($id);
                    
                    if(TotalCart::where(['anonim' => $value ,  'product_id' =>  $request->id])->exists())
                            {
                                TotalCart::create([ 'anonim' => $value ,  'b_total' => $sum ,'a_total' => $sum, 'product_id' =>  $request->id]);
                                 
                                  $getallto = TotalCart::where(['anonim' => $value ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([ 'anonim' => $value , 'b_total' => $sumb ,  'a_total' => $suma,  'product_id' =>  $request->id  ]); 
                                   
                            }else{
                                  TotalCart::create(['anonim' => $value ,'b_total' => $sum , 'a_total' => $sum,'product_id' =>  $request->id]);
                              
                            }
                    Cart::Insertcart();
                
                 $response = new Response('Hello World');
                Cookie::queue('cart', $value, 33333333);
            }
         }
      
        return 1;
    }

    public function DelItemCart(Request $request)
    {
             if(!Auth()->check() and FinalCart::where('anonim',Cookie::get('cart'))->count() > 0)
             {
                 $final = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->get();
                 $tottal = TotalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->get();
                 foreach($final as $f)
                 {
                     $f->delete();
                 }
                 foreach($tottal as $t)
                 {
                     $t->delete();
                 }
                // FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->delete();
                // TotalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->delete();
                    return 1;
             }
             
             elseif(Auth::user() and FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart') )->exists())
             {
                   $final = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->get();
                 $tottal = TotalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->get();
                 foreach($final as $f)
                 {
                     $f->delete();
                 }
                 foreach($tottal as $t)
                 {
                     $t->delete();
                 }
                  
                    $getfinalauth = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
                    $gettotalauth = TotalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
              
                  foreach($getfinalauth as $f1)
                 {
                     $f1->delete();
                 }
                 foreach($gettotalauth as $t1)
                 {
                     $t1->delete();
                 }
                            return 1;
               }
    }

    public function EditItemCart(Request $request)
    {
        $sum=0;
        $gettotal = array();
        $product = Product::find($request->id)->first();
        if(Auth()->check()){
            if(FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id ])->exists() and FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id ])->exists())
                {
                     $produb1 = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id ])->first();
                     $produb2 = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id ])->first();
                    
                        if($request->qty <= $product->qty){
                             FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $request->id  , 'quantity' => $request->qty ]) ;
                              $produb1->delete();
                              $produb2->delete();
                        }else{
                            return 'كمية المنتج ' . $product->name_ar. 'غير متاحه الآن';
                        }
                      $gettotal = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
                }
                elseif(FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id ])->exists() and !FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' =>$request->id ])->exists())
                {
                    $produb = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id ])->first();
                     if($request->qty <= $product->qty){
                    FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id ])->update(['quantity' =>$request->qty ]);
                        }else{
                            return 'كمية المنتج ' . $product->name_ar. 'غير متاحه الآن';
                        }
                      $gettotal = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
                }
                elseif(FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->exists() and !FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' =>$request->id])->exists()){
                   $produb = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->first();
                          if($request->qty <= $product->qty){
                           FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $request->id, 'quantity' => $request->qty ]) ;
                             $produb->delete();
                          }else{
                            return 'كمية المنتج ' . $product->name_ar. 'غير متاحه الآن';
                            }
                         $gettotal = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
                           
                }else{
                    FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $request->id , 'quantity' =>$request->qty]) ;
                    $gettotal = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->get();
                }
        }else{
                FinalCart::where(['product_id' => $request->id , 'anonim' =>Cookie::get('cart') ])->update(['quantity'=> $request->qty]);
                $gettotal =  FinalCart::where(['product_id' => $request->id , 'anonim' =>Cookie::get('cart') ])->get();

        }
        foreach($gettotal as $total)
        {
            $sum += $total->quantity * Product::Price($total->product_id);
            
        }
         if(Auth()->check()){
                if( TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id ])->exists() and TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->exists())
                {
                     $getauth =  TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id ])->first();
                     $getnoauth =  TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->first();
                     TotalCart::create(['product_id' => $request->id, 'user_id' =>Auth()->user()->id , 'b_total' => $sum , 'a_total' => $sum ]);
                            $getauth->delete();
                            $getnoauth->delete();
                       
                }else if(TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->exists() and !TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id ])->exists())
                {

                        TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart')  ])->update(['b_total' => $sum , 'a_total' => $sum]);
                   
                }else if(!TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->exists() and TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id ])->exists())
                {

                        TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id  ])->update(['b_total' => $sum , 'a_total' => $sum]);
                   
                }
         }else{
              if(TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->exists()){
                TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->update(['b_total' => $sum , 'a_total' => $sum]);
                   
              }else{
                 TotalCart::create(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ,'b_total' => $sum , 'a_total' => $sum]); 
              }
         }
       

        return 1;
    }

    public function ChechCupone(Request $request)
    {
        if(Coupon::where('text',$request->text)->exists() )
        {
            $getusing = Coupon::where('text',$request->text)->first()->c_using; //1
            Coupon::where('text',$request->text)->update(['c_using' => $getusing-1 ]);
            if($getusing == 0)
            {
                Coupon::where('text',$request->text)->delete();
            }
            $get = Coupon::where('text',$request->text)->first()->amount;
            return $get;
        }else{
            return 0;
        }


    }
    public function sendtotal(Request $request)
    {
        if(CouponOrder::where('user_id',auth()->user()->id)->exists()){
                 return 3;
        }else {
                CouponOrder::create([ 'user_id' => auth()->user()->id , 'discount' => $request->data]);
                return 1;
        }
    }
    public function Checkout(Request $request)
    {

        unset($request['coupon_code']);
        // if(!TotalCart::where('user_id',auth()->user()->id)->exists())

        //   TotalCart::create(['b_total' => $request->befortotal, 'a_total' => $request->aftertotal, 'shipping' => $request->shipping, 'user_id' => auth()->user()->id]);
       return view('website.checkout');
    }
 
    public function checklogin()
    {
        if(Auth()->check())
        {
            return 1;
        }else{
            return 0;
        }
    }
    
}
