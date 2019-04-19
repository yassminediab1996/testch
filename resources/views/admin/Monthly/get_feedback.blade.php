<style>
    h3{
        float:right;
    }
    p{
            float: right;
    }
</style>
	<style>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star,label.starVide {
    float:right;
      padding: 5px;
    font-size: 19px;
    color: #bac8d3;
    transition: all .2s;
}

input.star:checked ~ label.star:before {


  transition: all .25s;
}
.item-toggle-tab.active .toggle-tab-title::after{
    
    content: "\f0d7"; 
    font-family: FontAwesome;
}

.toggle-tab-title::after
{
     content: "\f0d7" !important;
    font-family: FontAwesome;   
}
.widget-title::after 
{
    content: "\f0d7" !important; 
    font-family: FontAwesome; 
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f005';
  color: #fdca33;
  font-family: FontAwesome;
}
label.starVide:before {
  content: '\f006';
  color: #fdca33;
  font-family: FontAwesome;
}
 .saleoff {
    color: #fff;
    position: absolute;
    top: 0px;
    left: 10px;
    width: 40px;
    height: 40px;
    padding: 3px 0;
    display: block;
    text-align: center;
    border-radius: 0 0 20px 20px;
    font-size: 12px;
    text-transform: uppercase;
    box-shadow: 1px 2px 5px 0 rgba(0, 0, 0, 0.2);
    z-index: 10;
}
 .saleoff {
    left: auto;
    right: 10px;
}

.item-pro-seller .product-info, .widget-recent-post .widget-content > ul > li > .post-info {
     display: unset !important; 
}
.tab-detal{
    clear: both;
}
	</style>
@if(count($getfeedback) > 0)
<div class="row">
    <div class="col-md-12">
        
   
   <h3>? ما هو تقييمك لأداء الصيدلية </h3>
 <br>
  </div>
</div>
 <div class="row">
     <div class="col-md-6">
       <p>  {{$getfeedback->note_q1}} </p>
     </div>
     
     <div class="col-md-6">
          @for ($i = 1; $i < 6; $i++)
            @if($i <= $getfeedback->star_q1)
                 <label class="star star-{{ $i }}" for="star-{{ $i }}" ></label>
                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" checked/>
            @else
                 <label class="starVide star-{{ $i }}" for="star-{{ $i }}" ></label>
                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" />
            @endif
        @endfor    
     </div>
 </div>
 <div class="clearfix"></div>
 
 <div class="row">
    <div class="col-md-12">
        
   
   <h3>?  ماهو تقييمك لأداء مندوب التوصيل </h3>
 <br>
  </div>
</div>
 <div class="row">
     <div class="col-md-6">
        <p> {{$getfeedback->note_q2}}</p>
     </div>
     
     <div class="col-md-6">
          @for ($i = 1; $i < 6; $i++)
            @if($i <= $getfeedback->star_q2)
                 <label class="star star-{{ $i }}" for="star-{{ $i }}" ></label>
                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" checked/>
            @else
                 <label class="starVide star-{{ $i }}" for="star-{{ $i }}" ></label>
                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" />
            @endif
        @endfor    
     </div>
 </div>
 <div class="clearfix"></div>
   
   
<div class="row">
<div class="col-md-12">
    

<h3>?  ماهو تقييمك للخدمة الخاصة بتوصيل الأدوية شهريا   </h3>
<br>
</div>
</div>
<div class="row">
 <div class="col-md-6">
    <p> {{$getfeedback->note_q3}}</p>
 </div>
 
 <div class="col-md-6">
      @for ($i = 1; $i < 6; $i++)
        @if($i <= $getfeedback->star_q3)
             <label class="star star-{{ $i }}" for="star-{{ $i }}" ></label>
            <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" checked/>
        @else
             <label class="starVide star-{{ $i }}" for="star-{{ $i }}" ></label>
            <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" />
        @endif
    @endfor    
 </div>
</div>
<div class="clearfix"></div>
   

 <div class="row">
<div class="col-md-12">
    

<h3>?     هل لديك اي مقترحات او تعليقات   </h3>
<br>
</div>
</div>
<div class="row">
 <div class="col-md-12">
     {{$getfeedback->note_q4}}
 </div>
 

</div>
<div class="clearfix"></div>
              
      
@else
  <h1>No Feedback</h1>

@endif
