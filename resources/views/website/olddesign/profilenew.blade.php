@extends('website.layouts.header')
@section('title')
	الصفحة الشخصية-شفاء
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	 <style type="text/css">
    

    
    body{
 text-align: right;
}* {box-sizing: border-box;
margin: auto;
text-align: center;
font-family: Tajawal;
color: #232323}
.active{background-color: #62cb5d !important;}
.active, .dot:hover {background-color: #62cb5d;}
#before-nav{
border: none;
height: 10px;
background-color: #61ca5d;
margin-right: -5px;
margin-left: -5px;
margin-top: -5px;
}.nav-item > a:hover , .active > .nav-link {
color: #61ca5d !important;
background-color: white;
}.nav-item > a{
font-size: 15pt;
font-weight: bold;
} h2,h1{
  font-size: 54.2pt;
  font-weight: bold;
} .bg-green{background-color: #62cb5d; }
.green-text{
	color: #62cb5d;
}
.small-hr{
height: 3px;
width: 10%
}.footer{
  padding-top: 50px;
  padding-bottom: 10px;
}
.footer > h2{
  font-size: 23.91pt;
  font-weight: bold;
}
p{
  font-size: 16pt;
}
.bg-blue{
  background-color: #3392f4;
}
    
    
    
    
    
    
        .active{
            background-color: #62cb5d;
        }
    
        label > input{ /* HIDE RADIO */
            visibility: hidden; /* Makes input not-clickable */
            position: absolute; /* Remove input from document flow */
        }
        label > input + img{ /* IMAGE STYLES */
            cursor:pointer;
        }
        label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
            outline: 100px solid rgba(98, 203, 39, 0.25) !important;
            outline-offset: -100px;
            overflow: hidden;
            position: relative;
            height: 200px;
            width: 200px;
        }
        form *{
            margin-bottom:5px;
            line-height: 30px;
        }
        form > #name {
            padding-top: 20px;
        }
       
        #submit{
            border: 1px solid #ff99cc;
            border-radius: 4px;
            font-weight: bold;
        }
       
    
    @media only screen and (min-width : 480px) {
       label{
           width: 30% !important;
       } 
    }
    @media only screen and (max-width: 600px) {
    
   label
   {
       width: 30%;
   }
   label > input:checked + img {
       height: 70px !important;
       outline-offset: -200px !important;
   }
 
}

@media only screen and (min-width: 1200px) {
label > input:checked + img {
   
     overflow: unset !important; 
      height: 170px !important; 
    
}
}
.tab-content .active {
	background-color: unset !important;
}

.new-page-123{
    padding:20px 0 ;
    
}

.nav-menu : {
    direction: ltr;
}

.new-page-123 div#v-pills-tab .nav-link {
    font-size: 16px;
    padding: 10px;

    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: flex-start;
    width: 100%;
    

    color: #000 !important;
	
}

.new-page-123 .nav-link i , .new-page-123 .nav-link p{
    margin: 0px !important;
    padding: 0 5px !important;
    color:#000 !important;
}

div#v-pills-tab {
    /*background: #fff;*/
    background: #f2f6fa;
}


.new-page-123 .show {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: flex-start;
    align-content: flex-start;
    width: 100%;
    text-align: right;
}

.nav-link.active, .nav-link.active i, .nav-link.active p {
    color: #fff !important;
}

.tab-pane h4 {
        text-align: right;
}

.nav-link.active i {
    font-size: 22px;
}

.nav-link.active p {
    font-size: 18px !important;
    font-weight: bold;
}


.new-page-123 .nav-link i {
    color: #62cb5d !important;
}

.new-page-123 .nav-link.active i {
    color: #fff !important;
}

label {
 
    float: right;
    margin-right: -35px;
}

select.form-control:not([size]):not([multiple]) {

    height: 40px;
}
 
              .navlink.w--current {
                    color: #000;
                    font-weight: 700;
                }
               .w-nav-link {
            
                 color: unset; 
                 padding: unset; 
               }
               a {
                    background-color: transparent;
                }
                .navlink {
                    padding: 34px 15px;
                    -webkit-transition: all 300ms ease-in-out;
                    transition: all 300ms ease-in-out;
                  
                        font-family: Jannalt, sans-serif;
                    color: #4a4a4a;
                    font-size: 1.3em;
                }
                .navlink:hover {
    -webkit-transform: translate(0px, -2px);
    -ms-transform: translate(0px, -2px);
    transform: translate(0px, -2px);
                }
a:active, a:hover {
    outline: 0;
}
    </style>
@endsection

@section('content')

