@extends('website.app_en')
@section('title')
	All Products
@endsection
@section('content')
<style>
    .widget-title::after 
{
    content: "\f0d7" !important; 
    font-family: FontAwesome; 
}

.detail-extralink .detail-qty {
    margin-top: -9px;
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
                								<h2 class="widget-title title14">أكثر المنتجات مبيعا   </h2>
                								<div class="widget-content">
                									<div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
                										<div class="list-pro-seller">
                										   
                										    @foreach(App\AdminModel\Product::PopularProducs() as $productbest)
                											<div class="item-pro-seller">
                												<div class="product-thumb">
                													<a href="{{url('details/'.$productbest->id)}}" class="product-thumb-link"><img  src="{{asset('uploads/files/'.$productbest->img)}}" alt="" /></a>
                												</div>
                												<div class="product-info">
                													<h3 class="product-title" style="    margin-top: 89px !important;
"
                >
                													    <a href="{{url('details/'.$productbest->id)}}" style="    color: black !important;"> {{substr($productbest->name_ar,0,30)}}...</a></h3>
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
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="content-grid-boxed">
							<div class="sort-pagi-bar clearfix">
							

							</div>
							<!-- End Sort PagiBar -->
							<div class="list-pro-color">
								@foreach($products as $product)
								<div class="item-product-list">
									<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-12">
											<div class="item-pro-color">
												<div class="product-thumb">
													<a href="{{url('details/'.$product->id)}}" class="product-thumb-link" >
														<img data-color="black" class="active" src="{!! Helper::resize($product->img, 185, 145) !!}" alt="">
													</a>
												</div>

											</div>
										</div>
										<div class="col-md-9 col-sm-8 col-xs-12">
											<div class="product-info">
												<h1 class="product-title"><a href="{{url('details/'.$product->id)}}" style="color: black !important;">{{$product->name_ar}}</a></h1>
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
                                                        		<span>{{$allpro->o_price}} جنيه</span>
                                            					@endif
												</div>
												<p class="desc">{!! $product->description_ar !!}.</p>
												
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
											
			
													<div class="detail-extralink">
                        							<div class="detail-qty   spinner">
                        								<input id="qty{{$product->id}}" type="number" class="form-control" value="1" min="0" max="{{$product->qty}}" style="height:40px;">
                        							</div>
                        							<div class="product-extra-link2">
                        								<a class="addcart-link" href="#" onclick="addToCart({{$product->id}})">اضافة الى العربه  </a>
                                                       
                                                           @if(Auth()->check() and !Cookie::get('fav') )
                                                                    <a class="wishlist-link" href="#" onclick="FavProduct({{$product->id}} , {{\App\AdminModel\Product::isFav(auth()->user()->id , $product->id)}})">
                                                                       @if(\App\AdminModel\Product::isFav(auth()->user()->id , $product->id) == 0)
                                                                         <i aria-hidden="true" class="fa fa-heart" 
                                                                         style="color: red"></i></a>
                                                                         @else 
                                                                           <i aria-hidden="true" class="fa fa-heart" 
                                                                           style="color: black"  ></i></a>
                                                                          @endif   
                                                               
                                                                @elseif(Auth()->check() and Cookie::get('fav'))
                                                       
                                                                 <a class="wishlist-link" href="#" onclick="FavProduct({{$product->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id)}})">
                                                                        @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id) == 0)
                                                                         <i aria-hidden="true" class="fa fa-heart" 
                                                                         style="color: red"  ></i></a>
                                                                          @else
                                                                           <i aria-hidden="true" class="fa fa-heart" 
                                                                        style="color: black" ></i></a> @endif
                                                                @elseif(!Auth()->check() and Cookie::get('fav'))
                                                                 <a class="wishlist-link" href="#" onclick="FavProduct({{$product->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id)}})">
                                                                        @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id) == 0)
                                                                         <i aria-hidden="true" class="fa fa-heart" 
                                                                         style="color: red"  ></i></a>
                                                                          @else
                                                                           <i aria-hidden="true" class="fa fa-heart" 
                                                                        style="color: black" ></i></a> @endif
                                                                @else
                                                           
                                                                   <a class="wishlist-link" href="#" onclick="FavProduct({{$product->id}} , {{\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id)}})">
                                                                         @if(\App\AdminModel\Product::isFav(Cookie::get('fav') , $product->id) == 0)
                                                                         <i aria-hidden="true" class="fa fa-heart" 
                                                                         style="color: red"  ></i></a>
                                                                          @else
                                                                           <i aria-hidden="true" class="fa fa-heart" 
                                                                        style="color: black" ></i></a> @endif
                                                                
                                                                @endif
                                                       
                        							</div>
                        						</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Item -->
							    @endforeach

								<!-- End Item -->
									{{ $products->links()}}
							</div>
							<!-- End List Pro color -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
	function FavProduct(id,fav) {

        $.get("{{ url('updateFavPro') }}?id="+id+'&fav='+fav, function(data, status){

             location.reload();
        });
    }

	function addToCart(id) {
        var qty = $('#qty'+id).val();
        $.get("{{ url('addToCart') }}?id="+id+'&qty='+qty, function(data, status){
         if(data == 1){
             fbq('track', 'AddToCart');
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
