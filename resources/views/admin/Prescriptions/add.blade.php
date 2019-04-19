 @extends('admin.layouts.app_en')
@section('title')
    Add Prescription
@endsection
@section('content')
    @php
     $i=0;
    @endphp
   <form action="{{url('17$es12/prescription/add')}}" method="post" enctype="multipart/form-data" style="background: white;">
      {{csrf_field()}}
    <div class="modal-body">
        
        <div class="form-group">
            <label class="control-label">doctor name</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="doctor_name" class="form-control no-bl" value="" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">patient name</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="patient_name" class="form-control no-bl" value="" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label"> choose city</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                  <select required name="goverid" class="form-control" onchange="getstate(this.value)" style="    width: 340px;  margin-right: 115px;">
      
                       @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
                         @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
                       @endforeach
                        @endforeach
                   </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">choose </label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <select name="stateid" class="form-control" id="sub_id_add" required>
                        @php
                        $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
                        $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
                       @endphp
                       @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" selected>{{$gover->name_ar}}</option>
                       @endforeach
                </select>
            </div>
        </div>
        
         <div class="form-group">
            <label class="control-label">date</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="date" name="date" class="form-control no-bl" value="" required>
            </div>
        </div>
        
         <div class="form-group">
            <label class="control-label">Note</label>
            <div class="input-group">
                <span class="input-group-addon br br-light no-br"><i class="ti-user"></i></span>
                <input type="text" name="note" class="form-control no-bl" value="" >
            </div>
        </div>
   
       <p id="getsection">
         To Add List Medications Click Here!
       </p>
       <div class="form-group col-md-12" >
          
            <div class="" id="drugname" >
                
            </div>
        </div>
 <br/>
<div id="rr"></div>
    </div>
<div class="modal-footer">

    <button class="btn btn-dark btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
    <button class="btn gredient-btn" type="submit">Add</button>
</div>
</form>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        var id = 0;
    $("p" ).click(function() {

        var c = $('<div style="margin-bottom: 10px;" class="col-md-12"><div class="row"><label class="control-label">Drug Name </label><div class="input-group  col-md-4"><input type="text"name="drug_name[]" placholder="drug name" class="form-control no-bl" value="" required/></div><label class="control-label">number of times </label><div class="input-group  col-md-4"><input type="text" placeholder="time" name="drug_time[]" ></div></div></div>');
        id = id +1;
        $('#drugname').append(c);
        });

    </script>
    <script>
            
               function getstate(id) {
               console.log(id);
                 $.ajax({
                     type: "GET",
                     url: "/getallstate",
                    dataType: "html",
                    data: {
                        id : id
                    },
                     success: function (response) {
                         var data = eval('(' + response + ')');
                         if (data.length > 0) {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode('اختار منطقتك  '));
                            document.getElementById('sub_id_add').appendChild(x);
        
                             for (var i = 0; i < data.length; i++) {
                                var x = document.createElement('option');
                                 x.value = data[i].id;
                                 x.appendChild(document.createTextNode(data[i].name_ar));
                                 document.getElementById('sub_id_add').appendChild(x);
                             }
        
                         } else {
                             document.getElementById('sub_id_add').innerHTML = '';
                             var x = document.createElement('option');
                            x.value = 0;
                            x.disabled = true;
                             x.selected = true;
                             x.appendChild(document.createTextNode(' لا يوجد مناطق  '));
                            document.getElementById('sub_id_add').appendChild(x);
                         }
                     },
                    error: function (e) {
                         document.getElementById('sub_id_add').innerHTML = '';
                     }
                 });
     }
        </script>
@endsection