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
class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        if(Auth()->check()){
             $shipping = User::GetFees(auth()->user()->id);
            if(Cart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->exists())
            {
                $getqty_old = Cart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->first()->quantity;
                Cart::where(['user_id' => Auth()->user()->id , 'product_id' => $request->id])->update(['quantity' => $request->qty + $getqty_old]);
                  $gettotal = Cart::where('user_id' , Auth()->user()->id)->get();
                  $sum=0;
                    foreach($gettotal as $total)
                    {
                        $sum += (int)$total->quantity * (int)Product::Price($total->product_id);
                    }
                     if(TotalCart::where(['user_id' => auth()->user()->id , 'product_id' => $request->id])->exists() and TotalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->exists())
                        $getauht =  TotalCart::where(['user_id' => auth()->user()->id ,'product_id' => $request->id])->first();
                        $getnotauth = TotalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $request->id])->first();
                        if($getauht){
                            if($get->discount != null){
                                $n_total = $sum - ($sum * $getauht->discount)/100;
                                TotalCart::where('user_id',auth()->user()->id)->update(['b_total' => $n_total , 'a_total' => $n_total]);
                            }else{
                                
                                TotalCart::where('user_id',auth()->user()->id)->update(['b_total' => $sum , 'a_total' => $sum]);
                            }
                        }else{
                           if(Product::find($request->id)->checkfree == 0){
                              TotalCart::create([
                            'user_id' => auth()->user()->id ,
                            'b_total' => $sum ,
                            'a_total' => $sum,
                            'shipping' =>$shipping,
                            'product_id' =>  $request->id
                        ]);
                               
                           }else{
                               TotalCart::create([
                            'user_id' => auth()->user()->id ,
                            'b_total' => $sum ,
                            'a_total' => $sum,
                            'shipping' =>0,
                            'product_id' =>  $request->id
                        ]);
                        }
                        }
                  Cart::Insertcart();
    
            }else {
    
                   $t = Cart::create(['user_id' => Auth()->user()->id, 'product_id' => $request->id, 'quantity' => $request->qty]);
                  $sum = (int) $t->quantity * (int) Product::Price($t->product_id);
                        $btot = $sum;
                        if(Product::find($request->id)->checkfree == 0){
                         TotalCart::create([
                             'user_id' => auth()->user()->id ,
                             'b_total' => $btot ,
                             'a_total' => $btot,
                             'shipping' =>$shipping,
                              'product_id' =>  $request->id
                         ]);
                        }else{
                               TotalCart::create([
                            'user_id' => auth()->user()->id ,
                            'b_total' => $btot ,
                            'a_total' => $btot,
                            'shipping' =>0,
                            'product_id' =>  $request->id
                        ]);
                        }
                  Cart::Insertcart();
            }
         }else{
             $sumb =0;
             $suma=0;
            $id = $request->id;
            $value = 0;
            if( Cookie::get('cart')!== null ){
                $anonim = Cookie::get('cart');
                if($request->input('qty') == null){
                    
                    DB::table("temp_carts")->insert(["anonim"=>$anonim,"product_id"=>$id,"quantity"=>1]);
                 $gettotal =  Temp_cart::where('anonim',$anonim)->get();
                  $sum = 0;
                    foreach($gettotal as $total)
                    {
                        $sum += (int)$total->quantity * (int)Product::Price($total->product_id);
                    }
                    if(Product::find($request->id)->checkfree == 0){
                        
                         if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                                  $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sumb ,
                                    'a_total' => $suma,
                                     'product_id' =>  $request->id
                                ]);
                            }else{
                                  TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                ]);
                            }
                    }else{
                         if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                 TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                                    $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sumb ,
                                    'a_total' => $suma,
                                     'product_id' =>  $request->id
                                ]);
                                   
                            }else{
                                  TotalCart::create([
                                    'user_id' => $anonim,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                    'shipping' =>0,
                                    'product_id' =>  $request->id
                                ]);
                            }
                            
                        }
                        Cart::Insertcart();

                }
                else{
                    DB::table("temp_carts")->insert(["anonim"=>$anonim,"product_id"=>$id,"quantity"=>$request->input('qty')]);
                       $gettotal =  Temp_cart::where('anonim',$anonim)->get();
                          $sum = 0;
                            foreach($gettotal as $total)
                            {
                                $sum += (int)$total->quantity * (int)Product::Price($total->product_id);
                            }
                            if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                 TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                                   $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sumb ,
                                    'a_total' => $suma,
                                     'product_id' =>  $request->id
                                ]);
                                   
                            }else{
                                  TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                            }
                         
                   Cart::Insertcart();

                }
            }else{
                $response = new Response('Hello World');
                $value=DB::table("temp_carts")->max("anonim")+1;
                if(empty($value)){
                    $value=0;
                }
                if($request->input('qty') == null){
                    DB::table("temp_carts")->insert(["anonim"=>$value,"product_id"=>$id,"quantity"=>1]);
                       $gettotal =  Temp_cart::where('anonim',$anonim)->get();
                  $sum = 0;
                    foreach($gettotal as $total)
                    {

                        $sum += (int)$total->quantity * (int)Product::Price($total->product_id);
                    }
                   if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                                
                                   $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sumb ,
                                    'a_total' => $suma,
                                     'product_id' =>  $request->id
                                ]); 
                                   
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
                    DB::table("temp_carts")->insert(["anonim"=>$value,"product_id"=>$id,"quantity"=>$request->input('qty')]);
                       $gettotal =  Temp_cart::where('anonim',$value)->get();
                  $sum = 0;
                    foreach($gettotal as $total)
                    {

                        $sum += (int)$total->quantity * (int)Product::Price($total->product_id);
                    }
                    if(TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->exists())
                            {
                                TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                                  $getallto = TotalCart::where(['anonim' => $anonim ,  'product_id' =>  $request->id])->get();
                                  foreach($getallto as $gettot11){
                                      $sumb += $gettot11->b_total;
                                      $suma += $gettot11->a_total ;
                                  }
                                  foreach($getallto as $getde){
                                      $getde->delete();
                                  }
                                   TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sumb ,
                                    'a_total' => $suma,
                                     'product_id' =>  $request->id
                                ]); 
                                   
                            }else{
                                  TotalCart::create([
                                    'anonim' => $anonim ,
                                    'b_total' => $sum ,
                                    'a_total' => $sum,
                                     'product_id' =>  $request->id
                                  
                                ]);
                            }
                    Cart::Insertcart();
                }
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
                       if($getauth->discount != null ){
                           $discount = 0;
                            $discount = $getauth->discount;
                            $n_total = $sum - ($sum * $discount)/100;
                            TotalCart::create(['product_id' => $request->id, 'user_id' =>Auth()->user()->id , 'b_total' => $n_total , 'a_total' => $n_total , 'discount' => $discount]);
                            $getauth->delete();
                            $getnoauth->delete();
                       }else{
                            TotalCart::create(['product_id' => $request->id, 'user_id' =>Auth()->user()->id , 'b_total' => $sum , 'a_total' => $sum ]);
                            $getauth->delete();
                            $getnoauth->delete();
                       }
                     
        
                }else if(TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->exists() and !TotalCart::where(['product_id' => $request->id, 'user_id' =>Auth()->user()->id ])->exists())
                {
                      $get =  TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->first();
                   if($get->discount != null){
                       $n_total = $sum - ($sum * $get->discount)/100;
                      TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->update(['b_total' => $n_total , 'a_total' => $n_total]);
                   }else{
                        TotalCart::where(['product_id' => $request->id, 'anonim' =>Cookie::get('cart') ])->update(['b_total' => $sum , 'a_total' => $sum]);
                   }
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
        $fees = User::find(auth()->user()->id)->fees->fees;
        if(TotalCart::where('user_id',auth()->user()->id)->exists()){
            foreach(TotalCart::where('user_id',auth()->user()->id)->get() as $dd)
            {
                $dd->delete();
            }

                TotalCart::create(['b_total' => $request->b_total, 'a_total' => $request->a_total, 'shipping' => $fees, 'user_id' => auth()->user()->id , 'discount' => $request->data]);

        }else {

                TotalCart::create(['b_total' => $request->b_total, 'a_total' => $request->a_total, 'shipping' => $fees, 'user_id' => auth()->user()->id , 'discount' => $request->data]);

        }
    }
    public function Checkout(Request $request)
    {

        unset($request['coupon_code']);
        // if(!TotalCart::where('user_id',auth()->user()->id)->exists())

        //   TotalCart::create(['b_total' => $request->befortotal, 'a_total' => $request->aftertotal, 'shipping' => $request->shipping, 'user_id' => auth()->user()->id]);
       return view('website.checkout');
    }
 
    public function checkqty(Request $request)
    {
        dd($request->all());
    }
    
}
