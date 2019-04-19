@extends('admin.layouts.app_en')
@section('title')
    Employees
@endsection
@section('content')
    <!-- row -->
    @include('website.notfi')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0">Emp Lists</h4>
                    <a href="{{url('17$es12/employee/add')}}" class="btn gredient-btn" title="Add Emp">
                        Add Employee
                    </a>
                </div>
        	@if($supcategories->count() > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Permission</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($supcategories as $sup)
                                <tr>

                                    <td>{{$sup->id}}</td>
                                    <td>{{$sup->name}}</td>
                                    <td>{{$sup->email}}</td>
                                    @if($sup->permission == '0')
                                    <td><div class="label cl-danger bg-danger-light">  all permissions </div></td>
                                    @elseif($sup->permission == 20)
                                    <td> <div class="label cl-success bg-success-light"> {{\App\AdminModel\Permission::find(20)->name}} </div></td>
                                    @elseif($sup->permission == 21)
                                    <td> <div class="label cl-success bg-success-light"> {{\App\AdminModel\Permission::find(21)->name}} </div></td>
                                    @elseif($sup->permission == 19)
                                    <td> <div class="label cl-success bg-success-light"> {{\App\AdminModel\Permission::find(19)->name}} </div></td>
                                    @elseif($sup->permission != '0' and $sup->permission != 19 and $sup->permission != 20  and $sup->permission != 21)
                                    <td>
                                        @foreach(json_decode($sup->permission) as $per)
                                          <div class="label cl-success bg-success-light"> {{\App\AdminModel\Permission::find($per)->name}} </div>
                                        @endforeach
                                    </td>
                                    @endif
                                    <td>{{$sup->created_at}}</td>
                                    <td>
                                     @if($sup->permission != 19 and $sup->permission != 20  and $sup->permission != 21)
                                       <a href="{{url('17$es12/employee/update/'.$sup->id)}}" class="settings"   title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                     @elseif($sup->permission == 19 )  
                                       <a href="#" class="settings"  onclick="ShowEdit1({{$sup->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                    
                                      @elseif( $sup->permission == 20 )  
                                       <a href="#" class="settings"  onclick="ShowEdit2({{$sup->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                   
                                      @elseif( $sup->permission == 21)  
                                       <a href="#" class="settings"  onclick="ShowEdit3({{$sup->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>
                                     @endif
                                      @if($sup->permission != '0')  
                                        <a href="#" class="delete"  onclick="delCat({{$sup->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a> 
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
                @endif
            </div>
        </div>
    </div>
    <!-- /.row -->
    <script>
     function  ShowEdit1(id) {
            $.get("{{ url('17$es12/employee/Getinfo') }}?id="+id, function(data, status){
                $("#id_emp").val(id);
                $("#email").val(data.email);
                $("#name").val(data.name);
                $("#editproduct1").modal();
            });
        }
        function  ShowEdit2(id) {
            $.get("{{ url('17$es12/employee/Getinfo') }}?id="+id, function(data, status){
                $("#id_emp").val(id);
                $("#email").val(data.email);
                $("#name").val(data.name);
                $("#editproduct2").modal();
            });
        }
        function  ShowEdit3(id) {
            $.get("{{ url('17$es12/employee/Getinfo') }}?id="+id, function(data, status){
                $("#id_emp").val(id);
                $("#email").val(data.email);
                $("#name").val(data.name);
                $("#editproduct3").modal();
            });
        }

        function delCat(id){
            $("#id_supcat_del").val(id);
            $("#remove_modal").modal();
        }

        function Delete() {
            var id    = $("#id_supcat_del").val();
            $.get("{{ url('17$es12/employee/delete') }}?id="+id, function(data, status){
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
    <div class="add-popup modal fade" id="editproduct1" tabindex="-1" role="dialog" aria-labelledby="editproduct">
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
                    <h4 class="modal-title">Edit </h4>
                    <div class="user-avatar-wrapper">
                       
                    </div>
                </div>
                <form action="{{url('17$es12/employee/update2')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_emp">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control no-bl" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" id="email" class="form-control no-bl" value="" >
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="password" name="password" id="password" class="form-control no-bl" value="" >
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
       <!-- Edit Category -->
    <div class="add-popup modal fade" id="editproduct2" tabindex="-1" role="dialog" aria-labelledby="editproduct">
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
                    <h4 class="modal-title">Edit </h4>
                    <div class="user-avatar-wrapper">
                       
                    </div>
                </div>
                <form action="{{url('17$es12/employee/update3')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_emp">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control no-bl" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" id="email" class="form-control no-bl" value="" >
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="password" name="password" id="password" class="form-control no-bl" value="" >
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
       <!-- Edit Category -->
    <div class="add-popup modal fade" id="editproduct3" tabindex="-1" role="dialog" aria-labelledby="editproduct">
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
                    <h4 class="modal-title">Edit </h4>
                    <div class="user-avatar-wrapper">
                       
                    </div>
                </div>
                <form action="{{url('17$es12/employee/update4')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_emp">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control no-bl" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" id="email" class="form-control no-bl" value="" >
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="password" name="password" id="password" class="form-control no-bl" value="" >
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


