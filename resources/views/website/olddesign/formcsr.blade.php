<!--<div class="model-head">-->
<!--        <img src="assets/images/smile.png">-->
<!--        <h5 class="modal-title" id="exampleModalLabel">ساهم بتبرع لهذه الحالة  </h5><hr class="small-hr bg-green">-->
<!--      </div>-->
<!--        <form action="{{url('csr/send')}}" method="post">-->
<!--            {{csrf_field()}}-->
<!--            <input name="case_id" value="{{$id}}" type="hidden">-->
<!--          <input type="text" name="name" placeholder="الاسم" class="form-control border-top-0 border-left-0 border-right-0 text-right" ><br>-->
<!--          <input type="text" name="phone" placeholder="رقم الهاتف" class="form-control border-top-0 border-left-0 border-right-0 text-right" ><br>-->
<!--          <input type="text" name="email" placeholder="الايميل" class="form-control border-top-0 border-left-0 border-right-0 text-right" ><br><br>-->
<!--          <input type="text" name="qty" placeholder="مبلغ التبرع" class="form-control border-top-0 border-left-0 border-right-0 text-right" ><br><br>-->
<!--               <select name="goverid" class="form-control" >-->
<!--                    <option disabled selected>إختار محافظتك</option>-->
<!--                   @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)-->
<!--                     @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)-->
                      
<!--                    <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>-->
<!--                   @endforeach-->
<!--                    @endforeach-->
<!--               </select>-->
<!--               <br>-->
               
<!--              <select name="type" class="form-control"  onchange="chosse(this.value)" id="type" >-->
<!--                    <option disabled selected>إختار </option>-->
<!--                    <option value="1">شركة</option>  -->
<!--                    <option value="2" >فرد</option>-->
<!--               </select>-->
<!--               <br> -->
<!--               <div id="input">-->
                   
<!--               </div>-->
<!--          <button type="submit"  class="btn btn-success btn-block" >ارسال</button>-->
<!--        </form>-->
<!--            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--    <script>-->
<!--         function chosse(id){-->
<!--               document.getElementById('input').innerHTML = '';-->
<!--             if(id == 1)-->
<!--             {-->
                  
<!--                     var c = $(' <input type="text" name="companyname"  required class="form-control border-top-0 border-left-0 border-right-0 text-righ"  placeholder = "إسم الشركة"  > <br> <br>');-->
<!--                      $('#input').append(c);-->
<!--             }else{-->
<!--                                     document.getElementById('input').innerHTML = '';-->

<!--             }-->
<!--            };-->
<!--    </script>-->