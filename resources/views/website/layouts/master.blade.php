<!DOCTYPE html>
<html data-wf-page="5c4e31307c1ca431c3061ac4" data-wf-site="5c4e31307c1ca4e654061ac3">
<head>
   <meta charset="utf-8">
   <title>Chefaa | {{ basename(Request::url()) }}</title>
   <meta content="width=device-width, initial-scale=1" name="viewport">
   <meta content = "تطبيق شفاء" property = "og:title "/>
   <meta content="Webflow" name="generator">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- start include bootstrap css file -->
     <link href="{{asset('chefaa_design/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- end include bootstrap css file -->
    
    <script src = "{{asset('chefaa_design/js/respond.min.js')}}" ></script>
    
    <link href="{{asset('chefaa_design/css/webflow.css')}}" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="{{asset('chefaa_design/css/chefaa.webflow.css')}}" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- start include bootstrap js file  -->
    <script src="{{asset('chefaa_design/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- end include bootstrap js file -->
    <link href="{{asset('chefaa_design/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('chefaa_design/dist/js/datepicker.min.js')}}"></script>
    <!-- Include English language -->
    <script src="{{asset('chefaa_design/dist/js/i18n/datepicker.en.js')}}"></script>
    <!-- Include English language -->
    <script src="{{asset('chefaa_design/dist/js/i18n/datepicker.en.js')}}"></script>
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
    @yield('style')
    <script>UPLOADCARE_PUBLIC_KEY = 'YOURKEYHERE';</script>
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" data-integration="Webflow"></script>
    <link href="{{asset('chefaa_design/css/custom.css')}}" rel="stylesheet" type="text/css">
           
