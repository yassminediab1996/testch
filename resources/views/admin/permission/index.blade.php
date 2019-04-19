@extends('admin.layouts.app_en')
@section('title')
    Permission
@endsection
@section('content')
    <!-- row -->
    @include('website.notfi')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Permission Lists</h4>
                </div>
        	@if($permission->count() > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name Of Permission </th>
                                <th>Date Created</th>
                                <!--<th>Action</th>-->
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($permission as $sup)
                                <tr>

                                    <td>{{$sup->id}}</td>
                                    <td>{{$sup->name}}</td>
                                    <td>{{$sup->created_at}}</td>
                                    <!--<td>-->
                                    <!--    <a href="#" class="settings"  onclick="ShowEdit({{$sup->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>-->
                                    <!--    <a href="#" class="delete"  onclick="delCat({{$sup->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a> -->
                                    <!--</td>-->
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
    <script>
     
   function  ShowEdit(id) {
            $.get("{{ url('17$es12/offer/Getinfo') }}?id="+id, function(data, status){
                $("#id_offer").val(id);
                $("#deadline_offer").val(data.deadline_offer);
                $("#percentage").val(data.percentage);
                $("#product_id").val(data.product_id);
                $("#editproduct").modal();
            });
        }
        function delCat(id){
            $("#id_supcat_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_supcat_del").val();
            $.get("{{ url('17$es12/permission/delete') }}?id="+id, function(data, status){
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
                    <h4 class="modal-title">Edit Offer</h4>
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
                <form action="{{url('17$es12/offer/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_offer">
                        <div class="form-group">
                            <label class="control-label">Offer Percentage</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="percentage" id="percentage" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Deadline Of Offer</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="date" name="deadline_offer" id="deadline_offer" class="form-control no-bl" value="" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="exampleSelect1"> select Product</label>
                            <select class="form-control" name="product_id" id="product_id">
                                @foreach(App\AdminModel\Product::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name_en}}</option>
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
                    <input type="hidden" id="id_supcat_del" class="form-control" value="">
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


