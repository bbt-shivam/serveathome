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
							<div class=" pull-left">
								<div class="page-title">Provider Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin/')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_admin/getProviders/1')?>">Active Providers</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Provider Profile</li>
							</ol>
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
												<img src="<?=base_url('assets/provider/img/profile/').$provider[0]['image']?>" class="img-responsive" alt=""> </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?=$provider[0]['shop_name']?> </div>
											<div class="profile-usertitle-job"> <?=$provider[0]['cname']?> </div>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Total Orders</b> <a class="pull-right"><?= $totalOrders ?></a>
											</li>
											<!-- <li class="list-group-item">
												<b>Total Services</b> <a class="pull-right">11,172</a>
											</li> -->
											<li class="list-group-item">
												<b>Wallet</b> <a class="pull-right">₹ <?=$provider[0]['p_wallet']?></a>
											</li>
										</ul>
										
									</div>
								</div>
							
								<?php $review=$this->Common_model->get_avg_review($provider[0]['pid']); 
									if(count($review)>0){?>
								<div class="card">
									<div class="card-head card-topline-aqua">
										<header>Ratings</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="work-monitor work-progress">
											<div class="states">
												<li class="list-group-item" style="border: none;">
													<b>Avg. Rating: <?php
							                        for($i=0; $i<5; $i++) { 
							                          if($i < $review[0]['ratings']){ ?>
							                            <span class="fa fa-star text-warning"></span>
							                          <?php } else { ?>
							                            <span class="fa fa-star text-secondary"></span>
							                          <?php } }?>

							                      	</b>
												</li>
												<div class="info">
													<div class="desc pull-left">5 <i class="fa fa-star text-warning"></i></div>
													<?php $star=$this->Common_model->count_star($provider[0]['pid'],5); 
														if($star > 0) $staravg=($star*100)/$review[0]['count(pid)'];
														else $staravg = 1;
													?>
													<!-- <div class="percent pull-right">50%</div> -->
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: <?=$staravg?>%">
														<span class="sr-only">50% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">4 <i class="fa fa-star text-warning"></i></div>
													<?php $star=$this->Common_model->count_star($provider[0]['pid'],4); 
														if($star > 0) $staravg=($star*100)/$review[0]['count(pid)'];
														else $staravg = 1;
													?>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: <?=$staravg?>%">
														<span class="sr-only">85% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">3 <i class="fa fa-star text-warning"></i></div>
													<?php $star=$this->Common_model->count_star($provider[0]['pid'],3); 
														if($star > 0) $staravg=($star*100)/$review[0]['count(pid)'];
														else $staravg = 1;
													?>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: <?=$staravg?>%">
														<span class="sr-only">20% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">2 <i class="fa fa-star text-warning"></i></div>
													<?php $star=$this->Common_model->count_star($provider[0]['pid'],2); 
														if($star > 0) $staravg=($star*100)/$review[0]['count(pid)'];
														else $staravg = 1;
													?>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: <?=$staravg?>%">
														<span class="sr-only">20% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">1 <i class="fa fa-star text-warning"></i></div>
													<?php $star=$this->Common_model->count_star($provider[0]['pid'],1); 
														if($star > 0) $staravg=($star*100)/$review[0]['count(pid)'];
														else $staravg = 1;
													?>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: <?=$staravg?>%">
														<span class="sr-only">20% </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>

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
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<div class="p-rl-20">
												<ul class="nav customtab nav-tabs" role="tablist">
													<li class="nav-item"><a href="#tab1" class="nav-link active"
															data-toggle="tab">Services</a></li>
													<li class="nav-item"><a href="#tab2" class="nav-link"
															data-toggle="tab">Provider Details</a></li>
												</ul>
											</div>
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div class="container-fluid">
														<div class="row">
									                        <div class="col-md-12">
								                                <div class="card-head">
								                                    <header>Offered Services</header>
								                                    <div class="tools">
								                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								                                    </div>
								                                </div>
								                                <div class="card-body ">
								                                    <div class="table-scrollable">
								                                        <table id="saveStage" class="display" style="width:100%;">
								                                            <thead>
								                                                <tr>
								                                                	<th width="10%">Service Image</th>
								                                                    <th>Service</th>
								                                                    <!-- <th>Price</th> -->
								                                                    <th>Status</th>
								                                                    <th>Total Orders</th>
								                                                    <th>Action</th>
								                                                </tr>
								                                            </thead>
								                                             <tbody>
								                                             	<?php foreach($services as $s): $order=$this->Common_model->count_service_orders($s['sid']);?>
								                                             	<tr>
								                                             		<td class="patient-img">
																						<img style="height: 60px; width: 60px;" src="<?= base_url('assets/images/services/').$s['simage']?>"
																							alt="link">
																					</td>
									                                             	<td><?=$s['sname']?></td>
									                                             	<!-- <td><?=$s['price']?></td> -->
									                                             	<td><?php if($s['s_status']==0){
									                                             		echo '<span class="clsAvailable">Active</span>';} else echo '<span class="clsNotAvailable">Inactive</span>';?></td>
									                                             	<td class="text-center"><?php print_r($order)?></td>
									                                             	<td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ser<?=$s['sid']?>">
																						View
																					</button></td>
									                                             </tr>


		<div class="modal fade" id="ser<?=$s['sid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			     	<div class="modal-header">
				        <h2 class="modal-title" id="exampleModalLabel">Service Details</h2>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
			      	</div>
			    <div class="modal-body">
			        <div class="row">
						<div class="col-lg-12 col-md-6 col-12 col-sm-6">
							<div class="blogThumb">
								<div class="thumb-center"><img class="img-responsive" alt="user"
										src="<?= base_url('assets/images/services/').$s['simage']?>"></div>
								<div class="course-box">
									<h3><?=$s['sname']?></h3>
									<div class="text-muted"><span class="m-r-10"> ₹ <?=$s['price']?></span>
										<i class="course-likes m-l-10"> <?=$s['time']?> min</i>
									</div>
									<p><span><i class="ti-alarm-clock"></i> <?=$s['sdescription']?></span></p>
									<!-- <p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
									<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p> -->
								</div>
							</div>
						</div>
					</div>
			    </div>
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
							</div>
							<!-- END PROFILE CONTENT -->


							<!--  modal -->

							<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								     	<div class="modal-header">
									        <h2 class="modal-title" id="exampleModalLabel">Service Details</h2>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
								      	</div>
								     <div class="modal-body">
								        <div class="row">
											<div class="col-lg-12 col-md-6 col-12 col-sm-6">
												<div class="blogThumb">
													<div class="thumb-center"><img class="img-responsive" alt="user"
															src="../assets/img/course/course1.jpg"></div>
													<div class="course-box">
														<h4>PHP Development Course</h4>
														<div class="text-muted"><span class="m-r-10">April 23</span>
															<a class="course-likes m-l-10" href="#"><i class="fa fa-heart-o"></i> 654</a>
														</div>
														<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
														<p><span><i class="ti-user"></i> Professor: Jane Doe</span></p>
														<p><span><i class="fa fa-graduation-cap"></i> Students: 200+</span></p>
														<button type="button"
															class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
															More</button>
													</div>
												</div>
											</div>
										</div>
								    </div>
								    <div class="modal-footer">
								    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Send message</button>
								    </div>
								    </div>
								</div>
							</div>
							<!-- end modal -->
						</div>
					</div>
				</div>
				<!-- end page content -->
				<!-- start chat sidebar -->

				<!-- end chat sidebar -->
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