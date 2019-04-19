<?php

namespace App\Http\Controllers;

use App\AdminModel\Product;
use App\Cart;
use App\Order;
use App\OrderProduct;
use App\TotalCart;
use App\FinalCart;
use App\UserPackage;
use App\AdminModel\Package;
use Illuminate\Http\Request;
use Cookie;
use Mail;
use App\Order_Packages;
use App\User;
use Validator;
use App\CouponOrder;
class OrderController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request,[
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);
        //del cart total // del final cart 
        $i = 0;
        $atotal=0;
        $discount=0;
        $gettotal = TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
        $getcart =  FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
        foreach($gettotal as $gettotalcart)
        {
           //  dd($gettotalcart->discount);
            $atotal +=  $gettotalcart->a_total;
            if($gettotalcart->discount != null)
            {
                 $discount += $gettotalcart->discount;
            }
        }
        if(CouponOrder::where('user_id',Auth()->user()->id)->exists()) {
           $order = Order::create(['user_id' => auth()->user()->id , 'total' => $atotal  , 'discount' => CouponOrder::where('user_id',Auth()->user()->id)->first()->discount ,'address' => $request->address,'payment' => $request->payment,'note' => $request->note , 'phone' => $request->phone ,'numbers' => rand(100,100000)]);
          }else{
          $order = Order::create(['user_id' => auth()->user()->id , 'total' => $atotal  , 'discount' => 0 ,'address' => $request->address,'payment' => $request->payment,'note' => $request->note , 'phone' => $request->phone ,'numbers' => rand(100,100000)]);
          }
          if(User::find(auth()->user()->id)->address == null)
          {
              User::where('id',auth()->user()->id)->update(['address' => $request->address]);
          }
           if(User::find(auth()->user()->id)->phone == null)
          {
              User::where('id',auth()->user()->id)->update(['phone' => $request->phone]);
          }
           
        foreach($getcart as $products)
        {
            if($products->quantity < Product::where('id' , $products->product_id)->first()->qty) {
               $price= Product::Price($products->product_id);
                $getproorder = OrderProduct::create(['order_id' => $order->id, 'product_id' => $products->product_id,'price' => $price,  'qty' => $products->quantity]);
                $qty = Product::where('id' , $products->product_id)->first()->qty;
                if($qty > 0)
                 Product::where('id' , $products->product_id)->update(['qty' => ($qty - $products->quantity)]);
                 
            
            }else{
                $i = 1;
                $order->delete();
                return Product::find($products->product_id)->name_ar;
            }

        }
        // send mail
        if($order)
        {
            if(CouponOrder::where('user_id',Auth()->user()->id)->exists()) 
            {
               CouponOrder::where('user_id',Auth()->user()->id)->delete();
            }
             if(User::find($order->user_id)->email == null)    { 
             return 3;
             }else{
                 
                     
                    
                         $email = User::find($order->user_id)->email;
                        $getproducts = OrderProduct::where('order_id',$order->id)->get();
                        Mail::send('website.mail.place',['getproducts' => $getproducts, 'order' => $order,'email'=> $email],function($message) use ($getproducts,$order,$email){
                      $message->to($email);
                      $message->subject('  تم ارسال طلبك');
                    });
             }
        }
        // ams7 el final cart
     
        if($i == 0) {
           
             foreach($gettotal as $tcart)
            {
                $tcart->delete();
            }
            foreach($getcart as $cart)
            {
                $cart->delete();
            }
      
            return 1;
        }



    }
    
    public function Process(Request $request)
    {
           $order = Order::find($request->order)->update(['state' => $request->id]);
           $user_id = Order::find($request->order)->user_id ; 
           $email = User::find($user_id)->email;
           $getproducts = OrderProduct::where('order_id',$request->order)->get();
           
           if(Order::find($request->order)->state == 2){
               Mail::send('website.mail.prepare',['getproducts' => $getproducts , 'order' => $order, 'email' => $email],function($message) use ($getproducts,$order,$email){
                      $message->to($email);
                      $message->subject('جارى تحضير طلبك');
                    });
           }elseif(Order::find($request->order)->state == 3)
           { 
             Mail::send('website.mail.onway',['getproducts' => $getproducts, 'order' => $order , 'email' => $email],function($message) use ($getproducts,$order,$email){
                  $message->to($email);
                  $message->subject('  طلبك فى الطريق');
                }); 
           }elseif(Order::find($request->order)->state == 4)
           {
                  Mail::send('website.mail.process',['getproducts' => $getproducts, 'order' => $order, 'email' => $email],function($message) use ($getproducts,$order,$email){
                      $message->to('doaa@chefaa.com');
                      $message->subject('تم استلام المبلغ');
                    }); 
                    
                      Mail::send('website.mail.rate2',['getproducts' => $getproducts, 'order' => $order, 'email' => $email],function($message) use ($getproducts,$order,$email){
                      $message->to($email);
                      $message->subject('شكرا لاستخدامك شفاء  ');
                    });
           }elseif(Order::find($request->order)->state == 5)
           {
                  Mail::send('website.mail.cancel',['getproducts' => $getproducts, 'order' => $order, 'email' => $email],function($message) use ($getproducts ,$order,$email){
                      $message->to($email);
                      $message->subject('تم الغاء طلبك ');
                    }); 
           }
    }
    
     public function addpackageToCart(Request $request)
     {
            $getuserpac = UserPackage::find($request->package_id);
            $pac = Package::find($getuserpac->package_id);
           return view('website.cartpackage',compact('getuserpac','pac'));
    }
    
    public function orderpackage(Request $request)
    {
         $package = UserPackage::find($request->id)->package_id;
         Package::find($request->package_id);
         Order_Packages::create(['user_id' => auth()->user()->id ,'package_id' => $package ,'address' => $request->address,'note' => $request->note , 'phone' => $request->phone]);
         UserPackage::find($request->id)->delete();
         return 1;
        
    }
    
}
