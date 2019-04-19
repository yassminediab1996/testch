@extends('admin.layouts.app_en')
@section('title')
	all Contact
@endsection
@section('content')
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
	<style>
		select{
			Font-family: 'FontAwesome';
		}
	</style>
				
<!-- row -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="flexbox padd-10 bb-1">
				<h4 class="mb-0">Contact Lists</h4>
			</div>
			@if($getall->count() >0)
			<div class="card-body">
				<div class="table-responsive">
					<table id="data-table-advance" class="table table-lg table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Name </th>
								<th>Phone </th>
								<th>Email</th>
								<th>Message</th>
								<th>Date Created</th>
								<th>status</th>
								<th>chng status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
						@php
							$i = 1;
						@endphp
						@foreach($getall as $cat)
							<tr>
                            @php 
                              $contact = App\ContactUs::find($cat->content_id);
                            @endphp
								<td>{{$i++}}</td>
								<td>{{$contact->name}}</td>
								<td>{{$contact->phone}}</td>
								<td>{{$contact->email}}</td>
								<td>{{$contact->message}}</td>
								<td>{{$cat->created_at}}</td>
								 <td>
                                          @if($cat->state == 1)<div class="label cl-warning bg-warning-light">Open</div>
                                            @elseif( $cat->state == 2)<div class="label cl-warning bg-warning-light">Assign</div>
                                              @elseif( $cat->state == 3)<div class="label cl-warning bg-warning-light">In Progress</div>
                                                 @elseif($cat->state == 4)<div class="label cl-success bg-success-light">Pendding</div>
                                                   @elseif($cat->state == 5)<div class="label cl-danger bg-danger-light">Solved</div>
                                                     @elseif($cat->state == 6)<div class="label cl-danger bg-danger-light">Closed</div>
                                      @endif
                                </td>
                                <td>
                                        <select class="form-control" style="width: 40%;" style=" border-style: solid !important; border-color: red !important;" onchange="changstat(this.value,{{$cat->id}});">
   
                                            <option value="1"  @if($cat->state == 1) selected @endif>Open</option>
                                            <option value="2"  @if($cat->state == 2) selected @endif>Assign</option>
                                            <option value="3"  @if($cat->state == 3) selected @endif>In Progress</option>
                                            <option value="4"  @if($cat->state == 4) selected @endif>Pendding</option>
                                            <option value="5"  @if($cat->state == 5) selected @endif>Solved</option>
                                            <option value="6"  @if($cat->state == 6) selected @endif>Closed</option>
                                        </select>
                                   </td>
								<td>
									
									<a href="#" class="" onclick="addcomment({{$cat->content_id}})"  title="add comment" data-toggle="tooltip" ><i class="ti-comment"></i></a>
							    	<a href="#" onclick="viewcomment({{$cat->content_id}})" title="view comment" data-toggle="tooltip" ><i class="ti-comment-alt"></i></a>

								</td>
							</tr>

							    @endforeach
						@php
							$i++;
						@endphp
						</tbody>
					</table>

				</div>
			</div>
			@endif
		</div>
	</div>
</div>
 <script>
      function changstat(id,con)
      {
           var id = id ;
        $.get("{{ url('17$es12/contact/changstat') }}?id="+id+"&con="+con, function(data, status) {
            location.reload();
        });
      }
      
      function addcomment(id)
      {
            $("#id").val(id);
            $("#addcomment").modal();
        
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








<div id="remove_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Confirm action</h5>
			</div>

			<div class="modal-body">
				You are about to delete this line. Are you sure?
				<input type="hidden" id="id_cat_del" class="form-control" value="">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
			</div>
		</div>
	</div>
</div>
<!-- /remove modal -->

<!-- /.content-wrapper-->
<div class="add-popup modal fade" id="addcomment" tabindex="-1" role="dialog" aria-labelledby="addproduct">
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
                                <h4 class="modal-title">Add comment</h4>
                                <div class="user-avatar-wrapper">
                                  
                                </div>
                            </div>
                            <form action="{{url('17$es12/contact/addcomment')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                 <input type="hidden" name="id" id="id">
                                    <div class="modal-body">
                                  <div class="form-group">
                					<label class="control-label">Comment</label>
                					<div class="input-group">
                						<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                						<input type="text" name="comment" class="form-control no-bl" value="" required>
                					</div>
                				</div>
                                </div>
                                <div class="modal-footer">
                
                                    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="btn gredient-btn" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection

			
