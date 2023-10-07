<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>	
<title class="noprint">serveathome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/')?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/rangeslider.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=base_url('assets/provider/')?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets/provider/')?>fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
   <link href="<?=base_url('assets/provider/')?>css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?=base_url('assets/provider/')?>css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/provider/')?>css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/provider/')?>css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/provider/')?>css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/provider/')?>css/pages/formlayout.css" rel="stylesheet" type="text/css" />



    
<style type="text/css">
    .fa-rotate-45 {
    -webkit-transform: rotate(330deg) !important;
    -moz-transform: rotate(330deg) !important;
    -ms-transform: rotate(330deg) !important;
    -o-transform: rotate(330eg) !important;
    transform: rotate(330deg) !important;
}
.logo-icon{
    font-size: 32px !important;
    padding-right: 8px;
    float: left;
}

    @media print{
        .noprint{
            display: none;
        }
    }

</style>


</head>


<!-- END HEAD -->

<body>
	<div class="site-wrap noprint" style="margin-top: 0px;">

		<div class="site-mobile-menu noprint">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body noprint"></div>
		</div>

		<header class="site-navbar container-fluid bg-black" role="banner">

			<div class="row align-items-center">
				<div class="col-11 col-xl-2">
					<a class="noprint text-white" href="<?=base_url()?>">
						<span class=" logo-icon material-icons fa-rotate-45" style="padding-left: 30px;">school</span>
						<span style="font-size: 20px; font-weight: bold;">serveathome</span> 
					</a>
				</div>
				<div class="col-10 col-md-10 d-none d-xl-block noprint">
					<nav class="site-navigation position-relative text-right" role="navigation">
						<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
							<li>
								<a href="<?= base_url(); ?>">Home</a>
							</li>
							<li>
								<a href="<?=base_url('about')?>">About Us</a>
							</li>
							<li class="mr-5">
								<a href="<?=base_url('contact'); ?>">Contact Us</a>
							</li>
							<?php if($this->session->has_userdata('user')) : ?>
							<li class="has-children ml-xl-3 mr-5 login">
								<span class="border-left pl-xl-4"></span>
				                <a href="#"><?php $user = $this->User_model->get_user($this->session->userdata('user')['uid']);
				                 	if($user[0]['name'] ==null || $user[0]['name']=='') echo "My Account"; else echo $user[0]['name']; ?>
				                 		
				                </a>
				                 <ul class="dropdown" style="right: 0; left: auto; border-right: 10px solid transparent;">
				                 	<li style="font-size: 12px;">
				                 		<a href="<?=base_url('profile');?>">My Profile</a>
				                 	</li>
				                    <li style="font-size: 12px;">
				                    	<a href="<?=base_url('orders');?>">My Orders</a>
				                    </li>
				                   <!--  <li style="font-size: 12px;">
				                    	<a href="#">Coupans</a>
				                    </li> -->
				                  <!--   <li style="font-size: 12px;"><a href="#">Notifications</a></li> -->
				                    <li style="font-size: 12px;">
				                    	<a href="<?=base_url('C_provider')?>">Add Your Business</a>
				                    </li>
				                    <li style="font-size: 12px;">
				                    	<a href="<?=base_url('logOut'); ?>">Logout</a>
				                    </li>
				                </ul>
			              	</li>
							<?php else: ?>
								<li class="ml-xl-3 mr-5 login">
									<a href="<?=base_url('signUp'); ?>"><span class="border-left pl-xl-4"></span>Log In / Sign up</a>
								</li>
							<?php endif; ?>
						</ul>
					</nav>
				</div>
				<div class="d-inline-block d-xl-none ml-auto py-3 col-1 text-right noprint" style="right: 15px;">
					<a href="#" class="site-menu-toggle js-menu-toggle text-white noprint"><span class="icon-menu h3"></span></a>
				</div>
			</div>
		</header>
	</div>

	<div class="page-wrapper" style="margin-top: -90px;">
		
		<div class="page-container" style="margin:150px; margin-top: 100px;">
			<!-- start page content -->
				<div class="page-content">
					<div class="row py-4">
						
						<div class="col-md-12 col-12" style="margin-top: 100px;">
							<div class="white-box py-5">
								<h3><b>
									<span class="text-black logo-icon material-icons fa-rotate-45" style="padding-left: 30px;">school</span>
									<span class="text-black" style="font-size: 20px; font-weight: bold;">serveathome</span> </a></b> </h3>
								<hr>
								<div class="row py-5">
									<div class="col-md-12">
										<div class="pull-left col-6">
											<address>
												<!-- <img src="../assets/img/invoice_logo.png" alt="logo"
													class="logo-default" /> -->

													<h2 class="addr-font-h2" style="padding-top: 60px; padding-bottom: 10px;"><b><?=$provider[0]['shop_name']?></b></h2>
													<p class="text-muted m-l-5">
													<?=$provider[0]['address']?>, <br>
													<?=$provider[0]['locality']?>, <br>
													<?=$provider[0]['landmark']?>, <br>
													<?=$provider[0]['city_name']?> - 
													<?=$provider[0]['pincode']?>
												</p>
											</address>
											<?php $odstatus = $order[0]['order_status'];
											  if($odstatus == -1){
														echo '<span class="font-bold addr-font-h4">Order Status:</span><span> ';
														echo 'Order canclled.';}
														elseif($odstatus == 2) {
															echo '<span class="font-bold addr-font-h4">Order Status:</span><span> ';
														echo 'Order delivered.';
														}
														else{
															echo '<span class="font-bold addr-font-h4">Order Status:</span><span> ';
														echo 'Order not delivered.';
														}
													?></span>
										</div>
										<div class="pull-right text-right col-6">
											<b>#Order No: <?=$order[0]['oid']?></b>
											<address>
												<p class="addr-font-h3">Customer Details</p>
												<p class="font-bold addr-font-h4"><?=$order[0]['uname']?></p>
												<p class="">+91<?=$order[0]['contact']?></p>
												<p class="text-muted m-l-30">
													<?=$order[0]['address']?>
												</p>
												<p class="m-t-30" style="padding-top: 40px;">

													<b>Invoice Date :</b> <i class="fa fa-calendar"></i>
													 <?php $datetime = new DateTime($order[0]['order_date']);
													 	$date=$datetime->format('d-F-Y');
													 	echo $date;
													 ?>
												</p>
											</address>
										</div>
									</div>
									<?php $subtotal = 0; ?>
									<div class="col-md-12">
										<div class="table-responsive m-t-40">
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="text-center">#</th>
														<th class="text-center">Services</th>
														<th class="text-center">Date-Time</th>
														<th class="text-right">Price</th>
														<th class="text-right">GST</th>
														<th class="text-right">Amount</th>
													</tr>
												</thead>
												<tbody>
													<?php $cnt=1; $gstTotal=0; foreach ($service as $s): ?>
													
													<tr>
														<td class="text-center"><?php echo $cnt; $cnt++;?></td>
														<td class="text-center"><?=$s[0]['sname']?></td>
														<td class="text-center"><?=$order[0]['order_date']?></td>
														<td class="text-right">&#8377; <?=$s[0]['price'].'.00'?></td>
														<td class="text-right">&#8377; <?php $gst=($s[0]['price']*18)/100; echo $gst; $gstTotal += $gst;?> (18%)</td>
														<td class="text-right">&#8377; <?php 
																$totalAmt=$s[0]['price']+$gst;
																echo $totalAmt.'.00';
																$subtotal=$subtotal+$totalAmt;?></td>
													</tr>
												<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-12" style="padding-top: 40px;">
										<div class="pull-right m-t-30 text-right">
											<p>Sub - Total amount: &#8377; <?=$order[0]['order_amount'].'.00'?></p>
											<p>GST Total : &#8377; <?=$gstTotal?></p>
											<p>Discount : &#8377; <?=$order[0]['discount'].'.00'?> </p>
											<hr>
											<h3><b>Total :</b> &#8377; <?=$order[0]['final_price'].'.00'?></h3>
										</div>
										<div class="clearfix">
											
										</div>
										<hr>
										<div class="text-right">
											<a href="<?=base_url('orders')?>"><button class="btn btn-danger noprint" type="submit"> View orders</button></a>
											<button onclick="javascript:window.print();"
												class="btn btn-default btn-outline noprint" type="button"> <span><i
														class="fa fa-print"></i> Print</span> </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<!-- end page content -->
			
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php $this->load->view('provider/includes/footer'); ?>
		<script src="<?=base_url('assets/provider/')?>plugins/jquery/jquery.min.js"></script>
		<script src="<?=base_url('assets/provider/')?>plugins/popper/popper.js"></script>
		<script src="<?=base_url('assets/provider/')?>plugins/jquery-blockui/jquery.blockui.min.js"></script>
		<script src="<?=base_url('assets/provider/')?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
		<!-- bootstrap -->
		
		<script src="<?=base_url('assets/provider/')?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
		<!-- Common js-->
		<script src="<?=base_url('assets/provider/')?>js/app.js"></script>
		<script src="<?=base_url('assets/provider/')?>js/layout.js"></script>
		<script src="<?=base_url('assets/provider/')?>js/theme-color.js"></script>
		<!-- Material -->
		<script src="<?=base_url('assets/provider/')?>plugins/material/material.min.js"></script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/fees_receipt.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:29 GMT -->
</html>