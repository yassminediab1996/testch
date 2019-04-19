     @extends('admin.layouts.app_en')
@section('title')
    pharmacy
@endsection
@section('content')
  @include('website.notfi')
       @include('website.notfi')
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
                    <h4 class="modal-title">Add Pharmacy</h4>
                    <div class="user-avatar-wrapper">
                        
                    </div>
                </div>
                <form action="{{url('17$es12/map/add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                    <div class="form-group">
                          <labe>lat</labe>
                         <input class="form-control" type="text" name="lat" id="maps_latitude" value="">
                    </div>
                  
                    
                    <div class="form-group">
                         <label class="control-label">lng</label>
                        <input class="form-control" type="text" name="lng" id="maps_longitude" value="">
                    </div>
                   
                    <div class="form-group">
                            <label class="control-label">pharmacy address</label>
                         <input  class="form-control" type="text" name="address">
                    </div>
                    
                    <div class="form-group">
                            <label class="control-label">pharmacy name</label>
                         <input  class="form-control" type="text" name="name">
                    </div>
                    
                     <div class="form-group">
                            <label class="control-label">pharmacy email</label>
                         <input  class="form-control" type="email" name="email">
                    </div>
                    
                    
                    <div class="form-group">
                            <label class="control-label">pharmacy password</label>
                         <input  class="form-control" type="password" name="password">
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
                    <h4 class="modal-title">Edit Pharmacy</h4>
                    <div class="user-avatar-wrapper">
                        
                    </div>
                </div>
                <form action="{{url('17$es12/map/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id_map">
                        <div class="form-group">
                            <label class="control-label">pharmacy name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">pharmacy address</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="address" id="address" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">pharmacy email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" id="email" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">pharmacy password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="password" name="password" id="password" class="form-control no-bl" value="" required>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                      <h3>view all pharmacies</h3>
                       <a href="#" class="btn gredient-btn" data-toggle="modal" data-target="#addproduct" title="Add Offers">
                        Add Pharmacy
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name of pharmacy</th>
                                <th>lat</th>
                                <th>lng</th>
                                <th>address</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Count Of Orders</th>
                                <th>created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($getmaps as $case)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$case->name}}</td>
                                    <td>{{$case->lat}}</td>
                                    <td>{{$case->lng}}</td>
                                    <td>{{$case->address}}</td>
                                    <td>{{$case->email}}</td>
                                    <td>{{$case->password}}</td>
                                    <td>
                                    @php
                                      $count = App\AdminModel\PharmMon::where('parmact',$case->id)->count();
                                    @endphp
                                    {{$count}}
                                    </td>
                                    <td>{{$case->created_at}}</td>
                                    <td>
                                        <a href="{{url('17$es12/map/vieworders/'.$case->id)}}"  ><button class="btn btn-primary btn-md">view orders</button></a>
                                        <!--<a href="{{url('17$es12/map/delete/'.$case->id)}}" class="delete"  title="Delete" ><i class="ti-trash"></i></a>-->
                                       <a href="#" class="settings"  onclick="ShowEdit({{$case->id}})" title="Settings" data-toggle="tooltip"><i class="ti-settings"></i></a>

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
    <script>
         function  ShowEdit(id) {
            $.get("{{ url('17$es12/map/Getinfo') }}?id="+id, function(data, status){
                $("#id_map").val(id);
                $("#name").val(data.name);
                $("#address").val(data.address);
                $("#email").val(data.email);
                $("#password").val(data.password);
                $("#editproduct").modal();
            });
        }
    </script>
@endsection    
    