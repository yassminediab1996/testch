<style>
    select{
        direction: rtl;
    }
</style>
  
        <form id="email-form-2" action="{{url('csr/send')}}" method="post"  data-name="Email Form 2">
            {{csrf_field()}}
            <input name="case_id" value="{{$id}}" type="hidden">
            <input type="text" class="textfield w-input" autofocus="true" maxlength="256" name="name" data-name="Name" placeholder="..ادخل اسمك" id="name" required="">
            <input type="email" class="textfield w-input" maxlength="256" name="email" data-name="email" placeholder="..ادخل بريدك الالكتروني" id="email-4" required="">
            <input type="tel" class="textfield w-input"  maxlength="256" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..ادخل رقم هاتفك" id="phone" required="">
             <input type="text" name="qty" placeholder="مبلغ التبرع" class="textfield w-input border-top-0 border-left-0 border-right-0 text-right" ><br><br>

          <div class="columns-2 w-row">
            <div class="column-5 w-col w-col-6">
                
                 <select required class="form-control w-select" onchange="getstate(this.value)" style="height : auto;">
          
                           @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
                             @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)
                              
                            <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
                           @endforeach
                            @endforeach
                 </select>
            </div>
            <div class="column-4 w-col w-col-6">
             
                
                 <select class="form-control w-select" id="sub_id_add"  name="goverid" style="height : auto;">
					        @php
                        $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
                        $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
                       @endphp
                       @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" selected>{{$gover->name_ar}}</option>
                       @endforeach
					    </select>
            </div>
            <div class="column-5 w-col w-col-6"></div>
           <div class="column-5 w-col w-col-6">

             <select name="type" class="form-control w-select"  onchange="chosse(this.value)" id="type" style="height : auto;">
                    <option disabled selected>إختار </option>
                    <option value="1">شركة</option>  
                    <option value="2" >فرد</option>
               </select>
            </div>  
            
            <div id="input">
                   
               </div>
          </div>
          <div class="columns-3 w-row">
            <!--<div class="column-7 w-col w-col-2">-->
            <!--  <div data-w-id="f520ab25-1773-80cf-e933-206285434ea4" class="close-button"><img src="{{asset('chefaa_design/images/x.svg')}}" alt=""></div>-->
            <!--</div>-->
            <div class="column-6 w-col w-col-10"><input type="submit" value="ارسال" data-wait="..برجاء الانتظار" class="cta w-button"></div>
          </div>
          
        </form>
           <script>
         function chosse(id){
               document.getElementById('input').innerHTML = '';
             if(id == 1)
             {
                  
                     var c = $(' <input type="text" name="companyname"  required class="textfield w-input border-top-0 border-left-0 border-right-0 text-righ"  placeholder = "إسم الشركة"  > <br> <br>');
                      $('#input').append(c);
             }else{
                                     document.getElementById('input').innerHTML = '';

             }
            };
    </script>
        <script>
            
               function getstate(id) {
               console.log(id);
                 jQuery.ajax({
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
