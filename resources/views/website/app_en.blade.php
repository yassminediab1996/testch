<!DOCTYPE HTML>
<html lang="en-US" dir="rtl">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K7J9NT9');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="chefaa" />
    <meta name="keywords" content="IsOne,7uptheme" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta name=“google-site-verification” content=“0muj5mwhXtVfN2jrZNcj06F4Bl2l8n2RbQwrNlUnI3M” />
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/bootstrap-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/jquery.fancybox.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/jquery-ui.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/owl.carousel.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/owl.transitions.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/owl.theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/jquery.mCustomScrollbar.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/hover.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/libs/flipclock.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/color1.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/color.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/theme.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/responsive.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/browser.css')}}" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&amp;subset=arabic" rel="stylesheet">
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->

	<link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

		<link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/css/rtl.css')}}" media="all"/> 

 @yield('css')
</head>
<style>

	body{
		font-family : Tajawal !important;

	}
	.main-nav.main-nav01 > ul > li > a {
		color: white;
	}
	.list-social>a.twi:hover {
    color: #fff;
    border-color: #1DA1F2;
     background-color: #1DA1F2 !important;
}
.list-social>a.ins:hover {
    color: #fff;
    border-color: pink;
     background-color: pink !important;
}
	.list-social>a.lin:hover {
    color: #fff;
    border-color: #0077B5;
     background-color: #0077B5 !important;
}
	@font-face{
		font-family: 'Tajawal';
		src: url({{ url('Tajawal-Regular.ttf') }});
	}

	.menu li{
		margin-left: 15px;
	}

	a{
		color :white !important;
		font-family : Tajawal !important;
		font-weight:unset !important;
	}
	.has{
		margin-top: 7px !important;
		font-family : Tajawal !important;
	}
	.lin li{
		margin-top: -15px !important;
	}
	.rr{
		margin-top: 5px !important;
	}

	@media only screen and (min-width : 480px) {
		.bu{
			margin-top: 60px;
		}
	}

	.aa{
		margin-top: 3px !important;

	}
	.ww{
		margin-left: 15px;

	}
	.diimg{
		display: flex;
		flex-direction: row;
		flex-wrap: nowrap;
		justify-content: center;
		align-items: center;
		align-content: center;

	}
	@media only screen and (max-width: 600px) {
		.list-social {
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			justify-content: flex-start;
			align-items: stretch;
			align-content: center;
			width: 100%;
			margin: 0 0 5px 0;
			padding: 0;
		}
	}
	
	@media (max-width: 767px){
.main-nav.main-nav01.nav2 {

    margin-top: -60px !important;
}
}
</style>

<?php 
$resizeClass = new App\Helper;
?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">تسجيل الدخول </h4>
</div>
<div class="modal-body">
 @include('website.notfi')
        <form role="form"  action="{{url('loginuser2')}}" method="post"  id="reused_form" >
				    {{csrf_field()}}
        
        <div class="form-group">
            <label for="email">
                الإيميل:</label>
            <input type="email" class="form-control"
            id="email" name="email" value="{{old('email')}}" required maxlength="50">
        </div>
        
        <div class="form-group">
            <label for="name">
                كلمة المرور:</label>
            <input type="password" class="form-control"
            id="name" name="password"   required maxlength="50">

        </div>
        <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">تسجيل الدخول →</button>

    </form>
    <br/>
			<div class="row text-center w-full justify-content-md-center mt-2">
                <a href="{{url('login/facebook')}}"><i class="fa fa-facebook-square fa-3x" style="color:#4867AA;" ></i></a>
                <a href="{{url('login/google')}}"><i class="fa fa-google-plus-square fa-3x ml-3 mr-3" style="color:#DD4D42;"></i></a>
                <a href="{{url('login/twitter')}}"><i class="fa fa-twitter-square fa-3x" style="color:#1DA1F2;" ></i></a>
		
            </div>
            <div class="clearfix"></div>
    			<div  style=" margin-top: 10px;">
    			   	<a onclick="hideModal()" style="color: #0d0d0d !important;   ">
                     	<strong>	اضافة مستخدم جديد  </strong>
    					<i class="fa fa-arrow-left"></i>						
    				</a>

    			</div>

			<div  style=" margin-top: 10px;">
			    <p>اذا نسيت كلمه المرور يمكنك استرجعها عبر البريد الإلكترونى الخاص بك</p>
				<a  href="{{url('viewresetpas')}}" style="color: #0d0d0d !important;   ">
				<strong>	  هل نسيت كلمة المرور ؟  </strong>
				</a>
		   </div>
