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
								<div class="page-title">All Staff</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">All Staff</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Staff</li>
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
																	<a href="<?=base_url('C_provider/addStaffPage')?>" id="addRow"
																		class="btn btn-info">
																		Add New Staff <i class="fa fa-plus"></i>
																	</a>
																</div>
															</div>
															
														</div>
														<div class="table-scrollable">
														 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th width="10%">Staff Image</th>
																		<th> Name </th>
																		<th> Staff code </th>
																		<th> Contact number </th>
																		<th> Status </th>
																		<th> Action </th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($staff as $s): ?>
																	<tr class="odd gradeX">
																		<td class="patient-img">
																			<img style="height: 60px; width: 60px;" src="<?= base_url('assets/provider/img/staff/').$s['image']?>"
																				alt="link">
																		</td>
																		<td><?= $s['name']?></td>
																		<td><?= $s['code']?></td>
																		<td><?= $s['contact']?></td>
																		<td><?php  if($s['status']==0){
																			echo '<span class="clsAvailable">Available</span>';} elseif($s['status']==1) echo '<span class="clsNotAvailable">Not Available</span>';
																				else echo '<span class="clsOnLeave"> On Order</span>';?> 
																			<!-- <button href="<?=base_url('C_provider/editServicePage/').$s['staffid']?>" class="btn btn-warning btn-xs">
																				<i class="fa fa-pencil"></i>
																			</button> --></td>

																		<td width="10%">
																			<a href="<?=base_url('C_provider/editStaffPage/').$s['staffid']?>" class="btn btn-primary btn-xs">
																				<i class="fa fa-pencil"></i>
																			</a>
																			<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#m<?=$s['staffid']?>">
																				<i class="fa fa-trash-o "></i>
																			</button>

									<div class="modal fade bd-example-modal-sm"  id="m<?=$s['staffid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete
                                                    	</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url('C_provider/deleteStaff/').$s['staffid']; ?>" class="btn btn-danger">Delete</a>
                                                    
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