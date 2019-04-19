  @extends('admin.layouts.app_en')
@section('title')
    Edit Employees
@endsection
@section('content')
   
                <form action="{{url('17$es12/employee/update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <input type="hidden" name="id" value="{{$getemp->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" class="form-control no-bl" value="{{$getemp->name}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" class="form-control no-bl" value="{{$getemp->email}}" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label">password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="password" class="form-control no-bl" value="" >
                            </div>
                        </div>
                <?php
                 $permission_list = json_decode($getemp->permission);
                 ?>
                    <div class="form-group">
                 <label class="control-label">choose permission</label>
                                <br>
                    @if($permission_list != 20 and $permission_list != 21 and $permission_list != 19)          
                         @foreach(\App\AdminModel\Permission::all() as $per)
                                <input  name="per[]" type="checkbox" id="per{{$per->id}}" value="{{$per->id}}" @if(in_array($per->id, $permission_list)) checked @endif >
                                <label  for="per{{$per->id}}">
                                    &nbsp;{{$per->name}}</label><br>
                        @endforeach
                    @elseif($permission_list == 21)
                         <input  name="per[]" type="checkbox" id="per21" value="21"  checked  >
                                <label  for="per21">
                                    &nbsp;pharmacy</label><br>
                    @else
                       @foreach(\App\AdminModel\Permission::all() as $per)
                                <input  name="per[]" type="checkbox" id="per{{$per->id}}" value="{{$per->id}}" @if($per->id == 20) checked @endif >
                                <label  for="per{{$per->id}}">
                                    &nbsp;{{$per->name}}</label><br>
                        @endforeach
                    @endif    
                          </div>
                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn gredient-btn" type="submit">Update</button>
                    </div>
                </form>
            
    @endsection