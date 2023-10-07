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
								<div class="page-title">Add Service Category</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								
								</li>
								<li class="active">Add Service Category</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Category Details</header>
								</div>
								<div class="card-body" id="bar-parent">
									<form  method="post" action="<?=base_url('C_admin/addServiceCategory')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Business roll/category<span class="required"> * </span> </label>
												<div class="col-md-6">
													<select name="category" class="form-control" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
													<option value="" selected="disabled">--Select Busniness category--</option>
													<?php $category=$this->Admin_model->get_business_subcategories();
														foreach($category as $cat):?>
															<option value="<?=$cat['cid']?>"><?=$cat['cname']?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<?php echo form_error('category','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Service Category Name <span class="required"> * </span> </label>
												<div class="col-md-6">
													<input type="text" name="name" placeholder="enter category name" value="<?= set_value('name') ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('name','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
								
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit"
															class="btn btn-info m-r-20">Submit</button>
														<!-- <button type="button" class="btn btn-default">Cancel</button> -->
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
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>