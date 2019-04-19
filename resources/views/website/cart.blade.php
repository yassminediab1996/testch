@extends('website.app_en')
@section('title')
	cart
@endsection
@section('content')
<style>
    .woocommerce *{
          font-size: 17px;
    }
    .woocommerce .cart-content-page table.shop_table .product-thumbnail img{    height: 120px;}
</style>

<div class="content-page woocommerce">
	<div class="container">
		<div class="cart-content-page">
			<h2 class="title-shop-page"السلة</h2>
			<form method="post" action="{{url('MakeOrder')}}" id="form">
				{{csrf_field()}}
				<div class="table-responsive">
					<table cellspacing="0" class="shop_table cart table">
						<thead>
							<tr>
								<th class="product-remove" scope="col">&nbsp;</th>
								<th class="product-thumbnail" scope="col">&nbsp;</th>
								<th class="product-name" scope="col">المنتج</th>
								<th class="product-price" scope="col">السعر</th>
								<th class="product-quantity" scope="col">الكمية</th>
								<th class="product-subtotal" scope="col">المجموع</th>
							</tr>
						</thead>

						<tbody>
						    @php
						      $totalall=0;
						    @endphp
						  @if($FinalCart)
                             @if(!Auth()->check() and App\FinalCart::where('anonim',Cookie::get('cart'))->count() > 0)
                               @foreach($FinalCart->get() as $cart)
                                   @php
                                     $product = App\AdminModel\Product::find($cart->product_id);
                                   @endphp
                                	<tr class="cart_item">
        								<td class="product-remove"  scope="row">
        									<a  style="color:black !important;" class="remove" href="#" onclick="DelItemCart({{$product->id}})"><i class="fa fa-times"></i></a>
        									<!--<a  style="color:black !important;" class="edit-mini-cart-item" href="#" ><i onclick="EditItemCart1({{$product->id}})" class="fa fa-pencil"></i></a>-->
        								</td>
        								<td class="product-thumbnail" scope="row">
        									<a href="{{url('details/'.$product->id)}}"><img  src="{{asset('uploads/files/'.$product->img)}}" styel="    height: 120px !important;" alt=""/></a>
        								</td>
        								<td class="product-name">
        									<a href="{{url('details/'.$product->id)}}" style="color:black !important;" style="float: right;">{{$product->name_ar}} </a>
        								</td>
        								<td class="product-price" scope="row">
        								          @php
                                                     $allpro = App\AdminModel\Product::find($product->id);
                                                  @endphp
                                                	@if($allpro->ProOffer($allpro->id) !== 0)
                                                    	<span style="float: right;">{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}	</span>

                                                	@else
        								            	<span style="float: right;"class="amount">{{$product->o_price}}</span>

        									    	@endif
        								</td>
        								<td class="product-quantity" scope="row">
        									<div class="detail-qty  ">
        										<input type="number" id="qty1-{{ $product->id }}" class="form-control"
        											   min="1" price="{{\App\AdminModel\Product::Price($product->id)}}"
        											    onchange="EditItemCart1({{$product->id}})" max="{{$product->qty}}" value="{{$cart->Quantity}}">
        									</div>
        								</td>
        								<td class="product-subtotal" scope="row">
        									<span id="edittotal" class="amount" style="float: right;">{{\App\AdminModel\Product::Price($product->id) * $cart->Quantity}}</span>
        								</td>
						         	</tr>
						        	@php
						        	  $totalall += \App\AdminModel\Product::Price($product->id) * $cart->Quantity;
						        	@endphp
						    	@endforeach
						
						    @elseif(Auth::user() and App\FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)
                                    @php
                                       $carts = $FinalCart->get()->sortByDesc('updated_at');
                                   @endphp
                                @foreach($carts as $cart)
                                @php  
                                  $product = App\AdminModel\Product::find($cart->product_id);
                                @endphp
                                      <tr class="cart_item">
        								<td class="product-remove"scope="row">
        									<a  style="color:black !important;" class="remove" href="#" onclick="DelItemCart({{$product->id}})"><i class="fa fa-times"></i></a>
        									<!--<a  style="color:black !important;" class="edit-mini-cart-item" href="#" ><i onclick="EditItemCart1({{$product->id}})" class="fa fa-pencil"></i></a>-->
        
        								</td>
        								<td class="product-thumbnail" scope="row">
        									<a href="{{url('details/'.$product->id)}}"><img  src="{{asset('uploads/files/'.$product->img)}}"  styel="    height: 120px !important;" alt=""/></a>
        								</td>
        								<td class="product-name" scope="row">
        									<a href="{{url('details/'.$product->id)}}" style="    color: black !important;     float: right;">{{$product->name_ar}} </a>

        								</td>
        								<td class="product-price"scope="row">
        								  @php
                                                     $allpro = App\AdminModel\Product::find($product->id);
                                                  @endphp
                                                	@if($allpro->ProOffer($allpro->id) !== 0)
                                                    	<span style="    float: right;">{{$allpro->o_price - $allpro->ProOffer($allpro->id)}}	</span>

                                                	@else
        								            	<span style="    float: right;" class="amount">{{$product->o_price}}</span>

        									    	@endif
        								</td>
        								<td class="product-quantity"scope="row">
        									<div class="detail-qty  ">
        										<input type="number" id="qty1-{{ $product->id }}" class="form-control"
        											   min="1" price="{{\App\AdminModel\Product::Price($product->id)}}"
        											    onchange="EditItemCart1({{$product->id}})" max="{{$product->qty}}" value="{{$cart->Quantity}}">
        									</div>
        								</td>
        								<td class="product-subtotal" scope="row">
        								    
        									<span id="edittotal" class="amount" style="float: right;" >{{\App\AdminModel\Product::Price($product->id) * $cart->Quantity}}</span>

        								</td>
						         	</tr>

						    	@php
						    	$totalall += \App\AdminModel\Product::Price($product->id) * $cart->Quantity; 
						    	@endphp
					    	@endforeach
					    	 @else
                           @endif
                        @endif
					  	@if(Auth()->check())
						<tr>
							<td class="actions" colspan="6">
								<div class="coupon">
									<label for="coupon_code">كوبون :</label>
									<input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
									<a style="width: 150px;
                                       height: 40px;" value="Apply Coupon" class="btn btn-danger btn-lg" onclick="cupone()" >تفعيل الكوبون</a>
 								</div>
							</td>
						</tr>
                        <input type="hidden" name="befortotal" id="amounttotal1" value="{{$totalall}}">
                       	<input type="hidden" name="shipping" id="shipping1" value="{{App\User::GetFees(Auth()->user()->id)}}">
                        <input type="hidden" name="aftertotal" id="finaltotal1" value="{{$totalall + App\User::GetFees(Auth()->user()->id)}}">
					 	@endif
				
						</tbody>
					</table>
				</div>
        
			
			<div class="cart-collaterals">
				<div class="cart_totals ">
					<h2>مجموع السلة</h2>
					<div class="table-responsive">
						<table cellspacing="0" class="table">
							<tbody>
								<tr class="cart-subtotal">
									<th>المجموع</th>
									<td id="amounttotal"><strong class="amount" >
									   @if(Auth()->check())
                                          @if(App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)	
                                          @php	
 							                $get = App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
							            
							               	$sumbtotal = 0;
							               	@endphp
							               	@foreach($get as $total)
							               @php	 
							                 $sumbtotal+= $total->b_total;
							               @endphp
							               	@endforeach
							               	{{$sumbtotal}}
								        @else 
								        	{{$totalall}}
								     	@endif 
								   	@else 
								   	  {{$totalall}}
									@endif
									</strong></td>
								</tr>
								@if(Auth()->check())
								@if(Auth::user() and App\FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)
                                    @php
                                       $carts2 = $FinalCart->get()->sortByDesc('updated_at');
                                        $isfreeshipping=1;
                                   @endphp
                                @foreach($carts2 as $cart2)
                                @php  
                                  $product2 = App\AdminModel\Product::find($cart2->product_id);
                                    if($product2->checkfree ==0) {
                                    $isfreeshipping=0;
                                    }
                                @endphp
                                @endforeach
                                
								<tr class="shipping">
									<th>الشحن</th>

									<td id="shipping"><strong class="amount" >
									 @if($isfreeshipping == 0)	{{App\User::GetFees(Auth()->user()->id) }} @else 0 @endif 
										</strong></td>
								   </tr>
								
									 <tr class="shipping">
    									<th>الخصم</th>
    									 @if(App\CouponOrder::where('user_id',Auth()->user()->id)->exists()) 
    									<td id="discound"><strong  >
                                         
    									   {{   App\CouponOrder::where('user_id',Auth()->user()->id)->first()->discount}} %
    									   
    									</strong></td>
							     	</tr>
							     	@else
							     <td id="discound"><strong>
							         0
							     </strong></td>	
								@endif
								@endif
								<tr class="order-total">
									<th>المجموع الكلى</th>
									<td id="finaltotal"><strong><span class="amount">
									   
									     @if(Auth()->check())
    									      @php  
    									        $fees=  App\User::GetFees(Auth()->user()->id);
    									      @endphp
    									      @if(App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0) 
        							               @php	
            							                $get = App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
            							                if($isfreeshipping == 1){
            							                    $fees = 0;
            							                }
            							               	$sumbtotal = 0;
        							               	@endphp
    							               	@foreach($get as $total)
        							               @php	 
        							                 $sumbtotal += $total->a_total;
        							               @endphp
    							               	@endforeach
    							             
    							               	@if(App\CouponOrder::where('user_id',auth()->user()->id)->exists())
    							               	  	@php
        							               	  $discound = App\CouponOrder::where('user_id',auth()->user()->id)->first()->discount;
        							               	  $dis = ($sumbtotal*($discound/100));
        							               	  $sumbtotal = $sumbtotal - $dis;
    							               	   	@endphp
    							               	@endif
    							              
    							               	{{ $sumbtotal + $fees }}
    								          @else 
    								        	@php  
    								        	  $prin =  $totalall + $fees ;
    								        	@endphp
    								        	{{$prin}}
    								       @endif 
    								   	@else 
    								   	  {{$totalall}}
									@endif
									</span></strong> </td>
								</tr>
									@endif
							</tbody>
						</table>
					</div>
					<div class="wc-proceed-to-checkout">
						<button class="btn btn-lg btn-success" onclick="checklogin()" type="button" >الذهاب الى الدفع</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<script>
     function hideModal() {
   
       
         $(function () {
            $('#myModal').modal('hide');    
            });
            
              $('#reqister').modal();
    }
