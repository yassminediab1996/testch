<?php


Route::get('/', function () {
return view('admin.login');
});
Route::post('loginadmin','AuthAdminController@LoginAdmin');
    Route::get('getformmounth','MonthlyController@getformmounth');

Config::set('auth.defines','admin:admin');

Route::group(['middleware' => 'admin:admin'] , function(){
    Route::get('/index2',function(){
    return view('admin.index2');
});
Route::get('allnotify',function(){
   return view('admin.layouts.allnotify') ;
});
  Route::get('logout','AuthAdminController@logout');
    Route::get('/home', function () {
        return view('admin.index');
    });
    Route::get('singleproduct/{id}',function($id){
       return view('admin.product.singleproduct',compact('id'));
    });
  /* Route For Categories */
    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/Getinfo', 'CategoryController@Getinfo');
        Route::get('/delete', 'CategoryController@delete');
        Route::post('addcat', 'CategoryController@Create');
        Route::post('update', 'CategoryController@update');
        Route::get('getsub','CategoryController@getsubs');
    });
    
    
    /* Route For Products */
    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::get('/Getinfo', 'ProductController@Getinfo');
        Route::get('/delete', 'ProductController@delete');
        Route::post('addcat', 'ProductController@Create');
        Route::post('update', 'ProductController@update');
    });
     /* Route For Products */
    Route::prefix('partner')->group(function () {
        Route::get('/', 'PartnerController@index');
        Route::get('/Getinfo', 'PartnerController@Getinfo');
        Route::get('/delete', 'PartnerController@delete');
        Route::post('add', 'PartnerController@Create');
        Route::post('update', 'PartnerController@update');
    });
      /* Route For Products */
    Route::prefix('patient')->group(function () {
        Route::get('/', 'PatientController@index');
        Route::get('/Getinfo', 'PatientController@Getinfo');
        Route::get('/delete', 'PatientController@delete');
        Route::post('add', 'PatientController@Create');
        Route::post('update', 'PatientController@update');
    });
    
    /* Route For image Product */
    Route::prefix('improduct')->group(function () {
        Route::get('/delete', 'ImageProductController@delete');
        Route::post('add', 'ImageProductController@Create');
        Route::get('/{id}', function ($id){

            return view('admin.productimage.index')->with('id',$id);
        });
        
    });
      Route::get('quickcontact',function(){
       return view('admin.contact.quickform'); 
    });
     /* Route For employee */
    Route::prefix('employee')->group(function () {
        Route::get('/', 'EmployeeController@index');
        Route::post('add', 'EmployeeController@Create');
        Route::get('Getinfo','EmployeeController@Getinfo');
        Route::post('update','EmployeeController@update');
        Route::get('delete', 'EmployeeController@delete');
        Route::get('add',function(){
          return view('admin.emp.viewaddemp');  
        });  
        Route::get('update/{id}',function($id){
            $getemp = App\AdminModel\Admin::find($id);
            return view('admin.emp.vieweditemp',compact('getemp'));
        });
        Route::post('update2','EmployeeController@update2');
        Route::post('update3','EmployeeController@update3');
        Route::post('update4','EmployeeController@update4');
    });
    /* Route For charity */
    Route::prefix('charity')->group(function () {
        Route::get('/', 'CharityController@index');
        Route::get('/Getinfo', 'CharityController@Getinfo');
        Route::get('/delete', 'CharityController@delete');
        Route::post('update', 'CharityController@update');
        Route::post('add','CharityController@Create');
        Route::post('addbranch','CharityController@addbranch');
        Route::get('branch/{id}',function($id){
            $getbranches = App\AdminModel\charity::where('parent',$id)->get();
           return view('admin.charity.branch',compact('getbranches')) ;
        });
        Route::get('getbranch/{id}','CharityController@getbranch');
        Route::get('viewcases/{id}','CharityController@viewcases');
    });
    /* Route For Sup Categories */
    Route::prefix('subcat')->group(function () {
        Route::get('/', 'CategoryController@index2');
        Route::get('/Getinfo', 'CategoryController@Getinfo');
        Route::get('/delete', 'CategoryController@delete');
        Route::post('addcat', 'CategoryController@Create');
        Route::post('update', 'CategoryController@update');
    });

    /* Route For offer */
    Route::prefix('offer')->group(function () {
        Route::get('/', 'OfferController@index');
        Route::get('/Getinfo', 'OfferController@Getinfo');
        Route::get('/delete', 'OfferController@delete');
        Route::post('addcat', 'OfferController@Create');
        Route::post('update', 'OfferController@update');

    });

    /* Route For copone */
    Route::prefix('copone')->group(function () {
        Route::get('/', 'CouponController@index');
        Route::get('/Getinfo', 'CouponController@Getinfo');
        Route::get('/delete', 'CouponController@delete');
        Route::post('addcoup', 'CouponController@Create');
        Route::post('update', 'CouponController@update');

    });
    /* Route For City */
    Route::prefix('city')->group(function () {
        Route::get('/', 'CityController@index');
        Route::get('/state', 'CityController@index2');
        Route::get('/Getinfo', 'CityController@Getinfo');
        Route::get('/delete', 'CityController@delete');
        Route::post('add', 'CityController@Create');
        Route::post('update', 'CityController@update');
        Route::get('addstate/{id}',function($id){
            $subcity = App\AdminModel\City::where('parent',$id)->get();
            return view('admin.City.index3',compact('subcity' ,'id'));
        });
        Route::post('addstate','CityController@addstate');
        Route::get('editstate/{id}',function($id){
            $getstate = App\AdminModel\City::find($id);
           return view('admin.City.editstate',compact('getstate')); 
        });
       
    });
    /* Route For Brand */
    Route::prefix('brand')->group(function () {
        Route::get('/', 'BrandController@index');
        Route::get('/Getinfo', 'BrandController@Getinfo');
        Route::get('/delete', 'BrandController@delete');
        Route::post('add', 'BrandController@create');
        Route::post('update', 'BrandController@update');

    });
    
      /* Route For Order */
    Route::prefix('order')->group(function () {
        Route::get('/new', function(){
            return view('admin.order.neworder');
        });
        Route::get('invoice/{id}',function($id){
            $getproducts = App\OrderProduct::where('order_id',$id)->get();
            return view('admin.order.invoice',compact('getproducts'));
        });
        Route::get('delete/{id}','SearchController@deleteorder');
        Route::get('update/{id}',function($id){
            $getproducts = App\Order::where('id',$id)->update(['state'=> 2]);
            return redirect()->back();
        });
          Route::get('/delivery', function(){
            return view('admin.order.delivery');
        });
        
    });
      /* Route For Contact us */
    Route::prefix('contact')->group(function () {
        Route::get('/', function(){
           return view('admin.contact.index'); 
        });
        Route::post('assign','ContactController@assign');
        Route::get('customer/{id}','ContactController@customer');
        Route::get('getform','ContactController@getform');
        Route::post('editassign','ContactController@editassign');
        Route::get('changstat','ContactController@changstat');
        Route::post('addcomment','ContactController@addcomment');
        Route::get('delete','ContactController@delete');
        Route::get('viewcomment','ContactController@viewcomment');
});

  Route::prefix('search')->group(function () {
      Route::get('/', 'SearchController@Getsearch');
      Route::get('export','SearchController@downloadTxt');
      Route::get('insight',function(){
         return view('admin.search.insight'); 
      });
      
      Route::get('insightdate','SearchController@insightdate');
      Route::get('insightstate','SearchController@insightstate');
      Route::get('getdatainsight','SearchController@getdatainsight');
      Route::get('getdrugname','SearchController@getdrugname');
      
      Route::get('defaultlinechart','SearchController@defaultlinechart');
      Route::get('defalultdata','SearchController@defalultdata');
    });
