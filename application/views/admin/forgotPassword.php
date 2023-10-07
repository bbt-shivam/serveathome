<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:04:57 GMT -->
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
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>plugins/iconic/css/material-design-iconic-font.css">
	<!-- bootstrap -->
	<link href="<?=base_url('assets/admin/')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>css/pages/extra_pages.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?=base_url('C_admin/sendLink')?>">
					<span class="login100-form-logo">
						<img alt="" src="<?=base_url('assets/admin/')?>img/logo-2.png">
					</span>
					<!-- <span class="login100-form-title  p-t-27">
						Forgot Your Password?
					</span> -->
					<p class="text-center txt-small-heading">
						Forgot Your Password? Let Us Help You.
					</p>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="email"
							placeholder="Enter Your Register Email Address" id="email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<span class="text-danger"><?=$this->session->flashdata('emailErr')?></span>
					<span class="text-danger"><?=form_error('email')?></span>
					
					<div class="container-login100-form-btn" style="padding-top: 20px;">
						<button class="login100-form-btn" id="sendLink">
							Send
						</button>
					</div>
					<div class="text-center p-t-27">
						<a class="txt1" href="<?=base_url('C_admin')?>">
							Login?
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


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:04:57 GMT -->
</html>