<div  style="direction : rtl;" > 
<div class="new-page-123">
    <div class="container">
        
        
    
    <div class="row">
    <div class="col-md-3" style="margin-top: 30px !important;">
    
    
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"> <i class="fa fa-home"></i> <p> تعديل البيانات الشخصية </p></a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">  <i class="fa fa-home"></i> <p> الروشتة الشهرية </p> </a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">  <i class="fa fa-home"></i> <p> التبرعات </p> </a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">  <i class="fa fa-home"></i> <p> محرك البحث</p> </a>
    </div>
    </div>
    <div class="col-md-9">
        <div class="col-md-7">
               <div class="tab-content" id="v-pills-tabContent">
                   <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                       @include('website.notfi')
                       <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <input type="hidden" name="id" value="{{$data->id}}">
                           <label class="control-label">الاسم</label>
                           <input type="text"  value=" @if($data->name){{$data->name}} @endif" class="textfield w-input" autofocus="true" maxlength="256" name="name" data-name="name" placeholder="..برجاء ادخال اسمك" id="name-3 ">


                           <label>الايميل</label>
                               <input type="email" class="textfield w-input" value=" @if($data->email){{$data->email}} @endif" maxlength="256" name="email" data-name="Email 5" placeholder="..برجاء ادخال بريدك الالكتروني" id="email-5" >
                           
                           <label>رقم الهاتف</label>
                            <input type="tel" class="textfield w-input" value="@if($data->phone){{$data->phone}} @endif" maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..برجاء ادخال رقم الهاتف" id="phone-2">

                            <label>اختر المنطقه</label>
                              @php
                                     $getallcountry =  App\AdminModel\City::where(['parent' => 0 ])->get();
                                     $getallgover = array();
                                     
                                    @endphp
                                    @foreach($getallcountry as $countr)
                                     @php
                                       $getallgover = App\AdminModel\City::where(['parent' => $countr->id ])->get();
                                     @endphp
                                    @endforeach
                        <select class=" textfield w-input" name="state_id" >
                            @foreach($getallgover as $state)
                              <option value="{{$state->id}}"  @if($data->state_id == $state->id) selected @endif> {{$state->name_ar}}</option>
                            @endforeach  
                        </select> 
                                @if($data->img == null)
                                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar"
                                     style="width:30%;  border-radius: 50%;">
                                @else
                                      <img src="{{asset('uploads/files/'.$data->img)}}" alt="Avatar"
                                     style="width:30%;  border-radius: 50%;">
                                @endif
                          تغيير الصورة 
                            <input class="fileInput" type="file" name="file"/>  
                           <input style="margin-top: 20px; "type="submit" value="حفظ التغييرات" class="btn btn-success btn-md"/>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    @if(count($data_mon) >0)
                       <form method="post" action="{{ url('update_monthly') }}" id="formmounth" enctype="multipart/form-data" style="color: white;">
                        
                        {{csrf_field()}}
                        <input type="hidden" name="id"  value=" @if($data_mon->id){{$data_mon->id}} @endif">
                        <div class="form-group">
                            <label>إسم المريض</label>
                            <input type="text"  value=" @if($data_mon->name){{$data_mon->name}} @endif" class="textfield w-input" autofocus="true" maxlength="256" name="name" data-name="name" placeholder="..برجاء ادخال اسمك" id="name-3" required="">

                         </div>
                        
                        <div class="form-group">
                            <label> إيميل </label>
                            <input type="email" class="textfield w-input" value=" @if($data_mon->email){{$data_mon->email}} @endif" maxlength="256" name="email" data-name="Email 5" placeholder="..برجاء ادخال بريدك الالكتروني" id="email-5" required>

                        </div>
                        
                        <div class="form-group">
                             <label>  رقم الهاتف  </label>
                             <input type="tel" class="textfield w-input" value="@if($data_mon->phone){{$data_mon->phone}} @endif" maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..برجاء ادخال رقم الهاتف" id="phone-2">

                        </div>
                        
                         <div class="form-group">
                            <label>    عنوان التوصيل </label>
                            
                                <input type="text" id="address"  class="textfield w-input"  value="@if($data_mon->phone){{$data_mon->address}} @endif" name="address" placeholder="العنوان">
                          </div>
                        
                            <label for="start">إختار تاريخ</label>
                          
                            <input type="date"  class="textfield w-input" name="date" value="@if($data_mon->date){{$data_mon->address}} @endif"  >
                            
                             <div class="clearfix"></div>
                         <div class="form-group">
                            <label>صورة الروشتة</label>
                            <div class="clearfix"></div>
                            <input style="    margin-top: -10px;width: 400px;direction: rtl;height: 30px;" name="file" accept="image/x-png,image/gif,image/jpeg" id="poster" type="file" class="form-control textfield uploader submission-image w-inline-block" >
        
                            <button onclick="submitDetailsForm()"  class="btn btn-success btn-md month"  style="margin-top: 20px;margin-left: 60%;font-size: 18px;">إرسل طلبك</button>
                        </div>
                    </form>
                   @else
                    لم يتم الإشتراك فى خدمة الروشتة الشهرية
                   @endif
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
          
          <h4> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </h4>
      </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          
          <h4> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </h4>
          </div>
               </div>
        </div>
    </div>
    </div>
    
    
    </div>
</div>
</div>

<script>
    $('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>

@section('js')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
@endsection