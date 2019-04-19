@extends('admin.layouts.app_en')
@section('title')
    Edit State
@endsection
@section('content')
@include('website.notfi')
    <form action="{{url('17$es12/city/update')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="modal-body">
        <div class="form-group">
            <label class="control-label">City Name In English</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="name_en" id="name_en" class="form-control no-bl" value="{{$getstate->name_en}}" >

            </div>
        </div>
        <input type="hidden" name="id" value="{{$getstate->id}}">
        <div class="form-group">
            <label class="control-label">City Name In Arabic</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="name_ar" id="name_ar"class="form-control no-bl" value="{{$getstate->name_ar}}" >
            </div>
        </div>
        
          <div class="form-group">
            <label class="control-label">State lat </label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="lat" value="{{$getstate->lat}}" class="form-control no-bl" value="" required>
            </div>
        </div>
        
          <div class="form-group">
            <label class="control-label">State lng</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="lng" value="{{$getstate->lng}}" class="form-control no-bl" value="" required>
            </div>
        </div>

         @php
                 $currntgover = App\AdminModel\City::where(['id' => $getstate->id ])->first();
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
                    <option value="{{$cat->id}}" @if($getstate->parent == $cat->id) selected @else @endif >{{$cat->name_en}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">

        <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
        <button class="btn gredient-btn" type="submit">Update</button>
    </div>
</form>
@endsection