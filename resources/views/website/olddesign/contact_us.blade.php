@extends('website.header')
@section('title')
	contact
@endsection
@section('style')
 <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
	 <style type="text/css">
        body{
            direction: rtl;
            text-align: right;
        }
        .green-font{
            color: green;
        }
        *{
            box-sizing: border-box;
            margin: auto;
            text-align: center;
         
            color: #232323
        }
        .active{
            background-color: #62cb5d;
        }
        #before-nav{
            border: none;
            height: 10px;
            background-color: #61ca5d;
            margin-right: -5px;
            margin-left: -5px;
            margin-top: -5px;
        }
        .nav-item > a{
            font-size: 15pt;
            font-weight: bold;
        }
        .nav-item > a:hover , .active > .nav-link {
            color: #61ca5d !important;
            background-color: white;
        }
        h2{
            font-size: 34.91pt;
            font-weight: bold;
        }
        .bg-green{
            background-color: #62cb5d;
        }
        .small-hr{
            height: 3px;
            width: 10%
        }
        .contact-form{
            margin-top: 100px;
            background-image: url('contact-us_page_layers/contact-us-background.jpg');
            background-repeat: no-repeat;
            background-position: 50% -200%;
        }

        .main-contact-items{
            background-color:  #fff;
            padding: 10px 20px;
            margin: auto;
        }
        .contact-form > form >input{
            font-size: 14.2pt;
        }
        .contact-form > form >input::placeholder , .contact-form > form >textarea::placeholder{
            font-size: 14.2pt;
            color: #dfdfdf;
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
        .entry {
            margin-left:5px;
            font-size:20px;
            padding:2px;
            width: fit-content;
            color: #ff99cc;
            border: 1px solid #fff7e6;
            border-radius: 4px;
            width:100%;
        }
        #submit{
            border: 1px solid #ff99cc;
            border-radius: 4px;
            font-weight: bold;
        }
       
        @media only screen and (min-width : 992px) {
            .contact-form > form{
                width: 50%;
            }
        }
         a{
          color:white !important;
           font-family : Tajawal !important;
      }
    @media only screen and (min-width : 1200px) {
     .main-contact-items {
          width: 600px;
      }
       label{
           width: 100% !important;
       } 
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
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12" style="    margin: auto; margin-top: -50px; ">
             <div class="contact-form">

    @include('layouts.notfi')
    <form action="{{url('contact')}}" method="post" style="width:100%">
        {{csrf_field()}}
      <div >
        <label>
          <input type="radio" name="user_type" value="1" checked="checked" />
          <img src="contact-us_page_layers/user.jpg">
        </label>
        <label>
          <input type="radio" name="user_type" value="2"/>
          <img src="contact-us_page_layers/pharmacy.jpg">
        </label>
        <label>
          <input type="radio" name="user_type" value="3" />
          <img src="contact-us_page_layers/company.jpg">
        </label>
        <input type="hidden" name="type_id" value="1">
      </div>
     
      <div class="main-contact-items">
        <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="name" name="name" placeholder="الاسم"><br>
        <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="mail" name="email" placeholder="الايميل"><br>
        <input type="text" class="form-control form-control-lg border-top-0 border-left-0 border-right-0 text-right" id="phone" name="phone" placeholder="الهاتف"><br>
      <textarea class="form-control form-control-lg border-0 text-right" id="message" name="message" rows="5" placeholder="الرساله....."></textarea>
      <button type="submit" class="btn btn-success btn-lg btn-block">ارسال</button>
      </div>
    </form>
</div>
        </div>
    </div>
</div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection