 @php $currentPage = '/'; @endphp
  @extends('website.layouts.master')
  @section('content')
  <style>
      .servicescol:hover .service_more_button { display:block }

      .servicescol .service_more_button > div{ display:inline-block }
      
      #media-card a { display : block !important; width : 100% important; height : 100% !important }
      
       #media-card a img { margin-left : 0 !important ; display : block !important ; width : 100% !important ; height : 100% !important}
       
       .w-layout-grid.grid { padding-right : 0 !important; padding-left : 0 !important } 
       
  </style>
      <!-- start content  -->
      <div class = "content" >
          
          <!-- Start Chefaa Service Introduction -->
      
          <div class="headcontainer w-clearfix"><img src="{{asset('chefaa_design/images/topIllustration.svg')}}" data-w-id="d34c8cde-fe26-2a84-b0f8-97694f5c31be" alt="" class="headillustration">
              <div class="text-head-container w-clearfix">
                <h1 class="heading">خدمة <span><strong class="spain">شفاء</strong></span> الخدمة الأسهل في طلب الدواء</h1>
                <p class="phead">الأن تستطيع طلب دوائك بكل سهولة ويسر من خلال تطبيق شفاء مع<br>.إمكانية حجز دوائك الشهري ليصلك آينما كنت</p>
                <div class="storecontainer">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=app.com.chefaa&hl=ar" class="storebutton w-inline-block">
                        <img class = "img-responsive" src="{{asset('chefaa_design/images/googlePlay.svg')}}" class="playstore_home" alt="">
                    </a>
                    <a target="_blank" href="https://itunes.apple.com/eg/app/chefaa-medicine-delivery/id1438961456?mt=8" class="storebutton w-inline-block">
                        <img class = "img-responsive" src="{{asset('chefaa_design/images/appStore.svg')}}" class="appstore_home" alt="">
                    </a>
                </div>
              </div>
          </div>
          
          <!-- End Chefaa Service Introduction -->
          
          <!-- Start Chefaa Application Features -->
            
          <div class="servicessec">
            <div class="whitebg">
              <div class="servicesrow w-row">
               
                <div  class="servicescol w-col w-col-3 w-col-medium-6"><img src="{{asset('chefaa_design/images/makeup.svg')}}" alt="" class="icon_service">
                  <div class="servicetitle"><strong>شركات مستحضرات التجميل</strong></div><a  href="#" class="service_more_button beauty w-inline-block "><img src="{{asset('chefaa_design/images/arrow-left--green.svg')}}" alt=""><div>المزيد</div></a></div>
               
                <div  class="servicescol w-col w-col-3 w-col-medium-6"><img src="{{asset('chefaa_design/images/medicine.svg')}}" alt="" class="icon_service">
                  <div class="servicetitle"><strong> شركات الأدوية </strong></div><a href="#" class="service_more_button medicine w-inline-block"><img src="{{asset('chefaa_design/images/arrow-left--green.svg')}}" alt=""><div>المزيد</div></a></div>
               
                <div  class="servicescol w-col w-col-3 w-col-medium-6"><img src="{{asset('chefaa_design/images/insurance.svg')}}" alt="" class="icon_service">
                  <div class="servicetitle"><strong> شركات التأمين</strong></div><a  href="#" class="service_more_button insuraance w-inline-block"><img src="{{asset('chefaa_design/images/arrow-left--green.svg')}}" alt=""><div>المزيد</div></a></div>
               
                <div  class="servicescol w-col w-col-3 w-col-medium-6"><img src="{{asset('chefaa_design/images/institue.svg')}}" alt="" class="icon_service">
                  <div class="servicetitle"><strong>المؤسسات</strong></div><a href="#" class="service_more_button institution w-inline-block"><img src="{{asset('chefaa_design/images/arrow-left--green.svg')}}" alt=""><div>المزيد</div></a></div>
              </div>
            </div>
            <div class="b2c-container">
              <h2 class="sectitle center"><strong>مميزات تطبيق شفاء</strong></h2>
              <div class="w-layout-grid b2cgrid">
                <div id="w-node-6dd84368b877-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/remind.svg')}}" alt=""></div>
                  <h4 class="h4"><strong class="bold-text-4">تذكير دوائي</strong></h4>
                  <p class="paragraph">مكانية تذكيرك بمواعيد الأدوية من خلال رسائل نصية بالمواعيد التي تحددها.<br></p>
                </div>
                <div id="w-node-3fb51ee378a7-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/payment.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>الدفع الإلكترونى</strong></h4>
                  <p class="paragraph">إمكانية الدفع من خلال البطاقة الإئتمانية بكل سرية وأمان.<br></p>
                </div>
                <div id="w-node-e0ff1b99394e-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/search.svg')}}" alt=""></div>
                  <h4 class="h4"><strong class="bold-text">  البحث عن الأدوية</strong></h4>
                  <p class="paragraph">   محرك بحث تستطيع من خلاله إيجاد أماكن توافر الدواء بعيدا عن مشاكل البحث المعتاده<br></p>
                </div>
                <div id="w-node-21e39173e083-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/delivery.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>توصيل الأدوية</strong></h4>
                  <p class="paragraph">توصيل الأدوية من أقرب صيدلية بسهولة ويسر دقة.<br></p>
                </div>
                <div id="w-node-b964efb4c094-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/alert.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>تنبيهات النواقص</strong></h4>
                  <p class="paragraph">إرسال تنبيهات بنواقص الأدوية الثابتة لأصحاب الأمراض المزمنة<br></p>
                </div>
                <div id="w-node-94d5224923e2-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/archive.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>أرشيف الطلبات</strong></h4>
                  <p class="paragraph">ارشيف كامل لكل طلباتك السابقة يساعدك علي متابعة حالتك.<br></p>
                </div>
                <div id="w-node-30fe83538f05-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/offer.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>العروض والخصومات</strong></h4>
                  <p class="paragraph">إمكانية الوصول لكل العروض والخصومات الخاصة بجميع المنتجات الغير دوائية.<br></p>
                </div>
                <div id="w-node-11f4209d2f67-c3061ac4" class="b2c-card">
                  <div class="b2c-icon"><img src="{{asset('chefaa_design/images/pckgs.svg')}}" alt=""></div>
                  <h4 class="h4"><strong>الباقات الشهرية</strong></h4>
                  <p class="paragraph">إمكانية التوصيل الشهري للأدوية بعيدا عن مشاكل نقص الأدوية.<br></p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- End Chefaa Application Features -->
          
          <!-- Start Chefaa In Numbers -->
          
          <div class="numberssection">
            <div class="numberscontainer">
              <h2 class="sectitle right w-clearfix"><strong>  شفاء فى أرقام</strong></h2>
              <div class="numbersrow w-row">
                <div class="numberscol w-clearfix w-col w-col-3 w-col-medium-6">
                  <div class="number"><strong class="bold-text-3">+38785</strong></div>
                  <div class="numberslabel">
                    <div class="text-block">طلب</div><img src="{{asset('chefaa_design/images/users.svg')}}" alt=""></div>
                </div>
                <div class="numberscol w-clearfix w-col w-col-3 w-col-medium-6">
                  <div class="number"><strong class="bold-text-3">+20000</strong></div>
                  <div class="numberslabel">
                    <div class="text-block">عميل</div><img src="{{asset('chefaa_design/images/clients.svg')}}" alt=""></div>
                </div>
                <div class="numberscol w-clearfix w-col w-col-3 w-col-medium-6">
                  <div class="number"><strong class="bold-text-3">+23,000</strong></div>
                  <div class="numberslabel">
                    <div class="text-block">زائر</div><img src="{{asset('chefaa_design/images/userss.svg')}}" alt=""></div>
                </div>
                <div class="numberscol w-clearfix w-col w-col-3 w-col-medium-6">
                  <div class="number"><strong class="bold-text-3">+7000</strong></div>
                  <div class="numberslabel">
                    <div class="text-block">تحميل</div><img src="{{asset('chefaa_design/images/download.svg')}}" width="20" alt=""></div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- End Chefaa In Numbers -->
          
          <!-- Start Chefaa Testemonials -->
          
          <div class="testimonials-section w-clearfix">
            <div class="div-block"><img src="{{asset('chefaa_design/images/testmonials.svg')}}" alt="" class="image">
              <div class="the-overflow-hidden-mask">
                <div class="the-width-400vh-scrollable-div">
                  <div class="the-content-2">
                    <div class="a-block">
                      <div class="testimonial-card-head">
                        <div class="testimonial-card-head-text">
                          <div id="username" class="text-block-3">سلمى ابراهيم</div>
                          <div id="user-position" class="text-block-4">الروشتة الشهرية </div>
                        </div>
                        <div class="avatar"></div>
                      </div>
                      <p class="paragraph">
        شكرا ليكم بابا جرب الخدمة 3 مرات وكل مرة كنتوا بتساعدونا نوصل للدوا سريعا
                          </p>
                    </div>
                    <div class="a-block">
                      <div class="testimonial-card-head">
                        <div class="testimonial-card-head-text">
                          <div id="username" class="text-block-3"> احمد متولى</div>
                          <div id="user-position" class="text-block-4">محرك البحث</div>
                        </div>
                        <div class="avatar"></div>
                      </div>
                      <p class="paragraph">
        كان في دوا كنت دايخ عليه وعرفت الاقيه من خلال التطبيق
                          </p>
                    </div>
                    <div class="a-block">
                      <div class="testimonial-card-head">
                        <div class="testimonial-card-head-text">
                          <div id="username" class="text-block-3"> Ahmed salem </div>
                          <div id="user-position" class="text-block-4">المتجر الإلكترونى</div>
                        </div>
                        <div class="avatar"></div>
                      </div>
                      <p class="paragraph">
        application that any one should have easy to use and fast delivery
                          </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- End Chefaa Testemonials -->
          
          <!-- Start Chefaa Media -->
          
          <div class="media-section">
             <div class = "container" >
                 <div class = "row" >
                     
                     <div class = 'col-lg-12' style = "text-align:center" >
                         <h2 class="sectitle center"><strong>شفاء في الميديا</strong></h2>
                     </div>
                      
                     <div class="col-lg-12"> <div class = "row" > 
             
                 <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="https://youtu.be/ofzFgqQSi6A">
        					<img  src="{{asset('landingpage/images/cbc.png')}}"  alt="press-logo" />
        				</a>
                    </div>
                    <div id="media-card-title" class="text-block-5">هنا الشباب | المشروع الفائز في الحلقة الثالثة &quot;مام - فرابيوتك - شفاء&quot;</div>
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="http://weetracker.com/2018/07/20/ehealth-startup-chefaa-wins-egyptian-leg-of-demo-africa-innovation-tour/">
        					<img style="    margin-left: 60px;" src="{{asset('landingpage/images/demo.png')}}" alt="press-logo" />
        				</a>
                </div>
                <div id="media-card-title" class="text-block-5">Startup Chefaa Wins Egyptian Leg Of DEMO Africa Innovation Tour</div>
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div id="media-card-timage" class="media-card-image">
            	<a target="_blank" href="http://ik.ahram.org.eg/News/47348.aspx">
        						<img  src="{{asset('landingpage/images/elahram.png')}}"  alt="press-logo" />

        				</a>
                </div>
                <div id="media-card-title" class="text-block-5">
                    الاهرام | تطبيق شفاء يفوز بمسابقة نواة فى الابداع والابتكار فى ا
                    لبرمجيات
                    </div>
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="https://www.youtube.com/watch?v=UgCIfhdxYNU">
        					<img src="{{asset('landingpage/images/ontv.png')}}"  alt="press-logo" />
        				</a>
                </div>
              <div id="media-card-title" class="text-block-5">
                  اون تى فى | دعاء عارف تطبيق شفاء يسمح بسرعة وصول الدواء للمرضي
             </div>
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12" style="    text-align: left;">
                <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="http://www.startupsceneme.com/INVESTMENTS/9-Egyptian-Startups-Attend-London-Tech-Week-With-UK-Embassy">
        					<img style = "margin-left:60px" src="{{asset('landingpage/images/start.png')}}" alt="press-logo" />
        				</a>
                </div>
        
                <div id="media-card-title" style="text-align: left;    float: left;" class="text-block-5">Chefaa On Startup Scene</div>

        
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div id="media-card-timage" class="media-card-image">
                	<a target="_blank" href="https://egyptianstreets.com/2018/12/29/cancer-survivor-builds-a-company-to-help-other-patients-get-medicine-online/">
    					<img  src="{{asset('landingpage/images/cancer.png')}}" alt="press-logo" />
    				</a>
                </div>
                <div id="media-card-title" style="    text-align: left;" class="text-block-5">Cancer Survivor Builds a Company to Help Other Patients Get Medicine Online   </div>
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12" >
                <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="http://www.wegrowwithc3.com/chefaa-named-winner-c3-social-impact-accelerator-program-2019-powered-hsbc/">
        					<img  src="{{asset('landingpage/images/c3.png')}}" alt="press-logo" />
        				</a>
                </div>
        
                <div id="media-card-title" style="    text-align: left;" class="text-block-5"> Chefaa named winner of the C3 Social Impact Accelerator Program 2019 powered by HSBC  </div>
        
              </div>
              <div id="media-card" class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div id="media-card-timage" class="media-card-image">
                    	<a target="_blank" href="https://www.almasryalyoum.com/news/details/1357179">
        					<img  src="{{asset('landingpage/images/elyoum.png')}}" alt="press-logo" />
        				</a>
                </div>
        
                <div id="media-card-title" class="text-block-5">   بعد انتصارها على السرطان.. دعاء تطلق تطبيق «شفاء» لتوصيل العلاج للمنازل مجاناً</div>
        
              </div>

                         </div>
                     </div>
                     
                 </div>
             </div>
          </div>
          <!-- End Chefaa Media -->
      </div>
      <!-- end content -->
  <!-- end content -->
     @section('mailchimb')
        <div class="div-block footer">
            <div class="form-block-2 w-form">
                <div id="mc_embed_signup">
                    <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=8d099c1b12"
                          method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                          class="validate form" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <input type="email" class="textfield newsletter w-input" maxlength="256" name="EMAIL"
                                   class="email textfield newsletter w-input" id="mce-EMAIL" data-name="Email 2"
                                   placeholder=" ...إدخل بريدك الإلكترونى  " required="">
                            <input type="submit" value="ارسال" data-wait="..برجاء " name="subscribe"
                                   id="mc-embedded-subscribe" class="button submit-button w-bu ">
                        </div>
                    </form>
                </div>
                <!--End mc_embed_signup-->
            </div>
            <div class="text-block-7">💌 لمتابعة الجديد من خلال البريد الإلكترونى</div>
        </div>
     @endsection

  @endsection
  