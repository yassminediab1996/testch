@extends('website.header')
@section('title')
	الصفحة الشخصية-شفاء
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    	 <style type="text/css">
       
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
    background: #fff;
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
.test{
    height: 40px;
    width: 64%;
    color: black;
    float: right;
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}
    </style>
@endsection

@section('content')

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
dfsdf                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
sdfsdfsdf
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

<script>
    $('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection