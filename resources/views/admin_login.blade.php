<!DOCTYPE html>
<head>
	<title>MANAGER ADMIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="ADMIN"/>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('./backend/css/bootstrap.min.css')}}" >
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('./backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('./backend/css/style-responsive.css')}}" rel="stylesheet"/>
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('./backend/css/font.css')}}" type="text/css"/>
	<link href="{{asset('./backend/css/font-awesome.css')}}" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<script src="{{asset('./backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>ĐĂNG NHẬP</h2>
			<?php
			$message = Session::get('message');
			if($message){
				echo '<span class="text-alert">'.$message.'</span>';
				Session::put('message',null);
			}
			?>
			<form action="{{url('/admin-dashboard')}}" method="post">
				@csrf
				<input type="text" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
				<input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
				<div class="clearfix"></div>
				<input type="submit" value="ĐĂNG NHẬP" name="login">
			</form>
		</div>
	</div>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="{{asset('./backend/js/bootstrap.js')}}"></script>
	<script src="{{asset('./backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('./backend/js/scripts.js')}}"></script>
	<script src="{{asset('./backend/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('./backend/js/jquery.nicescroll.js')}}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
		<script src="{{asset('./backend/js/jquery.scrollTo.js')}}"></script>
	</body>
	</html>