</div>

</div>

 </div>
</div>
<div id="reqister" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title"> إضافة مستخدم جديد </h4>
</div>
<div class="modal-body">
 @include('website.notfi')
        <form role="form"  action="{{url('registeruser2')}}" method="post"  id="reused_form" >
				    {{csrf_field()}}
        <div class="form-group">
            <label for="name">
                الإسم:</label>
            <input type="text" class="form-control"
            id="name" name="name" value="{{old('name')}}"  required maxlength="50">

        </div>
        <div class="form-group">
            <label for="email">
                الإيميل:</label>
            <input type="email" class="form-control"
            id="email" name="email" value="{{old('email')}}" required maxlength="50">
        </div>
        
        
		<div class="form-group" >
		    			<label >كلمة المرور</label>

			<input class="form-control" type="password" name="password" placeholder="الباسورد">
		
		</div>
	
	
		
		<div class="form-group"  >
		    @php
                 $getallcountry =  App\AdminModel\City::where(['parent' => 0 ])->get();
                 $getallgover = array();
                 
                @endphp
                @foreach($getallcountry as $countr)
                 @php
                   $getallgover = App\AdminModel\City::where(['parent' => $countr->id ])->get();
                 @endphp
                @endforeach
            <select class="form-control" name="state_id" >
                @foreach($getallgover as $state)
                  <option value="{{$state->id}}"  > {{$state->name_ar}}</option>
                @endforeach  
            </select>   
	
    	</div>
    	
    	<div class="form-group" >
			<input  type="radio" name="sex" value="1">
			<label>ذكر</label>
			
			<input type="radio" name="sex" value="2">
			<label>انثى</label>
		</div>
        <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs"> مستخدم جديد →</button>

    </form>
    <br/>
		
</div>

</div>

 </div>
</div>

<body class="page-full-sidebar" style="background:#f2f2f2">
  
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7J9NT9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{url('/')}}">الرئيسية</a>
  <a href="{{url('/monthly_subscription')}}">الروشتة الشهرية</a>
  <a href="{{url('/store')}}">المتجر </a>
    <a href="{{url('/search')}}">محرك بحث </a>
<a href="{{url('/blog')}}"> المدونة </a>
<a href="{{url('/contact')}}"> تواصل معنا </a>
</div>
<div class="wrap">
    <div id="header">
        <div class="header01">
            <div class="top-header top-header01" style="background-color: #62cb5d !important;">
				<div class="container">
					<div class="row">
					 <div class="col-md-2   col-lg-2 hidden-xs hidden-sm"style="margin-top: 10px;">
					         <a href="{{url('/')}}" >  <img src="{{asset('images/final site logo.png')}}" width="90px" class="mr-1"></a>
					 </div>
					 <div class="col-md-8 col-sm-6 col-xs-7 col-lg-8 " style="margin-top: 5px;">
							<nav class="main-nav main-nav01">
							     <span class="menu_open visible-xs" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i>
