<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

	<?php $this->load->view('provider/includes/head') ?>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
	<?php $this->load->view('provider/includes/nav') ?>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php $this->load->view('provider/includes/sidebar') ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">

				<?php $staff=$this->Provider_model->get_staff_by_staffid($staff_id); ?>
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Staff</div>
							
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_provider/staffPage')?>">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Staff</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Staff Details</header>
										<p><?= $this->session->flashdata('msg_upload') ?></p>
								</div>
								<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/editStaff')?>">
									
									<div class="card-body row">
										
										<div class="col-lg-3 p-t-20">
										
											<div class="course-picture mdl-textfield__input" style="border: none;">
												<img width="100%" height="80%" src="<?=base_url('assets/provider/img/staff/').$staff[0]['image']?>" class="img-responsive" alt=""> 
												
											</div>
									
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<input class="mdl-textfield__input"  type="file" name="image">
												<label class="mdl-textfield__label" style="margin-top: -20px;">Change Photo</label>
												<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
										</div>



										<div class="col-lg-3 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="name" value="<?= $staff[0]['name'] ?>">
												<input type="hidden" name="staffid" value="<?=$staff[0]['staffid']?>">
												<label class="mdl-textfield__label">Full Name</label>
												<?php echo form_error('name','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>
										<div class="col-lg-3 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="contact" value="<?= $staff[0]['contact'] ?>">
												<label class="mdl-textfield__label">Contact</label>
												<?php echo form_error('contact','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>

										<div class="col-lg-3 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<select class="mdl-textfield__input" id="" name="status">
													<option class="mdl-menu__item" value="0" <?php if($staff[0]['status']==0) echo 'selected'; ?>>
														Available
													</option>
													<option class="mdl-menu__item" value="1" <?php if($staff[0]['status']==1) echo 'selected'; ?>>
														Not Available
													</option>
													<option class="mdl-menu__item" value="2" <?php if($staff[0]['status']==2) echo 'selected'; ?>>
														On Order
													</option>
												</select>
												
												<label for="list2" class="mdl-textfield__label" id="catlabel">Status</label>
												<?php echo form_error('status','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>
									
										<div class="col-lg-12 p-t-20 text-center">
											<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" id="sub" value="Update">
											<a href="<?=base_url('C_provider/staffPage')?>" > <b class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" value="Cancel">Cancle</b></a>
											
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php $this->load->view('provider/includes/footer') ?>
	
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>