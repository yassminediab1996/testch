@extends('website.app_en')
@section('title')
	details
@endsection
@section('content')
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
		<div class="content-page">
			<div class="container">
				<div class="banner-shop">
					<div class="banner-shop-thumb">
						<a href="#"><img src="images/shop/bn-list.jpg" alt="" /></a>
					</div>
				</div>
                	<div class="row">
                	    	<div class="col-md-3 col-sm-4 col-xs-12">
                						<div class="sidebar sidebar-left">
                							<div class="widget widget-seller">
                								<h2 class="widget-title title14">أكثر المنتجات  مبيعا </h2>
                								<div class="widget-content">
                									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                										<div class="list-pro-seller">
                										   
                										    @foreach(App\AdminModel\Product::PopularProducs() as $productbest)
                											<div class="item-pro-seller">
                												<div class="product-thumb">
                													<a href="{{url('details/'.$productbest->id)}}" class="product-thumb-link"><img  src="{{App\Helper::resize($productbest->img, 90,115)}}" alt="{{$productbest->name_ar}}" /></a>
                												</div>
                												<div class="product-info">
                													<h3 class="product-title" style="margin-top: -20px !important;"
                >
                													    <a href="{{url('details/'.$productbest->id)}}" style="    color: black !important;">{{substr($productbest->name_ar,0,30)}}...</a></h3>
                													<div class="product-price">
                    													    @php
                                                                             $allpro = App\AdminModel\Product::find($productbest->id);
                                                                          @endphp
                                                								@if($allpro->ProOffer($allpro->id) !== 0)
                                                            						<del><span>{{$allpro->o_price}}
                                                                        						جنيه
                                                                        						</span></del>
                                                                        						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                                                                        						جنيه
                                                                        						</span></ins>
                                                                        		@else
                                                                        		<span>{{$allpro->o_price}} جنيه</span>
                                                                        		
                                                            					@endif
                													</div>
                												
                												</div>
                											</div>	
                										@endforeach		
                										</div>	
                																	
                									</div>
                								</div>
                							</div>
                							
                						</div>
                					</div>
                		@if($getall_pro)		
                        	<div class="col-md-9 col-sm-8 col-col-xs-12">
                	      	<div class="product-detail accordion-detail border radius">
                			<div class="row">
                				<div class="col-md-5 col-sm-12 col-xs-12">
                					<div class="detail-gallery">
                						<div class="mid">
                							<img src="{{asset('uploads/files/'.$getall_pro->img)}}" alt=""/>
                						</div>
                						<div class="gallery-control">
                							<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                							<div class="carousel">
                								<ul>
                								    @foreach($getall_pro->imges as $img)
                									<li><a href="#"><img src="{{asset('uploads/files/'.$img->img)}}" alt=""/></a></li>
                									@endforeach
                								</ul>
                							</div>
                							<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                						</div>
                					</div>
                					<!-- End Gallery -->
                
                				</div>
                				@if($getall_pro->ProOffer($getall_pro->id) != 0)
                					<span class="saleoff" style="background-color: #62cb5d;"><b>{{$getall_pro->offer->percentage}}%</b><br>خصم</span>
                                @endif
                				<div class="col-md-7 col-sm-12 col-xs-12">
                				    
                					<div class="detail-info">
                						<h2 class="title-detail" style="padding-right: 50px;">{{$getall_pro->name_ar}}</h2>
                					  <div class="stars" style="margin-bottom: 40px;">
                                                  <?php
                                                    if(Auth::user()  and  Cookie::get('rate') == null ){
                                                        $rateCheck = App\Rate::where(['product_id' => $getall_pro->id , 'user_id' => Auth()->user()->id])->count();
                                                        if($rateCheck > 0){
                                                            $rateUser =  App\Rate::where(['product_id' => $getall_pro->id  , 'user_id' => Auth()->user()->id])->first()->stars;
                                                        }else{
                                                            $rateUser = 0;
                                                        }
                                                        
                        
                                                    }
                                                    elseif(Auth()->check() and Cookie::get('rate') !== null )
                                                    {
                                                         $rateCheckauth = App\Rate::where(['product_id' => $getall_pro->id , 'user_id' => Auth()->user()->id])->count();
                                                         $rateCheckcookie = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->count();
                                                         if($rateCheckauth > 0 and $rateCheckcookie > 0 )
                                                         {
                                                            $gettimeauth =  App\Rate::where(['product_id' => $getall_pro->id , 'user_id' => Auth()->user()->id])->first()->updated_at;
                                                            $gettimecookie = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->updated_at;
                                                            
                                                            if($gettimeauth > $gettimecookie)
                                                            {
                                                                $rateUser = App\Rate::where(['product_id' => $getall_pro->id , 'user_id' => Auth()->user()->id])->first()->stars;
                                                                  if($rateUser > 0){
                                                                        $rateUser =  App\Rate::where(['product_id' => $getall_pro->id  , 'user_id' => Auth()->user()->id])->first()->stars;
                                                                    }else{
                                                                        $rateUser = 0;
                                                                    } 
                                                            }else{
                                                                $rateUser = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->stars;
                                                                   if($rateUser == 0)
                                                            {
                                                                $rateUser = 0;
                                                            }else{
                                                               $rateUser = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->stars;
                                                            }
                                                            }
                                                         }elseif($rateCheckauth == 0 and $rateCheckcookie != 0)
                                                         {
                                                             $rateUser = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->stars;
                                                              if($rateUser == 0)
                                                            {
                                                                $rateUser = 0;
                                                            }else{
                                                               $rateUser = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->stars;
                                                            }
                                                         }elseif($rateCheckcookie == 0 and $rateCheckauth != 0)
                                                         {
                                                             $rateUser = App\Rate::where(['product_id' => $getall_pro->id , 'user_id' => Auth()->user()->id])->first()->stars;
                                                               if($rateUser > 0){
                                                                     $rateUser =  App\Rate::where(['product_id' => $getall_pro->id  , 'user_id' => Auth()->user()->id])->first()->stars;
                                                                }else{
                                                                     $rateUser = 0;
                                                                } 
                                                         }else{
                                                              
                                                              $rateUser = 0;
                                                                    
                                                         }
                                                    }
                                                    elseif(!Auth::check() and Cookie::get('rate') != null )
                                                    {
                                                         $rateCheckcookie = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->count();
                                                            if($rateCheckcookie == 0)
                                                            {
                                                                $rateUser = 0;
                                                            }else{
                                                               $rateUser = App\Temp_Rate::where(['product_id' => $getall_pro->id , 'anonim' => Cookie::get('rate')])->first()->stars;
                                                            }
                                                    }else{
                                                         $rateUser = 0;
                                                    }
                                                    
                                                     
                                                    ?>
                                                   
                                                        @if($rateUser != 0)
                                                            @for ($i = 1; $i < 6; $i++)
                                                                @if($i <= $rateUser)
                                                                     <label class="star star-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv({{ $i }},{{$getall_pro->id }})"></label>
                                                                    <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" checked/>
                                                                @else
                                                                     <label class="starVide star-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv({{ $i }},{{$getall_pro->id }})"></label>
                                                                    <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare" />
                                                                @endif
                                                                
                                                            @endfor
                                                        @else
                                                            @for ($i = 1; $i < 6; $i++)
                                                                <label class="starVide star-{{ $i }}" for="star-{{ $i }}" onclick="ChangeRateProv({{ $i }} , {{$getall_pro->id }})"></label>
                                                                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" value = "{{ $i }}" name="stare"  />
                                                            @endfor
                                                        @endif

                                   </div>
                						<p class="desc">{!! substr($getall_pro->description_ar , 0,500) !!}</p>
                						<div class="product-price">
                						       @php
                                             $allpro = App\AdminModel\Product::find($getall_pro->id);
                                          @endphp
                								@if($allpro->ProOffer($allpro->id) !== 0)
                            						<del><span>{{$allpro->o_price}}
                                						جنيه
                                						</span></del>
                                						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                                						جنيه
                                						</span></ins>
                                        		@else
                                        		<span>{{$allpro->o_price}} جنيه</span>
                            					@endif
                						</div>
                						<div class="available">
                							<strong>التوفر: </strong>
                							<span class="in-stock">متوفر</span>
                						</div>
                						@if($getall_pro->checkfree == 1)
                	                  <div class="available">
                							<strong>الشحن: </strong>
                							<span class="in-stock">مجانا</span>
                						</div>
                						@endif
                						<div class="detail-extralink">
                							<div class="detail-qty   spinner">
                								<input id="qty" type="number" class="form-control" value="1" min="0" max="{{$getall_pro->qty}}">
                							</div>
                							<div class="product-extra-link2">
                								<a class="addcart-link" href="#" onclick="addToCart({{$getall_pro->id}})" style="    margin-top: 7px;">اضف الى السلة</a>
                                         
                                               @if(Auth()->check() and Cookie::get('fav') == null )
                                                <a class="wishlist-link" style="margin-top: 8px;" href="#" onclick="FavProduct({{$getall_pro->id}} , {{\App\AdminModel\Product::isFav(auth()->user()->id , $getall_pro->id)}})">
                
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Auth()->user()->id , $getall_pro->id) == 0) style="color: red"  @else style="color: black" @endif ></i></a>
                                                     
                                                         
    
                                            @elseif(Auth()->check() and Cookie::get('fav') != null)
                                          
                                            @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id) == 0)
                                             <a class="wishlist-link" style="margin-top: 8px;" href="#" onclick="FavProduct({{$getall_pro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id)}})">
                                                   
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     style="color: red"></i>
                                                     </a>
                                                     @else
                                                    <a class="wishlist-link" style="margin-top: 8px;" href="#" onclick="FavProduct({{$getall_pro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id)}})">

                                                     <i aria-hidden="true" class="fa fa-heart" style="color: black"  ></i>
                                                     </a>
                                                     @endif
                                                     
                                                     
                                            @elseif(!Auth()->check() and Cookie::get('fav') != null)
                                             <a class="wishlist-link" style="margin-top: 8px;" href="#" onclick="FavProduct({{$getall_pro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id) == 0) style="color: red"  @else style="color: black" @endif >
                                                     </i>
                                                     </a>
                                            @else
                                       
                                               <a class="wishlist-link" style="margin-top: 8px;" href="#" onclick="FavProduct({{$getall_pro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $getall_pro->id) == 0) style="color: red" @else style="color: black" @endif ></i></a>
                                            
                                            @endif
                                              
                							</div>
                						</div>
                					</div>
                					<!-- Detail Info -->
                				</div>
                			</div>
                			<div class="tab-detal toggle-tab">
                				<div class="item-toggle-tab active">
                					<h2 class="toggle-tab-title title14  title144 radius border" style="content: "" !important;
                                                font-family: fontawesome;
                                                position: absolute;
                                                right: 20px;
                                                top: 13px;" >الوصف</h2>
                					<div class="toggle-tab-content">
                						<div class="content-detail-tab">
                							<div class="detail-tab-thumb">
                								<img src="images/shop/tab-img.png" alt="" />
                							</div>
                							<div class="detail-tab-info">
                								<p class="desc" style=" margin-right: -225px; ">{!! $getall_pro->description_ar !!}</p>
                							</div>
                						</div>
                					</div>
                				</div>
                                <div class="item-toggle-tab">
                					<h2 class="toggle-tab-title title14 radius border">التعليقات</h2>
                					<div class="toggle-tab-content">
                						<div class="content-detail-tab">
                							<div class="detail-tab-thumb">
                								<img src="images/shop/tab-img.png" alt="" />
                							</div>
                							<div class="detail-tab-info">
                								<ul>
                								    @foreach(App\Review::where('product_id',$getall_pro->id)->get() as $review)
                									<li>{{$review->review}}</li>
                							        @endforeach
                								</ul>
                							</div>
                						</div>
                					</div>
                				</div>
                			</div>
                			@if(Auth()->check())
                			<form action="{{url('review/'.$getall_pro->id)}}" method="post">
                			    {{csrf_field() }}
                			     <label>ادخل تعليقكك</label>
                			     <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                			     <input type="hidden" name="product_id" value="{{$getall_pro->id}}">
                			    <textarea name="review" class="form-control" style='    height: 150px;'></textarea>
                			    <button class="btn btn-success  btn-md" type="submit" style="    margin: 20px 0;
">ارسل تعليقك</button>
                			</form>
                			@endif
                		</div>
                	@endif
                	</div>
                
                   </div>
	        </div>
	</div>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

	function FavProduct(id,fav) {

        $.get("{{ url('updateFavPro') }}?id="+id+'&fav='+fav, function(data, status){

             location.reload();
        });
    }

	function addToCart(id) {
        var qty = $('#qty').val();
        $.get("{{ url('addToCart') }}?id="+id+'&qty='+qty, function(data, status){
         if(data == 1){
             location.reload();
             
         }

        });
    }
     function ChangeRateProv(rate,id){
        console.log(rate);
    $('#loadingDiv').css('display','block');
    dataString = "star="+rate;
    $.ajax({
        type: "GET",
        url: "/product/"+id+"/rate",
        data: dataString,
        success: function(html)
        {
            location.reload();
        }
    });
}
</script>
@endsection