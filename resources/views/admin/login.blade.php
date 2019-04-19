<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>@yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="{{asset('admin_en/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="{{asset('admin_en/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="{{asset('admin_en/assets/plugins/themify/css/themify.css')}}" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="{{asset('admin_en/assets/plugins/angular-tooltip/angular-tooltips.css')}}" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="{{asset('admin_en/css/animate.css')}}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{asset('admin_en/css/glovia.css')}}" rel="stylesheet">
		<link href="{{asset('admin_en/css/glovia-responsive.css')}}" rel="stylesheet">
		
		<!-- Custom styles for Color -->
		<link href="{{asset('admin_en/css/skins/default.css')}}" rel="stylesheet">
			<link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

		<link rel="icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/icon.png')}}">
		<link rel="apple-touch-icon" href="{{asset('images/icon.png')}}">
	</head>

	<body>
	
		<div class="container-fluid">
			<div class="row">
			

				<div class="col-12 col-sm-12 col-md-12 col-lg-12 login-sidebar animated fadeInRightBig">

					<div class="login-container animated fadeInRightBig">

						<h2 class="text-center text-upper" style="    margin-left: -190px;color: green;
">Login To chefaa Dashboard</h2>
						<form class="form-horizontal" action="{{url('17$es12/loginadmin')}}" method="post" style="    margin-left: 340px;
">
							{{csrf_field()}}
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email or Username" style="    width: 620px;
">
								<i class="fa fa-user"></i>
							</div>
							<div class="form-group help">
								<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" style="    width: 620px;
">
								<i class="fa fa-lock"></i>
								<a href="#" class="pass-view fa fa-eye"></a>
							</div>
							
						
							
							<div class="form-group">
								<div class="flexbox align-items-center">
									<button type="submit" class="btn btn-lg btn-success" style="    margin-left: 220px;
">log in</button>
								</div>
							</div>
						
						</form>
					</div> 
					<!-- .login-container -->
					
				</div> <!-- .login-sidebar -->
			</div> <!-- .row -->
		</div>
		

		<!-- Bootstrap core JavaScript-->
		<script src="{{asset('admin_en/assets/plugins/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('admin_en/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		
		<!-- Core plugin JavaScript-->
		<script src="{{asset('admin_en/assets/plugins/jquery-easing/jquery.easing.min.js')}}"></script>
		
		 <!-- Slick Slider Js -->
		<script src="{{asset('admin_en/assets/plugins/slick-slider/slick.js')}}"></script>
		
		<!-- Slim Scroll -->
		<script src="{{asset('admin_en/assets/plugins/slim-scroll/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Custom scripts for all pages-->
		<script src="{{asset('admin_en/js/glovia.js')}}"></script>
		
		<script>
		  $('.dropdown-toggle').dropdown()
		</script>
	  
	</body>
</html>
