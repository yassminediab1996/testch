<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
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
		 
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<style>
    .container-login100::before{
        background: unset !important;
    }
    .input100{
            border-style: solid;
    border-color: #238239;
    }
    
    .errorTxt{
  border: 1px solid red;
  min-height: 20px;
}
</style>
<body>
 <div style="color:green; text-align:center;">
   
 </div>   
	<div class="limiter">
	    
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
		    	 
			<div class="wrap-login100 p-t-190 p-b-30">
		
				<form class="login100-form validate-form form" action="{{url('loginuser')}}" method="post" style="    margin-top: -190px;" id="form">
				    {{csrf_field()}}
					<div class="login100-form-avatar" style="    margin-bottom: 20px;
">
						<img src="{{asset('images/logo-colored.png')}}" alt="AVATAR">
					</div>

                      @include('website.notfi')
					<div class="wrap-input100 m-b-10" >
						<input class="input100"  type="text"    value="{{ old('email') }}" name="email" placeholder=" الايميل" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" style="margin-right: 10px;"></i>
						</span>
					</div>

					<div class="wrap-input100  m-b-10" >
						<input class="input100"  type="password" name="password" placeholder="كلمه المرور">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" style="margin-right: 10px;"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							تسجيل دخول
						</button>
					</div>
					<br/>
					<div class="row text-center w-full justify-content-md-center mt-2">
                    <a href="{{url('login/facebook')}}"><i class="fab fa-facebook-square fa-3x" style="color:#4867AA;" ></i></a>
                    <a href="{{url('login/google')}}"><i class="fab fa-google-plus-square fa-3x ml-3 mr-3" style="color:#DD4D42;"></i></a>
                    <a href="{{url('login/twitter')}}"><i class="fab fa-twitter-square fa-3x" style="color:#1DA1F2;" ></i></a>
				
                    </div>
					<div class="text-center w-full" style=" margin-top: 10px;">
						<a class="txt1" href="{{url('register')}}" style="    color: #0d0d0d;   ">
							اضافة مستخدم جديد  
							<i class="fas fa-arrow-left"></i>						
						</a>
					</div>
					
						<div class="text-center w-full" style=" margin-top: 10px;">
						    <p>اذا نسيت كلمه المرور يمكنك استرجعها عبر البريد الإلكترونى الخاص بك</p>
						<a class="txt1" href="{{url('viewresetpas')}}" style="    color: #0d0d0d;   ">
							  هل نسيت كلمة المرور ؟  
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/logindesign/js/validate-bootstrap/validate-bootstrap.jquery.min.js')}}"></script>
    <script>
    $(function() {
        $('form').validator({
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

            if ($('form').validator('check') < 1) {
                alert('Hurray, your information will be saved!');
            }
        })
    })
    </script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
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