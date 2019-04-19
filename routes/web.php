<?php

Auth::routes();
  // Route monthly subscription 
  
      Route::get('/monthly_subscription', 'MonthlysubController@show_monthly_subscription_view');
      
      Route::post('/monthlypackage', 'MonthlysubController@monthlypackage');
      
      Route::get('resetpassword_monthly/{id}','MonthlysubController@resetpassword_monthly');
      Route::post('login_monthly','AuthUserController@login_monthly');
  // end Route monthly subscription 
 
// route of chefaa app 

     Route::get('chefaa_app',function(){
        return view('website.chefaa_app');
     });
 
// end route of chefaa app 

Route::get('services',function(){
   return view('website.services'); 
});

Route::get('login_charity',function(){
        return view('website.login_charity');
     });
     
Route::get('jobs',function(){
   return view('website.jobs'); 
});

Route::post('login', [ 'as' => 'login', 'uses' => 'AuthUserController@login']);
Route::get('header',function(){
   return view('website.header'); 
});

Route::get('test/{id}',function($id){
   return view('website.mail.feedback2',compact('id')); 
});
Route::get('tt',function(){
   return view('website.test'); 
});
Route::post('feedback','FeedbackController@feedback');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('thankyou',function(){
   return view('website.thankyou'); 
});
 Route::get('/',function (){
        return view('website.landingpage');
    });
    // auth
       Route::get('login',function (){
        return view('website.login');
    });
       //reset password
        Route::get('viewresetpas',function(){
          //  session()->flash('success_message', '  الرجاء ادخال البريد الإلكترونى لاسترجاع كلمه المرور الخاصه بك  ');
           return view('website.resetpassword'); 
        });
        
        Route::get('resetaccount','AuthUserController@resetaccount');
        Route::post('resetpassword','AuthUserController@resetpassword');
        Route::post('reset' , 'AuthUserController@doresetpass');
       //endreset password
        Route::get('login/facebook','AuthUserController@RedirectTofacebook');
         Route::get('login/facebook/callback','AuthUserController@callbackfacebook');
        Route::get('login/google','AuthUserController@RedirectTogoogle');
         Route::get('login/google/callback','AuthUserController@callbackgoogle');
       Route::get('login/twitter','AuthUserController@RedirectTotwitter');
         Route::get('login/twitter/callback','AuthUserController@callbacktwitter');
      
        Route::get('pdfview',array('as'=>'pdfview', 'uses'=>'ItemController@pdfview'));
       Route::get('register',function (){
        return view('website.register');
    });
    Route::post('reqister/charity','AuthUserController@reqistercharity');
    /*---*/
    Route::get('updtfree','ProductController@updtfree');
     Route::get('updtview','ProductController@updtview');
       Route::post('loginuser','AuthUserController@login');
         Route::post('registeruser','AuthUserController@register');
         
          Route::post('loginuser2','AuthUserController@login2');
         Route::post('registeruser2','AuthUserController@register2');
         
          Route::post('loginuser3','AuthUserController@login3');
         Route::post('registeruser3','AuthUserController@register3');
         Route::get('auth_profile/{id}','HomeController@profile_from_monthly');
  //search
    Route::get('search',function (){
        return view('website.search');
    });
    
        Route::post('searchproducts','searchController@search');
       
        //package
        Route::get('package',function(){
           return view('website.package');
        });
   
       //quize
       Route::get('quize',function(){
          return view('website.quizelogin'); 
       });
       
       Route::post('userquize','QuizeController@userquize');
       Route::get('userquize','QuizeController@getquestion');
       Route::get('choseqes','QuizeController@choseqes');
       
       Route::get('viewbutton',function(){
           return view('website.quize.viewbutton');
       });
       
       Route::get('gitgist','QuizeController@gitgist');
       
      //endquize
      Route::get('GetPackge','PackageController@GetPackge');
    
    
      //footer
      Route::get('userguid',function (){
        return view('website.userguid');
      });
        
     Route::get('privacy',function (){
        return view('website.privacy');
      });
    
      //offer
      Route::get('offer',function (){
        return view('website.offer');
      });
        
      //brand
      Route::get('brands',function (){
        return view('website.brands');
      });
    
      Route::get('brand/{id}',function($id){
            return view('website.brandproduct',compact('id'));
      });
    
      Route::post('search','HomeController@search');
        Route::get('search',function (){
        return view('website.search');
      });
    
      Route::get('sendsearch/{search}','HomeController@sendsearch');
      /* request contact us page */
            Route::get('contact',function (){
                return view('website.contact_us');
            });
      /* request contact us page */
      /*charity authentication*/
  
      Route::get('charity_profile/{id}','HomeController@charity_profile');
