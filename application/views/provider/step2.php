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
		<div class="container-fluid">
			
			<div class="page-content py-4 px-4">
				<div class="page-bar">
					<div class="page-title-breadcrumb">
						<div class=" pull-left">
							<div class="page-title">2. Transectional details </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Bank Details</header>
								<!-- <p><?= $this->session->flashdata('msg_upload') ?></p> -->
							</div>
							<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/step2')?>">
								<div class="card-body row">

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="acno" value="<?=set_value('acno')?>">
											<label class="mdl-textfield__label">Account Number</label>
											<?php echo form_error('acno','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="acname" value="<?=set_value('acname')?>">
											<label class="mdl-textfield__label">Account Holder Name</label>
											<?php echo form_error('acname','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="bankName" value="<?=set_value('bankName')?>">
											<label class="mdl-textfield__label">Bank Name</label>
											<?php echo form_error('bankName','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="IFSC" value="<?=set_value('IFSC')?>">
											<label class="mdl-textfield__label">IFSC Code</label>
											<?php echo form_error('IFSC','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
								</div>

								<div class="card-head">
									<header>PAN Card information</header>
									<!-- <p><?= $this->session->flashdata('msg_upload') ?></p> -->
								</div>
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="PANno" value="<?=set_value('PANno')?>">
											<label class="mdl-textfield__label">PAN Card Number</label>
											<?php echo form_error('PANno','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
								
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="PANname" value="<?=set_value('PANname')?>">
											<label class="mdl-textfield__label">Full Name</label>
											<?php echo form_error('PANname','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="file" id="image" name="image">
											<label class="mdl-textfield__label" style="top: -5px;">PAN Card Image (Only JPEG file is allowed)</label>
											<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
									</div>

									<!-- <div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-checkbox mdl-js-checkbox" for="checkbox1">
												<input type="checkbox" id="checkbox1" class="mdl-checkbox__input" name="agree">
												<span class="mdl-checkbox__label"><p style="font-size: 13px;"><?php echo'I do hereby declare that PAN furnished/stated above is correct and belongs to me, registered as an account holder with www.serveathome.in. I further declare that I shall solely be held responsible for the consequences, in case of any false PAN declaration.';?></p></span>
												<?php echo form_error('agree','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</label>
										</div>
									</div> -->

									<div class="col-lg-12 p-t-20 text-center" style="margin-top: 30px;">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- end page content -->
		
		<!-- start footer -->
		<?php $this->load->view('provider/includes/footer') ?>
	<!-- end js include path -->
	
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>