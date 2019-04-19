        @php 
         $getfirst = array();
        @endphp
        @include('website.notfi')
        <style>
            label{
                    float: right;
            }
        </style>
           <form action="{{url('search')}}" method="post">
               {{csrf_field()}}
               <div class="form-group">
                   <label>الإسم</label>
                  <input type="text" name="name" required class="textfield w-input" value="{{old('name')}}" style=" margin-right: 115px;">
               </div>
               
               <div class="clearfix"></div>
               
               <div class="form-group">
                  <label>الإيميل</label>
                  <input type="email" name="email" required class="textfield w-input" value="{{old('email')}}" style=" margin-right: 115px;">
               </div>
               
               <div class="form-group">
                  <label>رقم الهاتف</label>
                   <div class="clearfix"></div>
                  <input type="text" name="phone" class="calculator-input textfield w-input" value="{{old('phone')}}"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" required class="form-control" style=" height: 35px;    margin-right: 115px;">
                </div>

               <div class="clearfix"></div>
               
               <div class="form-group">
                   <label> العنوان</label>
                   <input type="text" name="address"  required class="textfield w-input" style=" margin-right: 115px;">
               </div>
               
               <div class="form-group">
                   <label>إختار المحافظه</label>
                   <select required name="goverid" class="form-control w-select" onchange="getstate(this.value)" style="    width: 340px;  margin-right: 115px;">
      
                       @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
                         @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
                       @endforeach
                        @endforeach
                   </select>
               </div>
               <div class="clearfix"></div>
               <div class="form-group">
                   <label>إختار المنطقه</label>
                   <select required class="form-control w-select" id="sub_id_add" style="    width: 340px;margin-right: 115px;" name="state_id">
                       @php
                        $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
                        $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
                       @endphp
                       @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" selected>{{$gover->name_ar}}</option>
                       @endforeach
                   </select>
                </div>
              <input type="hidden" name="search" value="{{$search}}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">إرسال </button>
              </div>
              
        </form>
        <script>
            
               function getstate(id) {
               console.log(id);
                 $.ajax({
                     type: "GET",
                     url: "getallstate",
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
         