</span>
	<ul class="nav navbar-nav hidden-xs" >
									<li class="has-mega-menu">
										<a class="ww" href="{{url('/')}}">الرئيسية</a>
									
									</li>
								
									<li class="has-mega-menu">
						              
										<a class="ww" href="{{url('/monthly_subscription')}}">
										   الروشتة الشهرية   
									    </a>
									     	<span style="color: #fff;
                                        height: 16px;
                                        display: inline-block;
                                        line-height: 16px;
                                        padding: 0 8px;
                                        border-radius: 8px;
                                        position: absolute;
                                        top: 5px;     left: 2px;
                                       background: #ff3e3e;">مجاناً</span>
									</li>
									<li class="has-mega-menu">
										<a class="ww" href="{{url('/store')}}">المتجر </a>
									</li>
						        	<li class="has-mega-menu">
										<a class="ww" href="{{url('/search')}}">محرك بحث </a>
									</li>
									
							
									
									<li class="has-mega-menu">
										<a class="ww" href="{{url('/blog')}}"> المدونة  </a>
									</li>
									
									<li class="has-mega-menu">
										<a class="ww" href="{{url('/contact')}}"> تواصل معنا  </a>
									</li>
									
							
								
								</ul>
							</nav>		
						</div>
				    <div class="col-md-2 col-sm-6 col-xs-5 col-lg-2" style="margin-top: 5px;">

						      <div class="list-social">
                                <a href="https://www.instagram.com/getchefaa/" class="white aa ins"  target="_blank"><i class="fa fa-instagram " aria-hidden="true"></i></a>
                                 <a href="https://www.linkedin.com/company/getchefaa" class="white aa lin"  target="_blank"><i class="fa  fa-linkedin " aria-hidden="true"></i></a> 
                                <a href="https://www.twitter.com/getchefaa" class="white aa twi"  target="_blank"><i class="fa fa-twitter " aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/GetChefaa" class="white aa fac"  target="_blank"><i class="fa fa-facebook " aria-hidden="true"></i></a>

                            </div>
						</div>
					</div>
				</div>
			</div>
            <!-- End Top Header -->
            <div class="main-header19 main-header01" style="background-color: #62cb5d  !important; margin-top: 1px;margin-bottom: 1px;">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-7 col-sm-8 col-xs-12">
                              <form class="smart-search-form" action="{{url('searchproducts')}}" method="post">
                                  {{csrf_field()}}
                            <div class="smart-search smart-search19">
                                
                                <div class="select-category select-box">
                                    <select style="background-color: white;" name="category" required>
                                      
                                        <option value="">جميع  الأقسام</option>
                                         @foreach(App\AdminModel\Category::where('parent','!=',0)->get() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name_ar}}</option>
                                        @endforeach
                                     
                                    </select>
                                </div>
                              
                                    
                                    <input type="text" required onblur="if (this.value=='') this.value = this.defaultValue" name="search" onfocus="if (this.value==this.defaultValue) this.value = ''" value="ابحث...">
                                    <input type="submit" value="" style=" background-color: #4e9b4a !important;">
                               
                            </div>
                             </form>
                        </div>
                        <div class="col-md-5 col-sm-4 col-xs-12">
                            <div class="wrap-check-cart19">
                                <ul class="list-inline-block check-cart19">
                                    <li>

                                        <div class="mini-cart-box mini-cart2">
                                            <a class="mini-cart-link" href="{{url('cart')}}">
                                                <span class="mini-cart-icon"><i class="white fa fa-shopping-basket"></i></span>
                                               
                                                <span class="mini-cart-number white"><sup>  @if($FinalCart)  {{count($FinalCart->get())}}      @else 0 @endif</sup> <span>السلة</span></span>
                                            </a>
                                            <div class="mini-cart-content">
                                                @if(app()->getLocale() == 'ar')
                                                <h2>
                                             @if($FinalCart)  {{count($FinalCart->get())}}      @else 0 @endif ITEMS IN MY CART</h2>
                                                @else
                                                <h2>
                                              @if($FinalCart)  {{count($FinalCart->get())}}      @else 0 @endif منتج فى السلة</h2>
                                                @endif
                                                
                                                <ul class="list-mini-cart-item list-unstyled" >
                                                    
                                           @if($FinalCart)
                                               @if(!Auth()->check() and App\FinalCart::where('anonim',Cookie::get('cart'))->count() > 0)
                                                    @foreach($FinalCart->get() as $cart)
                                                       @php
                                                         $product = App\AdminModel\Product::find($cart->product_id);
                                                       @endphp
                                                    <li>
                                                        <div class="mini-cart-edit">
                                                            <a class="delete-mini-cart-item" href="" ><i onclick="DelItemCart({{$cart->product_id}})" class="fa fa-trash-o" style="color: black;"></i></a>
                                                            <!--<a class="edit-mini-cart-item" href="#" ><i onclick="EditItemCart({{$cart->product_id}})" class="fa fa-pencil" style="color: black;"></i></a>-->
                                                        </div>
                                                        <div class="mini-cart-thumb">
                                                            <a href="#"><img alt="" src=""></a>
                                                        </div>
                                                        <div class="mini-cart-info">
                                                            <h3 ><a style="    color: black !important;" href="{{url('details/'.$product->id)}}">{{$product->name_ar}}</a></h3>
                                                            <div class="info-price">
                                                                   @php
                                                                             $allpro = App\AdminModel\Product::find($product->id);
                                                                          @endphp
                                                								@if($allpro->ProOffer($allpro->id) !== 0)
                                                            						<del><span>{{$allpro->o_price}}
                                                                        						جنيه
                                                                        						</span></del>
                                                                        						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                                                                        						جنيه
                                                                        						</span></ins>
                                                                        		@else
                                                                        		<span>{{$allpro->o_price}} جنيه</span>
                                                            					@endif
                                                            </div>
                                                            <div class="qty-product">
                                                                <input type="number" id="qty-{{ $product->id }}" class="form-control" min="1" max="{{$product->quantity}}" value="{{$cart->Quantity}}" onchange="EditItemCart({{$cart->product_id}})">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @elseif(Auth::user() and App\FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)
                                                        @php
                                                           $carts = $FinalCart->get()->sortByDesc('updated_at');
                                                        
                                                       @endphp
                                                    @foreach($carts as $cart)
                                                    @php  
                                                   
                                                      $product = App\AdminModel\Product::find($cart->product_id);
                                                    @endphp
                                                    
                                                     <li>
                                                        <div class="mini-cart-edit">
                                                            <a class="delete-mini-cart-item" href="" ><i onclick="DelItemCart({{$cart->product_id}})" class="fa fa-trash-o" style="color: black;"></i></a>
                                                            <!--<a class="edit-mini-cart-item" href="#" ><i onclick="EditItemCart({{$cart->product_id}})" class="fa fa-pencil" style="color: black;"></i></a>-->
                                                        </div>
                                                        <div class="mini-cart-thumb">
                                                            <a href="#"><img alt="" src="{{$resizeClass->resize($product->img,216,216)}}" ></a>
                                                        </div>
                                                        <div class="mini-cart-info">
                                                            <h3><a href="{{url('details/'.$product->id)}}" style="    color: black !important;">{{$product->name_ar}}</a></h3>
                                                            <div class="info-price">
                                                               	    @php
                                                                             $allpro = App\AdminModel\Product::find($product->id);
                                                                          @endphp
                                                								@if($allpro->ProOffer($allpro->id) !== 0)
                                                            						<del><span>{{$allpro->o_price}}
                                                                        						جنيه
                                                                        						</span></del>
                                                                        						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                                                                        						جنيه
                                                                        						</span></ins>
                                                                        		@else
                                                                        		<span>{{$allpro->o_price}} جنيه</span>
                                                            					@endif
                                                            </div>
                                                          
                                                            <div class="qty-product">
                                                                <input type="number" id="qty-{{ $product->id }}" class="form-control" min="1" max="{{$product->quantity}}" value="{{$cart->Quantity}}" onchange="EditItemCart({{$cart->product_id}})">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                 @else
                                               @endif
                                             @endif
                                                </ul>
                                                <div class="mini-cart-total">
                                                @if(app()->getLocale() == 'en')
                                                    <label>TOTAL</label>
                                                    @else
                                                    <label>المجموع</label>
                                                    @endif

                                                       @php
                                                         $sum = 0;
                                                       @endphp
                                                       
                                                 @if(!Auth()->check() and App\FinalCart::where('anonim',Cookie::get('cart'))->count() > 0)
                                                     @php
                                                      $carts = App\FinalCart::where('anonim',Cookie::get('cart'))->get();
                                                     @endphp
                                                        @foreach($carts as $cart)
                                                          @php
                                                            $product = App\AdminModel\Product::find($cart->product_id);
                                                         @endphp
                                                         @php
                                                         $sum +=  \App\AdminModel\Product::Price($product->id) * $cart->quantity ;
                                                         @endphp
                                                        @endforeach

                                                 @elseif(Auth::user() and App\FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)
                                                           @php
                                                             $carts = $FinalCart->get()->sortByDesc('updated_at');
                                                          @endphp
                                                         @foreach($carts as $cart)
                                                          @php
                                                            $product = App\AdminModel\Product::find($cart->product_id);
                                                          @endphp
                                                            @php $sum +=  \App\AdminModel\Product::Price($product->id) * $cart->Quantity; @endphp
                                                         @endforeach
                                                        
                                                        @endif

                                                    <span>{{$sum}}</span>
                                                </div>
                                                <div class="mini-cart-button">
                                                
                                                    <a class="mini-cart-view" href="{{url('cart')}}">مشاهدة السلة</a>
                                                    @if($FinalCart )
                                                    <a class="mini-cart-checkout" onclick="checklogin2()">الدفع</a>
                                                    @endif
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Mini Cart -->
                                    </li>

                                    <li>
                                        <div class="checkout-box">
                                            <a href="#" class="dropdown-link">
                                                @php
                                                @endphp
                                                @if(! Auth()->check()) <i class="white fa fa-user-o" aria-hidden="true"></i> @elseif(auth()->user()->img == null ) <i class="white fa fa-user-o" aria-hidden="true"></i> @else <img src="{{asset('uploads/files/'.auth()->user()->img)}}" style="    width: 30px;
    height: 30px;" >@endif
                                                                                         
                                                <span class="white">  @if(!Auth()->check()) تسجيل الدخول | الأنضمام<br> @elseif(Auth()->check()) {{Auth()->user()->name}} @endif</span>
                                            </a>
                                            <ul class="list-checkout list-unstyled">
                                              
                                                    @if(Auth()->check())
                                                    <li style="color: black !important"><a href="{{url('/profile/'.auth()->user()->id)}}"  style="color: black !important"><i class="fa fa-user" style="color: black !important"></i> حسابى </a></li>
                                                        <li style="color: black !important"><a style="color: black !important" href="{{url('logoutuser')}}"><i class="fa fa-user"></i style="color: black !important"> تسجيل الخروج </a></li>
                                                    @else
                                                    <li style="color: black !important"><a style="color: black !important" href="{{url('login')}}"><i class="fa fa-key" aria-hidden="true"></i style="color: black !important">تسجيل دخول </a></li>
                                                    @endif
                                            </ul>
                                        </div>
                                        <!-- End Check Out Box -->
                                    </li>
                                </ul>
                                <div id="coupon-light-box" class="coupon-light-box white bg-color" style="display:none">
                                    <a href="#" class="close-light-box"><i class="fa fa-close"></i></a>
                                    <div class="inner-coupon">
                                      
                                        <h3 class="title18">جديد على شفاء؟</h3>
                                        <p>انضم اليوم واحصل على كوبون بخصم 100 دولار</p>
                                        <h2 class="title30">In Coupons <strong class="title60">$100</strong></h2>
                                        <div class="text-center">
                                            <a href="#" class="apply-coupon">احصل على الكوبون</a>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Header -->

        	<!-- End Main Header -->
			<div class="header-nav01" style="background-color: #62cb5d !important;">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-6 col-xs-12">
							<nav class="main-nav main-nav01 nav2">
								<ul>
								   	<li class="has-mega-menu">
										<a href="{{url('/store')}}">الرئيسية </a>
									</li>
									@foreach(App\AdminModel\Category::where('parent','!=',0)->get()->take(5) as $subcat1)
									<li class="has-mega-menu">
										<a href="{{url('products/'.$subcat1->id)}}">{{$subcat1->name_ar}} </a>
									</li>
									@endforeach
								
								</ul>
								<a href="#" class="toggle-mobile-menu"><span></span></a>
							</nav>
							<!-- End Main Nav -->
						</div>
						<div class="col-md-5 col-sm-5  hidden-xs">
							<ul class="menu-top01 list-inline-block text-right ">
								<li class="has rr"><a href="{{url('offer')}}" class="white">صفقات ممتازة</a></li>
								<li class="has rr "><a href="{{url('brands')}}" class="white">ماركات مميزة</a></li>
								<li class="has rr"><a href="{{url('bestseller')}}" class="white">أفضل مبيعاً</a></li>
								<li class="has rr"><a href="{{url('package')}}" class="white">باقات شهرية </a></li>
						
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header On Top -->
        </div>
    </div>
    <!-- End Header -->
   
    <div id="content">
        <div class="container">
            <div class="content-full-sidebar">
