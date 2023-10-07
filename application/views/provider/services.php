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
							<div class="tabbable-line">
								
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-topline-red">
													<div class="card-head">
														<header><?=$this->session->flashdata('msg_upload')?></header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="<?=base_url('C_provider/addServicePage')?>" id="addRow"
																		class="btn btn-info">
																		Add New Service <i class="fa fa-plus"></i>
																	</a>
																</div>
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
																		<td>
																			<?php $save=$s['mrp']-$s['price'];
																			echo '&#x20b9; '.$save;?> </td>
																		<td><?= $s['time'].' min'?></td>
																		<td><?php  if($s['s_status']==0){
																			echo '<span class="clsAvailable">Active</span>';} else echo '<span class="clsNotAvailable">Inactive</span>';?></td>
																		<td width="10%">
																			<a href="<?=base_url('C_provider/editServicePage/').$s['sid']?>" class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
																			<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#m<?=$s['sid']?>">
																				<i class="fa fa-trash-o "></i>
																			</button>

									<div class="modal fade bd-example-modal-sm"  id="m<?=$s['sid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete
                                                    	<?php if($s['s_status']==1){ ?>/Deactivate Service<?php } ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete
                                                	<?php if($s['s_status']==1){ ?>/deactivate this Service<?php } ?></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <?php if($s['s_status']==1){ ?>
                                                     <a href="<?php echo base_url('C_provider/deactivateService/').$s['sid']; ?>" class="btn btn-warning">Deactivate</a>
                                                 	<?php } ?>
                                                    <a href="<?php echo base_url('C_provider/deleteService/').$s['sid']; ?>" class="btn btn-danger">Delete</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
									<div class="tab-pane" id="tab2">
										<div class="row">
											<?php foreach ($category as $cat): ?>
											<div class="col-md-4">
												<div class="card card-topline-aqua">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="<?= base_url('assets/provider/img/category/').$cat['cimg']?>" alt="link" class="doctor-pic"
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