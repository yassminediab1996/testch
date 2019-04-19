@extends('website.app_en')
@section('title')
	brands
	@endsection
@section('content')
<style>
  
    
    a:active, a:hover {
     outline: unset !important; 
     width: unset !important; 
}
</style>


	<!-- End Content -->
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
					    @foreach(App\AdminModel\Brand::all() as $brand) 
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="item-product item-pro-hotdeal">
							
								<div class="product-thumb">
									<a href="{{url('brand/'.$brand->id)}}" class="product-thumb-link">
										<img src="{{asset('uploads/files/'.$brand->img)}}" style="    width: auto;     height: 100px !important; " alt="">
									</a>

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

@endsection