<!--				<div class="tab-hover">-->
<!--					<div class="title-tab-hover">-->
<!--						<div class="row">-->
<!--							<div class="col-md-12">-->
<!--								<ul class="list-tab-hover list-inline-block pull-left text-uppercase">-->
<!--									<li><a href="#" class="tab2" data-tab="tab2" class="title14" style="    background-color: #62cb5d;-->
<!--">الماركات</a></li>-->
<!--									<li><a href="#" class="tab3" data-tab="tab3" class="title14" style="    background-color: #62cb5d;-->
<!--">الأقسام</a></li>-->
<!--									<li><a href="#" class="tab4" data-tab="tab4" class="title14 link-coupon" style="    background-color: #62cb5d;-->
<!--">عروض اليوم والخصومات</a></li>-->
<!--								</ul>-->
<!--								<ul class="get-app list-inline-block pull-right">-->
<!--									<li>-->
<!--										<a href="https://play.google.com/store/apps/details?id=app.com.chefaa&hl=ar"><img style="    width: 20px;"src="{{asset('public/website/images/playstore.png')}}" alt="" /></a>-->

<!--									</li>-->
<!--									<li>-->
<!--										<a href="https://itunes.apple.com/eg/app/chefaa-medicine-delivery/id1438961456?mt=8"><img style="    width: 20px;" src="{{asset('public/website/images/apple.png')}}" alt="" /></a>-->
<!--									</li>-->
<!--									<li>-->
<!--										<form class="phone-app">-->
<!--											<input style="font-size:13px;color:black;" type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="     ادخل رقم الهاتف للحصول على أحدث العروض">-->
<!--											<input type="hidden" />-->
<!--										</form>-->
<!--									</li>-->
<!--								</ul>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					<!-- End Title -->
<!--					<div class="content-tab-hover">-->
						<!-- End Tab -->
