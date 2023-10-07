<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->view('admin/includes/head') ?>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('admin/includes/nav') ?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php $this->load->view('admin/includes/sidebar') ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Providers</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Providers</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Providers</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane active fontawesome-demo" id="tab1">
									<div class="row">
										<div class="col-md-12">
											<div class="card card-topline-red">
												<div class="card-head">
													<header>All provoiders</header>
													<div class="tools">
														<a class="fa fa-repeat btn-color box-refresh"
															href="javascript:;"></a>
													</div>
												</div>
												<div class="card-body ">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6">
															
														</div>
														<!-- <div class="col-md-6 col-sm-6 col-6">
															<div class="btn-group pull-right">
																<a class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
																	data-toggle="dropdown">Tools
																	<i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="javascript:;">
																			<i class="fa fa-print"></i> Print </a>
																	</li>
																	<li>
																		<a href="javascript:;">
																			<i class="fa fa-file-pdf-o"></i> Save as
																			PDF </a>
																	</li>
																	<li>
																		<a href="javascript:;">
																			<i class="fa fa-file-excel-o"></i>
																			Export to Excel </a>
																	</li>
																</ul>
															</div>
														</div> -->
													</div>
													<div class="table-scrollable">
													 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Provider name</th>
																	<th> Business category </th>
																	<th> City </th> 
																	<th> Status </th> 
																	<th> Action </th>
																</tr>	
															</thead>
															<tbody>
																<?php $cnt=1; foreach ($providers as $p): ?>
																<tr class="odd gradeX">
																	<td><?=$cnt++?></td>
																	<td> <?= $p['shop_name']?> </td>
																	<td><?= $p['cname']?></td>
																	<td><?php $city=$this->Admin_model->get_city($p['cityid']); echo $city[0]['city_name'];?></td>
																	<td><?php  if($p['status']==0){
																		echo '<span class="clsOnLeave">New Requests</span>';} elseif($p['status']==1){ echo '<span class="clsAvailable">Active</span>';}
																			else{echo '<span class="clsNotAvailable">Rejected</span>';}?></td>
																	<td> <a href="<?=base_url('C_admin/viewProvider/').$p['uid']?>" class="btn btn-primary btn-xs"> View provider </a> </td>
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
								<div class="tab-pane" id="tab2">
									<div class="row">
										<?php foreach ($category as $cat): ?>
										<div class="col-md-4">
											<div class="card card-topline-aqua">
												<div class="card-body no-padding ">
													<div class="doctor-profile">
														<img src="<?= base_url('assets/admin/img/category/').$cat['cimg']?>" alt="link" class="doctor-pic"
															alt="">
														<div class="profile-usertitle">
															<div class="doctor-name"><?= $cat['cname']?></div>
														</div>
														<div class="profile-userbuttons">
															<a href="edit_staff.html" class="btn btn-primary btn-xs"> <i class="fa fa-pencil"></i> </a>
															<a href="<?php echo base_url('C_admin/deleteCategory/').$cat['cid'].'/'.$cat['cimg']; ?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o "></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
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
	<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->

	
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>