@extends('admin.layouts.app_en')
@section('title')
	Monthly
@endsection
@section('content')
@php
$permission_list = array();
$id = null;
@endphp
@if (auth()->guard('admin')->check()) 
   @php 
   $permission_list = json_decode(auth()->guard('admin')->user()->permission); 
   	        
   @endphp
 @if ($permission_list == 0)
   	  @else
       @php    $email = auth()->guard('admin')->user()->email;
           $id = App\AdminModel\Partner::where('email' , $email)->first()->id;
        @endphp   
    @endif
@endif

<style>
    .in{
        height: 28px;
    padding: 5px 10px;
    font-size: 13px;
    }
    .modal-header {
    background: #279a41;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<div id="prescription" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #28a745;">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="float: right;">data of monthly subscription   </h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<style>
		select{
			Font-family: 'FontAwesome';
		}
	</style>
	<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  float: right;
    height: 100%;
    display: none;
    position: absolute;
    z-index: 1;
    top: 250;
    right: 0;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    width: 400px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  width: 400px !imporatnt;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;    }
  .sidenav a {font-size: 18px;}
}
</style>
          <div id="mySidenav" class="sidenav" style=" background-color:white;    width: 400px; !important">
              <a href="javascript:void(0)" class="closebtn" style="color:black !important;" onclick="closeNav()">&times;</a>
              <div id="get_details"></div>
          </div>		
<!-- row -->
<div class="row" id="all">
	<div class="col-md-12">
		<div class="card">
			<div class="flexbox padd-10 bb-1">
		  @if ($permission_list == 19)
			<h4 class="mb-0">Monthly Lists</h4>
                <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add patient">
                    Add patient
                </a>
          @elseif($permission_list == 0)    
                 <a href="{{url('17$es12/monthly/rejected_monthly')}}" class="btn btn-danger"  title="Rejected order">
                    Rejected order
                </a>
                
                 <a href="{{url('17$es12/monthly/cancel_monthly')}}" class="btn btn-primary"  title="Canceled order" >

                    Canceled order 
                </a>
                
                  <a href="{{url('17$es12/monthly/undone_monthly')}}" class="btn btn-primary"  title="Undone order" >

                    Undone order 
                </a>
                <div class="clearfix"></div>
                 <a href="{{url('17$es12/monthly/')}}" class="btn btn-success"  title="all order" style="    margin-right: 60%;">

                    All orders 
                </a>
          @endif        
			</div>
			@include('website.notfi')
			@if($getmon->count() >0)
			<div class="card-body">
				<div class="table-responsive">
					<table id="data-table-advance" class="table table-lg table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Name </th>
								<!--<th>Email</th>-->
								<th>Address</th>
								<th>phone</th>
								<!--<th>date</th>-->
                                <th>Delivery Date</th>
								<th>countdown</th>
								<!--<th>type</th>-->
								 
								<th>Status</th>
								<th>Date Created</th>
								<th>Updated at</th>
								<th>Pharmacy name</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
						@php
							$i = 1;
						
						@endphp
							 @if($permission_list == 0) 
						<!--<tr>-->
						<!--    <form action="{{url('17$es12/monthly/')}}" method="get">-->
						<!--      <td><input class="form-control in" type="number" name="id"></td>-->
						<!--      <td><input class="form-control in" type="text" name="name"></td>-->
						      <!--<td></td>-->
						<!--      <td><input class="form-control in" type="text" name="address"></td>-->
						<!--      <td><input class="form-control in" type="number" name="phone"></td>-->
						        <!--<td><input class="form-control in" type="date" placeholder="from" name="d1" style="    width: 140px;"><input class="form-control in" placeholder="to" type="date" name="d2" style="    width: 140px;"></td>-->

						<!--      <td></td>-->
						<!--      <td></td>-->
						      <!--<td></td>-->

						<!--       <td><input class="form-control in" type="date"placeholder="from" name="d3" style="    width: 140px;"><input placeholder="to" class="form-control in" type="date" name="d4" style="    width: 140px;"></td>-->
                               
						<!--          <td style="display:inline">-->
      <!--                                  <a href=""  > <button class="btn btn-md" style="margin-top: 20px; color: white;background-color: #a48334;">Search</button></a>-->
      <!--                           </td> -->
                                 
						<!--    </form>-->
						<!--</tr>-->
						@endif
						@foreach($getmon as $cat)
					        
							<tr>
                         	
						    	<td onclick="getformmounth({{$cat->id}})">{{$i++}}</td>
								<td onclick="getformmounth({{$cat->id}})">{{$cat->name}}</td>
								<!--<td onclick="getformmounth({{$cat->id}})">{{$cat->email}}</td>-->
								<td onclick="getformmounth({{$cat->id}})">{{$cat->address}}</td>
								<td onclick="getformmounth({{$cat->id}})">{{$cat->phone}}</td>
								<!--<td onclick="getformmounth({{$cat->id}})">{{$cat->date}}</td>-->
								@php
								     $time = strtotime($cat->date);
   								     $count = date("m", $time) - date('m'); // get diff in month
                                     if ($count < 1){
                                        $final = date("Y-m-d", strtotime("+".($count*-1)." month", $time));
                                     }else{
                                      $final = date("Y-m-d",$time);
                                     }
    								 $now = DateTime::createFromFormat('Y-m-d', date('Y-m-d')); 
                                     $dateToCompare = DateTime::createFromFormat('Y-m-d', $final); //match format of db datetime
                                     $diff = $now->diff($dateToCompare);
                                    
								@endphp
								<td>{{$final}}</td>
								<td onclick="getformmounth({{$cat->id}})">{{$diff->format("-%a")}}</td>
								<!--<td onclick="getformmounth({{$cat->id}})">@if($cat->type_id == null) <div class="label cl-success bg-success-light">website </div> @elseif($cat->type_id != null) <div class="label cl-warning bg-warning-light">{{App\AdminModel\Partner::find($cat->type_id)->name}} </div>@endif</td>-->
								<!--<td onclick="getformmounth({{$cat->id}})"><a ><img src="{{asset('uploads/files/'.$cat->img)}}" class="avatar" alt="Avatar"></a></td>-->
							   @if($cat->assign == 1)
    							    @php $monthly = App\AdminModel\PharmMon::where('mon_id' , $cat->id)->first(); @endphp
    								<td>
    								      @if($monthly->state == 0)<div class="label cl-warning bg-warning-light"> not confirmed from pharmacy</div>
        								      @elseif($monthly->state == 1)<div class="label cl-warning bg-warning-light">  confirmed</div>
        								      @elseif($monthly->state == 2)<div class="label cl-warning bg-warning-light">  preparing</div>
        								      @elseif($monthly->state == 3)<div class="label cl-warning bg-warning-light">  delivered</div>
        								      @elseif($monthly->state == 4)<div class="label cl-warning bg-warning-light">  done</div>
        								      @elseif($monthly->state == 5)<div class="label cl-warning bg-warning-light">  rejected</div>
        								      @elseif($monthly->state == 6)<div class="label cl-warning bg-warning-light">  undone</div>
    								      @endif
    								</td>
    								@elseif($cat->assign == 3)
    								<td><div class="label cl-warning bg-warning-light">  open</div></td>
    							
    								@elseif($cat->assign == 0)
    								<td><div class="label cl-warning bg-warning-light">  watting confirm from customer</div></td>
							
								@endif
								
								<td onclick="getformmounth({{$cat->id}})">{{$cat->created_at}}</td>
								<td onclick="getformmounth({{$cat->id}})">{{$cat->updated_at}}</td>
								
								@if(App\AdminModel\PharmMon::where('mon_id' , $cat->id)->exists())
    								@php
    								  $getphar = App\AdminModel\PharmMon::where('mon_id' , $cat->id)->first();
    								  $phar = App\AdminModel\Map::find($getphar->parmact);
    								@endphp
								
								<td>{{$phar->name}}</td>
								@else
								<td><div class="label cl-warning bg-warning-light">  watting</div></td> 
								@endif
							     <td>
                               		<a href="#" class="settings"  onclick="ShowEdit({{$cat->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
							        <!--<a href="#" class="delete"  onclick="delCat({{$cat->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>-->
							        @if($cat->assign == 1)
							          @if($getphar->state == 5)
							           <a href="#" class="feedback"  onclick="reasoncancelation({{$cat->id}})" title="reasoncancelation" data-toggle="tooltip"><i class="ti-comment"></i></a>
							          @elseif($getphar->state == 6)
							           <a href="#" class="feedback"  onclick="undone({{$cat->id}})" title="reasonundone" data-toggle="tooltip"><i class="ti-comment"></i></a>
							          @else
							          <a href="#" class="feedback"  onclick="feedback({{$cat->id}})" title="Feedback" data-toggle="tooltip"><i class="ti-comment"></i></a>
							         @endif
								    @endif
									 @if($permission_list == 0)  
									    
									      @if($cat->assign == 0)  
									      <a href="#" class="call"  onclick="call({{$cat->id}})" title="call" data-toggle="tooltip"><i class="fas fa-phone"></i></a>
                                          @elseif($cat->assign == 3)
									      <a href="#" class="assign"  onclick="assign({{$cat->id}})" title="assign" data-toggle="tooltip"><i class="fas fa-plus"></i></a>
                                          @elseif($cat->assign == 4)
                                          <div class="label cl-warning bg-warning-light">Rejected </div>
									      @elseif($cat->assign == 1) 
									      <a href="#" class="viewassign"  onclick="viewassign({{$cat->id}} , {{$getphar->parmact}})" title="viewassign" data-toggle="tooltip"><i class="fas fa-low-vision"></i></a>
									      @endif
									 @endif   
								
                               <a href="#" onclick="openNav({{$cat->id}})" style="float:right;margin-top: 20px;">
                                  <button class="btn btn-success btn-md">details</button>
                               </a>
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
<!-- /.row -->
    <script type="text/javascript">
      $( document ).ready(function() {
       
    });
    function openNav(id) {
        document.getElementById("mySidenav").style.width = "500px";
        document.getElementById("mySidenav").style.display = "block";
        document.getElementById("all").style.width = "60%";
        $.get("{{ url('17$es12/monthly/get_details_mon') }}?id="+id, function(data, status) {
            $( "#get_details" ).empty();
            $( "#get_details" ).append(data);
        });
        
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("all").style.width = "97%";

    }
</script>
    <script>
    function  ShowEdit(id) {
      $.get("{{ url('17$es12/monthly/Getinfo') }}?id="+id, function(data, status){
          console.log(data)
          $("#id").val(id);
          $("#name").val(data.name);
          $("#email").val(data.email);
          $("#address").val(data.address);
          $("#phone").val(data.phone);
          $("#date").val(data.date);
          $("#editproduct").modal();
      });
  }
    function assign(id)
    {
      $("#id_assign").val(id);
      $("#assign_modal").modal(); 
    }
    function feedback(id){
         $.get("{{ url('17$es12/monthly/getfeedback') }}?id="+id, function(data, status){
             $('#get_feedback').empty();
             $('#get_feedback').append(data);
             $("#feedback_model").modal();
         });
    }
    
     function undone(id){
         $.get("{{ url('17$es12/monthly/getresoneundone') }}?id="+id, function(data, status){
             $('#get_undone').empty();
             $('#get_undone').append(data);
             $("#undone_model").modal();
         });
    }
     function reasoncancelation(id){
         $.get("{{ url('17$es12/monthly/getresone') }}?id="+id, function(data, status){
             $('#get_cancel').empty();
             $('#get_cancel').append(data);
             $("#cancel_model").modal();
         });
    }
    function call(id)
    {
      $("#id_call").val(id);
      
      $("#call_modal").modal(); 
  }
    function viewassign(id , phar)
    {
       $("#id_viewassign").val(id);
         $("#phar").val(phar);
       
        
         jQuery('#viewassign_modal').modal('show', {backdrop: 'true'});
              $.ajax({
                 type: "GET",
                 url: 'monthly/getform/'  ,
                 dataType: "html",
                 data: {
                     id :id,
                     phar : phar
                 },
                success: function (response) {
                    jQuery('#viewassign_modal #getform').html(response);
                },
                error: function (e) {
                }
            });
  }
    function delCat(id){
      $("#id_cat_del").val(id);
      $("#remove_modal").modal();
  }
    function Delete() {
      var id    = $("#id_cat_del").val();


      $.get("{{ url('17$es12/monthly/delete') }}?id="+id, function(data, status){
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
    function getformmounth(id)
    {
         jQuery('#prescription').modal('show', {backdrop: 'true'});
              $.ajax({
                 type: "GET",
                 url: 'getformmounth',
                 dataType: "html",
                 data: {
                     id:id
                 },
                success: function (response) {
                    console.log(response)
                    jQuery('#prescription .modal-body').html(response);
                },
                error: function (e) {
                }
            });
    }
    function confirmed()
    {
          var call_id_get = $("#id_call").val();
           $.get("{{ url('17$es12/monthly/confirm') }}?id="+call_id_get, function(data, status){
            // location.reload();
            console.log(data);
            //   swal({
            //       position: 'top-center',
            //       type: 'success',
            //       title: 'confirm call successfully',
            //       showConfirmButton: false,
            //       timer: 1500
            //   });
            // $('#call_modal').modal('hide')
            $("#id_assign").val(data);
            $("#assign_modal").modal(); 

      });  
    }
    function rejected()
    {
          var call_id_get = $("#id_call").val();
        
           $.get("{{ url('17$es12/monthly/rejected') }}?id="+call_id_get, function(data, status){
        location.reload();
          swal({
              position: 'top-center',
              type: 'success',
              title: 'confirm rejected successfully',
              showConfirmButton: false,
              timer: 1500
          });


      }); 
        
    }
</script>

</div>
<!-- Add Product Popup -->
<div class="add-popup modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproduct">
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
                <h4 class="modal-title">Add patient</h4>
                <div class="user-avatar-wrapper">
                  
                </div>
            </div>
            <form action="{{url('17$es12/patient/add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">patient Name  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name"  class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">patient Email </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="email" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                   

                     <div class="form-group">
                        <label class="control-label">patient address  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    <input type="hidden" name="type_id" value="{{$id}}">
                      <div class="form-group">
                        <label class="control-label">patient Phone </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="phone"  class="form-control no-bl" value="" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label">patient Date </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="date" name="date"  class="form-control no-bl" value="" required>
                        </div>
                    </div>
                <div class="form-group">
					<label class="control-label">image</label>
					<div class="input-group">
						<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>

						<input required type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
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
<div class="add-popup modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="editproduct">
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
				<h4 class="modal-title">Edit Monthly subscription</h4>
				<div class="user-avatar-wrapper">
					
				</div>
			</div>
			<form action="{{url('17$es12/monthly/update')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}

				<div class="modal-body">
					<div class="form-group">
						<label class="control-label"> Name  </label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
							<input type="text" name="name" id="name" class="form-control no-bl" value="" >

						</div>
					</div>
					<div class="form-group">
						<label class="control-label"> Email  </label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
							<input type="email" name="email" id="email" class="form-control no-bl" value="" >

						</div>
					</div>
                        <input type="hidden" name="id" id="id">
					<div class="form-group">
						<label class="control-label">phone</label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
							<input type="number" name="phone" id="phone"class="form-control no-bl" value="" >
						</div>
					</div>
				
                	<div class="form-group">
						<label class="control-label">address</label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
							<input type="text" name="address" id="address"class="form-control no-bl" value="" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">date</label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
							<input type="date" name="date" id="date"class="form-control no-bl" value="" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label">image</label>
						<div class="input-group">
							<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>

							<input  type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
						</div>
					</div>

				</div>
				<div class="modal-footer">

					<button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
					<button class="btn gredient-btn" type="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.content-wrapper-->
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
            <form action="{{url('17$es12/monthly/assign')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                    <input type="hidden" name="mon_id" id="id_assign">
                   <select class="form-control" name="parmact">
                       @foreach(App\AdminModel\Map::all()  as $map)
                         <option value="{{$map->id}}">{{$map->name}}</option>
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
                <h4 class="modal-title">Assign Pharmacy</h4>
                <div class="user-avatar-wrapper">
                  
                </div>
            </div>
            <div id="getform"></div>
            
        </div>
    </div>
</div>
<!-- Add Product Popup -->
<div class="add-popup modal fade" id="call_modal" tabindex="-1" role="dialog" aria-labelledby="addproduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header gredient-bg" style="    background: #ffff;">
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </a>
                    </li>
                </ul>
                <h4 class="modal-title"> </h4>
                <div class="user-avatar-wrapper">
                  
                </div>
            </div>
            <div class="row">
                <h4></h4>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin: auto;">
                     <input type="hidden"  id="id_call">
                     <button class="btn btn-success btn-md" onclick="confirmed()">Confirmed</button>
                     <button class="btn btn-danger btn-md" onclick="rejected()">Rejected</button>

                </div>
            </div>
             <div class="row">
                <h4></h4>
            </div>
           
        </div>
    </div>
</div>

<!-- Feedback modal -->
<div id="feedback_model" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Feedback</h5>
			</div>

			<div class="modal-body">
			    <div id="get_feedback"></div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
			</div>
		</div>
	</div>
</div>

<!-- Feedback modal -->
<div id="undone_model" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">undone</h5>
			</div>

			<div class="modal-body">
			    <div id="get_undone"></div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
			</div>
		</div>
	</div>
</div>

<!-- Feedback modal -->
<div id="cancel_model" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">cancel</h5>
			</div>

			<div class="modal-body">
			    <div id="get_cancel"></div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
			</div>
		</div>
	</div>
</div>
@endsection

			
