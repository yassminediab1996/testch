
@extends('admin.layouts.app_en')
@section('title')
	Invoice
@endsection
@section('content')	 
@php
$discound = 0;
@endphp
			<div class="container-fluid">
			
				<!-- Title & Breadcrumbs-->
				<div class="row page-titles">
					<div class="col-md-12 align-self-center">
						<h4 class="theme-cl">Invoice Detail</h4>
					</div>
				</div>
				<!-- Title & Breadcrumbs-->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="detail-wrapper padd-top-30 padd-bot-30">
							
								<div class="row text-center">
									<div class="col-md-12">
										<a href="javascript:window.print()" class="btn theme-btn">Print this invoice</a>
									</div>
								</div>
								
								<div class="row mrg-0">
									<div class="col-md-6">
										<div id="logo">
									
										    <img src="https://chefaa.com/images/final%20site%20logo.png"
                                 style="width:100%; max-width:200px;"  class="img-responsive">
										    </div>
									</div>

									<div class="col-md-6">	
										<p id="invoice-info">
											<strong>Order:</strong> #{{$getproducts[0]->order->numbers}} <br>
											<strong>Issued:</strong>{{$getproducts[0]->created_at}} <br>
											Due 7 days from date of issue
										</p>
									</div>
									
								</div>
								
								<div class="row  mrg-0 detail-invoice">
								
									<div class="col-md-12">
										<h2>INVOICE</h2>
									</div>
									
									<div class="col-md-12">
										<div class="row">
										 
										  <div class="col-lg-5 col-md-5 col-sm-5">
											<h4>Client Contact :</h4>
											<p>
											name	: {{$getproducts[0]->order->user->name}}<br />
												
									        email			: {{$getproducts[0]->order->user->email}}<br />
												
										address	 : {{$getproducts[0]->order->address}}
												<br /> 
											</p>
										  </div>
										</div>
									</div>
									<hr />
									
									<div class="col-12 col-md-12">
										<strong>ITEM DESCRIPTION & DETAILS :</strong>
									</div>
									<hr>
									
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="invoice-table">
											<div class="table-responsive">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th>S. No.</th>
															<th>product</th>
															<th>price</th>
															<th>quantity</th>
														</tr>
													</thead>
													<tbody>
													     @foreach($getproducts as $prod)
														<tr>
															<td>1</td>
															<td>{{$prod->product->name_ar}}</td>
															<td>{{\App\AdminModel\Product::Price($prod->product->id)}} جنيه</td>
															<td>{{$prod->qty}}</td>
														</tr>
                                                 @php
                                                           $isfreeshipping = 0;
                                                          	$product = App\AdminModel\Product::find($prod->product->id);
                                                                if($product->checkfree == 0) {
                                                                    $isfreeshipping=0;
                                                                }else{
                                                                   $isfreeshipping = 1;
                                                                }
                                                                
                                                        @endphp
                                                        @endforeach
                                                        @php
                                                        if($isfreeshipping == 0)
                                                         $fees = $getproducts[0]->order->user->GetFees($getproducts[0]->order->user->id);
                                                         else
                                                           $fees = 0;
                                                        @endphp
        </tbody>
												</table>
											</div>
											<hr>
											<div>
												<h5>Total : {{$getproducts[0]->order->total}} </h5>
											</div>
											<hr>
											<div>
											    @php
											    @endphp
												<h5>Taxes :  {{$fees}}  </h5>
											</div>
												<div>
											    @php
											    @endphp
												<h5>discound :   @if($getproducts[0]->order->discount != null) {{$discound = $getproducts[0]->order->discount }} % @else 0 @endif </h5>
											</div>
											<hr>
											<div>
											    @php
											      $dis =  ($getproducts[0]->order->total *($discound/100));
											      $finalto = $getproducts[0]->order->total - $dis;
											    @endphp
											    @if($getproducts[0]->order->discount != null)
											     	<h4>Bill Amount : {{$finalto  + $fees }} جنيه </h4>

											    @else
											    	<h4>Bill Amount : {{$getproducts[0]->order->total  + $fees + $discound}} جنيه </h4>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>  
			<!-- /.content-wrapper-->
@endsection	  
	  
	
