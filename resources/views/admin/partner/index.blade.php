   @extends('admin.layouts.app_en')
@section('title')
partner
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
                    Add partner
                </a>
            </div>
            @include('website.notfi')
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table-advance" class="table table-lg table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address </th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($partner as $cat)
                        <tr>

                            <td>{{$i++}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->email}}</td>
                            <td>{{$cat->phone}}</td>
                            <td>{{$cat->address}}</td>
                            <td>{{$cat->created_at}}</td>
                            <td>
                                <a href="#" class="settings"  onclick="ShowEdit({{$cat->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                <a href="#" class="delete"  onclick="delCat({{$cat->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
                               

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
        $.get("{{ url('17$es12/partner/Getinfo') }}?id="+id, function(data, status){
            $("#id_partner").val(id);
            $("#name").val(data.name);
            $("#email").val(data.email);
             $("#address").val(data.address);
            $("#phone").val(data.phone);
            $("#editproduct").modal();
        });
    }
   
    function delCat(id){
        $("#id_partner_del").val(id);
        $("#remove_modal").modal();
    }

    function Delete() {
        var id    = $("#id_partner_del").val();
        $.get("{{ url('17$es12/partner/delete') }}?id="+id, function(data, status){
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
                <h4 class="modal-title">Add Partner</h4>
                <div class="user-avatar-wrapper">
                  
                </div>
            </div>
            <form action="{{url('17$es12/partner/add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

          
                    <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">partner Name  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name"  class="form-control no-bl" value="" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">partner Email </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="email" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label">partner Password </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="password" name="password" class="form-control no-bl" value="" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label">Charity address  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label">Charity Phone </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="phone"  class="form-control no-bl" value="" required>
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
                <h4 class="modal-title">Edit partner</h4>
                
            </div>
            <form action="{{url('17$es12/partner/update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">partner Name  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="name" id="name" class="form-control no-bl" value="" required>

                        </div>
                    </div>
                    <input type="hidden" name="id" id="id_partner">
                    <div class="form-group">
                        <label class="control-label">partner Email </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="email" id="email"class="form-control no-bl" value="" required>
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label">Charity address  </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="address" id="address" class="form-control no-bl" value="" required>
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label">Charity Phone </label>
                        <div class="input-group">
                            <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                            <input type="text" name="phone" id="phone" class="form-control no-bl" value="" required>
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
                <input type="hidden" id="id_partner_del" class="form-control" value="">
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
