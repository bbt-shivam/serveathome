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
				<form class="login100-form validate-form" method="post" action="<?=base_url('C_admin/changePassword'); ?>">
					<span class="login100-form-logo">
						<img alt="" src="<?=base_url('assets/admin/')?>img/logo-2.png">
					</span>
					<div class="page-logo"style="margin-left: 80px; margin-top: 20px; margin-bottom: 20px; ">
						<span class="logo-icon material-icons fa-rotate-45 text-white" style="padding-left: 20px;">school</span>
						<span class="logo-default text-white" style="font-size: 20px;">SERVEATHOME</span> <br>
						<span style="margin-left: 50px;">(Change Password)</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Enter Old password">
						<input class="input100" type="password" name="oldPassword" placeholder="Old Password"
						 value="<?=set_value('password')?>">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<span class="text-danger"><?=form_error('oldPassword')?></span>

					<div class="wrap-input100 validate-input" data-validate="Enter New password">
						<input class="input100" type="password" name="newPassword" placeholder="New Password"
						 value="<?=set_value('password')?>">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<span class="text-danger"><?=form_error('newPassword')?></span>

					<div class="wrap-input100 validate-input" data-validate="Enter password again">
						<input class="input100" type="password" name="conPassword" placeholder="Confirm Password"
						 value="<?=set_value('conpassword')?>">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<span class="text-danger"><?=form_error('conPassword')?></span>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Change
						</button>
						<a href="<?=base_url('C_admin/profile')?>" class="btn btn-lg btn-circle btn-danger px-4" style="border-radius: 30px; margin-left: 10px;">
							Cancle
						</a>
						<!-- <button type="button" class="btn btn-circle btn-danger">Danger</button> -->
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