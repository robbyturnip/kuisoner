<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{ URL::asset('template/login/login/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/login/login/css/main.css')}}">
</head>
<body>
			<div>
			@if(\Session::has('alert'))
				<div class='alert alert-danger'>
					<div>
						{{Session::get('alert')}}
					</div>
				</div>
			@endif
			@if(\Session::has('alert-success'))
				<div class='alert alert-success'>
					<div>
						{{Session::get('alert-success')}}
					</div>
				</div>
			@endif
		<div class="wrap-login100 m-t-32">
			<div data-aos="fade-up" data-aos-delay="100">
				<span class="p-b-30">
					<h2 class="section-title mb-5" style="color:#fff !important; text-align:center !important;">Login</h2>
				</span>
			</div>
			<form action="{{url('/login')}}" method="post" class="login100-form validate-form p-b-33 p-t-5" data-aos="fade-up" data-aos-delay="200">
					{{csrf_field()}}
				<div class="wrap-input100 validate-input" data-validate = "Enter username">
					<input class="input100" type="text" name="username" placeholder="User name">
					<span class="focus-input100" data-placeholder="&#xe82a;"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>
				<div class="container-login100-form-btn m-t-32">
					<button class="btn py-3 px-5  btn-pill" style="background-color:#1c4b82 !important; color:#fff !important;">
						Login
					</button>
				</div>
				</form>
			</div>
		</div>
	

	<div id="dropDownSelect1"></div>
	<script src="{{ URL::asset('template/login/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/select2/select2.min.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{ URL::asset('template/login/login/js/main.js')}}"></script>

</body>
</html>