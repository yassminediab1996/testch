@extends('admin.layouts.app_en')
@section('title')
    Products
@endsection
@section('content')
		@php
		  $product = App\AdminModel\Product::find($id);
		@endphp
			<div class="container-fluid">
			
			  
				<div class="row">
					<div class="col-md-12 col-sm-12 mb-4">
						<div class="box">
							<div class="box-body">
							
								<h2 class="mb-0">{{$product->name_ar}} </h2> 
								<hr>
								
								<div class="row">
								
									<div class="col-lg-4 col-md-4 col-sm-6">
										<div class="white-box text-center"> <img src="{{asset('uploads/files/'.$product->img)}}" class="img-responsive" alt=""> </div>
									</div>
									
									<div class="col-lg-8 col-md-8 col-sm-6">
									
										<h4 class="box-title m-t-40">معلومات المنتج </h4>
										<p>
										    {!!$product->description_ar !!}
										    </p>
										<h2>  @php
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
                                                                        		
                                                            					@endif </h2>
										
									
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>  
			<!-- /.content-wrapper-->
@endsection	