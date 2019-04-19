<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\TotalCart;
use App\Cart;
use Illuminate\Support\Facades\View;
use App\Image;
use App\FinalCart;
use DB;
use App\Order;
use Cookie;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
         $date = date('Y-m-d');
   
        $price_afteroffer = \App\AdminModel\Offer::all();
      
        foreach($price_afteroffer as $price)
        {
            if($price->dedline_offer > $date)
            {
                \App\AdminModel\Offer::where(['product_id' => $price->product_id])->delete();

            }
        }
               app()->singleton('lang',function(){
                if(session()->has('lang')){
                    return session()->get('lang');
                }else{
                    return 'ar';
                }

        });
            date_default_timezone_set("Africa/Cairo");

        view()->composer('*',function($view) {
            if(Auth()->check() AND Cookie::has('cart')){
                $FinalCart = FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->groupBy('product_id')->select('product_id', DB::raw('SUM(quantity) as Quantity'));
            }elseif(!Auth()->check() AND Cookie::has('cart')){
                $FinalCart = FinalCart::whereAnonim(Cookie::get('cart'))->groupBy('product_id')->select('product_id', DB::raw('SUM(quantity) as Quantity'));
            }elseif(Auth()->check() AND !Cookie::has('cart')){
                $FinalCart = FinalCart::whereUser_id(Auth()->user()->id)->groupBy('product_id')->select('product_id', DB::raw('SUM(quantity) as Quantity'));
            }else{
                $FinalCart = NULL;
            }
            
            $count = Order::where('state',1)->count();
             $view->with('count' , $count);
             $view->with('FinalCart', $FinalCart);
             
             $notify = \App\AdminModel\Notify::get();
             $view->with('notify' , $notify);
             $view->with('notifycount' , count($notify));
             
             $notifycust = \App\AdminModel\Notify_cusserv::get();
             $view->with('notifycust' , $notifycust);
             $view->with('notifycustcount' , count($notifycust));

             
        });
        //permission
          View::share('category', '1');
           View::share('subcategory', '2'); 
            View::share('products', '3');
             View::share('offers', '4');
              View::share('coupon', '5');
               View::share('country', '6');
                View::share('state', '7');
                 View::share('contact', '8');
                  View::share('brands', '9');
                   View::share('search', '10');
                    View::share('cases', '11');
                     View::share('perscription', '12');
                      View::share('orders', '13');
                       View::share('map', '14');
                        View::share('monthly', '15');
                         View::share('package', '16');
                          View::share('quickcontact', '17'); 
                           View::share('charity', '18');
                            View::share('addpatient', '19');
                             View::share('customerservice', '20');
                              View::share('pharmacy', '21');
                               View::share('ondemand', '22');
                              
                             
                             
        //return price when dedline come // every day

        $date = date('Y-m-d');
   
        // $price_afteroffer = DB::table('offer')->get();
      
        // foreach($price_afteroffer as $price)
        // {
        //     if($price->dedline_offer < $date)
        //     {
        //         DB::table('offer')->where(['product_id' => $price->product_id])->update(['price' => 0]);
        //         DB::table('products')->where(['id' => $price->product_id])->update(['price' => 0]);

        //     }
        // }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
