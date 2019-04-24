@php $currentPage = 'contact';  @endphp

@extends('website.layouts.master')
@section('content')

  <div class="contactcontainer">
    <div data-easing="ease-in-out-back" data-duration-in="300" data-duration-out="100" class="w-tabs">
      <div class="tabs-menu w-tab-menu">
        <a data-w-tab="firm" class="tab w-inline-block w-tab-link" >
          <div>انا أمثل شركة</div>
        </a>
        <a data-w-tab="pharmacy" class="tab w-inline-block w-tab-link" >
          <div>انا أمثل صيدلية</div>
        </a>
        <a data-w-tab="patient" class="tab w-inline-block w-tab-link w--current" >
          <div><strong class="bold-text-5">مريض</strong></div>
        </a>
      </div>
      @include('website.notfi')
      <div class="w-tab-content">
          <div data-w-tab="firm" class="w-tab-pane">
          <div class="w-form">
            <form action="{{ url('contact') }}" method="post" id="email-form" >
                {{ csrf_field() }}
                    
                  <div class="w-row">
                    <div class="form-left-col w-col w-col-6">
                        <input type="hidden" name="user_type" value="3">
                        <input type="hidden" name="type_id" value="1">
                        <input type="tel"  maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="textfield w-input" maxlength="256" name="phone" data-name="Name 2" placeholder="..الهاتف" id="Name-2" required=""></div>
            
                    <div class="form-right-col w-col w-col-6">
                        <input type="text" class="textfield w-input" maxlength="256" name="name" data-name="Name 4" placeholder="..الاسم" id="Name-4" required="">
                        </div>
                  </div>
                  <input type="email" class="textfield w-input" maxlength="256" name="email" data-name="Email 4" placeholder="..البريد الالكتروني" id="email-4" required="">
                  <input type="text" class="textfield large w-input" maxlength="256" name="message" data-name="Email 2" placeholder="..اكتب رسالتك" id="email-2" required="">
                  <input type="submit" value="ارسال"  class="cta w-button">
              </form>
            
          </div>
        </div>
    
        <div data-w-tab="pharmacy" class="w-tab-pane">
          <div class="w-form">
            <form id="email-form"  action="{{url('contact')}}" method="post">
              {{csrf_field()}}
                    
                  <div class="w-row">
                    <div class="form-left-col w-col w-col-6">
                        <input type="hidden" name="user_type" value="2">
                         <input type="hidden" name="type_id" value="1">
                        <input type="tel"  maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="textfield w-input" maxlength="256" name="phone" data-name="Name 2" placeholder="..الهاتف" id="Name-2" required=""></div>
                    <div class="form-right-col w-col w-col-6">
                        <input type="text" class="textfield w-input" maxlength="256" name="name" data-name="Name 4" placeholder="..الاسم" id="Name-4" required=""></div>
                  </div>
                  <input type="email" class="textfield w-input" maxlength="256" name="email" data-name="Email 4" placeholder="..البريد الالكتروني" id="email-4" required="">
                  <input type="text" class="textfield large w-input" maxlength="256" name="message" data-name="Email 2" placeholder="..اكتب رسالتك" id="email-2" required="">
                  <input type="submit" value="ارسال"  class="cta w-button">
              </form>
        
          </div>
        </div>
        <div data-w-tab="patient" class="tab-pane-patient w-tab-pane w--tab-active">
          <div class="w-form">
            <form id="wf-form-Email-Form" action="{{url('contact')}}" method="post" redirect="wf-form-Email-Form" data-redirect="wf-form-Email-Form">
                {{csrf_field()}}
                    
                  <div class="w-row">
                    <div class="form-left-col w-col w-col-6">
                        <input type="hidden" name="user_type" value="1">
                         <input type="hidden" name="type_id" value="1">
                        <input type="tel"  maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="textfield w-input" maxlength="256" name="phone" data-name="Name 2" placeholder="..الهاتف" id="Name-2" required=""></div>
                    <div class="form-right-col w-col w-col-6">
                        <input type="text" class="textfield w-input" maxlength="256" name="name" data-name="Name 4" placeholder="..الاسم" id="Name-4" required=""></div>
                  </div>
                  <input type="email" class="textfield w-input" maxlength="256" name="email" data-name="Email 4" placeholder="..البريد الالكتروني" id="email-4" required="">
                  <input type="text" class="textfield large w-input" maxlength="256" name="message" data-name="Email 2" placeholder="..اكتب رسالتك" id="email-2" required="">
                  <input type="submit" value="ارسال"  class="cta w-button">
              </form>
      
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- /content--> 
  @section('mailchimb')
        <div class="div-block footer">
      <div class="form-block-2 w-form">
        <div id="mc_embed_signup">
            <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=8d099c1b12" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"  novalidate>
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
      <script>
       $(document).ready(function() {
           
          $("#mc-embedded-subscribe-form").submit(function() {
                    swal({
                         title: 'شكرا',
                        text: "شكرا لتسجيلك معنا!",
                  });
                 location.reload();

          });
        }); 
      
  </script>
  @endsection

@endsection
