<!DOCTYPE html>
<html>

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
	<link href="<?=base_url('assets/admin/')?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/admin/')?>fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>plugins/iconic/css/material-design-iconic-font.css">
	<link href="<?=base_url('assets/admin/')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>css/pages/extra_pages.css">
	<link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />



</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?=base_url('C_admin/loginCheck'); ?>">
					<span class="login100-form-logo">
						<img alt="" src="<?=base_url('assets/admin/')?>img/logo-2.png">
					</span>

					<div class="page-logo"style="margin-left: 80px; margin-top: 20px; margin-bottom: 20px; ">
						<span class="logo-icon material-icons fa-rotate-45 text-white" style="padding-left: 20px;">school</span>
						<span class="logo-default text-white" style="font-size: 20px;">SERVEATHOME</span> <br>
						<span style="margin-left: 70px;">(admin login)</span>
					</div>

					<span class="text-black"><?=$this->session->flashdata('passwordChanged')?></span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div>
						<span class="text-danger"><?= $this->session->flashdata('message'); ?></span>
						<span class="text-danger"><?= $this->session->flashdata('warning'); ?></span>
					</div>
					<!-- <div class="contact100-form-checkbox">

						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="<?=base_url('C_admin/forgotPasswordPage')?>">
							Forgot Password?
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?=base_url('assets/admin/')?>plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?=base_url('assets/admin/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/admin/')?>js/pages/extra-pages/pages.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:59:24 GMT -->
</html>