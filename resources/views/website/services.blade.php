@php $currentPage = '/'; @endphp

@extends('website.layouts.master')

@section('content')
<style>
    .tabs-menu-2 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    float: right;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
}

.tab-link-tab-1  {
    margin: 20px;
}
.app-functions {
    padding-top: 0px;
    padding-bottom: 0px;
    background-image: repeating-linear-gradient(180deg, #f6f6f6, #f7f7f7);
}
.tabs-menu-2{
    margin-right: 50px;
}
.feature-app1{
    width: 50px;height: 50px;    margin-right: 110px;
}
.tab-head-container w-clearfix{
    margin-right: 40px;
}
.text-block-15{
    font-weight: bold;
        margin-right: 40px;
}
.text-block-15-2{
    font-weight: bold;
margin-right: 80px;
}

/* Start App Functions */

.application_features { background-color : #F6F6F6 ; padding : 50px 0}

.chefaa_features { background-color : #F6F6F6 ; padding : 70px 0}

.application_features .feature .feat , 
.chefaa_features .feature .feat { 
    padding : 20px ; 
    background-color : #FFF; 
    opacity : 0.7;
    border-radius : 5px;
    margin-bottom : 10px
}

.application_features .feature .feat:hover , 
.chefaa_features .feature .feat:hover  { 
    background-color : #FFF ; 
    opacity : 1;
    transition : all 300ms ease-in-out
}

.application_features .feature .feature ,
.chefaa_features .feature .feature
{  
    position : relative ; 
    margin-bottom : 10px !important 
}

.application_features .feature .feature a:first-child , 
.chefaa_features .feature .feature a:first-child {
    position : absolute;
    display : block;
    width : 100%;
    height : 100%;
    z-index : 9999
} 

.application_features .feature img ,
.chefaa_features .feature img {
    display : block;
    width : 70px;
    height : 70px;
    margin-left:auto;
    margin-right : auto
}

.application_features .feature p ,
.chefaa_features .feature p {
    font-family: Jannalt, sans-serif;
    color: #4a4a4a;
    font-size: 1.2em;
    line-height: 30px;
    text-align: center
}

.application_features .feature .feature_desc ,
.chefaa_features .feature .feature_desc {
    font-family: Jannalt, sans-serif;
    color: #000;
    font-size: 22px;
    line-height: 40px;
    font-weight:bold
}

.application_features .feature .feature_desc , 
.application_features .feature p ,
.chefaa_features .feature .feature_desc,
.chefaa_features .feature p { text-align : center }

/* End App Functions */

</style>
             
            
    <!-- Start First Application Features -->
             
             <div class = "chefaa_features" >
                 <div class = "container" >
                     <div class = "row" >
                         <div class = "col-lg-12" >
                             
                             <!-- Start Feature 1 -->
                             
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                <a href = "{{url('csr')}}" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/pills-solid.svg')}}" alt="chefaa_feature" />
                                         <div class = "feature_desc" > خدمة الطلب اللحظى </div>
                                         <p> 
                                             يمكنك استلام الدواء فى خلال 30 دقيقة من تصويرك للروشتة
                                         </p>
                                     </div>
                                </a>
                             </div>
                             
                             <!-- End Feature 1 -->
                             
                             <!-- Start Feature 2 -->
                         
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                 <a href = "{{url('search')}}" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/calendar-alt-regular.svg')}}" alt="chefaa_feature" />
                                         <div class = "feature_desc" > خدمة الأدوية المجدولة </div>
                                         <p>
                                             يمكنك جدولة دوائك أسبوعيًا أو شهريًا <br>عند اختيار موعد استلام محدد
                                         </p>
                                    </div>
                                  </a>
                             </div>
                             
                             <!-- End Feature 2 -->
                             
                             <!-- Start Feature 3 -->
                         
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                 <a href = "" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/store-solid.svg')}}" alt="chefaa_feature" />
                                         <div class = "feature_desc" >متجر المنتجات التجميلية</div>
                                         <p>
                                             للحصول على احتياجاتك من منتجات العناية الشخصية باسعار تنافسيه 
                                         </p>
                                    </div>
                                 </a>
                             </div>
                             
                             <!-- End Feature 3 -->
                             
                         </div>
                          
                     </div>
                 </div>
             </div>
             
             <!-- End First Application Features -->
             
             <!-- Start Second Application Features -->
             
             <div class = "application_features" >
                 <div class = "container" >
                     <div class = "row" >
                         
                         <div class = "col-lg-12" >
                             
                             <!-- Start Feature 1 -->
                             
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                <a href = "{{url('store')}}" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/searchengin-brands.svg')}}" alt="application_feature" />
                                         <div class = "feature_desc" >محرك البحث الدوائي  </div>
                                         <p>
                                              يمكنك البحث عن أي دواء ناقص وطلبه<br> اذا كان متوفر في احدى الصيدليات
                                         </p>
                                     </div>
                                </a>
                             </div>
                             
                             <!-- End Feature 1 -->
                             
                             <!-- Start Feature 2 -->
                         
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                 <a href = "{{url('search')}}" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/hands-helping-solid.svg')}}" alt="application_feature" />
                                         <div class = "feature_desc" >  المسؤلية المجتمعية  </div>
                                         <p>
                                             توفيرالدواء لأصحاب الأمراض المزمنة لدى المنظمات الخيرية، من خلال المتبرعين سواء شركات أو أفراد
                                         </p>
                                    </div>
                                  </a>
                             </div>
                             
                             <!-- End Feature 2 -->
                             
                             <!-- Start Feature 3 -->
                         
                             <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                                 <a href = "{{url('search')}}" target = "_blank" style = "display:block" >
                                    <div class = "feat" >
                                         <img src="{{asset('chefaa_design/images/info-circle-solid.svg')}}" alt="application_feature" />
                                         <div class = "feature_desc" > المدونة الطبية  </div>
                                         <p>
                                            مدونة طبية متخصصة فى نشر مواضيع تخص الدواء ومنتجات العناية الشخصية
                                         </p>
                                    </div>
                                 </a>
                             </div>
                             
                             <!-- End Feature 3 -->
                             
                         </div>
                     </div>
                 </div>
             </div>
             
             <!-- End Second Application Features -->

     
    @section('mailchimb')
    <div class="div-block footer" style = "margin-top:100px" >
      <div class="form-block-2 w-form">
        <!--<form id="email-form" name="email-form" data-name="Email Form" class="form">-->
        <!--    <input type="email" class="textfield newsletter w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="..ادخل بريدك الالكتروني" id="email-2" required="">-->
        <!--    <input type="submit" value="ارسال" data-wait="..برجاء الانتظار" class="submit-button w-button">-->
        <!--</form>-->
        <div id="mc_embed_signup">
            <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=3b3b6e768b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"  novalidate>
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
@endsection
