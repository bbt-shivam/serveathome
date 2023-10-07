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
								<div class="page-title">Edit Category</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Category</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Category</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Category Details</header>
										<p><?= $this->session->flashdata('msg_upload') ?></p>
									<!-- <button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
									</ul> -->
								</div>
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/editCategory')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Category Name <span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="name" placeholder="enter category name" class="form-control input-height" value="<?=$cat[0]['cname']?>"  readonly/>
													<input type="hidden" name="oldImage" value="<?=$cat[0]['cimg']?>">
													<input type="hidden" name="parentId" value="<?=$cat[0]['parent_id']?>">
													<input type="hidden" name="cid" value="<?=$cat[0]['cid']?>">
												</div>
											</div>
											
											<div class="form-group row">
												<label class="control-label col-md-3">Category Image </label>
												<div class="col-md-3">
													<img class="form-data" height="100%" width="100%" src="<?php echo base_url('assets/admin/img/category/').$cat[0]['cimg']?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Change Image </label>
												<div class="col-md-3">
													<input type="file" name="cat_image">
												</div>
												<?php echo form_error('cat_image','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); ?>
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