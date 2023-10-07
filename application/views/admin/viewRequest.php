<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->View('admin/includes/head'); ?>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('admin/includes/nav') ?>		
		<!-- end header -->
		<div class="page-container">
			<!-- start sidebar menu -->
		<?php $this->load->view('admin/includes/sidebar') ?>
		<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class="pull-left">
								<?php if($provider[0]['status'] == 0){ ?>
								<h2 class="text-center text-primary"> Approval Pendiing... </h2>
								<?php } else { ?>
								<h2 class="text-center text-primary"> Request Rejected </h2>
								<p class="text-center text-success"> <?=$provider[0]['reason']?> </p>
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="course-picture">
												<img src="<?=base_url('assets/provider/img/profile/').$provider[0]['image']?>" class="img-responsive" alt=""> 
											</div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name">
												<?=$provider[0]['shop_name']?>
											</div>
											<div class="profile-usertitle-job">
												<?=$provider[0]['cname']?>
											</div>
										</div>
										<!-- <ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Followers</b> <a class="pull-right">1,200</a>
											</li>
											<li class="list-group-item">
												<b>Following</b> <a class="pull-right">750</a>
											</li>
											<li class="list-group-item">
												<b>Friends</b> <a class="pull-right">11,172</a>
											</li>
										</ul> -->
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										<?php if($provider[0]['status'] != -1){ ?>
										<div class="profile-userbuttons container-fluid">
											<button type="button" 
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-success" data-toggle="modal" data-target="#accept">Activate request</button>
											<button type="button"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink" data-toggle="modal" data-target="#rject">Reject request</button>
										</div>
										<!-- END SIDEBAR BUTTONS -->
									<?php } ?>
									</div>
								</div>
								<div class="card">
									<div class="card-head card-topline-aqua">
										<header>Address</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<p><?php echo
													$paddress[0]['address'].', '. 
													$paddress[0]['locality'].', '.
													$paddress[0]['landmark'].', '.
													$paddress[0]['city_name'].', '.
													$paddress[0]['pincode'].','?>
													<br><?= $paddress[0]['state_name']?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card container-fluid">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<!-- <div class="p-rl-20">
												<ul class="nav customtab nav-tabs" role="tablist">
													<li class="nav-item"><a href="#tab1" class="nav-link active"
															data-toggle="tab">Shop/Business details</a></li>
													<li class="nav-item"><a href="#tab2" class="nav-link"
															data-toggle="tab">Transectional details</a></li>
												</ul>
											</div> -->
											<!-- Tab panes -->

											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<h4 class="font-bold">Business details</h4>
														<div class="row ">
															<div class="col-md-3 col-6 b-r"> <strong>Shop/Business name</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['shop_name']?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Full Name</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['name']?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['email']?></p>
															</div>
															<div class="col-md-3 col-6"> <strong>City</strong>
																<br>
																<p class="text-muted"><?=$paddress[0]['city_name']?></p>
															</div>
														</div>
														<h4 class="font-bold">Transectional details</h4>
														<div class="row ">
															<div class="col-md-3 col-6 b-r"> <strong>Account No.</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['acno']?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Account Holder</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['acname']?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Bank Name</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['bname']?></p>
															</div>
															<div class="col-md-3 col-6"> <strong>IFSC</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['ifsc_code']?></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3 col-6 b-r"> <strong>PAN No.</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['pan_no']?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>PAN Holder</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['pan_name']?></p>
															</div>
															
															<div class="course-picture">
																<img src="<?=base_url('/assets/provider/img/document/')?><?=$provider[0]['pan_image']?>" class="img-responsive"
																	alt=""> 
															</div>
															<div class="profile-usertitle">
																<div class="profile-usertitle-name"> PAN Image </div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<!-- END PROFILE CONTENT -->
							</div>
						</div>
					</div>
					<!-- modal -->
						<div style="margin-top: 50px; " class="modal fade" id="rject" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
				            <div class="modal-dialog" role="document">
				              	<div class="modal-content">
				                	<div class="modal-header">
				                  		<h5 class="modal-title" id="forgotPasswordLable"> Reject Request </h5>
				                	</div>
				                	<div class="modal-body">
				                  		<form action="<?=base_url('C_admin/rejectProviderRequest')?>" method="post">
				                    		<div class="row form-group">
				                     			<div class="col-12">
				                        			<p for="name">Provider name</p>
				                        			<h3><?=$provider[0]['shop_name']?></h3>
				                        			<input type="hidden" name="pid" value="<?=$provider[0]['pid']?>">
				                        			<input type="hidden" name="uid" value="<?=$provider[0]['uid']?>">
				                      			</div>
				                    		</div>
				                    		<div class="row form-group">
				                    			<div class="col-md-12">
				                        			<label for="reason">Reason</label>
				                        			<textarea class="form-control" id="reason" name="reason" placeholder="Enter the reasone for rejection.." rows="3" required></textarea>
				                        			 <span class="text-danger" style="font-size: 12px;"><?=form_error('reason')?></span>
				                      			</div>
				                    		</div>
				                  
				                    		<div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
					                       		<button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Cancle</button>
					                      		<button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary">Save changes</button><br>
				                    		</div>
				                  		</form>
				                	</div>
				              	</div>
				            </div>
				        </div>

				        <div class="modal fade bd-example-modal-sm"  id="accept" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Accept request</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Activate this provider</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="<?php echo base_url('C_admin/acceptRequest/').$provider[0]['pid']?>" class="btn btn-primary">Save changes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- modas;l -->
				</div>
			<!-- end page content -->
			</div>
		</div>
		<!-- Reject modal -->
		
			<!-- end page container -->
			<!-- start footer -->
			<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/professor_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:24 GMT -->
</html>