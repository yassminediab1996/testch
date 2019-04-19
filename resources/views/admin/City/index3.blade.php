@extends('admin.layouts.app_en')
@section('title')
    state
@endsection
@section('content')
    <!-- row -->
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">State Lists</h4>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addproduct" title="Add Category">
                        Add State
                    </a>
                </div>
                @include('website.notfi')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name In English</th>
                                <th>Name In Arabic</th>
                                <th>Governor</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(count($subcity))
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($subcity as $cat)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td>{{$cat->name_en}}</td>
                                    <td>{{$cat->name_ar}}</td>
                                    <td>{{\App\AdminModel\City::find($cat->parent)->name_en}}</td>
                                    <td>{{$cat->created_at}}</td>
                                    <td>
                                        <a href="{{url('17$es12/city/editstate/'.$cat->id)}}" class="settings"   title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                        <a href="#" class="delete"  onclick="delCat({{$cat->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                            @php
                                $i++;
                            @endphp
                            </tbody>
                             @else
    
    @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
   
    <script>
        function  ShowEdit(id) {
            $.get("{{ url('17$es12/city/Getinfo') }}?id="+id, function(data, status){
                $("#id_state").val(id);
                $("#name_ar").val(data.name_ar);
                $("#name_en").val(data.name_en);
                $("#lat").val(data.lat);
                $("#lng").val(data.lng);
                $("#parent").val(data.parent);
                $("#fees").val(data.fees);
                $("#editproduct").modal();
            });
        }

        function delCat(id){
            $("#id_state_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_state_del").val();


            $.get("{{ url('17$es12/city/delete') }}?id="+id, function(data, status){
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
                    <h4 class="modal-title">Add State</h4>
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
                <form action="{{url('17$es12/city/addstate')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">State Name In English</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_en" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="control-label">State Name In Arabic</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label">State lat </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="lat" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label">State lng</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="lng" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <input type="hidden" name="parent" value="{{$id}}">
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
                    <h4 class="modal-title">Edit State</h4>
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
                <form action="{{url('17$es12/city/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">City Name In English</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_en" id="name_en" class="form-control no-bl" value="" required>

                            </div>
                        </div>
                        <input type="hidden" name="id" id="id_state">
                        <div class="form-group">
                            <label class="control-label">City Name In Arabic</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name_ar" id="name_ar"class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label">State lat </label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="lat" id="lat" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="control-label">State lng</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="lng" id="lng"class="form-control no-bl" value="" required>
                            </div>
                        </div>

                                @php
                                 $currntgover = App\AdminModel\City::where(['id' => $id ])->first();
                                @endphp
                                 @php
                                 $getallcountry =  App\AdminModel\City::where(['parent' => 0 ])->get();
                                 $getallgover = array();
                                 
                                @endphp
                                @foreach($getallcountry as $countr)
                                 @php
                                   $getallgover = App\AdminModel\City::where(['parent' => $countr->id ])->get();
                                 @endphp
                                @endforeach
                           
                        <div class="form-group">
                            <label for="exampleSelect1"> select Category</label>
                            <select class="form-control" id="exampleSelect1" name="parent" >
                               
                                @foreach($getallgover as $cat)
                                    <option value="{{$cat->id}}" >{{$cat->name_en}}</option>
                                @endforeach
                            </select>
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
                    <input type="hidden" id="id_state_del" class="form-control" value="">
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


