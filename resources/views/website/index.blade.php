@extends('website.app_en')
@section('title')
	store
	@endsection
@section('content')
@include('website.notfi')
<style>
.owl-carousel{
     direction: ltr;
}
     .diimg2{
         display: flex;
	flex-direction: row;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: center;
     }  
     
     @media only screen and (max-width: 600px) {
         .imgres{
             width:350px !important;

         }
         .imgres2{
             width:200px !important;
         }
         .item{
                 margin-right: 50px !important;
         }
     }
</style>
<?php 
$resizeClass = new App\Helper;
?>
<!-- End Tab Hover -->
<div class="product-box19 deal-box2">
<div class="title-box19">
	<span class="color"><i class="fa fa-bolt" style="     color: green;

"></i> </span>
	<ul class="list-inline-block">
		<li><h2 class="title18">العروض الحصرية</h2></li>
		
	</ul>
	<a href="{{url('offer')}}" class="view-more wobble-top silver" style="    color: black !important;
">شاهد المزيد</a>
</div>
<div class="product-box-slider2">
	<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,3],[990,4],[1200,5]]">
		@foreach(\App\AdminModel\Product::all() as $allpro)
			@if(count($allpro->offer) >0)
		<div class="item-product19 text-center ">
			<div class="product-thumb">
				<a href="{{url('details/'.$allpro->id)}}">
					<img style="   height: 200px;" src="{{$resizeClass->resize($allpro->img,216, 216)}}" alt="" class="imgres2">
				</a>
				<span class="saleoff" style="    background-color: #62cb5d;
"><b>{{$allpro->offer->percentage}}%</b>خصم</span>
			</div>
			<div class="product-info">
				<h3 class="product-title"><a href="#" style="    color: black !important;">{{$allpro->name_ar}}</a></h3>
				<ul class="list-inline-block">
					<li>
					 <?php
					 
                        $rates = $allpro->ratings()->get();
                        $stars = $allpro->ratings()->sum('stars');
                        if(count($rates) > 0)
                        $rate = $stars/(count($rates)*5)*100;
                        else
                        $rate = 0;
                    ?>
				<div class="product-rate">
					<div class="product-rating" style="width:{{$rate}}%"></div>
				</div>
					</li>
					<li><span class="smoke">(200)</span></li>
				</ul>
				<div class="product-price">
					   @php
                         $allpro = App\AdminModel\Product::find($allpro->id);
                      @endphp
						@if($allpro->ProOffer($allpro->id) !== 0)
    						<del><span>{{$allpro->o_price}}
                						جنيه
                						</span></del>
                						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                						جنيه
                						</span></ins>
                		@else
                		<ins><span>{{$allpro->o_price}} جنية</span></ins>
    					@endif
    					
				</div>
					@if($allpro->checkfree == 1)
                	                  <div class="available">
                							<strong>الشحن: </strong>
                							<span class="in-stock">مجانا</span>
                						</div>
                						@endif
			</div>
		</div>
			@endif
		@endforeach

	</div>
</div>
</div>
<!-- End Product Deal -->
@foreach(\App\AdminModel\Category::where('parent','!=',0)->get() as $category) 
	@if(count($category->products2) > 0)
<div class="product-box01 ad-left bg-white border">
<div class="banner-adv01 adv-background imgres" data-image="{{$resizeClass->resize($category->img,236, 350)}}" style="    width: 236px;
    height: 350px;">
	<div class="adv-info white text-center">
		<h2 class="title18">{{$category->name_ar}}  </h2>
		<a href="{{url('products/'.$category->id)}}" class="shopnow border radius white">تسوق الان</a>
	</div>
</div>
<div class="product-box-slider01">
	<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[640,2],[990,3],[1200,4]]">

		@foreach($category->products2 as $product)
		<div class="item-product19 text-center item" style="    height: 329px;
    width: 216px;">
			<div class="product-thumb">
				<a href="{{url('details/'.$product->id)}}">
					<img  style="   height: 216px;" src="{{$resizeClass->resize($product->img,216, 216)}}" alt="">
				</a>
			</div>
			<div class="product-info">
				<h3 class="product-title"><a href="{{url('details/'.$product->id)}}" style="    color: black !important;">{{$product->name_ar}}</a></h3>
				<ul class="list-inline-block">
					<li>
				  <?php
                        $rates = $product->ratings()->get();
                        $stars = $product->ratings()->sum('stars');
                        if(count($rates) > 0)
                        $rate = $stars/(count($rates)*5)*100;
                        else
                        $rate = 0;
                    ?>
				<div class="product-rate">
					<div class="product-rating" style="width:{{$rate}}%"></div>
				</div>
					</li>
					<li><span class="smoke">(200)</span></li>
				</ul>
				<div class="product-price">
				    @php
                     $allpro = App\AdminModel\Product::find($product->id);
                  @endphp
						@if($allpro->ProOffer($allpro->id) !== 0)
    						<del><span>{{$allpro->o_price}}
                						جنيه
                						</span></del>
                						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                						جنيه
                						</span></ins>
                		@else
                			<ins><span>{{$allpro->o_price}} جنية </span></ins>
    					@endif

				</div>
					@if($allpro->checkfree == 1)
                	                  <div class="available">
                							<strong>الشحن: </strong>
                							<span class="in-stock">مجانا</span>
                						</div>
                						@endif
			</div>
		</div>
		@endforeach

	</div>
</div>
</div>
@endif

@endforeach


@endsection