@php $currentPage = 'csr'; @endphp

   @extends('website.layouts.master')
   
   @section('content')
   <!--  content -->
    
    <div class = "content" >
        
        <div class="formcsr fade modal " tabindex="-1" role="dialog" >
           <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  
              </div>
            </div>
          </div>
        </div>
    <div class="head w-clearfix">
    <div class="csrcontainer w-clearfix">
      <h1 class="heading"><span class="text-span">اتبرع<br></span>و ساهم فى رسم الابتسامة على وش مريض محتاج<br></h1>
    </div>
    
    <!--<div data-w-id="8418852e-af6c-c733-e374-4d0073606a40" class="div-block-3 w-clearfix">
      <a data-w-id="b209a2f9-2383-a4b2-1c1b-83bfa3d4d64f" href="#" class="adddonationbutton w-inline-block w-clearfix">
        <div class="plusicon"><img src="{{asset('chefaa_design/images/.svg')}}" alt=""></div>
        <div class="text-block-8">اضف حالة</div>
      </a>
    </div>-->
    
    <div data-w-id="09a4bd7b-0c5a-cfa7-80c1-5c3f44b56510" class="div-block csr">
      <ol class="list-3 w-list-unstyled">
        <li class="list-item-2 w-clearfix">
          <div class="number green"><strong class="bold-text-7">{{ $casecount }}</strong></div>
          <div class="text-block dark">عدد الحالات</div>
        </li>
        <li class="list-item-2 w-clearfix">
          <div class="number green"><strong class="bold-text-3">{{$amountcount}}</strong></div>
          <div class="text-block dark">مجموع التبرعات</div>
        </li>
      </ol>
    </div>
    
    <div style = "clear:both" ></div>
    
    <!-- Start Slider -->
    
    <div id="chefaaSlider" class="carousel slide" data-ride="carousel">
        
          <!-- Start Slider Controls -->
          <ol class="carousel-indicators">
            <li data-target="#chefaaSlider" data-slide-to="0" class="active"></li>
            <li data-target="#chefaaSlider" data-slide-to="1"></li>
            <li data-target="#chefaaSlider" data-slide-to="2"></li>
            <li data-target="#chefaaSlider" data-slide-to="3"></li>
          </ol>
          <!-- End Slider Controls -->

          <!-- Start Slider Items -->
          <div class="carousel-inner" role="listbox" >
            <div class="item active">
              <img src="{{ asset('chefaa_design/images/01.jpg') }}" alt="picture_1" />
            </div>
            <div class="item">
              <img src="{{ asset('chefaa_design/images/02.jpg') }}" alt="picture_2" />
            </div>
            <div class="item">
              <img src="{{ asset('chefaa_design/images/03.jpg') }}" alt="picture_3" />
            </div>
            <div class="item">
              <img src="{{ asset('chefaa_design/images/04.jpg') }}" alt="picture_4" />
            </div>
          </div>
          <!-- End Slider Items -->

          <!-- Start Slider Controls -->
          <a class="left carousel-control" href="#chefaaSlider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#chefaaSlider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!-- End Slider Controls -->
</div>
    
    <!-- End Slider -->
    
  </div>
    <div class="cases-section">
    <div class="w-layout-grid grid-3">
          @php  $getqty=0;  @endphp
            @foreach($caselist as $case)
        
              @foreach($case->userscase as $qtycase)
                 @if($qtycase->approval == 1)
                    @php $getqty += $qtycase->qty; @endphp
                 @endif 
              @endforeach
        @if($case->max_amount > $getqty)  
      <div  class="donation-card w-node-558e18fd4d92-b26758d5">
        <div  class="img">
        </div>
        <div  class="text-block-11">  
        تبرع لحالة
          {{$case->person}}
          تخص جمعية
          {{App\User::find($case->charity_id)->name}}
        </div>
        <div class="progress-bar w-clearfix" style="width: auto;" >
          <div  class="value-progressbar" style="width:{{($getqty / $case->max_amount)*100}}%;" ></div>
        </div>
        <div class="text-block-13">{{$getqty}} / {{$case->max_amount}}</div><a onclick="openmodel({{$case->id}})" style="color: white;" class="cta w-button">اريد التبرع</a>
        </div>
    @endif
   @php $getqty=0;  @endphp
    @endforeach
    </div>
  </div>
        
    </div>
    
   <!-- end content -->
   
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
    @endsection
    <!--
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  -->
  <!-- model -->
    <script>
     function openmodel(id)
        {
              jQuery('.formcsr').modal(); 
              jQuery.ajax({
                 type: "GET",
                 url: 'csr/send/' + id,
                 dataType: "html",
                 data: {
                 },
                success: function (response) {
                  jQuery('.formcsr .modal-body').html(response);
                },
                error: function (e) {
                  
                }
            });
        }
    </script>
@endsection