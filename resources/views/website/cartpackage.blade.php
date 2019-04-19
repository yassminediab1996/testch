@extends('website.app_en')
@section('title')
	checkout
@endsection
@section('content')
	<div id="content">
		<div class="content-page woocommerce">
			<div class="container">
					<div class="col-md-12">
						{{ Session::get('success_message') }}
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
									      $sum = 0;
									    @endphp
									@foreach(explode(',',$getuserpac->products) as $products)
									@php
									  $product = App\AdminModel\Product::find($products);
									@endphp
										<tr class="cart_item">
													<td class="product-name">
														{{$product->name_ar}}&nbsp; <span class="product-quantity">× 1</span>
													</td>
													<td class="product-total">
														<span class="amount">{{App\AdminModel\Product::Price($product->id)}}جنيه</span>
													</td>
												</tr>
												@php
												 $sum +=  App\AdminModel\Product::Price($product->id);
												@endphp
								    @endforeach			
									</tbody>
									@if(Auth()->check())

										<tfoot>
										<tr class="cart-subtotal">
											<th>المجموع</th>
											<td><strong class="amount">
												{{$sum}}
												</strong></td>
										</tr>
										<tr class="shipping">
											<th>الشحن</th>
											<td><strong class="amount">								
											{{App\User::GetFees(Auth()->user()->id)}} 
                                            </strong></td>
										</tr>
											<tr class="discound">
												<th>الخصم</th>
												<td id="discound">
												    <strong>
														{{ $pac->discount }} %
													</strong>
												</td>
											</tr>
										<tr class="order-total">
											<th>المجموع الكلى</th>
											<td><strong><span class="amount">
											  
											      @php
											         $final = 0;
            									     $final = ($sum*$pac->discount)/100;
            									    @endphp
									                {{ ($sum-$final) +  App\User::GetFees(Auth()->user()->id) }}
									    </span></strong> </td>
										</tr>
										</tfoot>

									@endif
								</table>

							</div>
							<div class="woocommerce-checkout-payment" id="payment">
								<ul class="payment_methods methods list-none" onclick="chosse()">

									<li class="payment_method_cheque">
										<input type="radio" data-order_button_text=""
											   value="cheque" name="payment" class="input-radio" id="payment_method_cheque">
										<label for="payment_method_cheque">الدفع من خلال الفيزا  	</label>

									</li>
									<li class="payment_method_cod">
										<input type="radio" data-order_button_text="" value="cod"
											   name="payment" class="input-radio" id="payment_method_cod" onclick="">
										<label for="payment_method_cod">الدفع عند الاستلام	</label>

									</li>

								</ul>
								<div class="form-row place-order" id="cashondeliver" style="display: none;">
                                   <label>العنوان بالتفصيل</label>
                                   <textarea required class="form-control" id="address"  style="    margin-bottom: 20px; width: 500px; height: 100px;">
                                       @if(auth()->user()->address != null) {{auth()->user()->address}} @endif
                                   </textarea>
                                   
                                    <labe>رقم الهاتف</labe>
                                    <input type="text" name="phone" id="phone" class="form-control" style="width:180px !important;" value=" @if(auth()->user()->phone != null) {{auth()->user()->phone}} @endif">
                                    <label>ملاحظات </label>
                                   <textarea required class="form-control" id="note"  style="    margin-bottom: 20px; width: 500px; height: 100px;"></textarea>

   
									<button class="btn btn-lg btn-success" onclick="MakeOrderpackage({{$getuserpac->id}})"> تاكيد الطلب</button>
								</div>
								<div class="row" id="feza" style="display: none;">
									<div class="col-md-6 col-xs-b50 col-md-b0">
										<h4 class="h4 col-xs-b25">تفاصيل الفيزا</h4>
										<form action="{{ route('checkoutpackage.store') }}" method="post" id="payment-form">
											{{ csrf_field() }}
											<div class="form-row">
												<label for="card-element">
													Credit or debit card
												</label>
												<div id="card-element">
													<!-- A Stripe Element will be inserted here. -->
												</div>

												<!-- Used to display form errors. -->
												<div id="card-errors" role="alert"></div>
											</div>

											<button class="btn btn-lg btn-success" style="    margin-top: 25px;">تاكيد الطلب</button>

										</form>
									</div>
								</div >
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Content Page -->
		</div>
		<!-- End Content -->


		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

            function MakeOrderpackage(id) {
                console.log(id)
                  var address = $('#address').val();
                    var phone = $('#phone').val();
                      var note = $('#note').val();
                  console.log(address);
                 $.get("{{ url('makeorderpackage') }}?address="+address+'&phone='+phone+'&note='+note+'&id='+id, function(data, status) {
                    if(data != 1)
                    {
                        console.log(data)
                        alert('كميه النتج ' +data + 'لا تكفى الرجاء تقليل الكميه لنجاح الطلب ')
                        location.reload();

                    }if(data == 1)
                    {
                        alert('تم ارسال الطلب بنجاح الرجاء متابعه الطلب')
                        window.location = "http://www.chefaa.com/store";
                    }
                });

            }
		</script>
		<script src="https://js.stripe.com/v3/"></script>
		<script>
            (function(){
                // Create a Stripe client.
                var stripe = Stripe('pk_test_vEOvOOHeeUa372O3o0Jp4pok');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };

// Create an instance of the card Element.
                var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

// Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });

// Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server.
                            stripeTokenHandler(result.token);
                        }
                    });
                });

// Submit the form with the token ID.
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            })();
		</script>
@endsection