<!--						<div id="tab2" class="item-tab-hover">-->
<!--							<div class="tab-brand">-->
<!--								<div class="row">-->
<!--								    @foreach(App\AdminModel\Brand::all()->take(6) as $brand)-->
<!--									<div class="col-md-2 col-sm-4 col-xs-6">-->
<!--										<div class="banner-adv zoom-image diimg">-->
<!--											<a href="{{url('brand/'.$brand->id)}}" class="adv-thumb-link "><img style="height: 100px !important;" src="{{asset('uploads/files/' . $brand->img)}}" alt="" /></a>-->
											<!--<a href="{{url('brand/'.$brand->id)}}" class="brand-logo "><img style="height: 100px !important;" src="{{asset('uploads/files/' . $brand->img)}}" alt="" /></a>-->
<!--										</div>-->
<!--									</div>-->
<!--							    	@endforeach-->
<!--								</div>-->
							
<!--							</div>-->
<!--						</div>-->
						<!-- End Tab -->
<!--						<div id="tab3" class="item-tab-hover">-->
<!--							<div class="tab-cat">-->
<!--								<div class="row">-->
<!--								     @foreach(App\AdminModel\Category::where('parent',0)->get() as $cat)-->
<!--									<div class="col-md-2 col-sm-4 col-xs-6" style="    width: 235px;-->
<!--">-->
<!--										<div class="banner-adv zoom-image overlay-image" style="    margin-top: 50px !important;-->
<!--">-->
<!--											<a href="#" class="adv-thumb-link" ><img src="{{asset('uploads/files/'.$cat->img)}}" style="    height: 127px;" alt="" /></a>-->
<!--											<a href="#" class="cat-icon">-->
<!--												<div class="adv-info text-center white">-->
													<!--<img src="{{asset('uploads/files/'.$cat->icone)}}" alt="" />-->
