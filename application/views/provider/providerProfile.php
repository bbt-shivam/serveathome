<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->View('provider/includes/head'); ?>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('provider/includes/nav') ?>		
		<!-- end header -->
		<?php if($provider[0]['status']==2){ ?>
			<div class="container">
			<!-- start sidebar menu -->	
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="container">
				<div class="page-content">
		<?php } else { ?>
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php $this->load->view('provider/includes/sidebar') ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
		<?php } ?>
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<?php if($provider[0]['status']==2){ ?>
							<div class="pull-left">
								<h2 class="text-center text-primary"> Your Business account has been Blocked.. </h2>
								<p class="text-center text-success"> <?=$provider[0]['reason']?> </p>
							</div>

							<div class="pull-right">
								<div class="page-title" style="margin-top: 30px;">
									<a href="<?=base_url();?>"><u> Back to Homepage.. </u></a>
								</div>
							</div>
							<?php } else { ?>
								<div class=" pull-left">
									<div class="page-title">Provider Profile</div>
									<span class="text-success"><?=$this->session->flashdata('photo')?></span>
								</div>
								<ol class="breadcrumb page-breadcrumb pull-right">
									<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
											href="<?=base_url('C_provider')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									
									<li class="active">Provider Profile</li>
								</ol>
							<?php } ?>
						</div>
					</div>


					<?php
						$shopName = $provider[0]['shop_name'];
						$email = $provider[0]['email'];
						$contact = $provider[0]['contact'];
						$cid = $provider[0]['cid'];
						$pid = $provider[0]['pid'];
						$fullName = $provider[0]['name'];
						$pwallet =  $provider[0]['p_wallet'];


						$address=$paddress[0]['address'];
						$locality=$paddress[0]['locality'];
						$landmark=$paddress[0]['landmark'];
						$cityName=$paddress[0]['city_name'];
						$stateid=$paddress[0]['stateid'];
						$cityid=$paddress[0]['cityid'];
						$pincode=$paddress[0]['pincode'];
						$addrid=$paddress[0]['addrid'];?>


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
										<div class="profile-userbuttons">
											<button type="button"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink" data-toggle="modal" data-target="#exampleModal">Change Photo</button>
										</div>
										<ul class="list-group list-group-unbordered">
											<!-- <li class="list-group-item">
												<b>Customers Served</b> <a class="pull-right">1,200</a>
											</li> -->
											<li class="list-group-item">
												<?php  ?>
												<b>Balance Amount</b> <a class="pull-right">₹ <?=$provider[0]['p_wallet']?></a>
											</li>
											<!-- <li class="list-group-item">
												<b>Avg Ratings</b> <a class="pull-right"><?php $review=$this->Common_model->get_avg_review($provider[0]['pid']);
							                        for($i=0; $i<5; $i++) { 
							                          if($i < $review[0]['ratings']){ ?>
							                            <span class="fa fa-star text-warning"></span>
							                          <?php } else { ?>
							                            <span class="fa fa-star text-secondary"></span>
							                          <?php } }?></a>
											</li> -->
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
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<b><span class="text-primary pull-right link1" id="edit"> Change Business/shop name</span></b>
														<h3 class="card-head" style="margin-top: 5px;">Profile details</h3><span class="text-success"><?=$this->session->flashdata('profileMsg')?></span>
														<div class="row ">
															<div class="col-md-6 col-6 b-r"> <strong>Shop/Business name</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['shop_name']?></p>
															</div>
															<div class="col-md-6 col-6 b-r"> <strong>Full Name</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['name']?></p>
															</div>
															<div class="col-md-6 col-6 b-r"> <strong>Email</strong>
																<br>
																<p class="text-muted"><?=$provider[0]['email']?></p>
															</div>
															<div class="col-md-6 col-6"> <strong>City</strong>
																<br>
																<p class="text-muted"><?=$paddress[0]['city_name']?></p>
															</div>
														</div>
													</div>
													<div class="container-fluid" id="editProfile">
														<h4><b> Enetr New Name</b></h4>
														<form method="post" action="<?=base_url('C_provider/editProfile')?>">
															<div class="row form-group">
																<div class="col-md-12 col-6">
																	<strong>Shop Name</strong>
																	<input type="text" name="shop_name" class="form-control" value="<?php $set=set_value('shop_name'); if(isset($set)) echo $set; if(isset($shopName) && $set=='') echo $shopName;?>">
																	<span class="text-danger"><?=form_error('name')?></span>
																	<input type="hidden" name="pid" class="form-control" value="<?=$provider[0]['pid']?>">
																	<input type="hidden" name="" id="error" value="<?=validation_errors()?>">
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
									<header>Address</header>
									<span class="text-muted"><?=$this->session->flashdata('addressMsg')?></span>
									<b><span class="text-primary pull-right link1" id="editAdd" style="padding-right: 30px; padding-top: 10px;"> edit address </span></b>
								</div>
								<div class="card-body no-padding height-9" style="margin-top: 17px;">
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
									<div class="container-fluid" id="editAddress" style="padding-top: 30px;">
									<form method="post" action="<?=base_url('C_provider/editAddress')?>">
										<div class="row form-group">
											<div class="col-md-6 col-6">
												<strong>Address</strong>
												<input type="text" name="address" class="form-control" value="<?php $set=set_value('address'); if(isset($set)) echo $set; if(isset($address) && $set=='') echo $address;?>">
												<span class="text-danger"><?=form_error('address')?></span>
												<input type="hidden" name="addrid" class="form-control" value="<?=$addrid?>">
												<input type="hidden" name="" id="errorAdress" value="<?=form_error('address').form_error('pincode').form_error('state').form_error('city').form_error('locality').form_error('landmark');?>">
											</div>
											<div class="col-md-6 col-6">
												<strong>Locality</strong>
												<input type="text" name="locality" class="form-control"value="<?php $set=set_value('locality'); if(isset($set)) echo $set; if(isset($locality) && $set=='') echo $locality;?>">
												<span class="text-danger"><?=form_error('locality')?></span>
											</div>
											<div class="col-md-6 col-6">
												<strong>Landmark</strong>
												<input type="text" name="landmark" class="form-control"value="<?php $set=set_value('landmark'); if(isset($set)) echo $set; if(isset($landmark) && $set=='') echo $landmark;?>">
												<span class="text-danger"><?=form_error('landmark')?></span>
											</div>
											<div class="col-md-6 col-6">
												<strong>Pincode</strong>
												<input type="text" name="pincode" class="form-control"value="<?php $set=set_value('pincode'); if(isset($set)) echo $set; if(isset($pincode) && $set=='') echo $pincode;?>">
												<span class="text-danger"><?=form_error('pincode')?></span>
											</div>
											<div class="col-md-6 col-6">
												<?php $state=$this->Common_model->get_state(1);?>
												<strong>State</strong>
												<select name="state" class="form-control" id="state">
													<option selected="disabled" value="">--Select State-- </option>
													<?php foreach($state as $s):
														if($s['stateid']==$stateid || $s['stateid']==set_value('state')){ ?>
															<option value="<?=$s['stateid']?>" selected="selected"><?=$s['state_name']?> </option>
													<?php  } else { ?>
														<option value="<?=$s['stateid']?>"><?=$s['state_name']?> </option>
													<?php } endforeach; ?>	
												</select>
												<span class="text-danger"><?=form_error('state')?></span>
											</div>
											<div class="col-md-6 col-6">
												<strong>City</strong>
												<select name="city" class="form-control" id="city">
													
												</select>
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
								</div>
							</div>


							<!-- modal -->
							 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Photo</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?=base_url('C_provider/updateImage')?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">old image:</label>
														<img width="30%" height="50%" src="<?=base_url('assets/provider/img/profile/').$provider[0]['image']?>" class="img-responsive" alt=""> 
									
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">select new image:</label>
                                                    <input type="file" name="image" id="profile-img" class="form-control">
                                                    <input type="hidden" name="prid" value="<?=$pid?>">
                                                </div>
                                                <div class="form-group">
                                                	 <label for="message-text" class="col-form-label">Preview:</label>
                                                	<img width="30%" height="50%" src="" class="img-responsive" alt="" id="profile-img-tag"> 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                                        		</div>
                                            </form>
                                        </div>
                                        
                                    </div>
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
		<?php $this->load->view('provider/includes/footer') ?>
		<script>
			var stateid = $('#state').val();
			$.ajax({
				url: '<?=base_url('C_provider/fillCity/')?>'+stateid,
				success: function(result){
					$('#city').html(result);
				}
			});

			$('#state').change(function(){
				var stateid = $('#state').val();
				$.ajax({
					url: '<?=base_url('C_provider/fillCity/')?>'+stateid,
					success: function(result){
						$('#city').html(result);
					}
				});
			});

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

			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#profile-img-tag').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    $("#profile-img").change(function(){
		        readURL(this);
		    });
		</script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/professor_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:24 GMT -->
</html>