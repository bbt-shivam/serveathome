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
			<?php $coupan=$this->Admin_model->gte_coupan_by_cpnid($coupan_id); ?>
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Coupan</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Manage Coupans</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Coupan</li>
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
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/editCoupan')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Coupan Code <span class="required"> * </span>
												</label>




												<div class="col-md-5">
													<input type="text" name="coupanCode" id="coupanCode" placeholder="Enter coupan code" class="form-control input-height" value="<?php $set=set_value('coupanCode'); if(isset($set)) echo $set;
													if(isset($coupan[0]['cpn_code']) && $set =='') echo $coupan[0]['cpn_code']; ?>" style="text-transform: uppercase;" readonly />
													<span class="ui-state-error-text"> <?=form_error('coupanCode')?> </span>
													<input type="hidden" name="cpnid" value="<?=$coupan[0]['cpnid']?>">
												</div>
												<!-- <div class="col-md-2">
													<a class="col btn btn-success" id="validateCoupan">Validate</a>
												</div>
												<span id="coupanStatus" class="text-muted"></span> -->
											</div>

											<div class="form-group row">
												<label class="control-label col-sm-3">Coupan Type <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select name="coupanType" class="form-control input-height" id="category">
														<option value="0" <?php if(set_value('coupanType')==0 || $coupan[0]['cpn_type']==0) echo 'selected';?>>% Basis </option>
														<option value="1" <?php if(set_value('coupanType')==1 || $coupan[0]['cpn_type']==1) echo 'selected';?>> Flat discount</option>
													</select>
													<span class="ui-state-error-text"> <?=form_error('coupanType')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Discount amaount <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="discount" placeholder="Enter Amount if coupan type is flat or enter Percentage" class="form-control input-height" value="<?php $set=set_value('discount'); if(isset($set)) echo $set;
													if(isset($coupan[0]['discount']) && $set =='') echo $coupan[0]['discount']; ?>" />
													<span class="ui-state-error-text"> <?=form_error('discount')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3"> Coupan Description <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="description" placeholder="Enter description" class="form-control"><?php $set=set_value('description'); if(isset($set)) echo $set;
													if(isset($coupan[0]['description']) && $set =='') echo $coupan[0]['description']; ?>
													</textarea>
													<span class="ui-state-error-text"> <?=form_error('description')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-sm-3">Applicable For <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select name="applicableFor" class="form-control input-height" id="category">
														<option value="0" <?php if(set_value('applicableFor')==0 || $coupan[0]['applicable_for']==0) echo 'selected';?>>All Users</option>
														<?php $users = $this->Admin_model->get_customer(); 
															foreach($users as $u): ?>
																<option value="<?=$u['uid']?>" <?php if(set_value('applicableFor')==$u['uid'] || $coupan[0]['applicable_for']==$u['uid']) echo 'selected';?>><?=$u['email']?>(<?=$u['name']?>)</option>
															<?php endforeach; ?>
													</select>
													<span class="ui-state-error-text"> <?=form_error('applicableFor')?> </span>
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">No of coupan per User<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="number" name="quantity" placeholder="Enter No of coupan if coupan per user" class="form-control input-height" value="<?php $set=set_value('quantity'); if(set_value('quantity')) echo $set;
													elseif(isset($coupan[0]['quantity']) && $set =='') echo $coupan[0]['quantity']; ?>" />
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
												
												<div class="col-md-5">
													<input type="date" name="validTill" class="form-control" value="<?php $set=set_value('validTill'); if(isset($set)) echo $set;
													if(isset($coupan[0]['valid_till']) && $set =='') echo $coupan[0]['valid_till']; ?>">
													<span class="ui-state-error-text"> <?=form_error('validTill')?> </span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-3">Status <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select name="status" class="form-control input-height" id="category">
														<option class="text-danger" value="0" <?php if(set_value('status')==0 || $coupan[0]['status']==0) echo 'selected';?>> Inactive </option>
														<option class="text-success" value="1" <?php if(set_value('status')==1 || $coupan[0]['status']==1) echo 'selected';?>> Active </option>
													</select>

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