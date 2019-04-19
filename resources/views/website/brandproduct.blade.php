@extends('website.app_en')

@section('title')
	products brand
@endsection

@section('content')
<style>
    .product-thumb-link > img {
    width: auto;
}
</style>
@php
 $getprobrand = \App\AdminModel\Brand::find($id);
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
					     @foreach($getprobrand->products as $allpro)
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="item-product item-pro-hotdeal">
							
								<div class="product-thumb">
									<a href="{{url('details/'.$allpro->id)}}" class="product-thumb-link">
										<img src="{{asset('uploads/files/'.$allpro->img)}}" style="    height: 250px;" alt="">
									</a>

									<div class="product-extra-link">
										<a class="addcart-link" onclick="addToCart({{$allpro->id}})" ><i aria-hidden="true" class="fa fa-shopping-basket" style="color:black;"></i></a>
									            @if(Auth()->check() and Cookie::get('fav') == null )
                                                <a class="wishlist-link"  href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(auth()->user()->id , $allpro->id)}})">
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
                                       
                                               <a class="wishlist-link" href="#" onclick="FavProduct({{$allpro->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id)}})">
                                                     <i aria-hidden="true" class="fa fa-heart" 
                                                     @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $allpro->id) == 0) style="color: red" @else style="color: black" @endif ></i></a>
                                            
                                            @endif
									</div>
								</div>
								<div class="product-info">
									<h3 class="product-title"><a href="{{url('details/'.$allpro->id)}}" style="color:black !important;" >{{$allpro->name_ar}}</a></h3>
									<div class="info-pro-hotdeal">
									
										<div class="product-price">
												@if($allpro->ProOffer($allpro->id) == 0)
            						<ins><span>{{$allpro->o_price}}
            						جنيه
            						</span></ins>
            					@else
            						<del><span>{{$allpro->o_price}}
            						جنيه
            						</span></del>
            						<ins><span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
            						جنيه
            						</span></ins>
            					@endif
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
				<div class="btn-loadmore"><a href="#"><i aria-hidden="true" class="fa fa-spinner fa-spin"></i></a></div>
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