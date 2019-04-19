<!doctype html>
<html>
<head>
             <meta charset="utf-8">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <title>Rate </title>
            <style>
        .checked {
          color: orange;
        }
        
        
            h1 ,p , h4 , label {
                    text-align: right;
            }
              .str{
                padding: 18px;
                color: #e4dddd;
                margin-top: 15px;
              }
              .pr_str{
                  text-align: right;
                  float: right;
                  margin-right: 300px;
                 }
                 .pr_str_2{
                     float: right;
                      margin-right: 200px;
                 }
                 td{
                     width: 30px !important;
                 }
        </style>
        	<style>
        	
        div.stars {
          display: inline-block;
        }
        
        input.star { display: none; }
        
        label.star,label.starVide {
            /*float:right;*/
              padding: 18px;
            /*font-size: 19px;*/
            color: #62cb5d;
            transition: all .2s;
        }
        
        input.star:checked ~ label.star:before {
          transition: all .25s;
        }
        
        input.star-1:checked ~ label.star:before { color: #62cb5d; }
        
        label.star:hover { transform: rotate(-15deg) scale(1.3); }
        
        label.star:before {
          content: '\f005';
          color: #62cb5d;
          font-family: FontAwesome;
        }
        
        label.starVide:before {
            content: '\f006';
            color: #9a9090;
            font-family: FontAwesome;
        }
        
        .pr_str_2 {
            float: right;
            margin-right: 200px;
            direction: rtl;
        }
        	</style>
</head>
<body>
    <div>
        @include('website.notfi')
       <div class="row">
         <div class="card parent" style="margin:auto;margin-top: 30px;width: 1000px;">
         <div class="card-body">
             <div class="text">
                 <h1 style="    margin: 0 25%;width: 650px;float: right;">
                     شكرا لثقتك في شفاء وإستخدام     </h1>
                 <h1 style="float: right;
                   margin-right: 330px;">الروشتة الشهرية</h1>
                  <div class="clearfix"></div><br><br>
                  <p style"font-weight: 500">حرصا منا علي تطوير الخدمة وتقديم أفضل أداء لعملائنا من فضلك إملأ التقييم التالي</p>
             </div>
             <form action="{{url('feedback')}}" method="post">
                 {{csrf_field()}}
                 <input type="hidden" name="mon_id" value="{{$id}}">
             <div class="parentdiv"> 
                <div class="col-md-12">
                   <h4 style="width: 550px;
                                           margin: 40px auto 0;"> ما هو تقييمك لأداء الصيدلية ( من ١ ل ٥)  ؟</h4>
                </div>
                 <div class="clearfix"></div>

                 <div class="col-md-6 pr_str_2">
                       @for ($i = 1; $i < 6; $i++)
                         @if($i == 1)
                           @php $font = 30; @endphp
                         @elseif($i == 2)
                           @php $font = 35; @endphp
                         @elseif($i ==3)  
                           @php $font = 40; @endphp
                        @elseif($i == 4)
                           @php $font = 45; @endphp
                         @elseif($i ==5)  
                           @php $font = 50; @endphp
                         @endif  
                        <label class="starVide star1-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv1({{ $i }} ,1)" style="font-size:{{$font}}px"></label>
                        <input  class="star star-{{ $i }} fa fa-star str" id="st1-{{$i}}" type="radio" value = "{{ $i }}" name="star_q1" style="padding: 18px;color: #e4dddd;margin-top: 15px;"/>
                        @php $font = 0; @endphp
                      @endfor
                </div>   
                
                <div class="col-md-6 pr_str" style="text-align: right;
          float: right;
          margin-right: 300px;">
                        <div>
                            <textarea  id="note_q1" name="note_q1" placeholder="ب " class="form-control" style="    height: 100px; width: 580px;border: 3px solid #ced4da;text-align: right;"></textarea>
                        </div>
                 </div>
             </div>
             <br>
             <br>
             <div class="clearfix"></div>
             
             <div class="parentdiv"> 
                <div class="col-md-12">
                    
                   <h4 style="width: 550px;
                           margin: 40px auto 0;"> ماهو تقييمك لأداء مندوب التوصيل (من ١ ل ٥)  ؟</h4>
                </div>
                             <div class="clearfix"></div>

                 <div class="col-md-6 pr_str_2">
                       @for ($i = 1; $i < 6; $i++)
                         @if($i == 1)
                           @php $font = 30; @endphp
                         @elseif($i == 2)
                           @php $font = 35; @endphp
                         @elseif($i ==3)  
                           @php $font = 40; @endphp
                        @elseif($i == 4)
                           @php $font = 45; @endphp
                         @elseif($i ==5)  
                           @php $font = 50; @endphp
                         @endif  
                        <label class=" starVide star2-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv2({{ $i }} ,2)" style="font-size:{{$font}}px"></label>
                        <input  class="star star-{{ $i }} fa fa-star str" id="st2-{{$i}}" type="radio" value = "{{ $i }}" name="star_q2" />
                        
                        @php $font = 0; @endphp
                      @endfor
                </div>   
                  
                <div class="col-md-6 pr_str">        
                        <div>
                            <textarea  id="note_q2" name="note_q2" placeholder="هتتغير حسب اختيار الكسمر" class="form-control" style="    height: 100px;
                                 width: 580px;border: 3px solid #ced4da;text-align: right;"></textarea>
                                        
                        </div>
                 </div>
             </div>
             <br>
             <br>
             <div class="clearfix"></div>
             
             <div class="parentdiv"> 
                <div class="col-md-12">
                    
                   <h4 style="width: 550px;
                           margin: 40px auto 0;">  ماهو تقييمك للخدمة الخاصة بتوصيل الأدوية شهريا (من ١ ل ٥) ؟</h4>
                </div>
                             <div class="clearfix"></div>

                 <div class="col-md-6 pr_str_2">
                       @for ($i = 1; $i < 6; $i++)
                         @if($i == 1)
                           @php $font = 30; @endphp
                         @elseif($i == 2)
                           @php $font = 35; @endphp
                         @elseif($i ==3)  
                           @php $font = 40; @endphp
                        @elseif($i == 4)
                           @php $font = 45; @endphp
                         @elseif($i ==5)  
                           @php $font = 50; @endphp
                         @endif  
                        <label class=" starVide star3-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv3({{ $i }} , 3)" style="font-size:{{$font}}px"></label>
                        <input  class="star star-{{ $i }} fa fa-star str" id="st3-{{$i}}" type="radio" value = "{{ $i }}" name="star_q3"  />
                        
                        @php $font = 0; @endphp
                      @endfor
                </div>   
                  
                <div class="col-md-6 pr_str">        
                        <div>
                            <textarea  id="note_q3" name="note_q3" placeholder="هتتغير حسب اختيار الكسمر" class="form-control" style="    height: 100px;
                                 width: 580px;border: 3px solid #ced4da;text-align: right;"></textarea>
                                        
                        </div>
                 </div>
             </div>
             <br>
             <br>
             <div class="clearfix"></div>
           
             
             <div class="parentdiv"> 
                <div class="col-md-12">
                   <h4 style="width: 550px;
                           margin: 40px auto 0;"> هل لديك اي مقترحات او تعليقات  ؟</h4>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6" style="float: right; margin-top: 20px; padding: 10px;margin-right: 50px;">
                     <label class="radio-inline" style="    font-size: 20px;padding: 0 0 0 10px;">
    
                       <input type="radio" name="ss"  onclick="display(1)"> نعم
                    </label>
                    
                     <label class="radio-inline" style="    font-size: 20px;padding: 0 0 0 10px;">
                       <input type="radio" name="ss" onclick="display(0)"> لا
                    </label>
                </div>          
                <div class="col-md-6 pr_str" id="textarea" style="display:none">        
                        <div>
                            <textarea id="note_q4" name="note_q4" placeholder="هتتغير حسب اختيار الكسمر" class="form-control" style="    height: 100px; width: 580px;border: 3px solid #ced4da;text-align: right;"></textarea>
                        </div>
                 </div>
             </div>
             <br>
             <br>
             <div class="clearfix"></div>
             <br>
             <br>
             <div class="col-md-6" >
                 <button style="margin: 9px 90%;" class="btn btn-primary btn-lg">إرسال </button>
             </div>
              
             </form>
          </div>
    </div>  
</div>
   </div>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
     function display(id){
        if(id == 1)
        {
            $("#textarea").css("display","block");
        }else{
                $("#textarea").css("display","none");
        }
    }
     function ChangeRateProv1(rate , q){
      
        if(!$('#note_q1').val())
        {
         
            if(rate > 3)
            {
                   $('#note_q1').attr("placeholder", "Type your answer here");
            }else{
                 $('#note_q1').attr("placeholder", "Type your answersdfsdf here");
            }
        }
        
         for(var i = rate+1 ; i <= 5 ; i++)
        {
             $(".star1-"+i).removeClass( "star" ).addClass( "starVide" );
             $("#st1-"+i).attr('checked', false);
        }
        
        for(var i =1 ; i<= rate  ; i++ )
        {
            
            $(".star1-"+i).removeClass( "starVide" ).addClass( "star" );
            $("#st1-"+i).attr('checked', true);
        }
         
       
     }
     
      function ChangeRateProv2(rate , q){
        if(!$('#note_q2').val())
        {
            
            if(rate > 3)
            {
                   $('#note_q2').attr("placeholder", "Type your answer here");
            }else{
                 $('#note_q2').attr("placeholder", "Type your answersdfsdf here");
            }
        }
         for(var i = rate+1 ; i <= 5 ; i++)
        {
             $(".star2-"+i).removeClass( "star" ).addClass( "starVide" );
             $("#st2-"+i).attr('checked', false);
        }
        for( var i =1 ; i<= rate  ; i++ )
        {
             $(".star2-"+i).removeClass( "starVide" ).addClass( "star" );
             $("#st2-"+i).attr('checked', true);
        }

     }
     
      function ChangeRateProv3(rate , q){
         if(!$('#note_q3').val())
        {
            
            if(rate > 3)
            {
                   $('#note_q3').attr("placeholder", "Type your answer here");
            }else{
                 $('#note_q3').attr("placeholder", "Type your answersdfsdf here");
            }
        }
         for(var i = rate+1 ; i <= 5 ; i++)
        {
             $(".star3-"+i).removeClass( "star" ).addClass( "starVide" );
             $("#st3-"+i).attr('checked', false);
        }
        for(var i =1 ; i<= rate  ; i++ )
        {
             $(".star3-"+i).removeClass( "starVide" ).addClass( "star" );
             $("#st3-"+i).attr('checked', true);
        }

     }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
