@extends('website.header')
@section('title')
	csr
@endsection
@section('style')
  
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
      .fade.in{opacity:1}
      a{
          color:white !important;
           font-family : Tajawal !important;
      }
       h1 {
         font-family : Tajawal !important; 
      }
      h3{
          font-family : Tajawal !important; 
      }
     p{
          font-family : Tajawal !important; margin-bottom: 12px !important;
          color: black !important;
     }
      @media only screen and (min-width : 1200px) {
     .ff{
         margin-top: -40px;
     }
}

.progress-bar {
   
    background-image: linear-gradient(to bottom, #62cb5d  0%, #62cb5d )!important;
}
.card {
    box-shadow:unset;
}
.pp{
    color: black !important; 
}
.pp p{
    color: black !important;
}     

@media only screen and (max-width: 600px) {
    
   .ss{ margin-bottom: 20px;
}
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #62cb5d !important;
    border-color: #62cb5d !important;
}
.progress-bar{
    margin: 0;
}
  </style>
@endsection
@section('content')
           <div class="banner" >
             <div style="width:100%; height:500px; background-color: #62cb5d !important;" >
                  <div class="centered">
                    <h1 class="text-light my-3">اتبرع ...</h1>
                    <h3 class="text-light my-3">و ساهم فى رسم الابتسامة على وش مريض محتاج</h3><hr class="small-hr bg-light my-3">
                    <div class="d-flex">
                        
                      <div class="banner-states" style="width: 169px; height: 160px;" >
                         <div class="ff">

                              <h2 >مجموع التبرعت</h2>
                              <p class="banner-num" >{{$amountcount}}</p>
                              <p>جنيه مصرى</p>
                         </div>
                      </div>
                      
                      <div class="banner-states" style="width: 169px; height: 160px;">
                        <div class="ff">
                             <h2 >عدد الحالات</h2>
                             <p class="banner-num" >{{ $casecount }}</p>
                              <p>حاله</p>
                        </div>  
                       
                      </div>
                      
                    </div>
                  </div>
              </div>
              <div class="bottom">
                  <img src="assets/images/banner-btn.png" width="100%" >
              </div>
            </div>
                <div class="clearfix"></div>
                
                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      
                    </div>
                    </div>
                 </div>
            @include('website.notfi')
            <div class="cases-container">
                  <div class="slideshow-container my-2">
                      <div class="mySlides">
                        <div class="d-flex flex-wrap">
                            @php
                             $getqty=0;
                            @endphp
                            @foreach($caselist as $case)
                              @foreach($case->userscase as $qtycase)
                                 @if($qtycase->approval == 1)
                                    @php
                                      $getqty += $qtycase->qty;
                                    @endphp
                                   @endif 
                              @endforeach
                        @if($case->max_amount > $getqty)       
                          <div class="card ss" style="width:300px">
                          <img class="card-img-top" src="{{url('uploads/files/'.$case->img)}}" alt="Card image" style="width:100% ;    height: 500px;
">
                          <div class="card-body">
                            <p class="case-title pp"> تبرع لحالة  {{$case->persone}} للتبرع من {{$case->name}}</p>
                            <p class="case-title pp">
                                الحاله تخص جمعية
                                <strong>{{App\AdminModel\charity::find($case->charity_id)->name_en}}</strong>
                                </p>
                                
                            <br>
                            <p class="case-text pp" style="color:black;">{!! $case->description !!}</p>
                            </br>
                             <small class="green-text progress-info pp">{{($getqty / $case->max_amount)*100}}%</small>
                            <div class="progress">
                                <div class="progress-bar" style="width:{{($getqty / $case->max_amount)*100}}%;" 
                                role="progressbar" aria-valuenow="{{($getqty / $case->max_amount)*100}}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <small class="progress-info"><span class="green-text">{{$getqty}}</span> من {{$case->max_amount}}</small><br>
                            <button class="btn bg-green text-light" onclick="donate({{$case->id}})">ساهم بالتبرع الان</button>
                          </div>
                        </div>
                        @endif
                           @php
                             $getqty=0;
                            @endphp
                            @endforeach
                         
                        </div>
                      </div>
                  </div>
                    {{$caselist->links()}}
                  <br>
            </div>
                       


    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/slider.js')}}"></script>

    <script>
    
        function donate(id)
        {
             console.log(id)
             jQuery('#exampleModal').modal('show', {backdrop: 'true'});
              $.ajax({
                 type: "GET",
                 url: 'csr/send/' + id,
                 dataType: "html",
                 data: {},
                success: function (response) {
                    jQuery('#exampleModal .modal-content').html(response);
                },
                error: function (e) {
                }
            });
            
            //  $.get("{{ url('csr/send/') }}?id="+id, function(data, status){ 
            //   jQuery('#exampleModal .modal-content').html(data);
            // });
        }
    </script>
  
@endsection