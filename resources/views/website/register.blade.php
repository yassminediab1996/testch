<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('logindesign/css/main.css')}}">
<!--===============================================================================================-->
	<link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

		<link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
		 <link rel="stylesheet" type="text/css" href="{{asset('website/css/rtl.css')}}" media="all"/> 
</head>
<style>
    .reg{
            font-family: Montserrat-Bold;
    font-size: 15px;
    line-height: 1.2;
    color: #333333;
    display: block;
    width: 100%;
    background: #fff;
    height: 50px;
    border-radius: 25px;
    padding: 0 30px 0 53px;
    }
    
     .container-login100::before{
        background: unset !important;
    }
    .input100{
            border-style: solid;
    border-color: #238239;
    }
    
        
</style>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">

				<form class="login100-form " action="{{url('registeruser')}}" method="post"  style="margin-top: -190px;">
				    {{csrf_field()}}
					<div class="login100-form-avatar" style="margin-bottom: 20px;">
						<img src="{{asset('images/logo-colored.png')}}" alt="AVATAR">
					</div>
					 @include('website.notfi')
                     <div class="wrap-input100  m-b-10">
						<input class="input100" type="text"  name="name" placeholder="الاسم">
						<span class="symbol-input100">
							<i class="fa fa-user" style="margin-right: 10px;"></i>
						</span>
				  	</div>
					
					<div class="wrap-input100  m-b-10" >
						<input class="input100" type="text" name="email" placeholder="الايميل">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" style="margin-right: 10px;"></i>
						</span>
					</div>

					<div class="wrap-input100  m-b-10" >
						<input class="input100" type="password" name="password" placeholder="الباسورد">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" style="margin-right: 10px;"></i>
						</span>
					</div>
					<div class="wrap-input100  m-b-10"  style="    border-radius: 25px; border-style: solid;border-color: #238239;">
    				     <select required class="form-control reg" onchange="getstate(this.value)" >
          
                           @foreach(App\AdminModel\City::where('parent' , 0)->get() as $country)
                             @foreach(App\AdminModel\City::where('parent' , $country->id)->get() as $gover)
                              
                            <option value="{{$gover->id}}" >{{$gover->name_ar}}</option>
                           @endforeach
                            @endforeach
                       </select>
				
			    	</div>
					<div class="wrap-input100  m-b-10"  style="    border-radius: 25px; border-style: solid;border-color: #238239;">
					    <select class="form-control reg" id="sub_id_add"  name="state_id">
					        @php
                        $getfirstcountry = App\AdminModel\City::where('parent' , 0)->first() ;
                        $getfirstgovern = App\AdminModel\City::where('parent' , $getfirstcountry->id)->first() ;
                       @endphp
                       @foreach(App\AdminModel\City::where('parent' ,$getfirstgovern->id)->get() as $gover)
                          
                        <option value="{{$gover->id}}" selected>{{$gover->name_ar}}</option>
                       @endforeach
					    </select>
				
			    	</div>
			    	
			    	<div class="wrap-input100  m-b-10" >
						<input  type="radio" name="sex" value="1">
						<label>ذكر</label>
						
						<input type="radio" name="sex" value="2">
						<label>انثى</label>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							اضافة مستخدم جديد
						</button>
					</div>

					<div class="text-center w-full" style=" margin-top: 10px;">
						<a class="txt1" href="{{url('login')}}" style="color: #0d0d0d;">
						    تسجيل دخول 
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
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
    <script>
    $(function() {
        $('.form').validator({
            validHandlers: {
                '.customhandler':function(input) {
                    //may do some formatting before validating
                    input.val(input.val().toUpperCase());
                    //return true if valid
                    return input.val() === 'JQUERY' ? true : false;
                }
            }
        });

        $('form').submit(function(e) {
            e.preventDefault();

            if ($('.form').validator('check') < 1) {
                alert('Hurray, your information will be saved!');
            }
        })
    })
    </script>
	
<!--===============================================================================================-->	
	<script src="{{asset('logindesign/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('logindesign/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/js/main.js')}}"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/validate-bootstrap/validate-bootstrap.jquery.min.js"></script>
</body>
</html>