Route::get('login_charity',function(){
        return view('website.login_charity');
     }); 
     Route::get('register_charity',function(){
        return view('website.register_charity');
     });
   Route::post('login/charity','AuthUserController@login_charity');
   Route::post('updateprofile_charity','AuthUserController@updateprofile_charity');
   Route::post('reqister/charity','AuthUserController@reqistercharity');
   Route::post('addcase_charity','CharityController@addcase_charity');
   Route::get('deletecase_charity','CharityController@deletecase_charity');
/*end charity authentication*/  
      
    //contact
    Route::post('contact','ContactController@contact');
      Route::get('contact2',function(){
       return view('website.contactstore'); 
    });
   
    Route::get('checklogin','CartController@checklogin');
    Route::post('contactstore','ContactController@ContactStore');
    
    //aboutus
    Route::get('about_us',function (){
        return view('website.about_us');
    });
    
    Route::post('quickform','ContactController@quickform');
    
    //  Route::get('/store',function (){
    //     return view('website.index')->name('store');
    // });
    
    Route::get('/store','HomeController@store')->name('store');
    
    Route::get('bestseller',function(){
       return view('website.bestseller') ;
    });
    
    Route::get('subscription',function(){
       return view('website.monthly_sub') ;
    });
   
    Route::get('activate/monthly/{id}','MonthlysubController@active_monthly');
    Route::get('monthly/{id}','MonthlysubController@get_monthly');
    Route::get('ondmandpackge',function(){
       return view('website.on_demand');
    });
    
    Route::post('ondmandpackge','OndmandPackageController@ondmandpackge');
    Route::get('uploadfile','MonthlysubController@fileUploadPost');
    Route::post('update_monthly','MonthlysubController@update_monthly');
    Route::post('review/{id}','ProductController@Review');
    Route::get('product/{id}/rate','RateController@rateproduct');
    Route::get('sebscribe','SubscribeController@Subscribe');
    Route::get('details/{id}','ProductController@GetDetails');
    Route::get('updateFavPro','ProductController@updateFavUser');
    Route::get('addToCart','CartController@AddToCart');
    Route::get('DelItemCart','CartController@DelItemCart');
    Route::get('EditItemCart','CartController@EditItemCart');
    Route::get('checkqty','CartController@checkqty');
    Route::get('cart',function (){
       return view('website.cart');
    });
       Route::get('ChechCupone','CartController@ChechCupone');

    Route::get('sendtotal','CartController@sendtotal');
    Route::get('activate/{id}','AuthUserController@activate');
    Route::get('everyrun','CartController@everyrun');
    
    //Route::get('checkout2',function (){
    //    return view('website.checkout2');
    //});
    
    Route::get('products/{id}','ProductController@GetAll');
    Route::get('csr','CrsController@index');
    Route::post('csr/send','CrsController@send');
    Route::get('csr/send/{id}','CrsController@getformcsr');
    Route::get('getallstate','HomeController@getallstate');
    
    //Route::get('checkout1', 'CheckoutController@index')->name('checkout');
    //orders
    
    Route::get('processorder','OrderController@Process');
    
    // Route::get('profile',function(){
    //       return view('website.profile'); 
    //   });
       
    // ROUTES NEED TO LOG IN
    
      Route::group(['middleware' => 'auth'] , function(){
          
         // Route profile
             Route::get('profile/{id}','HomeController@profile');
             Route::get('profilenew/{id}','HomeController@profilenew');
         // end Route profile
   
      Route::post('MakeOrder','CartController@Checkout');
      Route::get('makeorder','OrderController@create');
      Route::get('logoutuser','HomeController@logout');
  
      Route::post('profile','HomeController@updateprofile');
    
      //make order
      Route::get('EditUserPac','PackageController@EditUserPac');
      Route::get('viewpackage/{id}','PackageController@addpackageuser');
      Route::post('addpackageToCart','OrderController@addpackageToCart');
      Route::get('everyrun','CartController@everyrun');
      Route::get('checkout',function (){
            return view('website.checkout');
        })->name('checkout');
        
      Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
      Route::post('checkoutpackage', 'CheckoutController@store')->name('checkoutpackage.store');
      Route::get('makeorderpackage','OrderController@orderpackage');
         
 });
