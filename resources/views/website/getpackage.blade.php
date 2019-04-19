@if($package->count() > 0)
<div class="row">
	@foreach($package as $allpro)
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="item-product item-pro-hotdeal">

				<div class="product-thumb" style="max-height: 400px;">
					<a href="#" class="product-thumb-link">
						<img src="{{asset('uploads/files/'.$allpro->img)}}"  alt="">
					</a>

					<div class="product-extra-link">
						<a class="addcart-link" href="{{url('viewpackage/'.$allpro->id)}}" ><i aria-hidden="true" class="fa fa-shopping-basket" style="color:black;"></i></a>
					</div>
				</div>
				<div class="product-info">
					<h3 class="product-title"><a href="#" style="color:black !important;" >{{$allpro->name_ar}}</a></h3>
					<div class="info-pro-hotdeal">
						<div class="deal-percent">
							<p>{!! $allpro->description !!}</p>
						</div>
						<div class="product-price">
						<span>{{$allpro->price}}
							جنيه
        					</span>
						</div>


					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
		<div class="row">
			<h1>باقات اخرى</h1>
			@foreach(App\AdminModel\Package::where(['sex' => $package[0]->sex , 'checkrec' => 1])->get() as $allpro1)
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="item-product item-pro-hotdeal">

						<div class="product-thumb" style="max-height: 400px;">
							<a href="#" class="product-thumb-link">
								<img src="{{asset('uploads/files/'.$allpro1->img)}}"  alt="">
							</a>

							<div class="product-extra-link">
								<a class="addcart-link"  ><i aria-hidden="true" onclick="addPackageToCart({{$allpro1->id}})" class="fa fa-shopping-basket" style="color:black;"></i></a>
							</div>
						</div>
						<div class="product-info">
							<h3 class="product-title"><a href="#" style="color:black !important;" >{{$allpro1->name_ar}}</a></h3>
							<div class="info-pro-hotdeal">
								<div class="deal-percent">
									<p>{!! $allpro1->description !!}</p>
								</div>
								<div class="product-price">
    				<span>{{$allpro1->price}}
						جنيه
    					</span>
								</div>


							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
@else
	<div class="text-center"> <h2>لا يوجد باقات</h2></div>
@endif

<script>
    function addPackageToCart(id) {
        var qty = 1;
        $.get("{{ url('addpackageToCart') }}?id="+id+'&qty='+qty, function(data, status){
            if(data == 1)
                location.reload();

        });
    }
</script>