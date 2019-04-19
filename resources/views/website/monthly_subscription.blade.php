@php $currentPage = 'monthly_subscription'; @endphp

@extends('website.layouts.master')

@section('content')

<style>
    .monthly .heading-4 , .monthly .w-form { margin : auto !important } 
    .cta.smaller { float : none !important; display : block !important ; margin : auto !important  } 
</style>
  
  <!-- content--->
  <div class="cases-section monthly">
    <div class="row w-row">
        
        <div class="column-9 w-col w-col-6">
        <h1 data-w-id="664fef2e-c42b-8bb1-6385-95f44b732bfc" class="heading-4"><strong> تسجيل البيانات</strong></h1>
        <div class="w-form">
         <!-- form-->
           @include('website.notfi')
          <form method="post" action="{{ url('/monthlypackage') }}" enctype="multipart/form-data"  class="form-2 w-clearfix">
               {{csrf_field()}}
               
              <input type="text"  class="textfield w-input" value="{{old('name')}}" autofocus="true" maxlength="256" name="name" data-name="name" placeholder="..برجاء ادخال اسمك" id="name-3" required="">
              <input type="email" class="textfield w-input" value="{{old('email')}}" maxlength="256" name="email" data-name="Email 5" placeholder="..برجاء ادخال بريدك الالكتروني" id="email-5" required="">
              <input type="tel"   class="textfield w-input" value="{{old('phone')}}" maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..برجاء ادخال رقم الهاتف" id="phone-2" required="">
              <input type="text"  class="textfield w-input" value="{{old('address')}}" maxlength="256" name="address" data-name="address" placeholder="..برجاء ادخال العنوان" id="address-2" required="">
              <input type='text'  readonly name="date" class='datepicker-here textfield w-input' data-language='en'  placeholder="اختار تاريخ"/>
            
               <!--<img src="{{asset('chefaa_design/images/none.svg')}}" alt="">-->
               
               <div class="text-block-14">
                   <label style="float: right; font-family : Tajawal !important;">إرفع الروشتة من هنا</label>
                   <br>
                   <input style="width: 400px;direction: rtl;height: 75px;" name="file" accept="image/x-png,image/gif,image/jpeg" title="ارفع الروشتة " type="file" class="form-control textfield uploader submission-image w-inline-block" placeholder="ارفع روشتتك من هنا" id="Image-URL" href="#" >
               </div>
              <!-- Submit Button -->
              <input  type="submit" value="ارسال" data-wait="..." class="cta smaller w-button month">
          </form>
         <!-- /form-->
        </div>
       
      </div>
        <!-- content page-->
       <div class="column-8 w-clearfix w-col w-col-6">
           <p class="paragraph"> 
               الروشتة الشهرية هى خدمة مجانية بالكامل , ستساعدك على طلب روشتتك الشهرية وتحديد موعد شهرى لتصلك على عنوانك من اقرب صيدلية لك فى الموعد المحدد بدون اى تكلفة زائدة على سعر الروشتة    
           </p>
           <img src="{{asset('uploads/files/final_monthly.png')}}" alt="" class="image-2">
       </div>
       <!-- /content page--> 
       
    </div>
  </div>
  <!-- /content--> 
  @section('mailchimb')
    <div class="div-block footer">
      <div class="form-block-2 w-form">
        <!--<form id="email-form" name="email-form" data-name="Email Form" class="form">-->
        <!--    <input type="email" class="textfield newsletter w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="..ادخل بريدك الالكتروني" id="email-2" required="">-->
        <!--    <input type="submit" value="ارسال" data-wait="..برجاء الانتظار" class="submit-button w-button">-->
        <!--</form>-->
        <div id="mc_embed_signup">
            <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=3b3b6e768b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"  novalidate >
               <div id="mc_embed_signup_scroll">
                    <input type="email" class="textfield newsletter w-input" maxlength="256" name="EMAIL" class="email textfield newsletter w-input" id="mce-EMAIL" data-name="Email 2" placeholder=" ...إدخل بريدك الإلكترونى  " required="">
                    <input type="submit" value="ارسال" data-wait="..برجاء "  name="subscribe" id="mc-embedded-subscribe" class="button submit-button w-bu ">
                </div>
              </form>
        </div>
                        
                        <!--End mc_embed_signup-->
      </div>
      <div class="text-block-7">💌 لمتابعة الجديد من خلال البريد الإلكترونى</div>
    </div>
  @endsection
 
 <script type="text/javascript">
            $('.datepicker-here').datepicker({
                    language: 'en',
                    minDate: new Date() ,// Now can select only dates, which goes after today
                    dateFormat : 'yyyy-mm-dd',
                })
        </script>
@endsection 