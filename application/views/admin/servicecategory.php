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
								<div class="page-title">All Service Category</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								</li>
								<li class="active">All Service Category</li>
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
													<header></header>
													<?= $this->session->flashdata('msg_upload');?>
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
															<div class="btn-group">
																<a href="<?=base_url('C_admin/addServiceCategoryPage')?>" id="addRow"
																	class="btn btn-info">
																	Add New Service Category <i class="fa fa-plus"></i>
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
													 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th width="10%">#</th>
																	<th> Category Name </th>
																	<th> Action </th>
																</tr>
															</thead>
															<tbody>
																<?php $cnt=1; foreach ($category as $cat): ?>
																<tr class="odd gradeX">
																	<td><?php echo $cnt; $cnt++;?></td>
																	<td><?= $cat['cname']?></td>
																	
																	<td width="10%" class="text-center">
																		
																		<a href="#" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#m<?=$cat['cid']?>"> <i class="fa fa-trash-o "></i>
																		</a>

                           		<div class="modal fade bd-example-modal-sm"  id="m<?=$cat['cid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Service Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Are you sure u want to delete this Category</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url('C_admin/deleteServiceCategory/').$cat['cid']; ?>" class="btn btn-primary">Save changes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
																	</td>
																</tr>
															<?php endforeach; ?>
															</tbody>
														</table>

														<!-- modals -->

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
	<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
	<script>
	
	</script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>