//
     Route::prefix('quize')->group(function () {
          Route::get('/', 'QuizeController@quize');
              });
      /* Route For case */
    Route::prefix('prescription')->group(function () {
        Route::get('/', 'prescriptionController@index');
        Route::get('/Getinfo', 'prescriptionController@Getinfo');
        Route::get('/delete', 'prescriptionController@delete');
        Route::post('add', 'prescriptionController@Create');
        Route::post('update', 'prescriptionController@update');
        Route::get('GetDocInfo','prescriptionController@GetDocInfo');
        Route::get('viewadd',function(){
           return view('admin.Prescriptions.add'); 
        });
        Route::get('viewedit/{id}',function($id){
            $getprescription = App\AdminModel\Prescription::find($id);
           return view('admin.Prescriptions.edit',compact('getprescription')); 
        });
        

    });
    /* maps */
      Route::prefix('map')->group(function () {
          Route::post('/add','mapController@add');
            Route::get('/add', function(){
                $getmaps = App\AdminModel\Map::all();
                   return view('admin.map.add',compact('getmaps')); 
              });
              Route::get('delete/{id}','mapController@delete');
              Route::get('pharmacy' ,function(){
                $getmaps = App\AdminModel\Map::all();
                   return view('admin.map.pharmacy',compact('getmaps')); 
              });
              Route::get('vieworders/{id}','mapController@vieworders');
              Route::get('chngmon','mapController@chngmon');
              Route::get('Getinfo','mapController@Getinfo');
              Route::get('pharmacy/{id}','mapController@viewpharmacyorder');
              Route::post('adddetails','mapController@adddetails');
              Route::get('get_details_mon','mapController@get_details_mon');
              Route::post('resone_cancel','mapController@resone_cancel');
              Route::post('update','mapController@update');
              Route::post('resone_undone','mapController@resone_undone');
              
      });
        /* ondemand order */
      Route::prefix('pharmacy_ondemand')->group(function () {
          Route::post('/add','Pharmacy_ondemandController@add');
            Route::get('/add', function(){
                $getmaps = App\AdminModel\Map::all();
                   return view('admin.map.add',compact('getmaps')); 
              });
              Route::get('delete/{id}','Pharmacy_ondemandController@delete');
              Route::get('pharmacy' ,function(){
                $getmaps = App\AdminModel\Map::all();
                   return view('admin.map.pharmacy',compact('getmaps')); 
              });
              Route::get('vieworders/{id}','Pharmacy_ondemandController@vieworders');
              Route::get('chngmon','Pharmacy_ondemandController@chngmon');
              Route::get('Getinfo','Pharmacy_ondemandController@Getinfo');
              Route::get('pharmacy/{id}','Pharmacy_ondemandController@viewpharmacyorder');
              Route::post('adddetails','Pharmacy_ondemandController@adddetails');
              Route::get('get_details_mon','Pharmacy_ondemandController@get_details_mon');
              Route::post('resone_cancel','Pharmacy_ondemandController@resone_cancel');
              Route::post('update','Pharmacy_ondemandController@update');
              Route::post('resone_undone','Pharmacy_ondemandController@resone_undone');
              
      });
      /* Route For Categories */
      
       Route::prefix('permission')->group(function () {
           Route::get('/','PermissionController@index');
          Route::post('/add','PermissionController@add');
          Route::get('delete','PermissionController@delete');
          Route::post('update','PermissionController@update');
            
      });
    Route::prefix('pharmacy')->group(function () {
        Route::get('/', 'mapController@index2');
       
    });
      /* monthly subcription */
       Route::prefix('monthly')->group(function () {
         
              Route::get('/','MonthlyController@filter');
              Route::get('delete','MonthlyController@delete');
              Route::get('Getinfo','MonthlyController@Getinfo');
              Route::post('update','MonthlyController@update');
              Route::post('assign','MonthlyController@assign');
              Route::get('getform','MonthlyController@getform');
              Route::get('getform/canceled','MonthlyController@getform_cancel');
              Route::post('editassign','MonthlyController@editassign');
              Route::post('editassign_cancel','MonthlyController@editassign_cancel');
              Route::get('confirm','MonthlyController@confirm');
              Route::get('rejected','MonthlyController@rejected');
              Route::get('getfeedback','MonthlyController@getfeedback'); 
              Route::get('get_details_mon','MonthlyController@get_details_mon');
              Route::get('rejected_monthly','MonthlyController@rejected_monthly');
              Route::get('cancel_monthly','MonthlyController@cancel_monthly');
              Route::get('getresone','MonthlyController@getresone');
              Route::get('undone_monthly','MonthlyController@undone_monthly');
              Route::get('getresoneundone','MonthlyController@getresoneundone');
              
      });
        /*  On Demad Package */
       Route::prefix('ondemand')->group(function () {
              Route::get('/','OndemandController@filter');
              Route::get('delete','OndemandController@delete');
              Route::get('Getinfo','OndemandController@Getinfo');
              Route::post('update','OndemandController@update');
              Route::post('assign','OndemandController@assign');
              Route::get('getform','OndemandController@getform');
              Route::get('getform/canceled','OndemandController@getform_cancel');
              Route::post('editassign','OndemandController@editassign');
              Route::post('editassign_cancel','OndemandController@editassign_cancel');
              Route::get('confirm','OndemandController@confirm');
              Route::get('rejected','OndemandController@rejected');
              Route::get('getfeedback','OndemandController@getfeedback'); 
              Route::get('get_details_mon','OndemandController@get_details_mon');
              Route::get('rejected_monthly','OndemandController@rejected_monthly');
              Route::get('cancel_monthly','OndemandController@cancel_monthly');
              Route::get('getresone','OndemandController@getresone');
              Route::get('undone_monthly','OndemandController@undone_monthly');
              Route::get('getresoneundone','OndemandController@getresoneundone');
      });
    /* Route For case */
    Route::prefix('case')->group(function () {
        Route::get('/', 'CaseController@index');
        Route::get('/Getinfo', 'CaseController@Getinfo');
        Route::get('/delete', 'CaseController@delete');
        Route::post('add', 'CaseController@Create');
        Route::post('update', 'CaseController@update');
        Route::get('usercase/{id}','CaseController@usercases');
        Route::get('updatecase','CaseController@updatecase');
        Route::get('deleteusercase','CaseController@deleteusercase');
        Route::get('approvecase','CaseController@approvecase');
    });
          /* package */
             Route::prefix('package')->group(function () {
                 Route::get('/','PackageController@index');
                 Route::get('add',function(){
                    return view('admin.package.add'); 
                 });
                 Route::post('add','PackageController@Create');
                 Route::get('edit/{id}',function($id){
                     $getpac = App\AdminModel\Package::find($id);
                     return view('admin.package.edit',compact('getpac'));
                 });
                 Route::post('edit','PackageController@update');
                 Route::get('delete','PackageController@delete');
             });
          
});
