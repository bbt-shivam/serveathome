<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

	<?php $this->load->view('admin/includes/head') ?>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
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
								<div class="page-title">Add Coupan</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Manage Coupans</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Coupan</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Coupan Details</header>
										<p><?= $this->session->flashdata('msg_upload') ?></p>
									
								</div>	
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/addCoupan')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Coupan Code <span class="required"> * </span>
												</label>
												<div class="col-md-3">
													<input type="text" name="coupanCode" id="coupanCode" placeholder="Enter coupan code" class="form-control input-height" value="<?=set_value('coupanCode')?>" style="text-transform: uppercase;" required />
													<span class="ui-state-error-text"> <?=form_error('coupanCode')?> </span>
												</div>
												<div class="col-md-2">
													<a class="col btn btn-success" id="validateCoupan">Validate</a>
												</div>
												<span id="coupanStatus" class="text-muted"> </span> 
											</div>

											<div class="form-group row">
												<label class="control-label col-sm-3">Coupan Type <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select name="coupanType" class="form-control input-height" id="category">
														<option value="0" <?php if(set_value('coupanType')==0) echo 'selected';?>>
															% Basis 
														</option>
														<option value="1" <?php if(set_value('coupanType')==1) echo 'selected';?>> Flat discount</option>
													</select>
													<span class="ui-state-error-text"> <?=form_error('coupanType')?> </span>
												</div>

											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Discount amaount <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="discount" placeholder="Enter Amount if coupan type is flat, or enter Percentage" class="form-control input-height" value="<?=set_value('discount')?>" />
													<span class="ui-state-error-text"> <?=form_error('discount')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3"> Coupan Description <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="description" placeholder="Enter description" class="form-control">
														<?=set_value('description')?>
													</textarea>
													<span class="ui-state-error-text"> <?=form_error('description')?> </span>
												</div>
											</div>


											<div class="form-group row">
												<label class="control-label col-sm-3">Applicable For <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select name="applicableFor" class="form-control input-height" id="applicableFor">
														<!-- <option value="" disabled>--Select--</option> -->
														<option value="0" <?php if(set_value('applicableFor')==0) echo 'selected';?>>All Users</option>
														<?php $users = $this->Admin_model->get_customer(); 
															foreach($users as $u): ?>
																<option value="<?=$u['uid']?>" <?php if(set_value('applicableFor')== $u['uid']) echo 'selected';?>>
																	<?=$u['email']?>(<?=$u['name']?>)
																</option>
															<?php endforeach; ?>
													</select>
													<span class="ui-state-error-text"> <?=form_error('applicableFor')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">No of coupan per User<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="number" name="quantity" placeholder="Enter No of coupan if coupan per user" class="form-control input-height" value="<?=set_value('quantity')?>" />
													<span class="ui-state-error-text"> <?=form_error('quantity')?> </span>
												</div>
											</div>
											
											<!-- <div class="form-group row">
												<label class="control-label col-md-3">On order above <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="orderAbove" placeholder="Enter minimum amount limit" class="form-control input-height" />
												</div>
											</div> -->

											
											<div class="form-group row">
												<label class="control-label col-md-3">Valid Till
													<span class="required"> * </span>
												</label>
												<?php $dt = date('d-m-y',strtotime(set_value('date')));?>
												<div class="col-md-5">
													<input type="date" name="validTill" class="form-control" value="<?=$dt?>">
													<span class="ui-state-error-text"> <?=form_error('validTill')?> </span>
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" class="btn btn-info m-r-20">Submit</button>
														<a href="<?=base_url('C_admin/coupans')?>"><button type="button" class="btn btn-default">Cancel</button></a> 
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
		
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php $this->load->view('admin/includes/footer') ?>

		<script>
			$('#validateCoupan').click(function(){
				var cc = $('#coupanCode').val();
				if(cc == '')
				{
					$('#coupanStatus').html('Please enter coupan code');
				}
				else
				{
					$.ajax({
						url: "<?=base_url('C_admin/validateCoupan/')?>"+cc,
						success: function(result)
						{
							$('#coupanStatus').html(result);
						}
					});
				}
			});

		</script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>