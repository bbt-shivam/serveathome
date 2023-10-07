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
			<!-- start sidebar menu -->
			<?php $this->load->view('provider/includes/sidebar') ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Orders</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Orders</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-topline-red">
													<div class="card-head">
														<header>All orders</header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
														
														</div>
														<div class="table-scrollable">
														 	<table
																class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th>#</th>
																		<th class="text-center"> Order Id </th>
																		<th class="text-center"> Order Date & time </th>
																		<th class="text-center"> Order status </th>
																		
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<?php $cnt = 1; foreach ($orders as $o): ?>
																	<tr class="odd gradeX">
																		<td>
																			<?=$cnt++?>
																		</td>
																		<td class="text-center"><?= $o['oid']?></td>
																		<td class="text-center"><?= $o['order_date']?></td>
																		<td class="text-center"><?php if($o['order_status']==0){
																			echo '<span class="text-warning"> New </span>';
																			}
																			elseif($o['order_status']==1){
																				echo '<span class="clsOnLeave"> Accepted </span>';
																			}
																			elseif($o['order_status']==2){
																				echo '<span class="clsAvailable"> Delivered </span>';
																			}
																			else{
																				echo '<span class="clsNotAvailable"> Canclled </span>';
																			}?>

																		</td>
																	
																	
																		<!-- <td><?= '&#x20b9; '.$s['price']?></td>
																		<td><?= $s['sdescription']?></td>
																		<td><?= '&#x20b9; '.$s['discount']?></td>
																		<td><?= $s['time'].' min'?></td>
																		<td><?php  if($s['status']==1){
																			echo '';} else echo '';?></td> -->
																		<td width="10%">
																			<a href="<?=base_url('C_provider/viewOrder/').$o['oid']?>" class="btn btn-primary btn-xs">
																				Open order
																			</a>
																			
																			
																		</td> 
																	</tr>
																<?php endforeach; ?>
																</tbody>
															</table>


														</div>
													</div>
												</div>
											</div>
										</div>
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
	<?php $this->load->view('provider/includes/footer') ?>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>