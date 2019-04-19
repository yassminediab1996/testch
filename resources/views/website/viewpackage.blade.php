@extends('website.app_en')
@section('title')
	package
@endsection
@section('content')
<style>
    .woocommerce *{
          font-size: 17px;
    }
</style>
<div class="content-page woocommerce">
	<div class="container">
		<div class="cart-content-page">
			<h2 class="title-shop-page"السلة</h2>
			<form method="post" action="{{url('addpackageToCart')}}">
				{{csrf_field()}}
				<div class="table-responsive">
					<table cellspacing="0" class="shop_table cart table">
						<thead>
							<tr>
								<th class="product-remove" scope="col">&nbsp;</th>
								<th class="product-thumbnail" scope="col">&nbsp;</th>
								<th class="product-name" scope="col">المنتج</th>
								<th class="product-price" scope="col">السعر</th>
							</tr>
						</thead>
                       <input type="hidden" name="package_id" value="{{$getpac->id}}">
						<tbody>
						    @php
						      $sum=0;
                              $count= 0;
                                $final = 0;
						    @endphp
                            @foreach(explode(',',$getpac->products) as $products)    
                            @php
                              $product = App\AdminModel\Product::find($products);
                            @endphp
                        	<tr class="cart_item">
        								<td class="product-remove"  scope="row">
        									<a  style="color:black !important;" class="edit-mini-cart-item" onclick="EditUserPac({{$getpac->id}},{{$product->id}})" ><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
        								</td>
        								<td class="product-thumbnail" scope="row">
        									<a href="{{url('details/'.$product->id)}}"><img  src="{{asset('uploads/files/'.$product->img)}}" alt=""/></a>
        								</td>
        								<td class="product-name">
        									<a href="{{url('details/'.$product->id)}}" style="color:black !important;float: right;">{{$product->name_ar}} </a>
        								</td>
        								<td class="product-price" scope="row">
        								          @php
                                                     $allpro = App\AdminModel\Product::find($product->id);
                                                  @endphp
                                            	@if($allpro->ProOffer($allpro->id) !== 0)
                                            	 @php
                                            	  $count = $allpro->o_price - $allpro->ProOffer($allpro->id);
                                            	 @endphp
                                                	<span>{{$count}}	</span>
                                            	@else
                                            	@php
                                            	 $count = $product->o_price;
                                            	@endphp
    								            	<span class="amount">{{$count}}</span>
    									    	@endif
        								</td>
        							
						         	</tr>
						         	@php $sum = $sum +$count; @endphp
						   @endforeach       	
						</tbody>
					</table>
				</div>
        
			
			<div class="cart-collaterals">
				<div class="cart_totals ">
					<h2>مجموع الباقة</h2>
					<div class="table-responsive">
						<table cellspacing="0" class="table">
							<tbody>
								<tr class="cart-subtotal">
									<th>المجموع قبل الخصم</th>
									<td id="amounttotal"><strong class="amount" >
									  {{$sum}}
									</strong></td>
								</tr>
								<tr>
								    <th>الخصم</th>
								    <td>{{$pac->discount}}</td>
								</tr>
								
								<tr class="cart-subtotal">
									<th>المجموع بعد الخصم  </th>
									<td id="amounttotal"><strong class="amount" >
									    @php
									     $final = ($sum*$pac->discount)/100;
									    @endphp
									  {{$sum-$final}}
									</strong></td>
								</tr>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>
			<div class="wc-proceed-to-checkout">
						<button class="btn btn-lg btn-success" type="submit">  الذهاب الى الدفع</button>
					</div>
			</form>
				
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- End Content Page -->
<script>
	function AddPackagetoCart(id){
	      $.get("{{ url('AddPackagetoCart') }}?id="+id, function(data, status){
          


        });
	}
    function EditUserPac(id , productid ) {
        $.get("{{ url('EditUserPac') }}?id="+id+'&productid='+productid, function(data, status){
          if(data == 1)
          {
               swal("لا يمكنك تقليل الكمية" ,  {
                        
                                });
          }
        });
    }
     
    function cupone() {
        var text = $('#coupon_code').val();
		var total =   $('#amounttotal').text();
        $.get("{{ url('ChechCupone') }}?text="+text+'&total='+total, function(data, status){
           if(data == 0)
		   {
               alert('Cupone Wrong')

		   }else {
               var newtotal = total - (Number(total) * data/100);

               $('#amounttotal').text(newtotal);
               $('#amounttotal1').val(newtotal);
               var shipping = $('#shipping').text();

               var final = Number(newtotal) + Number(shipping);
               console.log(newtotal)


              $('#finaltotal').html(final);
              $('#finaltotal1').val(final);

              sendcarttotal(newtotal ,shipping,final , data);
		   }
        });


    }
    function sendcarttotal(b,s,a,data) {

        var dd = s;
        var a_total = a;
        var b_total = b;
        console.log(data);
        var data = data ;
        $.get("{{ url('sendtotal') }}?b_total="+b_total+'&a_total='+a_total+'&data='+data, function(data, status) {
        });
    }
</script>
@endsection