<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->view('provider/includes/head') ?>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('provider/includes/nav') ?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<?php $this->load->view('provider/includes/sidebar') ?>

			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="row py-4">
						
						<div class="col-md-12 col-12">
							<div class="white-box">
								<h3><b>
									<!-- <span class="text-black logo-icon material-icons fa-rotate-45 col">school</span> -->
									<span class="text-black">serveathome</span> </a></b> </h3>
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
		</div>

	</div>
	<?php $this->load->view('provider/includes/footer') ?>
</body>
</html>

