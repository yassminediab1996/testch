@php $currentPage = ''; @endphp
@extends('website.layouts.header')
@section('title')
	 الصفحة الشخصية للجمعيات - شفاء 
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing+contact.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/csr.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	 
    	 html , body {
         width : 100% !important;
         overflow-x : hidden !important
     }
    
        .active{
            background-color: #62cb5d;
        }
    
        label > input{ /* HIDE RADIO */
            visibility: hidden; /* Makes input not-clickable */
            position: absolute; /* Remove input from document flow */
        }
        label > input + img{ /* IMAGE STYLES */
            cursor:pointer;
        }
        label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
            outline: 100px solid rgba(98, 203, 39, 0.25) !important;
            outline-offset: -100px;
            overflow: hidden;
            position: relative;
            height: 200px;
            width: 200px;
        }
        form *{
            margin-bottom:5px;
            line-height: 30px;
        }
        form > #name {
            padding-top: 20px;
        }
       
        #submit{
            border: 1px solid #ff99cc;
            border-radius: 4px;
            font-weight: bold;
        }
       
    
    @media only screen and (min-width : 480px) {
       label{
           width: 30% !important;
       } 
    }
    @media only screen and (max-width: 600px) {
    
   label
   {
       width: 30%;
   }
   label > input:checked + img {
       height: 70px !important;
       outline-offset: -200px !important;
   }
 
}

@media only screen and (min-width: 1200px) {
    label > input:checked + img {
         overflow: unset !important; 
          height: 170px !important; 
    }
}

.tab-content .active { background-color: unset !important }

.new-page-123 { padding:20px 0 }

.new-page-123 div#v-pills-tab .nav-link {
    font-size: 16px;
    padding: 10px;

    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: stretch;
    align-content: flex-start;
    width: 100%;
    

    color: #000 !important;
	
}

.new-page-123 .nav-link i , .new-page-123 .nav-link p{
    margin: 0px !important;
    padding: 0 5px !important;
    color:#000 !important;
}

div#v-pills-tab {
    /*background: #fff;*/
    background: #f2f6fa;
}


.new-page-123 .show {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-items: flex-start;
    align-content: flex-start;
    width: 100%;
    text-align: right;
}

.nav-link.active, .nav-link.active i, .nav-link.active p {
    color: #fff !important;
}

.tab-pane h4 {
        text-align: right;
}

.nav-link.active i {
    font-size: 22px;
}

.nav-link.active p {
    font-size: 18px !important;
    font-weight: bold;
}


.new-page-123 .nav-link i {
    color: #62cb5d !important;
}

.new-page-123 .nav-link.active i {
    color: #fff !important;
}

label {
 
    float: right;
    margin-right: -35px;
}

select.form-control:not([size]):not([multiple]) {

    height: 40px;
}
 
              .navlink.w--current {
                    color: #000;
                    font-weight: 700;
                }
               .w-nav-link {
            
                 color: unset; 
                 padding: unset; 
               }
               a {
                    background-color: transparent;
                }
                .navlink {
                    padding: 34px 15px;
                    -webkit-transition: all 300ms ease-in-out;
                    transition: all 300ms ease-in-out;
                  
                        font-family: Jannalt, sans-serif;
                    color: #4a4a4a;
                    font-size: 1.3em;
                }
                .navlink:hover {
    -webkit-transform: translate(0px, -2px);
    -ms-transform: translate(0px, -2px);
    transform: translate(0px, -2px);
                }
a:active, a:hover {
    outline: 0;
}

#v-pills-profile_csr table { margin-top : 8% !important }

#v-pills-profile_csr table th , #v-pills-profile_csr table td { 
      vertical-align : middle !important ; 
      font-family : arial,tahoma ; 
      padding : 20px !important ; 
      border : 2px solid #DDD !important
}

html , body {
     overflow-x : hidden !important;
     overflow-y : auto !important;
     width : 100% !important
}

.form-group {
    margin-bottom : 6rem !important;
}

    </style>
@endsection
@section('content')
@php
 $get_charity = App\User::where('email' , auth()->user()->email)->first();
@endphp
<!-- Remove modal -->
<div id="remove_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Confirm action</h5>
			</div>

			<div class="modal-body">
				You are about to delete this line. Are you sure?
				<input type="hidden" id="id_case_del" class="form-control" value="">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Delete()">Yes, delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">No thanks</button>
			</div>
		</div>
	</div>