<!--													<i class="fa {{$cat->icone}}"></i>-->
<!--													<h3>{{$cat->name_ar}}</h3>-->
													
<!--												</div>-->
<!--											</a>-->
<!--										</div>-->
<!--									</div>-->
<!--						     	  @endforeach-->
<!--						     	  <div class="col-md-4"></div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						<!-- End Tab -->
<!--						<div id="tab4" class="item-tab-hover">-->
<!--							<div class="tab-coupon">-->
<!--								<div class="row">-->
								    
<!--									@foreach(\App\AdminModel\Product::all() as $allpro)-->
<!--		                                	@if(count($allpro->offer) >0)-->
<!--									<div class="col-md-4 col-sm-6 col-sm-6">-->
<!--										<div class="item-tab-coupon text-center border bg-white">-->
<!--											<div class="coupon-brand">-->
<!--												<a href="{{url('details/'.$allpro->id)}}" class="wobble-horizontal"><img  style="height: 150px;" src="{{$resizeClass->resize($allpro->img, 216, 216)}}" alt="" /></a>-->
<!--											</div>-->
<!--											<div class="coupon-info">-->
<!--												<h2 class="title16 gray">{{$allpro->offer->percentage}}% Off Everything</h2>-->
<!--												<p class="desc"><span class="silver">Expires</span> {{$allpro->offer->deadline_offer}}    </p>-->
<!--												<a href="{{url('details/'.$allpro->id)}}" class="shop-button style2" style="    background-color: #62cb5d;">اشترى الان </a>-->

								
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								@endif-->
<!--								@endforeach-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						<!-- End Tab -->
<!--					</div>-->
<!--				</div>-->
               @yield('content')

            </div>
            <!-- End Content Full Sidebar -->
        </div>
    </div>
    




