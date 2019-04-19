  @extends('admin.layouts.app_en')
@section('title')
  Add  Employees
@endsection
@section('content')
   @include('website.notfi')
                <form action="{{url('17$es12/employee/add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">name</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="text" name="name" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">email</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="email" name="email" class="form-control no-bl" value="" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label">password</label>
                            <div class="input-group">
                                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                                <input type="password" name="password" class="form-control no-bl" value="" required>
                            </div>
                        </div>
                
                         
                            <div class="form-group">
                                <label class="control-label">choose permission</label>
                                <br>
                                @foreach(\App\AdminModel\Permission::all() as $per)
                                <input  name="per[]" type="checkbox" id="per{{$per->id}}" value="{{$per->id}}">
                                <label  for="per{{$per->id}}">
                                    &nbsp;{{$per->name}}</label>
                                    <br>
                                        @endforeach
                            </div>
                    
                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button class="btn gredient-btn" type="submit">Add</button>
                    </div>
                </form>
            
    @endsection