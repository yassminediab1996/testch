@extends('website.app_en')
@section('title')
Profile
@endsection
@section('content')
<style>
    a:active, a:hover {
        outline: unset !important;
        width: unset !important;
    }
    
    .inputWrapper {
    height: 32px;
    width: 100px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
    color : white;
    margin: 0 auto;
    padding-top:5px;
    text-align: center;
    /*Using a background color, but you can use a background image to represent a button*/
    background-color: green;
}
.fileInput {
    cursor: pointer;
    height: 100%;
    position:absolute;
    top: 0;
    right: 0;
    z-index: 99;
    /*This makes the button huge. If you want a bigger button, increase the font size*/
    font-size:50px;
    /*Opacity settings for all browsers*/
    opacity: 0;
    -moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
}

</style>

<div class="contact-form-page">
        @include('website.notfi')

    <h1> حسابي الشخصي </h1>
    <br>
    <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
             <input type="hidden" name="id" value="{{$data->id}}">
        <div class="row">
            <div class="col-6 col-sm-4" style="width: 50%;">
                <div class="form-group">
                     <label>اسمك</label>
                       <input type="text" name="name" class="form-control" value=" @if($data->name){{$data->name}} @endif">
                          
                       <label>بريدك الالكترونى</label>
                       <input type="email" name="email"  class="form-control" value=" @if($data->email){{$data->email}} @endif">
                        
                           <label>رقم الهاتف</label>
                         <input type="text" name="phone" class="form-control" value="@if($data->phone){{$data->phone}} @endif">
                         
                           <label>اختر منطقتك</label>
                            @php
                                 $getallcountry =  App\AdminModel\City::where(['parent' => 0 ])->get();
                                 $getallgover = array();
                                 
                                @endphp
                                @foreach($getallcountry as $countr)
                                 @php
                                   $getallgover = App\AdminModel\City::where(['parent' => $countr->id ])->get();
                                 @endphp
                                @endforeach
                    <select class="form-control" name="state_id" >
                        @foreach($getallgover as $state)
                          <option value="{{$state->id}}"  @if($data->state_id == $state->id) selected @endif> {{$state->name_ar}}</option>
                        @endforeach  
                    </select>     

                </div>
            </div>
            <div class="col-6 col-sm-4 justify-content-center" style="width: 50%; text-align: center;">
                <br><br>
                @if($data->img == null)
                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar"
                     style="width:30%;  border-radius: 50%;">
                @else
                      <img src="{{asset('uploads/files/'.$data->img)}}" alt="Avatar"
                     style="width:30%;  border-radius: 50%;">
                @endif
                     <br><br>
                             <div class="inputWrapper">
    تغيير الصورة 
    <input class="fileInput" type="file" name="file"/>
</div>

            </div>
        </div>
        <div class="row form-contact justify-content-center" style="text-align: center;">
            <br>
            <input type="submit" value="حفظ التغييرات" style="text-align: center; color: #e0e9e0; background: green;"/>
            <br><br><br>
        </div>
    </form>

</div>

@endsection