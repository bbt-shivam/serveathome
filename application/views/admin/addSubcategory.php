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
								<div class="page-title">Add Subcategory</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Subcategory</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Subcategory</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Subcategory Details</header>
								</div>
								<div class="card-body" id="bar-parent">
									<form enctype="multipart/form-data" method="post" action="<?=base_url('C_admin/addSubcategory')?>" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

											<div class="form-group row">
												<label class="control-label col-sm-3">Category <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<select name="category" class="form-control input-height" id="category1">
														<option value="0" selected="selected" >--Select Category--</option>
														<?php $category=$this->Admin_model->categories();
															foreach($category as $cat): 
																if($cat['cid']==set_value('category')){ ?>
																	<option value="<?=$cat['cid']?>" selected="selected"><?=$cat['cname']?></option>
																<?php } else { ?>
																<option value="<?=$cat['cid']?>"><?=$cat['cname']?></option>
														<?php } endforeach; ?>
													</select>
												</div>
												<?= form_error('category','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>') ?>
												<!-- <div class="col-md-3">
													<select name="parent_subcategory" class="form-control input-height" id="subcategory">
														<option selected="selected" value="0">--Select Perent Subcategory--</option>
													</select>
												</div> -->
												<!-- <?php if(form_error('category')){ 
														echo form_error('category','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>'); }
														else { ?>
															<span class="col-md-3" style="font-size: 12px;"> parent subcategory optional </span>
												<?php } ?> -->
											</div>


											<div class="form-group row">
												<label class="control-label col-md-3">Subcategory Name <span class="required"> * </span>
												</label>
												<div class="col-md-6">
													<input type="text" name="name" placeholder="enter Subcategory name" value="<?= set_value('name') ?>" class="form-control input-height" />
												</div>
												<?php echo form_error('name','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>');?>
											</div>
													
											<div class="form-group row">
												<label class="control-label col-md-3">Subcategory Image</label>
												<div class="col-md-6">
													<input type="file" name="cat_image" class="form-control">
												</div>
											<?php echo form_error('cat_image','<span class="col-md-3 text-danger" style="font-size: 12px;">','</span>');?>
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
	<script>
    $('#category1').change(function(){
      cid=$('#category1').val();
      $.ajax({
        url:'<?=base_url('C_admin/subcategoryPage/')?>'+cid,
        success:function(result)
        {
          $('#subcategory').html(result);
        }
      });
    });
  </script>
    
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>