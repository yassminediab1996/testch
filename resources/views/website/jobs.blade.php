@php $currentPage = '/'; @endphp

@extends('website.layouts.master')

@section('content')
<style>
.text-block-15{
    margin: auto !important;
}
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

/* start jobs */

.jobs2 { background-color : #F6F6F6 ; padding : 50px 0}

.jobs1 { background-color : #F6F6F6 ; padding : 70px 0}

.jobs2 .feature .feat , 
.jobs1 .feature .feat { 
    padding : 20px ; 
    background-color : #FFF; 
    opacity : 0.7;
    border-radius : 5px;
    margin-bottom : 10px
}

.jobs2 .feature .feat:hover , 
.jobs1 .feature .feat:hover  { 
    background-color : #FFF ; 
    opacity : 1;
    transition : all 300ms ease-in-out
}

.jobs2 .feature .feature ,
.jobs1 .feature .feature
{  
    position : relative ; 
    margin-bottom : 10px !important 
}

.jobs2 .feature .feature a:first-child , 
.jobs1 .feature .feature a:first-child {
    position : absolute;
    display : block;
    width : 100%;
    height : 100%;
    z-index : 9999
} 

.jobs2 .feature img ,
.jobs1 .feature img {
    display : block;
    width : 70px;
    height : 70px;
    margin-left:auto;
    margin-right : auto
}

.jobs2 .feature p ,
.jobs1 .feature p {
    font-family: Jannalt, sans-serif;
    color: #4a4a4a;
    font-size: 1.2em;
    line-height: 30px;
    text-align: center
}

.jobs2 .feature .feature_desc ,
.jobs1 .feature .feature_desc {
    font-family: Jannalt, sans-serif;
    color: #000;
    font-size: 22px;
    line-height: 40px;
    font-weight:bold
}

.jobs2 .feature .feature_desc , 
.jobs2 .feature p ,
.jobs1 .feature .feature_desc,
.jobs1 .feature p { text-align : center }

/* end jobs */

</style>
        
    <!-- Start Page Content -->
    
    <!-- Start First Jobs -->
    
    <div class = "jobs1" >
        <div class = "container" >
             <div class = "row" >
                <div class = "col-lg-12" >
                    
                    <!-- Start Job 1 -->
                             
                    <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                           <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                            <div class = "feat" >
                                 <img src="{{asset('chefaa_design/images/briefcase-solid.svg')}}" alt="chefaa_job" />
                                 <div class = "feature_desc" >  Business Developer </div>
                                 <p> 
                                     تقدر تبعت ال سي فى من هنا
                                 </p>
                             </div>
                        </a>
                    </div>
                    
                    <!-- End Job 1 -->
                    
                    <!-- Start Job 2 -->
                         
                     <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                         <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                            <div class = "feat" >
                                 <img src="{{asset('chefaa_design/images/object-group-regular.svg')}}" alt="chefaa_job" />
                                 <div class = "feature_desc" > Graphic Designer </div>
                                 <p>
                                    احصل على احتياجاتك من منتجات العناية الشخصية باسعار تنافسيه 
                                 </p>
                            </div>
                          </a>
                     </div>
                     
                     <!-- End Job 2 -->
                     
                     <!-- Start Job 3 -->
                         
                     <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                         <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                            <div class = "feat" >
                                 <img src="{{asset('chefaa_design/images/google-play-brands.svg')}}" alt="chefaa_job" />
                                 <div class = "feature_desc" >  Android Developer  </div>
                                 <p>
                                   احصل على احتياجاتك من منتجات العناية الشخصية باسعار تنافسيه  
                                 </p>
                            </div>
                         </a>
                     </div>
                     
                     <!-- End Job 3 -->
                             
                </div>
            </div>
        </div>
    </div>
    
    <!-- End First Jobs  -->
    
    <!-- Start Second Jobs -->
    
    <div class = "jobs2" >
                 <div class = "container" >
                     <div class = "row" >
                         <div class = "col-lg-12" >
                             
                        <!-- Start Job 1 -->
                             
                         <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                            <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                                <div class = "feat" >
                                     <img src="{{asset('chefaa_design/images/app-store-ios-brands.svg')}}" alt="chefaa_job" />
                                     <div class = "feature_desc" > IOS Developer   </div>
                                     <p>
                                         يمكنك استلام دوائك فى خلال 30 دقيقة من تصويرك للروشتة  
                                     </p>
                                 </div>
                            </a>
                         </div>
                         
                         <!-- End Job 1 -->
                         
                         <!-- Start Job 2 -->
                         
                         <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                             <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                                <div class = "feat" >
                                     <img src="{{asset('chefaa_design/images/shield-alt-solid.svg')}}" alt="chefaa_job" />
                                     <div class = "feature_desc" >   IT Security Engineer  </div>
                                     <p>
                                         جدولة دوائك اسبوعيا او شهريا عند اختيارك موعد استلام محدد 
                                     </p>
                                </div>
                              </a>
                         </div>
                         
                         <!-- End Job 2 -->
                         
                         <!-- Start Job 3 -->
                         
                         <div class = "feature col-lg-4 col-md-6 col-sm-12 col-xs-12" >
                             <a href = "https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hr@chefaa.com" target = "_blank" style = "display:block" >
                                <div class = "feat" >
                                     <img src="{{asset('chefaa_design/images/address-card-solid.svg')}}" alt="chefaa_job" />
                                     <div class = "feature_desc" >  Internships  </div>
                                     <p>
                                        جدولة دوائك اسبوعيا او شهريا عند اختيارك موعد استلام محدد
                                     </p>
                                </div>
                             </a>
                         </div>
                         
                         <!-- End Job 3 -->
                             
                         </div>
                     </div>
                 </div>
             </div>
    
    <!-- End Second Jobs -->
    
    <!-- End Page Content -->
     
    @section('mailchimb')
    <div class="div-block footer">
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
