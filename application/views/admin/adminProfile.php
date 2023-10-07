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
								<div class="page-title">Admin Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_admin')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								
								<li class="active">Admin Profile</li>
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
												<img src="<?=base_url('assets/admin/img/profile/').$admin[0]['image']?>" class="img-responsive" alt=""> 
											</div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name">
												<?=$admin[0]['name']?>
											</div>
											<div class="profile-usertitle-job">
												<?=$admin[0]['username']?>
											</div>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Change password: </b> <a href="<?=base_url('C_admin/changePasswordPage')?>" class="pull-right text-primary">Click hear</a>
											</li>
											<!-- <li class="list-group-item">
												<b>Wallet</b> <a class="pull-right">750</a>
											</li>
											<li class="list-group-item">
												<b>Avg Ratings</b> <a class="pull-right">11,172</a>
											</li> -->
										</ul>
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
											<?php $name=$admin[0]['name'];
												$aid=$admin[0]['id'];
												$username=$admin[0]['username'];
												$email=$admin[0]['email'];
												$contact=$admin[0]['contact'];
												$address=$admin[0]['address'];
												$city=$admin[0]['city'];
												$state=$admin[0]['state'];
												$pincode=$admin[0]['pincode'];?>
										</div>
										<div class="white-box">
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<b><span class="text-primary pull-right link1" id="edit"> edit profile </span></b>
														<h3 class="card-head"style="margin-top: -5px;">Profile details <span class="text-muted"><?=$this->session->flashdata('profileMsg')?></span></h3>
														<div class="row" style="margin-top: 10px;">
															<div class="col-md-6 col-6 b-r"> <strong>Full name</strong>
																<br>
																<p class="text-muted"><?=$name?></p>
															</div>
															<div class="col-md-6 col-6 b-r"> <strong>Username</strong>
																<br>
																<p class="text-muted"><?=$username?></p>
															</div>
															<div class="col-md-6 col-6 b-r"> <strong>Email</strong>
																<br>
																<p class="text-muted"><?=$email?></p>
															</div>
															<div class="col-md-6 col-6"> <strong>Mobile</strong>
																<br>
																<p class="text-muted"><?=$contact?></p>
															</div>
														</div>
													</div>
													<div class="container-fluid" id="editProfile">
														<h3> Edit Profile</h3>
														<form method="post" action="<?=base_url('C_admin/editProfile')?>">
															<div class="row form-group">
																<div class="col-md-6 col-6">
																	<strong>Name</strong>
																	<input type="text" name="name" class="form-control" value="<?php $set=set_value('name'); if(isset($set)) echo $set; if(isset($name) && $set=='') echo $name;?>">
																	<span class="text-danger"><?=form_error('name')?></span>
																	<input type="hidden" name="aid" class="form-control" value="<?=$aid?>">
																	<input type="hidden" name="" id="error" value="<?=validation_errors()?>">
																</div>
																<div class="col-md-6 col-6">
																	<strong>username</strong>
																	<input type="text" name="username" class="form-control"value="<?php $set=set_value('username'); if(isset($set)) echo $set; if(isset($username) && $set=='') echo $username;?>">
																	<span class="text-danger"><?=form_error('username')?></span>
																</div>
																<div class="col-md-6 col-6">
																	<strong>Email</strong>
																	<input type="email" name="email" class="form-control"value="<?php $set=set_value('email'); if(isset($set)) echo $set; if(isset($email) && $set=='') echo $email;?>">
																	<span class="text-danger"><?=form_error('email')?></span>
																</div>
																<div class="col-md-6 col-6">
																	<strong>Mobile</strong>
																	<input type="text" name="contact" class="form-control"value="<?php $set=set_value('contact'); if(isset($set)) echo $set; if(isset($contact) && $set=='') echo $contact;?>">
																	<span class="text-danger"><?=form_error('contact')?></span>
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-6 col-6">
																	<input type="reset" name="reset" value="Cancle" class="btn btn-info" id="cancleEdit">
																	<input type="submit" name="submit" value="Update" class="btn btn-primary">
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-head card-topline-aqua">
									<header style="padding-top: 30px;">Address</header>
									<span class="text-muted"><?=$this->session->flashdata('addressMsg')?></span>
									<b><span class="text-primary pull-right link1" id="editAdd" style="padding-right: 30px; padding-top: 10px;"> edit address </span></b>
								</div>
								<div class="card-body no-padding height-9" style="margin-top: 17px;">
									<div class="row text-center m-t-10">
										<div class="col-md-12">
											<p><?php echo
												$admin[0]['address'].', '. 
												$admin[0]['pincode'].', '.
												$admin[0]['city']?>
												<br><?= $admin[0]['state']?></p>
										</div>
									</div>
									<div class="container-fluid" id="editAddress" style="padding-top: 30px;">
									<form method="post" action="<?=base_url('C_admin/editAddress')?>">
										<div class="row form-group">
											<div class="col-md-6 col-6">
												<strong>Address</strong>
												<input type="text" name="address" class="form-control" value="<?php $set=set_value('address'); if(isset($set)) echo $set; if(isset($address) && $set=='') echo $address;?>">
												<span class="text-danger"><?=form_error('address')?></span>
												<input type="hidden" name="aid" class="form-control" value="<?=$aid?>">
												<input type="hidden" name="" id="errorAdress" value="<?=form_error('address').form_error('pincode').form_error('state').form_error('city')?>">
											</div>
											<div class="col-md-6 col-6">
												<strong>Pincode</strong>
												<input type="text" name="pincode" class="form-control"value="<?php $set=set_value('pincode'); if(isset($set)) echo $set; if(isset($pincode) && $set=='') echo $pincode;?>">
												<span class="text-danger"><?=form_error('pincode')?></span>
											</div>
											<div class="col-md-6 col-6">
												<strong>State</strong>
												<input type="text" name="state" class="form-control"value="<?php $set=set_value('state'); if(isset($set)) echo $set; if(isset($state) && $set=='') echo $state;?>">
												<span class="text-danger"><?=form_error('state')?></span>
											</div>
											<div class="col-md-6 col-6">
												<strong>City</strong>
												<input type="text" name="city" class="form-control"value="<?php $set=set_value('contact'); if(isset($set)) echo $set; if(isset($city) && $set=='') echo $city;?>">
												<span class="text-danger"><?=form_error('city')?></span>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-6 col-6">
												<input type="reset" name="reset" value="Cancle" class="btn btn-info" id="cancleEditAdd">
												<input type="submit" name="submit" value="Update" class="btn btn-primary">
											</div>
										</div>
									</form>
								</div>
								<!-- form -->
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				<!-- end page content -->
			</div>
		</div>
			<!-- end page container -->
	</div>
			<!-- start footer -->
			<?php $this->load->view('admin/includes/footer') ?>
			<script>
				$('#editProfile').hide();
				$('#edit').click(function(){
					$('#editProfile').toggle();
				});
				$('#cancleEdit').click(function(){
					$('#editProfile').hide();
				});
				var err = $('#error').val();
				if (err != ''){
					$('#editProfile').show();
				}


				$('#editAddress').hide();
				$('#editAdd').click(function(){
					$('#editAddress').toggle();
				});
				$('#cancleEditAdd').click(function(){
					$('#editAddress').hide();
				});
				var err = $('#errorAdress').val();
				if (err != ''){
					$('#editAddress').show();
				}
			</script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/professor_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:24 GMT -->
</html>