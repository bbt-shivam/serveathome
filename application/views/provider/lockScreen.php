<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/lock_screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:59:13 GMT -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Smart University | Bootstrap Responsive Admin Template</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="<?=base_url('assets/provider/')?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/provider/')?>plugins/iconic/css/material-design-iconic-font.css">
	<!-- bootstrap -->
	<link href="<?=base_url('assets/provider/')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?=base_url('assets/provider/')?>css/pages/extra_pages.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?=base_url('assets/provider/')?>img/favicon.ico" />
	<link rel="stylesheet" href="<?=base_url('assets/provider/')?>plugins/iconic/css/">
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<img src="<?=base_url('assets/provider/')?>img/dp.jpg" class="imgroundcorners" alt="John Doe">
					</span>
					<span class="login100-form-title  p-t-27">
						<?= $this->session->userdata('user')['name']?>
					</span>
					<p class="text-center txt-locked">
						Locked
					</p>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<form method="post" action="<?=base_url('loginCheck'); ?>">
						<input type="hidden" name="email" value="<?= $this->session->userdata('user')['email']?>">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Login">
					</div>
					<div class="text-center p-t-27">
						<a class="txt1" href="login.html">
							sign in as a different user
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
		
	<script src="<?=base_url('assets/provider/')?>plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?=base_url('assets/provider/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/provider/')?>js/pages/extra-pages/pages.js"></script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/lock_screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:59:16 GMT -->
</html>