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
								<div class="page-title">All Users</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Users</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Customers</li>
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
													<header>Users</header>
													<div class="tools">
														<a class="fa fa-repeat btn-color box-refresh"
															href="javascript:;"></a>
													</div>
												</div>
												<div class="card-body ">
													<!-- <div class="row">
														<div class="col-md-6 col-sm-6 col-6">
															
														</div>
														<div class="col-md-6 col-sm-6 col-6">
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
														</div>
													</div> -->

													<div class="table-scrollable">
													 	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Customer name</th>
																	<th> Email </th>
																	<th> View </th>
																</tr>
															</thead>
															<tbody>
																<?php $cnt=1; foreach ($customers as $c): ?>
																<tr class="odd gradeX">
																	<td><?=$cnt++?></td>
																	<td><?= $c['name']?></td>
																	<td><?= $c['email']?></td>
																	<td> <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#u<?=$c['uid']?>"> View more </button> </td>
																</tr>

		<div class="modal fade" id="u<?=$c['uid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			     	<div class="modal-header">
				        <h2 class="modal-title" id="exampleModalLabel">User Details</h2>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
			      	</div>
			    <div class="modal-body">
			        <div class="card">
						<!-- <div class="card-head card-topline-aqua">
							<header>About Me</header>
						</div> -->
						<div class="card-body no-padding height-9">
							<ul class="list-group list-group-unbordered">
								<?php if($c['name'] != ''){ ?>
								<li class="list-group-item">
									<b>Full Name: </b>
									<div class="profile-desc-item pull-right" style="width: 50%;"><?=$c['name']?></div>
								</li> 
								<?php } if($c['email'] != ''){ ?>
								<li class="list-group-item">
									<b>Email: </b>
									<div class="profile-desc-item pull-right" style="width: 50%;"><?=$c['email']?></div>
								</li>
								<?php } if($c['dob'] != ''){ ?>
								<li class="list-group-item">
									<b> Date of Birth: </b>
									<div class="profile-desc-item pull-right" style="width: 50%;"><?=$c['dob']?></div>
								</li>
								<?php } if($c['gender'] != ''){ ?>
								<li class="list-group-item">
									<b>Gender: </b>
									<div class="profile-desc-item pull-right" style="width: 50%;"><?=$c['gender']?></div>
								</li>
								<?php } if($c['date'] != ''){ ?>
								<li class="list-group-item">
									<b>Joined Date:</b>
									<div class="profile-desc-item pull-right" style="width: 50%;"><?=$c['date']?></div>
								</li>
								<?php } ?>
							</ul>
							
						</div>
					</div>
			    </div>
			  <!--   <div class="modal-footer">
			    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    </div> -->
		    </div>
		</div>



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