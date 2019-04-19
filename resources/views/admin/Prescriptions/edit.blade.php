 @extends('admin.layouts.app_en')
@section('title')
    Edit Prescription
@endsection
@section('content')
@php

@endphp
   <form action="{{url('17$es12/prescription/update')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
    <div class="modal-body">
        <input type="hidden" name="doctor_id" value="{{$getprescription->doctor->id}}">
        <input type="hidden" name="patient_id" value="{{$getprescription->patient->id}}">
         <input type="hidden" name="prescription" value="{{$getprescription->id}}">
        <div class="form-group">
            <label class="control-label">doctor name</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="doctor_name" class="form-control no-bl" value="{{$getprescription->doctor->name}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">patient name</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="patient_name" class="form-control no-bl" value="{{$getprescription->patient->name}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">patient aga</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="patient_age" class="form-control no-bl" value="{{$getprescription->patient->age}}" required>
            </div>
        </div>
        
         <div class="form-group">
            <label class="control-label">date</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="date" name="date" class="form-control no-bl" value="{{$getprescription->date}}" required>
            </div>
        </div>
        @php
           // $times = array();
               $t = 0;
                $daoctors = explode(',',$getprescription->drugs);
                $times = explode(',',$getprescription->times);

       @endphp
        @foreach($daoctors as $key => $doc)
      <div style="margin-bottom: 10px;" class="col-md-12">
          <div class="row">
              <label class="control-label">Drug Name </label>
              <div class="input-group  col-md-4">
                  <input type="text"name="drug_name[]" placholder="drug name" class="form-control no-bl" value="{{$doc}}" required/>
             </div>
                  <label class="control-label">Drug Time </label>
                  <div class="input-group  col-md-4">
                      {{--<select multiple   name="drug_time[]" placholder="drug time"  class="form-control" required>--}}

                            {{--<option value="{{$times[$key]}}">@if($times[$key] == 1) am @else pm @endif</option>--}}

                      {{--</select>--}}
                      <input type="text" name="drug_time[]" value="{{$times[$key]}}" placeholder="time">
                  </div>
         
         </div>
     
     </div>
        @endforeach

    
 <br/>
<div id="rr"></div>
    </div>
<div class="modal-footer">

    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
    <button class="btn gredient-btn" type="submit">Update</button>
</div>
</form>
                
                <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
              
@endsection