</head>
<body class="body" style = "overflow:visible"  >
    
 <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K7J9NT9');</script>
  <!-- END Google Tag Manager -->

 @include('website.notfi')
 <!-- head  -->
  @if(basename(Request::url()) == 'demo' )
  <div class="head">
      
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-in-quad" data-easing2="ease-in-quad" class="navbar w-nav">
      <div class="navcontainer w-clearfix">
        <div class="menu-button w-nav-button">
          <div class="icon w-icon-nav-menu"></div>
        </div><a href="{{url('/')}}" class="brand w-nav-brand w--current"><img src="{{asset('chefaa_design/images/logo.svg')}}" width="157" alt=""></a>
        
      <nav role="navigation" class="nav-menu w-nav-menu" style="    margin-top: 20px;">

          <a href="{{url('contact')}}" class="navlink w-nav-link <?php  if($currentPage =='contact'){echo 'w--current';}?>">تواصل معنا</a>
          <a href="{{url('blog')}}" class="navlink w-nav-link <?php  if($currentPage =='blog'){echo 'w--current';}?>">المدونة</a>
          <a href="{{url('/chefaa_app')}}" class="navlink w-nav-link <?php  if($currentPage =='chefaa_app'){echo 'w--current';}?>"> تطبيق شفاء</a>
          <a href="{{url('#')}}" class="navlink w-nav-link <?php  if($currentPage =='search'){echo 'w--current';}?>">ابحث عن دواء</a>
          <a href="{{url('store')}}" class="navlink w-nav-link <?php if($currentPage =='store'){echo 'w--current';}?>">المتجر</a>
          <a href="{{url('monthly_subscription')}}" class="navlink w-nav-link <?php  if($currentPage =='monthly_subscription'){echo 'w--current';}?>">الروشتة الشهرية</a>
          <a href="{{url('ondmandpackge')}}" class="navlink w-nav-link <?php  if($currentPage =='ondmandpackge'){echo 'w--current';}?>">طلب دواء</a> 
          <a href="{{url('/csr')}}" class="navlink w-nav-link <?php  if($currentPage =='csr'){echo 'w--current';}?>">المسؤلية المجتمعية</a>
       
          </nav>
          
      </div>
    </div>
    
  </div>
  
  @elseif( basename(Request::url()) == 'chefaa_app' )
  
  <div class="head-green">
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-in-quad" data-easing2="ease-in-quad" class="navbar w-nav">
      <div class="navcontainer w-clearfix">
        <div class="menu-button w-nav-button">
          <div class="icon w-icon-nav-menu"></div>
        </div><a href="{{url('/')}}" class="brand w-nav-brand"><img src="{{asset('chefaa_design/images/logo.svg')}}" width="157" alt="" class="logo-white"></a>
        
        <nav role="navigation" class="nav-menu w-nav-menu">
            <a href="{{url('contact')}}" class="navlink white w-nav-link <?php  if($currentPage =='contact'){echo 'w--current';}?>">تواصل معنا</a>
            <a href="{{url('blog')}}" class="navlink white w-nav-link <?php  if($currentPage =='blog'){echo 'w--current';}?>">المدونة</a>
            <a href="{{url('chefaa_app')}}" class="navlink white w-nav-link <?php  if($currentPage =='chefaa_app'){echo 'w--current';}?>"> تطبيق شفاء</a>
            <a href="{{url('#')}}" class="navlink white w-nav-link <?php  if($currentPage =='search'){echo 'w--current';}?>">ابحث عن دواء</a>
            <a href="{{url('store')}}" class="navlink white w-nav-link <?php if($currentPage =='store'){echo 'w--current';}?>">المتجر</a>
            <a href="{{url('monthly_subscription')}}" class="navlink white w-nav-link <?php  if($currentPage =='monthly_subscription'){echo 'w--current';}?>">الروشتة الشهرية</a>
            <a href="{{url('ondmandpackge')}}" class="navlink white w-nav-link <?php  if($currentPage =='ondmandpackge'){echo 'w--current';}?>">طلب دواء</a> 
            <a href="{{url('/csr')}}" class="navlink white w-nav-link <?php  if($currentPage =='csr'){echo 'w--current';}?>">المسؤلية المجتمعية</a></nav>
            
      </div>
    </div>
    <div class="app-head-wrapper">
      <div class="w-row">
        <div class="column-10 w-clearfix w-col w-col-6">
          <div class="div-block-5 div-block-6 white w-clearfix">
            <div class="text-head-container w-clearfix">
              <h1 class="heading white">خدمة <span><strong class="spain white">شفاء </strong></span>الخدمة الأسهل في طلب الدواء</h1>
              <p class="phead white">الأن تستطيع طلب دوائك بكل سهولة ويسر من خلال تطبيق شفاء مع<br>.إمكانية حجز دوائك الشهري ليصلك آينما كنت</p>
              <div class="storecontainer">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=app.com.chefaa&hl=ar" class="storebutton w-inline-block">
                     <img src="{{asset('chefaa_design/images/googlePlay.svg')}}" alt="" class="playstore"></a>
                  <a target="_blank" href="https://itunes.apple.com/eg/app/chefaa-medicine-delivery/id1438961456?mt=8" class="storebutton w-inline-block">
                      <img src="{{asset('chefaa_design/images/appStore.svg')}}" alt="" class="appstore"></a>
                  </div>
            </div>
          </div>
        </div>
        <div class="w-clearfix w-col w-col-6">
          <div class="iphones-wrapper w-clearfix">
              <img src="{{asset('chefaa_design/images/search2.png')}}" style="    width: 323px;height: 612px;"id="w-node-a175cff103e1-8364cde6" data-w-id="b4e7cd5d-7c08-d7cd-0486-a175cff103e1" alt="" class="image-3">
    

              <img src="{{asset('chefaa_design/images/store.png')}}" style="     width: 300px;
    height: 590px;" id="w-node-898907ebd24f-8364cde6" data-w-id="04471744-e892-9610-e8f8-898907ebd24f" alt="" class="image-4">
              </div>
        </div>
      </div>
    </div>
  </div>

  @else 
   <!-- header--> 
  <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-in-quad" data-easing2="ease-in-quad" class="navbar w-nav">
    <div class="navcontainer w-clearfix">
      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div>
      <a href="{{url('/')}}" class="brand w-nav-brand"><img src="{{asset('chefaa_design/images/logo.svg')}}" width="157" alt=""></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
          <a href="{{url('contact')}}" class="navlink w-nav-link <?php if($currentPage =='contact'){echo 'w--current';}?>">تواصل معنا</a>
          <a href="{{url('blog')}}" class="navlink w-nav-link <?php  if($currentPage =='blog'){echo 'w--current';}?>"> المدونة</a>
          <a href="{{url('/chefaa_app')}}" class="navlink w-nav-link <?php  if($currentPage =='chefaa_app'){echo 'w--current';}?>"> تطبيق شفاء</a>
          <a href="{{url('#')}}" class="navlink w-nav-link <?php  if($currentPage =='search'){echo 'w--current';}?>">ابحث عن دواء</a>
          <a href="{{url('store')}}" class="navlink w-nav-link <?php  if($currentPage =='store'){echo 'w--current';}?>">المتجر</a>
          <a href="{{url('monthly_subscription')}}" class="navlink w-nav-link <?php if($currentPage =='monthly_subscription'){echo 'w--current';}?>">الروشتة الشهرية</a>
                     <a href="{{url('ondmandpackge')}}" class="navlink w-nav-link <?php  if($currentPage =='ondmandpackge'){echo 'w--current';}?>">طلب دواء</a> 

          <a href="#" class="navlink w-nav-link <?php  if($currentPage =='csr'){echo 'w--current';}?>">المسؤلية المجتمعية</a>
            <div class="w-clearfix"></div>
            @if( basename(Request::url()) == 'csr' ) 
                <p style="    float: right;position: relative;top: -23px;right: 90px;font-size: 9px;color: green;font-weight: bold;">POWERED BY</p>
                <img src="{{asset('uploads/files/logowe.png')}}" style="     position: relative;top: -29px;right: -20px;float: right;">
    
    
    
            @endif
                <div class="w-clearfix"></div>

    
      </nav>
   </div>
 </div>
  <!-- END header--> 
  @endif
 
  <!-- head -->
 @yield('content')
  
  <footer id="footer" class="footer w-clearfix">
       @yield('mailchimb')
    <div class="footercontainer w-clearfix">
      <div class="social-icons"><a target="_blank" id="faacebook" href="https://www.facebook.com/GetChefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/fb.svg')}}" alt=""></a><a target="_blank" id="twitter" href="https://www.twitter.com/getchefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/twitter.svg')}}" alt=""></a><a target="_blank" id="instagram" href="https://www.instagram.com/getchefaa/" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/instagram.svg')}}" alt=""></a><a target="_blank" id="linkedin" href="https://www.linkedin.com/company/getchefaa" class="social-icon w-inline-block"><img src="{{asset('chefaa_design/images/linkedin.svg')}}" alt=""></a></div>
      <ol class="list w-list-unstyled" >
        <li class = "list-item"> <a href="#" class="footer-link">وظائف </a></li>
        <li class = "list-item"> <a href="{{url('contact')}}" class="footer-link">تواصل معنا</a></li>
        <li class = "list-item"> <a href="{{url('services')}}" class="footer-link">خدمات</a></li>
        <li class = "list-item"> <a href="{{url('privacy')}}" class="footer-link">سياسة الخصوصية</a></li>
        <li class = "list-item"> <a href="#" class="footer-link">شروط الإستخدام</a></li>
      </ol>
    </div>
  </footer>
  <!--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://d1tdp7z6w94jbb.cloudfront.net/js/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <script src="{{asset('chefaa_design/js/webflow.js')}}" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
<script>
    (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};h._hjSettings={hjid:1093439,hjsv:6};a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K7J9NT9');</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'vUqJL7ruiX';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>

<script>
       $(document).ready(function() {
        jQuery.noConflict();
          $("#mc-embedded-subscribe-form").submit(function() {

                 swal({
                      title: 'شكرا',
                      text: "شكرا لتسجيلك معنا!",
                  },
                  );
                location.reload();
                  $.getJSON('http://chefaa.com/cool-cats-optin/mc-end-point.php', formData ,function(data) {
        		
        			if(data.status === 'subscribed') {
        				alert('Thanks!');
        			} else {
        				alert("oops error: " + data.detail);
        			}
        		});
          });
        });
        
    </script>
</html>