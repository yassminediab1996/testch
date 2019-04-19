@extends('website.app_en')

@section('title')
	Offer
@endsection

@section('content')
<style>
    .product-thumb-link > img {
 
    width: auto;
    height:  250px;
}
</style>
@php

 $getproducts = DB::table('offers')
                ->orderBy('percentage', 'desc')
                ->get();

@endphp
	<div id="content">
		<div class="content-page page-product-hot-deal">
			<div class="container">
				<div class="banner-shop">
					<div class="banner-shop-thumb">
						<a href="#"><img src="images/shop/bn-grid-ajax.jpg" alt="" /></a>
					</div>
					
				</div>
			
			
				<!-- End Sort PagiBar -->
				<div class="list-product-hot-deal">
					<div class="row">
					     @foreach($getproducts as $allproofer)
                          @php
                             $allpro = App\AdminModel\Product::find($allproofer->product_id);
                          @endphp
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="item-product item-pro-hotdeal">
							
								<div class="product-thumb" style="max-height: 400px;">
									<a href="{{url('details/'.$allpro->id)}}" class="product-thumb-link">
										<img src="{{asset('uploads/files/'.$allpro->img)}}"  alt="">
									</a>
									<div class="product-extra-link">
										<a class="addcart-link" onclick="addToCart({{$allpro->id}})" ><i aria-hidden="true" class="fa fa-shopping-basket" style="color:black;"></i></a>
						                   @if(Auth()->check() and Cookie::get('fav') == null )
                                                <a class="wishlist-link" href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(auth()->user()->id , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Auth()->user()->id , $allpro->id) == 0) style="color: red"  @else style="color: black" @endif ></i></a>
                                                     
                                                         
    
                                            @elseif(Auth()->check() and Cookie::get('fav') != null)
                                          
                                            @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id) == 0)
                                             <a class="wishlist-link"  href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     style="color: red"></i>
                                                     </a>
                                                     @else
                                                    <a class="wishlist-link"  href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" style="color: black"  ></i>
                                                     </a>
                                                     @endif
                                                     
                                                     
                                            @elseif(!Auth()->check() and Cookie::get('fav') != null)
                                             <a class="wishlist-link" href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id) == 0) style="color: red"  @else style="color: black" @endif >
                                                     </i>
                                                     </a>
                                            @else
                                       
                                               <a class="wishlist-link"  href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id) == 0) style="color: red" @else style="color: black" @endif ></i></a>
                                            
                                            @endif
									</div>
								</div>
								<div class="product-info">
									<h3 class="product-title"><a href="{{url('details/'.$allpro->id)}}" style="color:black !important;" >{{$allpro->name_ar}}</a></h3>
									<div class="info-pro-hotdeal">
										<div class="deal-percent">
											<span>{{$allpro->offer->percentage}}</span>
											<sup>%</sup>
										</div>
										<div class="product-price">
											<del><span>{{$allpro->o_price}}
                        						جنيه
                        						</span></del>
                        						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                        						جنيه
                        						</span></ins>
										</div>
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
								
									</div>
								</div>
							</div>
						</div>
				        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
<script>
    	function FavProduct(id,fav) {

        $.get("{{ url('updateFavPro') }}?id="+id+'&fav='+fav, function(data, status){

             location.reload();
        });
    }

	function addToCart(id) {
        var qty = 1;
        $.get("{{ url('addToCart') }}?id="+id+'&qty='+qty, function(data, status){
         if(data == 1)
             location.reload();

        });
    }
</script>
@endsection