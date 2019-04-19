@extends('admin.layouts.app_en')
@section('title')
	Quick Contact
@endsection
@section('content')
@php
 $getcontact = App\Quickform::all(); 
@endphp

			<div class="container-fluid">
			
				
				<!-- All Contact List -->	
				<div class="row">
					@if($getcontact->count() >0)
					<!-- Single Contact List -->
    						@php
							$i = 1;
						@endphp
						@foreach($getcontact as $cat)
    					<div class="col-md-4 col-sm-6 mb-4">
    						<div class="contact-box">
    						
    							<div class="contact-img">
    								<img src="http://via.placeholder.com/180x180" class="img-circle img-responsive" alt="">
    							</div>
    							
    							<div class="contact-caption">
    							name :	<h4>{{$cat->name}}</h4>
    							<br>
    								email :<span>{{$cat->email}}</span>
    								<br>
    							
    								message :<span>{{$cat->message}}</span>
    								<br>

    							</div>
    							
    						
    							
    						</div>
    					</div>
    					
    					@endforeach
					@endif
				</div>
				<!-- End All Contact List -->
			
				<!-- Add Contact Popup -->
				<div class="add-popup modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="addcontact">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header gredient-bg">
								<ul class="card-actions icons right-top">
									<li>
										<a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
											<i class="ti-close"></i>
										</a>
									</li>
								</ul>
								<h4 class="modal-title">New Contact</h4>
								<div class="user-avatar-wrapper">
									<figure>
										<div class="icon-upload">
											<label for="file-input">
												<span class="edit-avatar">
													<span class="no-avatar app_primary_lighten_bg animated zoomIn"></span>
												</span>
											</label>
											<input id="file-input" type="file">
										</div>
									</figure>
								</div>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label">Full Name</label>
									<div class="input-group">
										<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
										<input type="text" class="form-control no-bl" id="add_name" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Email Address</label>
									<div class="input-group">
										<span class="input-group-addon br br-light no-br"><i class="ti-email"></i></span>
										<input type="email" class="form-control no-bl" id="add_email" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Phone Number</label>
									<div class="input-group">
										<span class="input-group-addon br br-light no-br"><i class="ti-mobile"></i></span>
										<input type="text" class="form-control no-bl" id="add_phone" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Location</label>
									<div class="input-group">
										<span class="input-group-addon br br-light no-br"><i class="ti-location-pin"></i></span>
										<input type="text" class="form-control no-bl" id="add_address">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-default btn-flat pull-left">Delete</button>
								<button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
								<button class="btn gredient-btn">Save</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Add Contact Popup -->
		
			</div>  
		
@endsection