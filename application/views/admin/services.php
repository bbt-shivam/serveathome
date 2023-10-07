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
								<div class="page-title">All Services</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">All Services</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Services</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="row">
									<div class="col-md-12">
										<div class="card card-topline-red">
											<div class="card-head">
												<header></header>
												<div class="tools">
													<a class="fa fa-repeat btn-color box-refresh"
														href="javascript:;"></a>
													<a class="t-collapse btn-color fa fa-chevron-down"
														href="javascript:;"></a>
													<a class="t-close btn-color fa fa-times"
														href="javascript:;"></a>
												</div>
											</div>
											<div class="card-body ">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-6">
														<!-- <div class="btn-group">
															<a href="<?=base_url('C_admin/addCategoryPage')?>" id="addRow"
																class="btn btn-info">
																Add New <i class="fa fa-plus"></i>
															</a>
														</div> -->
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
												 	<table
														class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
														id="example4">
														<thead>
															<tr>
																<th width="10%">Service Image</th>
																<th> Service Name </th>
																<th> Price </th>
																<th> Description </th>
																<th> Save </th>
																<th> Servicing Time </th>
																<th> Status</th>
																<th> Action </th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($services as $s): ?>
															<tr class="odd gradeX">
																<td class="patient-img">
																	<img style="height: 60px; width: 60px;" src="<?= base_url('assets/images/services/').$s['simage']?>"
																		alt="link">
																</td>
																<td><?= $s['sname']?></td>
																<td><?= '&#x20b9; '.$s['price']?></td>
																<td><?= $s['sdescription']?></td>
																<td> - <!-- <?= '&#x20b9; '.$s['discount']?> --></td>
																<td><?= $s['time'].' min'?></td>
																<td><?php  if($s['status']==1){
																	echo '<span class="clsAvailable">Active</span>';} else echo '<span class="clsNotAvailable">Inactive</span>';?></td>
																<td width="10%">
																	<!-- <a href="#" class="btn btn-primary btn-xs">
																		<i class="fa fa-pencil"></i>
																	</a> -->
																<!-- 	<a href="#" class="btn btn-danger btn-xs">
																		<i class="fa fa-trash-o "></i>
																	</a> -->
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
			<!-- end page content -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
	<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>