<script>
// $( document ).ready(function() {
//     $( ".tab-hover  li a" ).hover(
       
//       function() {
//           var c = $(this).attr('class');
//         $( '.item-tab-hover #' + c ).addClass('active');
//       }, function() {
//           var c = $(this).attr('class');
//          $( '.item-tab-hover #' + c ).removeClass('active');
//       }
//     );

//  });
</script>
 <script>
  function hideModal() {
   
       
         $(function () {
            $('#myModal').modal('hide');    
            });
            
              $('#reqister').modal();
    }
		function checklogin2(){
       
       $.get("{{ url('checklogin') }}", function(data, status){
           console.log(data)
            if(data == 1)
			{
               window.location="{{url('checkout')}}";
			}else{
                
                  $('#myModal').modal('show');
			}


        });

	}
</script>
    <script>
         function DelItemCart(id) {

             $.get("{{ url('DelItemCart') }}?id="+id, function(data, status){
                 if(data == 1)
                     location.reload();

             });
         }

         function EditItemCart(id) {
              var qty = 0;
             var qty = $('#qty-'+id).val();
             $.get("{{ url('EditItemCart') }}?id="+id+'&qty='+qty, function(data, status){
                 if(data == 1)
                     location.reload();

             });
         }
        //  $( document ).ready(function() {
        //      $.get("{{ url('everyrun') }}", function(data, status){


        //      });

       //  });
       
       function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
        </script>
    @include('website.footer_en')
    