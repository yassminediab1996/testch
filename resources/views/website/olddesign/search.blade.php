@extends('website.searchheader')
@section('title')
	search
@endsection
@section('style')
<style type="text/css">
body{
  
 
        background: url(uploads/files/serch.jpg)   ;
     font-family : Tajawal !important;
   direction: rtl;
   text-align: right;
}
  @font-face{
            font-family: 'Tajawal';
            src: url({{ url('Tajawal-Light.ttf') }});
            }
.footer{
  padding-top: 50px;
  padding-bottom: 10px;
}
.footer > h2{
  font-size: 23.91pt;
  font-weight: bold;
   font-family : Tajawal !important;
}
.footer > p{
  font-size: 16pt;
   font-family : Tajawal !important;
}
.footer-form >form{
  background-color: #5bbd57;
  width: fit-content;
  padding: 5px;
}
.footer-form >form > * ::placeholder{
  color: #fff;
}
.footer-form >form > *{
   margin-left: 10px;
   color: #fff}
@media only screen and (min-width : 992px) {
    .contact-form > form{
      width: 50%;
  }
}
  </style>
<style> 
input[type=text] {
    width: 60%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
.search-basic {
            position: absolute;
            width: 45%;
            top: 320px;
            right: 40px;
        }
        .slid-bar {
            background: url(axe-ad.png) no-repeat center center;
            background-repeat: no-repeat;
            background-color: black;
            height: 500px;
        }
</style>
	@endsection
@section('content')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">     إرسال بيناتك للتواصل معك </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    </div>
  </div>
</div>
</div>
<form class="search-basic" >
           @include('website.notfi')
    <div style="text-align: center;">
        <p style="font-size: 20px;color: white;">للبحث عن الادوية </p>
        <input type="text" id="search"  required placeholder=" اكتب اسم الدواء..">
        <button class="btn btn-success btn-md" type="button" onclick="openmodel()" style="width: 70px;height: 49px;font-size: 20px;margin-bottom: 3px;">بحث
        </button>
    </div>
</form>
<a href="{{url('brand/28')}}" target="_blanck">
    <div class="slid-bar" style="background: url(/images/axe-ad.png) no-repeat center center; background-repeat: no-repeat; background-color: black;"
        src="http://www.chefaa.com/brand/28">
        
    </div>
</a>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$('#search').keypress(function(event) {
    if(event.which == 13) { // 13 is the 'Enter' key
     
     var search = $( "#search" ).val();
       jQuery('#exampleModalCenter').modal('show', {backdrop: 'false'});
              $.ajax({
                 type: "GET",
                 url: 'sendsearch/'+ search ,
                 dataType: "html",
                 data: {
                 },
                success: function (response) {
                  jQuery('#exampleModalCenter .modal-body').html(response);
                },
                error: function (e) {
               
                }
            });
      return false;
   }
});
</script>


    <script>
    
        function openmodel()
        {
            var search = $( "#search" ).val();

             jQuery('#exampleModalCenter').modal('show', {backdrop: 'true'});
              $.ajax({
                 type: "GET",
                 url: 'sendsearch/'+ search ,
                 dataType: "html",
                 data: {
                 },
                success: function (response) {
                   jQuery('#exampleModalCenter .modal-body').html(response);
                },
                error: function (e) {
                  
                }
            });
            
            //  $.get("{{ url('csr/send/') }}?id="+id, function(data, status){ 
            //   jQuery('#exampleModal .modal-content').html(data);
            // });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection