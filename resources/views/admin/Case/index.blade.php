@extends('admin.layouts.app_en')
@section('title')
    Case
@endsection
@section('style')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Cases Lists</h4>
                    <!--<a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add Offers">-->
                    <!--    Add Case-->
                    <!--</a>-->
                </div>
                  @include('website.notfi')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Person</th>
                                <th>Name Of Case</th>
                                <th>Description Of Case</th>
                                <th>Image of Prescription</th>
                                <th>Current Amount</th>
                                <th>Case Amount</th>
                                <th>Current </th>
                                <th>charity</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($cases as $case)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$case->persone}}</td>
                                    <td>{{$case->name}}</td>
                                    <td>{!! $case->description !!}</td>
							       	<td><a href="#"><img src="{{asset('uploads/files/'.$case->img)}}" class="avatar" alt="Avatar"></a></td>
                                    <td>{{$case->amount}}</td>
                                    <td>{{$case->max_amount}}</td>
                                    @php
                                     $sub = ((int)$case->amount / (int)$case->max_amount)*100;
                                    @endphp
									 <td> <input type="text" class="knob" value="{{$sub}}" data-width="90" data-height="90" data-fgColor="#00c0ef"></td>
									</div>
									<td>{{App\User::find($case->charity_id)->name}}</td>

                                    <td>{{$case->created_at}}</td>
                                    <td>
                                        <a href="#" class="settings"  onclick="ShowEdit({{$case->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                        <a href="#" class="delete"  onclick="delCat({{$case->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                        <a href="{{url('17$es12/case/usercase/'.$case->id)}}" class="" title="viewuser" ><i class="material-icons" style="    color: #35d85e;">search</i></a>
                                          @if($case->approval == 0)
                                        <button  class="btn btn-success btn-md" onclick="approvecase({{$case->id}} , 1)" >approval</button>
                                        @else 
                                         <button  class="btn btn-danger btn-md" onclick="approvecase({{$case->id}} , 0)" >unapproval</button>
                                        @endif
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
            </div>
        </div>
    </div>
    <!-- /.row -->
    <script>
     function approvecase(id , ap)
        {
             $.get("{{ url('17$es12/case/approvecase') }}?id="+id+'&ap='+ap, function(data, status){
                if(data == 1)
    			{
                    location.reload();
    			}
            });
        }
        function  ShowEdit(id) {
            $.get("{{ url('17$es12/case/Getinfo') }}?id="+id, function(data, status){
                $("#id_case").val(id);
                $("#name").val(data.name);
                $("#amount").val(data.amount);
                $("#max_amount").val(data.max_amount);
                 $("#persone").val(data.persone);
                   $('#compose-textarea4').next('input').next('iframe').contents().find('.wysihtml5-editor').html(data.description);
                $("#editproduct").modal();
            });
        }

        function delCat(id){
            $("#id_case_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_case_del").val();


            $.get("{{ url('17$es12/case/delete') }}?id="+id, function(data, status){
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
    </script>
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
                    <h4 class="modal-title">Add Case</h4>
                  
                </div>
                <form action="{{url('17$es12/case/add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">


                        <div class="form-group">
                            <label class="control-label">Case Name </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">Persone or code </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="persone"  class="form-control no-bl" value="" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Amount Of Case</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="max_amount" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <label class="control-label">Description  </label>
							<textarea id="compose-textarea" name="description" placeholder="description" class="form-control" style="height: 300px">
							</textarea>
                       </div>
                        
                      
                	<div class="form-group">
    					<label class="control-label">image of prescription</label>
    					<div class="input-group">
    						<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>
    
    						<input required type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
    					</div>
    				</div>
    				
    				
    				<div class="form-group">
    					<label class="control-label">charity  </label>
    					<div class="input-group">
    					  <select name="charity_id" class="form-control" onchange="getbranch(this.value)">
    					      @foreach(App\AdminModel\charity::where('parent',0)->get() as $charity)
    					        <option value="{{$charity->id}}">{{$charity->name_en}}</option>
    					      @endforeach
    					  </select>
    					</div>
    				</div>
    				
    				<div class="form-group">
    					<label class="control-label">branch  </label>
    					<div class="input-group">
    					  <select name="branch_id" class="form-control" id="sub_id_add">
    					       @php
                                  $getfirstcountry = App\AdminModel\charity::where('parent' , 0)->first() ;
                                  $getfirstgovern  = App\AdminModel\charity::where('parent' , $getfirstcountry->id)->get() ;
                               @endphp
                               @foreach($getfirstgovern as $gover)
                                  <option value="{{$gover->id}}" selected>{{$gover->name_en}}</option>
                               @endforeach
    					  </select>
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
    <!-- End Product Popup -->

    <!-- Edit Category -->
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
                    <h4 class="modal-title">Edit Case</h4>
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
                <form action="{{url('17$es12/case/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_case">
                        
                        <div class="form-group">
                            <label class="control-label">Case Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control no-bl" value="" >
                            </div>
                        </div>
                            <div class="form-group">
									<textarea id="compose-textarea4" name="description" placeholder="description" class="form-control" style="height: 300px">

									</textarea>
                        </div>
                        
                           <div class="form-group">
                            <label class="control-label">Persone </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="persone" id="persone" class="form-control no-bl" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Amount Of Case</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="max_amount" id="max_amount" class="form-control no-bl" value="" >
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
    <!-- end edit category -->

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
                    <input type="hidden" id="id_case_del" class="form-control" value="">
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
@endsection


     <script>
            
               function getbranch(id) {
                   
               console.log(id);
                 $.ajax({
                     type: "GET",
                     url: "charity/getbranch/" + id,
                    dataType: "html",
                    data: {
                        
                    },
                     success: function (response) {
                         var data = eval('(' + response + ')');
                         if (data.length > 0) {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode('اختار الفرع  '));
                            document.getElementById('sub_id_add').appendChild(x);
        
                             for (var i = 0; i < data.length; i++) {
                                var x = document.createElement('option');
                                 x.value = data[i].id;
                                 x.appendChild(document.createTextNode(data[i].name_en));
                                 document.getElementById('sub_id_add').appendChild(x);
                             }
        
                         } else {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode(' لا يوجد فروع  '));
                            document.getElementById('sub_id_add').appendChild(x);
                         }
                     },
                    error: function (e) {
                         document.getElementById('sub_id_add').innerHTML = '';
                     }
                 });
     }
        </script>
