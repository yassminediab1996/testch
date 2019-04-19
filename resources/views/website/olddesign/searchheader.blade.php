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
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="IsOne is new Html theme that we have designed to help you transform your store into a beautiful online showroom. This is a fully responsive Html theme, with multiple versions for homepage and multiple templates for sub pages as well" />
    <meta name="keywords" content="IsOne,7uptheme" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta name=“google-site-verification” content=“0muj5mwhXtVfN2jrZNcj06F4Bl2l8n2RbQwrNlUnI3M” />
    <title>@yield('title')</title>
    @yield('style')
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
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

		<link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
		

<style>
   
            body{
            font-family : Tajawal !important;
            
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
            .main-nav.main-nav01 > ul > li > a {
            color: white;
            }
          @font-face{
            font-family: 'Tajawal';
            src: url({{ url('Tajawal-Regular.ttf') }});
            }
            
            .main-nav ul li{
                    padding-left: 15px;

            }
          
         a{
             font-weight:unset !important;
             color: white !important;
         }
              
                 @media only screen and (min-width : 480px) {
                .bu{
                         margin-top: 65px;
                        margin-right: -20px;
                }
          }
          
          @media only screen and (max-width: 600px) 
          {
              .menu_open i {
                   margin-top: 15px !important;
              }
          }
      
</style>
 <link rel="stylesheet" type="text/css" href="{{asset('website/css/rtl.css')}}" media="all"/> 
</head>
<body class="page-full-sidebar" style="background:#f2f2f2">
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7J9NT9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
           <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{url('/')}}">الرئيسية</a>
                 <a href="{{url('/store')}}">المتجر </a>
                <a href="{{url('/search')}}">محرك بحث </a>
                <a href="{{url('/blog')}}"> المدونة </a>
                <a href="{{url('/contact')}}"> تواصل معنا </a>
           </div>
<div class="wrap">
    <div id="header">
        <div class="header01">
            	<!-- End Main Header -->
			<div class="header-nav01" style="background-color: #62cb5d !important;    height: 85px;
">
				<div class="container">
					<div class="row">
					    <div class="col-md-1   col-lg-2 hidden-xs hidden-sm">
                          <a href="{{url('/')}}" > <img src="{{asset('images/final site logo.png')}}" width="90px" class="mr-1" style="margin-top: 25px;"> </a>

					    </div>
						<div class="col-md-9 col-sm-9 col-xs-5 col-lg-8 "style="margin-top: 18px;
">   
                               
							<nav class="main-nav main-nav01">
							   <span class="menu_open visible-xs visible-sm" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i>
                              </span>
                             <div class="collapse navbar-collapse" id="navbar-collapse-zagros">
								<ul class="nav navbar-nav  hidden-xs hidden-sm" >
									<li class="has-mega-menu">
										<a href="{{url('/')}}">الرئيسية</a>
									
									</li>
								    	<li class="has-mega-menu">
									  
										<a class="ww" href="{{url('/packages')}}">
										   الروشتة الشهرية   
									    </a>
									    
									      <sup style="color: #fff;
     color: #fff;
    height: 16px;
    display: inline-block;
    line-height: 16px;
    padding: 0 8px;
    border-radius: 8px;
    position: absolute;
    top: 1px;
    right: 90px;
    background: #ff3e3e;">مجاناً</sup>
									</li>
									<li class="has-mega-menu">
										<a href="{{url('/store')}}">المتجر </a>
									</li>
						        	<li class="has-mega-menu">
										<a href="{{url('/search')}}">محرك بحث </a>
									</li>
								
									<li class="has-mega-menu">
										<a href="{{url('/blog')}}"> المدونة  </a>
									</li>
									
									<li class="has-mega-menu">
										<a href="{{url('/contact')}}"> تواصل معنا  </a>
									</li>
									
							
								
								</ul>
							</div>
							</nav>
							
							<!-- End Main Nav -->
						</div>
						<div class="col-md-2 col-sm-3 col-xs-7 col-lg-2" style="    margin-top: 15px;">

						      <div class="list-social" style="margin-top: 10px;">

                                 
                                <a href="https://www.instagram.com/getchefaa/" class="white aa ins"  target="_blank"><i class="fa fa-instagram " aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/company/getchefaa" class="white aa lin"  target="_blank"><i class="fa  fa-linkedin " aria-hidden="true"></i></a>
                                <a href="https://www.twitter.com/getchefaa" class="white twi"  target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/GetChefaa" class="white fac"  target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>

                            </div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- End Header On Top -->
        </div>
    </div>
    <script>
              function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
    </script>
@yield('content')
@include('website.footersearch')