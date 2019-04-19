@extends('admin.layouts.app_en')
@section('title')
    coupon
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Coupon</h4>
                    <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add Offers">
                        Add Copone
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Text</th>
                                <th>Using</th>
                                <th>Percentage</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($cupone as $cop)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td>{{$cop->text}}</td>
                                    <td>{{$cop->c_using}}</td>
                                    <td>{{$cop->amount}}%</td>
                                    <td>{{$cop->created_at}}</td>
                                    <td>

                                        <a href="#" class="settings"  onclick="ShowEdit({{$cop->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                        <a href="#" class="delete"  onclick="delCat({{$cop->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
            $.get("{{ url('17$es12/copone/Getinfo') }}?id="+id, function(data, status){
                $("#id_cupone").val(id);
                $("#c_using").val(data.c_using);
                $("#amount").val(data.amount);
                $("#text").val(data.text);
                $("#editproduct").modal();
            });
        }

        function delCat(id){
            $("#id_cupone_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_cupone_del").val();


            $.get("{{ url('17$es12/copone/delete') }}?id="+id, function(data, status){
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
                    <h4 class="modal-title">Add Cupone</h4>
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
                <form action="{{url('17$es12/copone/addcoup')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">


                          <div class="form-group">
                            <label class="control-label">Text</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="text"  class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Percentage</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="number" name="amount"  class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Using</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="number" name="c_using"  class="form-control no-bl" value="" required>
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
                    <h4 class="modal-title">Edit Coupne</h4>
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
                <form action="{{url('17$es12/copone/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_cupone">

                        <div class="form-group">
                            <label class="control-label">Text</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="text" id="text" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Percentage</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="number" name="amount" id="amount" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Using</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="number" name="c_using" id="c_using" class="form-control no-bl" value="" required>
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
                    <input type="hidden" id="id_cupone_del" class="form-control" value="">
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


