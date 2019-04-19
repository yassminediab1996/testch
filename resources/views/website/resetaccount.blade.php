<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Account </title>
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



		<link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
		 <link rel="stylesheet" type="text/css" href="{{asset('website/css/rtl.css')}}" media="all"/> 
</head>
<style>
    .container-login100::before{
        background: unset !important;
    }
    .input100{
            border-style: solid;
    border-color: #238239;
    }
</style>
<body>
 <div style="color:green; text-align:center;">
   
 </div>     @include('website.notfi')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
			  
				<form class="login100-form validate-form" action="{{url('reset')}}" method="post" style="    margin-top: -190px;">
				    {{csrf_field()}}
					<div class="login100-form-avatar" style="    margin-bottom: 20px;
">
						<img src="{{asset('images/logo-colored.png')}}" alt="AVATAR">
					</div>


					<div class="wrap-input100 m-b-10" >
						<input class="input100" type="hidden" name="email" value="{{$email}}" >
						<input class="input100" type="hidden" name="token" value="{{$token}}" >
						<input class="input100" type="password" name="password" placeholder="كلمة السر الجديدة" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" style="    margin-right: 10px;"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							تغيير كلمة السر
						</button>
					</div>
				
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('logindesign/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('logindesign/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('logindesign/js/main.js')}}"></script>

</body>
</html>