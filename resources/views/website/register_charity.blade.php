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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- start include bootstrap css file -->
     <link href="{{asset('chefaa_design/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- end include bootstrap css file -->

    <link href="{{asset('chefaa_design/css/webflow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('chefaa_design/css/chefaa.webflow.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
      <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <link href="{{asset('chefaa_design/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('chefaa_design/dist/js/datepicker.min.js')}}"></script>

        <!-- Include English language -->
        <script src="{{asset('chefaa_design/dist/js/i18n/datepicker.en.js')}}"></script>
     <style>
         .contanier{
              width: 500px;
              margin: auto;
              margin-top: 50px;
         }
         .columns-3 .w-row{
             margin: auto;
            margin-bottom: 20px;
           margin-top: -30px;
         }
     </style>
              
</head>
<body class="body">
    <div class="contanier">
            <h2 style="    margin-left: 33%;
">تسجيل بياناتك</h2>
@include('website.notfi')
     <form id="email-form-2" action="{{url('reqister/charity')}}" method="post"  data-name="Email Form 2">
            {{csrf_field()}}
            <input type="hidden" name="type" value="6">
            <input type="text" class="textfield w-input" autofocus="true" maxlength="256" name="name"  placeholder="..ادخل اسمك" id="name" required="">
            <input type="email" class="textfield w-input" maxlength="256" name="email"  placeholder="..ادخل بريدك الالكتروني" id="email-4" required="">
            <input type="password" class="textfield w-input" required name="password" placeholder="كلمة المرور "> 
            <input type="tel" class="textfield w-input"  maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..ادخل رقم هاتفك" id="phone" required="">
            <input type="text" class="textfield w-input" name="address" required placeholder="ادخل عنوانك "> 
          <div class="columns-3 w-row" >
              <div class="column-6 w-col w-col-10" style="margin: auto; "><input type="submit" value="ارسال" data-wait="..برجاء الانتظار" class="cta w-button"></div>
          </div>
          
        </form>
    </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <!-- start include bootstrap js file  -->
  <script src="{{asset('chefaa_design/js/bootstrap.min.js')}}" type="text/javascript"></script>
  <!-- end include bootstrap js file -->
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
</html>   
