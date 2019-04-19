   @extends('admin.layouts.app_en')
@section('title')
charity
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
                <h4 class="mb-0">charities Lists</h4>
                <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add charity">
                    Add charity
                </a>
            </div>
            @include('website.notfi')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table-advance" class="table table-lg table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name  </th>
                            <th>Address  </th>
                            <th>Logo</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($charity as $cat)
                        <tr>

                            <td>{{$i++}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->address}}</td>
                        	<td><a href="#"><img src="{{asset('uploads/files/'.$cat->img)}}" class="avatar" alt="Avatar"></a></td>

                            <td>{{$cat->created_at}}</td>
                            <td>
                                <a href="#" class="settings"  onclick="ShowEdit({{$cat->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                <a href="#" class="delete"  onclick="delCat({{$cat->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                <a href="{{url('17$es12/charity/viewcases/'.$cat->id)}}"  title="viewcases" ><i class="material-icons" style="color: #35d85e;">view cases</i></a>

                                <!--<button class="btn btn-md btn-primary" onclick="addbranch({{$cat->id}})" data-toggle="tooltip">add branch </button>-->
                                <!--<a href="{{url('17$es12/charity/branch/'.$cat->id)}}" class="" title="viewbranches" ><i class="material-icons" style="color: #35d85e;">search</i></a>-->
                           
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
    function  ShowEdit(id) {
        $.get("{{ url('17$es12/charity/Getinfo') }}?id="+id, function(data, status){
            $("#id_city").val(id);
            $("#name_ar").val(data.name_ar);
            $("#name_en").val(data.name_en);
             $("#address_ar").val(data.address_ar);
            $("#address_en").val(data.address_en);
            $("#editproduct").modal();
        });
    }
    function  addbranch(id) {
        $("#id_charity").val(id);
        $("#addbranch").modal();
        
    }
    function delCat(id){
        $("#id_city_del").val(id);
        $("#remove_modal").modal();
    }

    function Delete() {
        var id    = $("#id_city_del").val();
        $.get("{{ url('17$es12/charity/delete') }}?id="+id, function(data, status){
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
                <h4 class="modal-title">Add charity</h4>
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
            <form action="{{url('17$es12/charity/add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Charity Name In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_en" class="form-control no-bl" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Charity Name In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_ar" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Charity address In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_ar" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label">Charity address In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_en" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    	<div class="form-group">
					<label class="control-label">image</label>
					<div class="input-group">
						<span class="input-group-addon br br-light no-br"><i class="ti-credit-card"></i></span>

						<input  type="file" id="myFile" name="file" accept='image/*' class="file-input" data-show-caption="false" data-show-upload="true" >
					</div>
				</div>
                  <input type="hidden" value="0" name="parent">
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
<div class="addbranch modal fade" id="addbranch" tabindex="-1" role="dialog" aria-labelledby="addbranch">
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
                <h4 class="modal-title">Add branch</h4>
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
            <form action="{{url('17$es12/charity/addbranch')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Branch Name In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_en" class="form-control no-bl" value="" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Branch Name In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_ar" class="form-control no-bl" value="" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Branch address In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_ar" class="form-control no-bl" value="" >
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label">Branch address In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_en" class="form-control no-bl" value="" >
                        </div>
                    </div>

                  <input type="hidden" value="0" name="parent" id="id_charity">
                </div>
                <div class="modal-footer">

                    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn gredient-btn" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
                <h4 class="modal-title">Edit Charity</h4>
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
            <form action="{{url('17$es12/charity/update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Charity Name In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_en" id="name_en" class="form-control no-bl" value="" required>

                        </div>
                    </div>
                    <input type="hidden" name="id" id="id_city">
                    <div class="form-group">
                        <label class="control-label">Charity Name In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name_ar" id="name_ar"class="form-control no-bl" value="" required>
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label">Charity address In Arabic</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_ar" id="address_ar" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label">Charity address In English</label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address_en" id="address_en" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                  <input type="hidden" value="0" name="parent">
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
</div>
<!-- /.content-wrapper-->
@endsection



     <script>
            
               function getstate(id) {
                   
               console.log(id);
                 $.ajax({
                     type: "GET",
                     url: "17$es12/city/getallstate",
                    dataType: "html",
                    data: {
                        id : id
                    },
                     success: function (response) {
                         var data = eval('(' + response + ')');
                         if (data.length > 0) {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode('اختار منطقتك  '));
                            document.getElementById('sub_id_add').appendChild(x);
        
                             for (var i = 0; i < data.length; i++) {
                                var x = document.createElement('option');
                                 x.value = data[i].id;
                                 x.appendChild(document.createTextNode(data[i].name_ar));
                                 document.getElementById('sub_id_add').appendChild(x);
                             }
        
                         } else {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode(' لا يوجد مناطق  '));
                            document.getElementById('sub_id_add').appendChild(x);
                         }
                     },
                    error: function (e) {
                         document.getElementById('sub_id_add').innerHTML = '';
                     }
                 });
     }
        </script>