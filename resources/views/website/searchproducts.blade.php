@extends('website.app_en')
@section('title')
	searchproducts
	@endsection
@section('content')
	<div id="content">
		<!-- End Banner -->
		<div class="content-page">
			<div class="container">
				<div class="row">
				
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content-grid-boxed">
						
							<!-- End Sort PagiBar -->
							<div class="list-pro-color">
							    @foreach($getproducts as $pro)
								<div class="item-product-list">
									<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-12">
											<div class="item-pro-color">
												<div class="product-thumb">
													<a href="{{url('details/'.$pro->id)}}" class="product-thumb-link">
														<img data-color="black" class="active" src="{{asset('uploads/files/'.$pro->img)}}" style="    width: auto;
    height: 200px;" alt="">
													
													</a>
												</div>
											
											</div>
										</div>
										<div class="col-md-9 col-sm-8 col-xs-12">
											<div class="product-info" style="    margin-top: 20px;
">
												<h3 class="product-title"><a href="{{url('details/'.$pro->id)}}" style="color:black !important;">{{$pro->name_ar}}</a></h3>
												<div class="product-price">
												  @php
                                                     $allpro = App\AdminModel\Product::find($pro->id);
                                                  @endphp
                        								@if($allpro->ProOffer($allpro->id) !== 0)
                                    						<del><span>{{$allpro->o_price}}
                                                						جنيه
                                                						</span>
                                                			
                                                			</del>
                                                			<ins>
                                                			    <span>{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}
                                                						جنيه
                                                						</span>
                                                			</ins>
                                                		@else
                                                		<span>{{$allpro->o_price}} جنيه</span>
                                    					@endif
												</div>
												<p class="desc">
												    {!! $pro->description_ar !!}
												    </p>
												  <?php
                                                        $rates = $pro->ratings()->get();
                                                        $stars = $pro->ratings()->sum('stars');
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
							<!-- End List Pro color -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection