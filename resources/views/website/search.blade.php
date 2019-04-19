@php $currentPage = 'search'; @endphp

@extends('website.layouts.master')

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

  <div class="search-engine-wrapper w-clearfix">
      
      @include('website.notfi')
    <form  class="search w-form">
        <input type="search" class="textfield search-text w-input" autofocus="true" maxlength="256" name="query" placeholder="..اكتب اسم الدواء" id="search" required="">
        <input type="button" onclick="openmodel()" value="بحث" class="cta w-button">
        </form>
    <h1 class="heading-5"><strong class="bold-text-9"></strong></h1>
  </div>
    @section('mailchimb')
      <div class="div-block footer">
      <div class="form-block-2 w-form">
   
             <div id="mc_embed_signup">
            <form action="https://chefaa.us18.list-manage.com/subscribe/post?u=0c607300b0650fa81e42606cd&amp;id=f615676714" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form"  novalidate >
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
     
     <script>
$('document').ready(function () {     
        jQuery.noConflict();

    $('#search').keypress(function(event) {
        if(event.which == 13) { // 13 is the 'Enter' key
         
         var search = $( "#search" ).val();
        //  jQuery('#exampleModalCenter').modal('show', {backdrop: 'false'});
            $('#exampleModalCenter').modal('show');
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
});
</script>
     <script>
    
        function openmodel()
        {
           
            var search = $( "#search" ).val();

        //     jQuery('#exampleModalCenter').modal('show', {backdrop: 'true'});
              $('#exampleModalCenter').modal();

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
        }
    </script>

  @endsection