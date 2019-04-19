@extends('admin.layouts.app_en')
@section('title')
	Contact
@endsection
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@php
$permission_list = array();
$id = null;
$getadmin = array();
@endphp
@if (auth()->guard('admin')->check()) 
   
   @foreach(App\AdminModel\Admin::where('permission', 20)->get() as $ad)
      @php
       $permission_list[] = $ad; 
      @endphp
   
   @endforeach
@endif
@php
 $getcontact = App\ContactUs::all(); 
@endphp
@include('website.notfi')
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
    					<div class="label cl-success bg-success-light">@if($cat->type_id == 1) Contact @elseif($cat->type_id == 2 ) Store Contact @endif </div>
    							<div class="contact-img">
    								<img src="http://via.placeholder.com/180x180" class="img-circle img-responsive" alt="">
    							</div>
    							
    							<div class="contact-caption">
    						    	name :	<h4>{{$cat->name}}</h4>
    						    	<br>
    								email :<span>{{$cat->email}}</span>
    								<br>
    								phone :<span>{{$cat->phone}}</span>
    								<br>
    								message :<span>{{substr($cat->message , 0,50)}}</span>
    								<br>
    								type : <span>@if($cat->user_type == 1) user @elseif($cat->user_type == 2) pharmacy @elseif($cat->user_type == 3) company @endif</span>
                                    <br>
                                   @if(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->exists())
                                     @php $custid = App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first();  @endphp
                                          <div class="label cl-danger bg-danger-light"> 
                                             {{App\AdminModel\Admin::find($custid->customer_id)->name}}
                                    
                                          </div>
                                     <br>
                                     view assign: <a href="#" class="viewassign"  onclick="viewassign({{$cat->id}} , {{$custid->customer_id}})" title="viewassign" data-toggle="tooltip"><i class="fas fa-low-vision"></i></a>
                                     <br>
                                   <h3 style="color:green; display:inline-block;">state : </h3> @if(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 1) 
                                   open @elseif(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 2) assign  @elseif(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 3) inprogrss @elseif(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 4) pendding @elseif(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 5) solved @elseif(App\AdminModel\ContactCustomer::where('content_id',$cat->id)->first()->state == 6) closed @endif    
                                   @else 
                                  add assign : <a href="#" class="assign"  onclick="assign({{$cat->id}})" title="assign" data-toggle="tooltip"><i class="fas fa-plus"></i></a> 
                                   @endif
                                   <br>
                                  comments: <a href="#" class="viewcomment"  onclick="viewcomment({{$cat->id}})" title="viewcomment" data-toggle="tooltip"><i class="fas fa-low-vision"></i></a>

    							</div>
    							
    						
    							
    						</div>
    					</div>
    					
    					@endforeach
					@endif
				</div>
				<!-- End All Contact List -->
				<script>
				$(document).ready(function(){
				});
				 function delCat(id){
                    $("#id_city_del").val(id);
                    $("#remove_modal").modal();
                }
            
                function Delete() {
                    var id    = $("#id_city_del").val();
            
            
                    $.get("{{ url('17$es12/contact/delete') }}?id="+id, function(data, status){
                        location.reload();
                        swal({
                            position: 'top-center',
                            type: 'success',
                            title: 'deleted successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
            
            
                    });
                }
				 function viewassign(id , customer)
                      {
                           $("#id_viewassign").val(id);
                             $("#customer").val(customer);
                           
                            
                             jQuery('#viewassign_modal').modal('show', {backdrop: 'true'});
                                  $.ajax({
                                     type: "GET",
                                     url: 'contact/getform/'  ,
                                     dataType: "html",
                                     data: {
                                         id :id,
                                         customer : customer
                                     },
                                    success: function (response) {
                                        jQuery('#viewassign_modal #getform').html(response);
                                    },
                                    error: function (e) {
                                    }
                                });
                      }
		    		function assign(id)
                      {
                          $("#id_assign").val(id);
                          $("#assign_modal").modal(); 
                      }
                       function viewcomment(id)
                          {
                            
                            jQuery('#viewcomment').modal('show', {backdrop: 'true'});
                                  $.ajax({
                                     type: "GET",
                                     url: '/17$es12/contact/viewcomment'  ,
                                     dataType: "html",
                                     data: {
                                         id :id,
                                     },
                                    success: function (response) {
                                        jQuery('#viewcomment #viewcomments').html(response);
                                    },
                                    error: function (e) {
                                    }
                                });
                            
                          }
				</script>
	<div class="add-popup modal fade" id="viewcomment" tabindex="-1" role="dialog" aria-labelledby="editproduct">
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
				<h4 class="modal-title">View Comments</h4>
				
			</div>
			<div id="viewcomments"></div>
		</div>
	</div>
</div>
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
		          <!-- Add Product Popup -->
                <div class="add-popup modal fade" id="assign_modal" tabindex="-1" role="dialog" aria-labelledby="addproduct">
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
                                <h4 class="modal-title">Assign Pharmacy</h4>
                                <div class="user-avatar-wrapper">
                                  
                                </div>
                            </div>
                            <form action="{{url('17$es12/contact/assign')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="modal-body">
                                    <input type="hidden" name="content_id" id="id_assign">
                                   <select class="form-control" name="customer_id">
                                       @foreach($permission_list  as $perm)
                                      
                                         <option value="{{$perm->id}}">{{ $perm->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="modal-footer">
                
                                    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="btn gredient-btn" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Remove modal -->
<div id="remove_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title">Confirm action</h5>
            </div>

            <div class="modal-body">
                You are about to delete this line. Are you sure?
                <input type="hidden" id="id_city_del" class="form-control" value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
            </div>
        </div>
    </div>
</div>
<!-- /remove modal -->
                
                <!-- Add Product Popup -->
                <div class="add-popup modal fade" id="viewassign_modal" tabindex="-1" role="dialog" aria-labelledby="addproduct">
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
                                <h4 class="modal-title">Assign Customer Service</h4>
                                <div class="user-avatar-wrapper">
                                  
                                </div>
                            </div>
                            <div id="getform"></div>
                            
                        </div>
                    </div>
                </div>
			</div>  
		
@endsection