</script>
<!-- End Content Page -->
     	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
<script>
	function checklogin(){
       
       $.get("{{ url('checklogin') }}", function(data, status){
           console.log(data)
            if(data == 1)
			{
                $('#form').submit();
			}else{
                  $("#form").submit(function(e){
                        e.preventDefault();
                    });
                 //$('#myModal').modal();
                  $('#myModal').modal('show');
			}


        });

	}
    function EditItemCart1(id) {
        var qty = $('#qty1-'+id).val();
        $.get("{{ url('EditItemCart') }}?id="+id+'&qty='+qty, function(data, status){
            if(data == 1)
			{
                location.reload();
			}else 
			{
			     swal(data ,  {
                        
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
               alert('Cupone Finished')

		   }else {
               var newtotal = total - (Number(total) * data/100);

               $('#amounttotal').text(newtotal);
               $('#amounttotal1').val(newtotal);
               var shipping = $('#shipping').text();

              // var final = Number(newtotal) + Number(shipping);
              var final = Number(newtotal);
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
            if(data == 3)
            {
                  swal(" لا يمكن استخدام الكوبون اكثر من مرة لنفس الطلب    ", {
                        
                                });
            }else{
                 swal(" تم الخصم   ", {
                        
                                });
            }
        });
    }
</script>
@endsection
