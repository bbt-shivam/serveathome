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
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add New Staff</div>
							
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Staff</li>
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
								<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/addStaff')?>">
									<div class="card-body row">
						
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="name" value="<?= set_value('name') ?>">
												<label class="mdl-textfield__label">Full Name</label>
												<?php echo form_error('name','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="contact" value="<?= set_value('contact') ?>">
												<label class="mdl-textfield__label">Contact</label>
												<?php echo form_error('contact','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>
								
										<div class="col-lg-6 p-t-20">
											<input class="mdl-textfield__input" type="file" name="image" style="padding-top: 18px;">
												<label class="mdl-textfield__label" style="margin-top: -10px; margin-left: 18px;">Staff Image</label>
												<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>'); ?>
												<span class="text-danger" style="font-size: 12px;"><?=$this->session->flashdata('msg_upload') ?></span>
										</div>
									
										<div class="col-lg-12 p-t-20 text-center">
											<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" id="sub" value="Submit">
											<!-- <input type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" value="Cancel"> -->
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
	<!-- end js include path -->
	<!-- <script>
	  var roll=$('#rollSet').val();
    if(roll == 1)
    {
    	$('#categoryRoll').change(function(){
      	var cid=$('#categoryRoll').val();
      		$.ajax({
		        url:'<?=base_url('C_provider/getSubcategory/')?>'+cid,
		        success:function(result)
		        {
		        	$('#catlabel').css({"top":"8px"});
		        	$('#categoryselect').html(result);
		        }
	      });
    	});

    }

	$('#sub').click(function(){
	  var textareaText = $('#text7').val();
	  textareaText = textareaText.replace(/\r?\n/g, '<br />');
	  $('#text44').val(textareaText);
	});

  </script> -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>