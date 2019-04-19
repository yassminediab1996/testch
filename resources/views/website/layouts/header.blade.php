<!DOCTYPE html>
<html>
<head>
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K7J9NT9');</script>
<!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <title> @yield('title') </title>
  <meta content="المتابعة الدورية - شفاء" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('chefaa_design/css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('chefaa_design/css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('chefaa_design/css/chefaa.webflow.css')}}" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <!--<link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="{{asset('images/icon.png')}}">-->
  <!--<link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">-->
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
    <style>
        ul, li {
	list-style:none;
	padding:0;
	margin:0;
}
a {text-decoration:none;}

.profile-wrapper {
   	    width: 150px;
    position: absolute;
    top: 24%;
    left: -15%
}
.profile-wrapper::after {
	content: '';
	position: absolute;
	top: 20px;
	right: 10px;
	border-color: #333 transparent transparent;
	border-width: 6px;
	border-style: solid;
	
;
}
.profile-wrapper::before {
	content: '';
	position: absolute;
	top: 20px;
	right: 10px;
	border-color: #eee transparent transparent;
	border-width: 6px;
	border-style: solid;
}
.profile-wrapper:hover::after {
	border-color: #111 transparent transparent;	
}

.profile {
 padding: 10px;
    border: 1px solid #e6e6e6;
    border-radius: 3px;
    box-shadow: 0 1px 0 #e6e6e6 inset, 0 1px 7px #e6e6e6;
    background: -webkit-linear-gradient(hsla(131.42857142857144, 53.85%, 45.88%, 1.00), #e6e6e6);
}
.profile:hover {
    cursor: pointer;
    background: -webkit-linear-gradient(#e6e6e6, hsla(131.42857142857144, 53.85%, 45.88%, 1.00));
}

}
.profile .name {
	font-size:12px;
	color:#fff;
	line-height:26px;
	margin-left:10px;
}
.profile .name:hover {
	color:#0088cc;
}
.profile img {
	width:25px;
	display:inline;
	float:left;
	border:1px solid #111;
	border-radius:3px;
	box-shadow:0 0 3px rgba(0, 0, 0, 0.5) inset;
}

/* hide menu */
.menu {
	display:none;
	clear:both;
	margin:20px 0 0 0;
}
.menu li {
	font-size:12px;
	margin:0;
  padding: 10px 4px;
}
.menu li a {
	color:#555;
}
.menu li:hover > a{
	color:#eee;
}

.menu li:hover{
	border-left: 1px solid #111;
  border-right: 1px solid #222;
  border-bottom: 1px solid #222;
  border-top: 1px solid #111;
  border-radius: 3px;
}

/* hover profile show menu */
.profile:hover .menu {
	display:block;
}
    </style>
    @yield('style')
  <script>UPLOADCARE_PUBLIC_KEY = 'YOURKEYHERE';</script>
  <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" data-integration="Webflow"></script>
  <style>
.uploadcare--widget {
width: 100%;
}
.uploadcare--widget__button_type_open{
width: 100%;
min-width: 150px;
background: #5b3acc;
padding: 8px;
color: white;
border-style: solid;
border-width: 1px;
border-color: rgba(1, 204, 190, .15);
border-radius: 40px;
font-family: Karla;
cursor: pointer;
}
.uploadcare--widget__button_type_open:hover {
background: #5b3acc;
font-family: Karla;
}
}
p{
    font-family : Tajawal !important;
}
   @font-face{
            font-family: 'Tajawal';
            src: url({{ url('Tajawal-Regular.ttf') }});
            }
</style>
      
</head>
<body  class="body">
  
  <!--<div data-w-id="3bbfde87-04f1-5595-abe5-fda01d384c87" class="pop-up-wrapper">-->
  <!--  <div class="pop-up">-->
  <!--    <div class="w-form">-->
  <!--         @include('website.notfi')-->
  <!--      <form method="post" action="{{ url('monthlypackge') }}" id="email-form-2"  data-name="Email Form 2" enctype="multipart/form-data">-->
  <!--           {{csrf_field()}}-->
  <!--          <input type="text" class="textfield w-input" autofocus="true" maxlength="256" name="name" data-name="Name" placeholder="..ادخل اسمك" id="name" required="">-->
  <!--          <input type="email" class="textfield w-input" maxlength="256" name="email" data-name="email" placeholder="..ادخل بريدك الالكتروني" id="email-4" required="">-->
  <!--          <input type="tel" class="textfield w-input" maxlength="256" name="phone" data-name="phone" placeholder="..ادخل رقم هاتفك" id="phone" required="">-->
  <!--          <input type="text" class="textfield w-input" maxlength="256" name="address" data-name="address" placeholder="..ادخل عنوانك" id="address" required="">-->
      
  <!--           <a id="Image-URL" href="#" class="textfield uploader submission-image w-inline-block">-->
  <!--               <img src="{{asset('chefaa_design/images/none.svg')}}" alt="">-->
  <!--                  <div class="text-block-14">ارفق صورة الروشتة</div>-->
  <!--           </a>-->
  <!--           <button class="btn btn-success btn-lg ">التالى</button>-->
  <!--           <input type="submit" value="التالي" data-wait="..." class="cta smaller w-button btn">-->
  <!--      </form>-->

  <!--    </div>-->
  <!--    <h3 class="heading-3">ادخل بياناتك هنا للتبرع</h3>-->
  <!--    <div class="sec-tite-bg-right"><strong class="bold-text-6">شكرًا مقدمًا!</strong></div>-->
  <!--  </div>-->
  <!--</div>-->


  @include('website.layouts.navbar')
        
	
    </div>
  </div>
  <!--/ header--> 
  @yield('content')
     <!-- footer--->
  <footer id="footer" class="footer w-clearfix">
      @yield('mailchimb')
  @include('website.layouts.footer')