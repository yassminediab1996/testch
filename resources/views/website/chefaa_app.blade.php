@php $currentPage = 'chefaa_app'; @endphp
   @extends('website.layouts.master')
   @section('content')
   <!-- Start Content -->
   <div class = "content" >
       <!-- Start Chefaa App Features -->
      <div class="b2c-container">
        <h2 class="sectitle center"><strong>مميزات تطبيق شفاء</strong></h2>
        <div class="w-layout-grid b2cgrid">
          <div id="w-node-7fa04097c49f-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/remind.svg')}}" alt=""></div>
            <h4 class="h4"><strong class="bold-text-4">تذكير دوائي</strong></h4>
            <p class="paragraph">إمكانية تذكيرك بمواعيد الأدوية من خلال رسائل نصية بالمواعيد التى تحددها<br></p>
          </div>
          <div id="w-node-7fa04097c4a8-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/payment.svg')}}" alt=""></div>
            <h4 class="h4"><strong>الدفع الإلكترونى</strong></h4>
            <p class="paragraph">إمكانية الدفع من خلال البطاقة الإئتمانية بكل سرية وأمان<br></p>
          </div>
          <div id="w-node-7fa04097c4b1-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/search.svg')}}" alt=""></div>
            <h4 class="h4"><strong class="bold-text">البحث عن الأدوية</strong></h4>
            <p class="paragraph">  محرك بحث تستطيع من خلاله إيجاد أماكن توافر الدواء بعيدا عن مشاكل البحث المعتاده<br></p>
          </div>
          <div id="w-node-7fa04097c4ba-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/delivery.svg')}}" alt=""></div>
            <h4 class="h4"><strong>توصيل الأدوية</strong></h4>
            <p class="paragraph">توصيل الأدوية من أقرب صيدليه بسهولة ويسر ودقه<br></p>
          </div>
          <div id="w-node-7fa04097c4c3-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/alert.svg')}}" alt=""></div>
            <h4 class="h4"><strong>تنبيهات النواقص</strong></h4>
            <p class="paragraph">إرسال تنبيهات بنواقص الأدوية الثابتة لأصحاب الأمراض المزمنة<br></p>
          </div>
          <div id="w-node-7fa04097c4cc-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/archive.svg')}}" alt=""></div>
            <h4 class="h4"><strong>أرشيف الطلبات</strong></h4>
            <p class="paragraph">ارشيف كامل لكل طلباتك السابقة يساعدك علي متابعة حالتك<br></p>
          </div>
          <div id="w-node-7fa04097c4d5-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/offer.svg')}}" alt=""></div>
            <h4 class="h4"><strong>العروض والخصومات</strong></h4>
            <p class="paragraph">إمكانية الوصول لكل العروض والخصومات الخاصة بجميع المنتجات الغير دوائية<br></p>
          </div>
          <div id="w-node-7fa04097c4de-8364cde6" class="b2c-card">
            <div class="b2c-icon"><img src="{{asset('chefaa_design/images/pckgs.svg')}}" alt=""></div>
            <h4 class="h4"><strong>الباقات الشهرية</strong></h4>
            <p class="paragraph">إمكانية التوصيل الشهري للأدوية بعيدا عن مشاكل نقص الأدوية<br></p>
          </div>
        </div>
      </div>
      
      <!-- End Chefaa App Features  -->
      
      <!-- Start Chefaa App Functions -->
      
      <div class="app-functions">
    <div class="b2c-container appscreens">
      <div data-easing="ease-in-out" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
        <div class="tabs-menu-2 w-tab-menu">
          <a data-w-tab="feature 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
            <div class="tab-head-container w-clearfix"><img style="width: 50px;
    height: 50px;" src="{{asset('chefaa_design/images/pills-solid.svg')}}" alt="" class="feature-app1">
              <div class="text-block-15"> صرف الدواء</div>
            </div>
            <p class="paragraph app-feature">يمكنك استلام دوائك في خلال 30 دقيقة<br> عند تصويرك للروشتة<br></p>
          </a>
          <a data-w-tab="feature 2" class="tab-link-tab-1 w-inline-block w-tab-link">
            <div class="tab-head-container inactive w-clearfix"><img style="width: 50px;
    height: 50px;" src="{{asset('chefaa_design/images/calendar-alt-regular.svg')}}" alt="" class="feature-app1">
              <div class="text-block-15"> جدولة الدواء</div>
            </div>
            <br>
            <p class="paragraph app-feature inactive"> جدولة دوائك أسبوعيًا أو شهريًا عند اختيار <br>موعد استلام محدد  <br></p>
          </a>
          <a data-w-tab="feature 3" class="tab-link-tab-1 w-inline-block w-tab-link">
            <div class="tab-head-container inactive w-clearfix"><img style="width: 50px;
    height: 50px;"src="{{asset('chefaa_design/images/tags-solid.svg

')}}" alt="" class="feature-app1">
              <div class="text-block-15"> منتجات العناية الشخصية</div>
            </div>
            <br>
            <p class="paragraph app-feature">   احصل على احتياجاتك من منتجات العناية<br> الشخصية بأسعار تنافسية  <br></p>
          </a>
          <a data-w-tab="feature 4" class="tab-link-tab-1 w-inline-block w-tab-link ">
            <div class="tab-head-container inactive w-clearfix"><img style="width: 50px;
    height: 50px;"src="{{asset('chefaa_design/images/searchengin-brands.svg')}}" alt="" class="feature-app1">
              <div class="text-block-15"> محرك بحث شفاء</div>
            </div>
            <br>
            <p class="paragraph app-feature"> ابحث عن أي دواء ناقص وطلبه اذا كان <br>متوفر في احدى الصيدليات   <br></p>
          </a>
        </div>
        <div class="tabs-content w-tab-content">
          <div data-w-tab="feature 1" class="w-tab-pane w--tab-active"><img src="{{asset('chefaa_design/images/11111111.png')}}" width="383" alt="" class="feature-1-img"></div>
          <div data-w-tab="feature 2" class="w-tab-pane"><img src="{{asset('chefaa_design/images/222222.png')}}" width="383" alt="" class="feature-1-img"></div>
          <div data-w-tab="feature 3" class="w-tab-pane"><img src="{{asset('chefaa_design/images/333333 (1).png')}}" width="383" alt="" class="feature-1-img"></div>
          <div data-w-tab="feature 4" class="w-tab-pane "><img src="{{asset('chefaa_design/images/4444444.png')}}" width="383" alt="" class="feature-1-img"></div>
        </div>
      </div>
    </div>
  </div>   
  
      <!-- End Chefaa App Functions -->
  
   </div>
   <!-- end content -->
     @section('mailchimb')
        <div class="div-block footer">
      <div class="form-block-2 w-form">
        <div id="mc_embed_signup">
            <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=8d099c1b12" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"  novalidate>
               <div id="mc_embed_signup_scroll" >
                    <input type="email" class="textfield newsletter w-input" maxlength="256" name="EMAIL" class="email textfield newsletter w-input" id="mce-EMAIL" data-name="Email 2" placeholder=" ...إدخل بريدك الإلكترونى  " required="">
                    <input type="submit" value="ارسال" data-wait="..برجاء "  name="subscribe" id="mc-embedded-subscribe" class="button submit-button w-bu ">
                </div>
             </form>
        </div>
   <!--End mc_embed_signup-->
      </div>
      <div class="text-block-7" >💌 لمتابعة الجديد من خلال البريد الإلكترونى</div>
    </div>
    @endsection
@endsection