</div>
<!-- /remove modal -->
<div class = "new-page-123" >
    <div class = "container" >
        <div class = "row" >
            <div class = "col-lg-12" >
                <div class = "col-lg-6" style = "margin:0 !important" >
                    <div class = "login_infos" style = "text-align:right;margin:5% 0 !important" >
                        <img class = "profile_image" src = "https://placehold.it/100/100" alt = "profile_image" style = "width:50px;height:50px;border-radius:50%" />
                         <span class = "login" style = "font-size:20px" > جمعية رسالة</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class = "row" >
            
            <div class = "col-lg-12" >
                
                <div class = "col-lg-4" >
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style = "margin-bottom:5% !important" >
                       <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#edit_charity_infos" role="tab" aria-controls="v-pills-home" aria-selected="true"> <i class="fa fa-home"></i> <p> تعديل البيانات الشخصية </p></a>
                       <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#charity_add_case" role="tab" aria-controls="v-pills-profile" aria-selected="false">  <i class="fa fa-home"></i> <p> اضافة حالة  </p> </a>
                       <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#charity_history" role="tab" aria-controls="v-pills-profile" aria-selected="false">  <i class="fa fa-home"></i> <p>  الارشيف  </p> </a>
                     </div>
                </div>
                
                <div class = "col-lg-8" >

                    <div class="tab-content" id="v-pills-tabContent" style = "padding:8px 0 !important" >
                           <div class="tab-pane fade show active" id="edit_charity_infos" role="tabpanel" aria-labelledby="v-pills-home-tab">
                           @include('website.notfi')
                           <form  action="{{url('updateprofile_charity')}}" method="post" enctype="multipart/form-data">
                               {{csrf_field()}}
                               <input type="hidden" name="id" value="{{$get_charity->id}}" >
                               
                               <!-- Start Edit Charity Name -->
                               
                               <div class = "form-group" >
                                   <label for = "name" class="control-label">الاسم</label>
                                   <input type="text"  value="{{$get_charity->name}}" class="textfield w-input" autofocus="true" maxlength="256" name="name" data-name="name" placeholder="..برجاء ادخال اسمك" id="name-3 ">
                               </div>
                               
                               <!-- End Edit Charity Name -->
                               
                               
                               <!-- Start Edit Charity Address -->
    
                               <div class = "form-group" >
                                   <label for = "address" class="control-label" >العنوان</label>
                                   <input name="address" class="textfield w-input" value="{{$get_charity->address}}" placeholder="العنوان">
                               </div>
    
                               <!-- End Edit Charity Address -->
                               
                               <!-- Start Edit Charity Telephone -->
                               
                               <div class = "form-group" >
                                   <label for = "telephone" class="control-label" >رقم الهاتف</label>
                                   <input type="tel" class="textfield w-input" value="{{$get_charity->phone}}" maxlength="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" data-name="phone" placeholder="..برجاء ادخال رقم الهاتف" id="phone-2">
                               </div>
                               
                               <!-- End Edit Charity Telephone -->
                               
                               <!-- Start Edit Charity Profile -->
                               
                               <div class = "form-group" >
                                   <label for = "image" class="control-label" > تغيير الصورة </label>
                                   @if(!$get_charity->img )<img src="https://placehold.it/100/100" alt="Avatar" style="width:30%;  border-radius: 50%;" /> @else <img src="{{asset('uploads/files/'.$get_charity->img)}}" alt="Avatar" style="width:30%;  border-radius: 50%;" /> @endif
                                    <input class="fileInput" type="file" name="file" />   
                               </div>
                               
                               <!-- End Edit Charity Profile -->
                               
                               <!-- Start Submit Button -->
                                        
                               <input style="margin-top:20px;" type="submit" value="حفظ التغييرات" class="btn btn-success btn-md"/>
                               
                               <!-- End Submit Button -->
                               
                        </form>
                      </div>
                           <div class="tab-pane fade" id="charity_add_case" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                       
                           <form id = "charity_case" method="post" action="{{ url('addcase_charity') }}" id="formmounth" enctype="multipart/form-data" style="color: white;">
                            {{csrf_field()}}
                            <input type="hidden" name="charity_id"  value="{{$get_charity->id}}">
                           
                            <!-- Start Case State -->
                            
                            <div class="form-group">
                                <label for = "state" class="control-label" > نوع الحالة </label>
                                <input id = "state" class="textfield w-input" autofocus="true"  name="name" data-name="name" placeholder="برجاء ادخال نوع الحالة"  required />
                            </div>
                             
                            <!-- End Case State -->
                              <!-- Start Case State -->
                            
                            <div class="form-group">
                                <label for = "state" class="control-label" > اسم صاحب الحالة  </label>
                                <input id = "persone" class="textfield w-input"  name="persone" data-name="name" placeholder="برجاء ادخال اسم \كود صاحب الحاله " required>
                            </div>
                             
                            <!-- End Case State -->
                            <!-- Start Case Description -->
                            
                            <div class="form-group">
                                <label for = "case_description" class="control-label" >  وصف الحالة  </label>
                                <textarea id = "case_description" name = "description" class = "textfield form-control w-input" placeholder = "برجاء ادخال وصف الحالة" rows = "5"  maxlength =  "256"  required style = "padding:15px !important"  ></textarea>
                            </div>
                            
                            <!-- End Case Description -->
                            
                            <!-- Start Case Amount -->
                            
                            <div class="form-group">
                                <label for = "case_amount" class="control-label" >  الكمية المطلوبة   </label>
                                <input id = "max_amount" value="" class="textfield w-input" autofocus="true" name="max_amount" data-name="name" placeholder="برجاء ادخال الكمية المطلوبة" id="name-3" required="">
                            </div>
                            <!-- End Case Amount -->
                         
                            <button onclick="submitDetailsForm()" class="btn btn-success btn-md month"  style="margin-top: 20px;margin-left: 60%;font-size: 18px;">إرسل طلبك</button>
                             <!-- Submit Button -->
                             
                        </form>
                       </div>
                          <!-- Start Charity Profile History -->
                          <div class="tab-pane fade" id="charity_history" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                             
                             <div style = "overflow-x:auto" >
                                 <table class="table table-bordered" >
                                    <thead>
                                      <tr>
                                        <th> نوع الحالة </th>
                                        <th> اسم صاحب الحالة</th>
                                        <th> وصف الحالة </th>
                                        <th> الكمية المطلوبة </th>
                                        <th> تاكيد </th>
                                        <th> التاريخ</th>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach(App\AdminModel\Mcase::where('charity_id',$get_charity->id)->get() as $case)
                                       <tr>
                                        <td> {{$case->name}} </td>
                                        <td>{{$case->persone}}</td>
                                        <td> {{$case->description}} </td>
                                        <td> {{$case->max_amount}} </td>
                                        <td>@if($case->approval == 0) قيد الانتظار@else تمت الموافقة@endif </td>
                                        <td>{{$case->updated_at}}</td> 
                                        <td><a href="{{url('updatecase_charity/'.$case->id)}}"></a></td>
                                        <td> <a href="#" class="delete btn btn-danger btn-md"  onclick="delCat({{$case->id}})" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i>delete</a></td>

                                      </tr>
                                      @endforeach
                                    </tbody>
                              </table>
                             </div>
                          </div>
                          <!-- End Charity Profile History -->
                          
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                              <h4> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </h4>
                          </div>
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                             <h4> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </h4>
                          </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Start Include JQuery Validation Plugin-->
        
        <script src = "{{ asset('chefaa_design/js/jquery.validate.min.js') }}" ></script>
        
        <!-- End Include JQuery Validation Plugin -->
        
    <script type = "text/javascript" >
        
        jQuery.validator.setDefaults({
                  debug: true,
                  success: "valid"
                });
                $("#charity_case").validate({
                  rules: {
                    state : {
                        required : true,
                        maxlength : 10
                    },
                    persone : {
                        required : true,
                        maxlength : 30
                    },
                    case_description : {
                        required : true
                    },
                     max_amount: {
                      required: true,
                      number: true,
                      maxlength : 6
                    }
                  },
                  messages : {
                      state : {
                          required : "<div style = 'color:darkred' > من فضلك ادخل نوع الحالة </div>" ,
                          maxlength : "<div style = 'color:darkred' > من فضلك ادخل فيما لايزيد عن 10 حروف  </div>"
                      },
                      persone : {
                          required : "<div style = 'color:darkred' >  من فضلك ادخل اسم صاحب الحالة  </div>" ,
                          maxlength : "<div style = 'color:darkred' >  من فضلك ادخل فيما لايزيد عن 30 حرف  </div>" ,
                      },
                      case_description : {
                          required : "<div style = 'color:darkred' >    من فضلك ادخل وصف الحالة  </div>",
                      },
                      max_amount : {
                          required  : "<div style = 'color:darkred' > من فضلك ادخل الكمية </div>",
                          number    : "<div style = 'color:darkred' > من فضلك ادخل ارقام فقط </div>",
                          maxlength : "<div style = 'color:darkred' > من فضلك ادخل 6 ارقام فقط </div> "
                      }
                  }
                });
        
    </script>
        
<script>

     function delCat(id){
      $("#id_case_del").val(id);
      $("#remove_modal").modal();
  }
  
  function Delete() {
      var id    = $("#id_case_del").val();
      $.get("{{ url('deletecase_charity') }}?id="+id, function(data, status){

             location.reload();
          swal({
              position: 'top-center',
              type: 'success',
              title: 'deleted successfully',
              showConfirmButton: false,
              timer: 1500
          });
        });
  }
  
   function submitDetailsForm() {
    $( "#charity_case" ).submit();
  }
</script>
@section('js')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
// <script>
//     $( document ).ready(function() {
//       jQuery.noConflict();
//     });
// </script>
@endsection
@endsection