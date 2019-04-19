@extends('website.app_en')
@section('title')
	checkout
@endsection

@section('content')

<style>
    .example.example2 {
  background-color: #fff;
}

.example.example2 * {
  font-family: Source Code Pro, Consolas, Menlo, monospace;
  font-size: 16px;
  font-weight: 500;
}

.example.example2 .row {
  display: -ms-flexbox;
  display: flex;
  margin: 0 5px 10px;
}

.example.example2 .field {
  position: relative;
  width: 100%;
  height: 50px;
  margin: 0 10px;
}

.example.example2 .field.half-width {
  width: 50%;
}

.example.example2 .field.quarter-width {
  width: calc(25% - 10px);
}

.example.example2 .baseline {
  position: absolute;
  width: 100%;
  height: 1px;
  left: 0;
  bottom: 0;
  background-color: #cfd7df;
  transition: background-color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.example.example2 label {
  position: absolute;
  width: 100%;
  left: 0;
  bottom: 8px;
  color: #cfd7df;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  transform-origin: 0 50%;
  cursor: text;
  transition-property: color, transform;
  transition-duration: 0.3s;
  transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
}

.example.example2 .input {
  position: absolute;
  width: 100%;
  left: 0;
  bottom: 0;
  padding-bottom: 7px;
  color: #32325d;
  background-color: transparent;
}

.example.example2 .input::-webkit-input-placeholder {
  color: transparent;
  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.example.example2 .input::-moz-placeholder {
  color: transparent;
  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.example.example2 .input:-ms-input-placeholder {
  color: transparent;
  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.example.example2 .input.StripeElement {
  opacity: 0;
  transition: opacity 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
  will-change: opacity;
}

.example.example2 .input.focused,
.example.example2 .input:not(.empty) {
  opacity: 1;
}

.example.example2 .input.focused::-webkit-input-placeholder,
.example.example2 .input:not(.empty)::-webkit-input-placeholder {
  color: #cfd7df;
}

.example.example2 .input.focused::-moz-placeholder,
.example.example2 .input:not(.empty)::-moz-placeholder {
  color: #cfd7df;
}

.example.example2 .input.focused:-ms-input-placeholder,
.example.example2 .input:not(.empty):-ms-input-placeholder {
  color: #cfd7df;
}

.example.example2 .input.focused + label,
.example.example2 .input:not(.empty) + label {
  color: #aab7c4;
  transform: scale(0.85) translateY(-25px);
  cursor: default;
}

.example.example2 .input.focused + label {
  color: #24b47e;
}

.example.example2 .input.invalid + label {
  color: #ffa27b;
}

.example.example2 .input.focused + label + .baseline {
  background-color: #24b47e;
}

.example.example2 .input.focused.invalid + label + .baseline {
  background-color: #e25950;
}

.example.example2 input, .example.example2 button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: none;
  border-style: none;
}

.example.example2 input:-webkit-autofill {
  -webkit-text-fill-color: #e39f48;
  transition: background-color 100000000s;
  -webkit-animation: 1ms void-animation-out;
}

.example.example2 .StripeElement--webkit-autofill {
  background: transparent !important;
}

.example.example2 input, .example.example2 button {
  -webkit-animation: 1ms void-animation-out;
}

.example.example2 button {
  display: block;
  width: calc(100% - 30px);
  height: 40px;
  margin: 40px 15px 0;
  background-color: #24b47e;
  border-radius: 4px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  cursor: pointer;
}

.example.example2 input:active {
  background-color: #159570;
}

.example.example2 .error svg {
  margin-top: 0 !important;
}

.example.example2 .error svg .base {
  fill: #e25950;
}

.example.example2 .error svg .glyph {
  fill: #fff;
}

.example.example2 .error .message {
  color: #e25950;
}

.example.example2 .success .icon .border {
  stroke: #abe9d2;
}

.example.example2 .success .icon .checkmark {
  stroke: #24b47e;
}

.example.example2 .success .title {
  color: #32325d;
  font-size: 16px !important;
}

.example.example2 .success .message {
  color: #8898aa;
  font-size: 13px !important;
}

.example.example2 .success .reset path {
  fill: #24b47e;
}
</style>
	<div id="content">
		<div class="content-page woocommerce">
			<div class="container">
					<div class="col-md-12">
						@include('website.notfi')
						<h2 class="title-shop-page">الدفع</h2>
						<h3 class="order_review_heading" style="background: #62cb5d ;">طلباتك </h3>
						<div class="woocommerce-checkout-review-order" id="order_review">
							<div class="table-responsive">
								<table class="shop_table woocommerce-checkout-review-order-table">
									<thead>
									<tr>
										<th class="product-name">المنتج</th>
										<th class="product-total">المجموع</th>
									</tr>
									</thead>
									<tbody>
									@php
										$totalall=0;
										$isfreeshipping = 0;
									@endphp
									@if($FinalCart)
										@if(!Auth()->check() and App\FinalCart::where('anonim',Cookie::get('cart'))->count() > 0)
											@foreach($FinalCart->get() as $cart)
												@php
													$product = App\AdminModel\Product::find($cart->product_id);
												@endphp
												<tr class="cart_item">
													<td class="product-name">
														{{$product->name_ar}}&nbsp; <span class="product-quantity">× {{$cart->Quantity}}</span>
													</td>
													<td class="product-total">
														<span class="amount">{{App\AdminModel\Product::Price($product->id) * $cart->Quantity}}جنيه</span>
													</td>
												</tr>
												@php 
                                                  $totalall += \App\AdminModel\Product::Price($product->id) * $cart->Quantity;
												@endphp
											@endforeach
									@elseif(Auth::user() and App\FinalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0)
											@php
												$carts = $FinalCart->get()->sortByDesc('updated_at');
                                                $isfreeshipping = 1;
											@endphp
											@foreach($carts as $cart)
												@php
													$product = App\AdminModel\Product::find($cart->product_id);
                                                    if($product->checkfree ==0) {
                                                        $isfreeshipping=0;
                                                    }
												@endphp
												<tr class="cart_item">
													<td class="product-name">
														{{$product->name_ar}}&nbsp; <span class="product-quantity">× {{$cart->Quantity}}</span>
													</td>
													<td class="product-total">
														<span class="amount">{{App\AdminModel\Product::Price($product->id) * $cart->Quantity}}جنيه</span>
													</td>
												</tr>
												@php
												  $totalall += \App\AdminModel\Product::Price($product->id) * $cart->Quantity;
											    @endphp
											@endforeach
										@else
										@endif
									@endif
									</tbody>
									@if(Auth()->check())

										<tfoot>
										<tr class="cart-subtotal">
											<th>المجموع</th>
											<td><strong class="amount">
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
									@endif											</strong></td>
										</tr>
										<tr class="shipping">
											<th>الشحن</th>
											<td><strong class="amount">								
											 @if($isfreeshipping == 0)	{{App\User::GetFees(Auth()->user()->id)}} @else 0 @endif 
                                            </strong></td>
										</tr>
										@if(App\CouponOrder::where('user_id',Auth()->user()->id)->exists())
											<tr class="discound">
												<th>الخصم</th>
												<td id="discound">
												    <strong>
												   {{   App\CouponOrder::where('user_id',Auth()->user()->id)->first()->discount}} %
													</strong>
												</td>
											</tr>
										@endif
										<tr class="order-total">
											<th>المجموع الكلى</th>
											<td><strong><span class="amount">
									                  @if(Auth()->check())
									                    @php  $fees=  App\User::GetFees(Auth()->user()->id); @endphp
														  @if(App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->count() > 0) 
        							               @php	
            							                $get = App\TotalCart::whereUser_idOrAnonim(Auth()->user()->id,Cookie::get('cart'))->get();
            							                if($isfreeshipping==1){
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
										</tfoot>

									@endif
								</table>

							</div>
							@if($totalall != 0)
							<div class="woocommerce-checkout-payment" id="payment">
								<ul class="payment_methods methods list-none" onclick="chosse()">
								    	<li class="payment_method_cod">
										<input type="radio" data-order_button_text="" value="cash"
											   name="payment" class="input-radio" id="payment_method_cod" onclick="">
										<label for="payment_method_cod">الدفع عند الاستلام	</label>
									</li>
									<li class="payment_method_cheque">
										<input type="radio" data-order_button_text=""
											   value="feza" name="payment" class="input-radio" id="payment_method_cheque">
										<label for="payment_method_cheque">الدفع من خلال الفيزا  	</label>
									</li>
								</ul>
								<div class="form-row place-order" id="cashondeliver" style="display: none;">
                                   <label>العنوان بالتفصيل</label>
                                   <input type="text" required class="form-control address" id="address"  style="width:320px !important;" value="@if(auth()->user()->address != null) {{auth()->user()->address}} @endif">
                                    <labe>رقم الهاتف</labe>
                                    <input required type="text" name="phone" id="phone"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control calculator-input phone" style="width:180px !important;" value=" @if(auth()->user()->phone != null) {{auth()->user()->phone}} @endif">
                                    <label>ملاحظات </label>
                                   <input   type="text" class="form-control" id="note"  style="    margin-bottom: 20px;     width: 250px;height: 60px;">
    
									<button class="btn btn-lg btn-success" onclick="MakeOrder()"> تاكيد الطلب</button>
								</div>
								<div class="row" id="feza" style="display: none;">
									<div class="col-md-6 col-xs-b50 col-md-b0">
										<h4 class="h4 col-xs-b25">تفاصيل الفيزا</h4>
										<p>قريبا</p>
										<!--<form action="{{ route('checkout.store') }}" method="post" id="payment-form">-->
										<!--	{{ csrf_field() }}-->
										<!--	<div class="form-row">-->
										<!--		<label for="card-element">-->
										<!--			Credit or debit card-->
										<!--		</label>-->
										<!--		<div id="card-element">-->
													<!-- A Stripe Element will be inserted here. -->
										<!--		</div>-->
												<!-- Used to display form errors. -->
										<!--		<div id="card-errors" role="alert"></div>-->
										<!--	</div>-->
										<!--	<button class="btn btn-lg btn-success" style="    margin-top: 25px;">تاكيد الطلب</button>-->
										<!--</form>-->
									</div>
								</div >
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<!-- End Content Page -->
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="getmodel" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button"  src="{{url('store')}}" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
		<!-- End Content -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/slider.js')}}"></script>
		<script>
    		function addaddress()
    		{
    		    var quote = '<label>عنوان اخر</label><textarea required class="form-control" id="address"  style="    margin-bottom: 20px; width: 500px; height: 100px;"> </textarea>';
    		    $('#addaddress').append(quote); 
    		}
            function chosse(){
                document.getElementById("cashondeliver").style.display = "none";
                document.getElementById("feza").style.display = "none";
                if (document.getElementById('payment_method_cheque').checked) {
                    document.getElementById("feza").style.display = "block";
                }else{
                    document.getElementById("cashondeliver").style.display = "block";
                }
            };

            function MakeOrder() {
                var address = $('#address').val();
                  var phone = $('#phone').val();
                  var note = $('#note').val();
                  var payment = $('.input-radio').val();
                // di el function 
                if(phone.trim() == "")
                {
                    alert('يجب ادخال رقم الهاتف')
                }
                if( address.trim() == "")
                {
                   alert('يجب ادخال العنوان')

                }
                if( address.trim() != '' && phone.trim() != ''){
                 
                 $.get("{{ url('makeorder') }}?address="+address+'&phone='+phone+'&note='+note+'&payment='+payment, function(data, status) {
                      if(data == 1)
                        {
                           swal({
                                title: "  تم ارسال طلبك بنجاح",
                                text: "   الرجاء متابعة بريدك الإلكترونى",
                                type: "success"
                            }).then(function() {

                                window.location = "{{url('/store')}}";
                            });
                         }else if(data == 3)
                         {
                              swal("يجب ادخال بريدك الإلكترونى الرجاء الذهاب الى حسابك لتعديل بيناتك لإكتمال الطلب  ", {
                        
                                });
                         }
                        else
                        {
                             swal("    كمية المنتج  "+" " + data +" "  + "لا تكفى الرجاء تقليل الكمية لنجاح الطلب", {
                        
                                });
                        }
                    });
                  
                  }
            }
            

		</script>
	
	<script src="https://js.stripe.com/v3/"></script>
		<script>
		  
	(function() {
	   // var stripe = Stripe('pk_test_vEOvOOHeeUa372O3o0Jp4pok');
  'use strict';

  var elements = stripe.elements({
    fonts: [
      {
        cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',
      },
    ],
    // Stripe's examples are localized to specific languages, but if
    // you wish to have Elements automatically detect your user's locale,
    // use `locale: 'auto'` instead.
    locale: window.__exampleLocale
  });

  // Floating labels
  var inputs = document.querySelectorAll('.cell.example.example2 .input');
  Array.prototype.forEach.call(inputs, function(input) {
    input.addEventListener('focus', function() {
      input.classList.add('focused');
    });
    input.addEventListener('blur', function() {
      input.classList.remove('focused');
    });
    input.addEventListener('keyup', function() {
      if (input.value.length === 0) {
        input.classList.add('empty');
      } else {
        input.classList.remove('empty');
      }
    });
  });

  var elementStyles = {
    base: {
      color: '#32325D',
      fontWeight: 500,
      fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
      fontSize: '16px',
      fontSmoothing: 'antialiased',

      '::placeholder': {
        color: '#CFD7DF',
      },
      ':-webkit-autofill': {
        color: '#e39f48',
      },
    },
    invalid: {
      color: '#E25950',

      '::placeholder': {
        color: '#FFCCA5',
      },
    },
  };

  var elementClasses = {
    focus: 'focused',
    empty: 'empty',
    invalid: 'invalid',
  };

  var cardNumber = elements.create('cardNumber', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardNumber.mount('#example2-card-number');

  var cardExpiry = elements.create('cardExpiry', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardExpiry.mount('#example2-card-expiry');

  var cardCvc = elements.create('cardCvc', {
    style: elementStyles,
    classes: elementClasses,
  });
  cardCvc.mount('#example2-card-cvc');

  registerElements([cardNumber, cardExpiry, cardCvc], 'example2');
})();
</script>
@endsection