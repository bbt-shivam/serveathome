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
								<div class="page-title">Add New Service</div>
							
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Service</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Service</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Service Details</header>
										<p><?= $this->session->flashdata('msg_upload') ?></p>
								</div>
								<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/addService')?>">
									<div class="card-body row">
										<?php $rollSet=0; $checkRoll=$this->Provider_model->check_business_subcategory();
											if(count($checkRoll)>0){ $rollSet=1;
											$cat=$this->Provider_model->get_category($checkRoll[0]['cid']);?>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<select class="mdl-textfield__input" id="categoryRoll" name="roll">
													<option class="mdl-menu__item" selected="selected"></option>
													<?php 
														foreach($cat as $c): 
														if($c['cid']==set_value('category')){ ?>
															<option class="mdl-menu__item" value="<?=$c['cid']?>" selected="selected"><?=$c['cname']?></option>
														<?php } else { ?>
															<option class="mdl-menu__item" value="<?=$c['cid']?>"><?=$c['cname']?></option>
													<?php } endforeach; ?>
												</select>
												
												<label for="list2" class="mdl-textfield__label"> Select Job </label>
												<?php echo form_error('category','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<input type="hidden" name="" id="rollSet" value="1">
												<select class="mdl-textfield__input" id="categoryselect" name="category">
													<option class="mdl-menu__item" selected="selected"></option>
													
												</select>
												
												<label for="list2" class="mdl-textfield__label" id="catlabel">Category</label>
												<?php echo form_error('category','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>
										</div>

										<!-- <div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<select class="mdl-textfield__input" id="subcategory" name="subcategory">
													<option class="mdl-menu__item" selected="selected"></option>
													
												</select>
											
												<label for="list2" class="mdl-textfield__label" id="sublabel">Subcategory</label>
											</div>
										</div> 
									</div> -->
										<?php }
									else{ $rollSet=0; $cat=$this->Provider_model->get_category(); ?>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="categoryselect" name="category">
												<option class="mdl-menu__item" selected="selected"></option>
												<?php
													foreach($cat as $c): 
													if($c['cid']==set_value('category')){ ?>
														<option class="mdl-menu__item" value="<?=$c['cid']?>" selected="selected"><?=$c['cname']?></option>
													<?php } else { ?>
														<option class="mdl-menu__item" value="<?=$c['cid']?>"><?=$c['cname']?></option>
												<?php } endforeach; ?>
											</select>
											
											<label for="list2" class="mdl-textfield__label">Category</label>
											<?php echo form_error('category','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<!-- <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="subcategory" name="subcategory">
												<option class="mdl-menu__item" selected="selected"></option>
												
											</select>
										
											<label for="list2" class="mdl-textfield__label" id="sublabel">Subcategory</label>
										</div>
									</div> -->
									<?php } ?>
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="sname" value="<?= set_value('sname') ?>">
											<!-- <input type="hidden" name="baseurl" value="<?=base_url('C_provider/fileUpload')?>" id="baseurl"> -->
											<label class="mdl-textfield__label">Service Name</label>
											<?php echo form_error('sname','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>

									</div>
									
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="sprice" value="<?= set_value('sprice') ?>">
											<label class="mdl-textfield__label">Price &#x20b9;</label>
											<?php echo form_error('sprice','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="mrp" value="<?= set_value('mrp') ?>">
											<label class="mdl-textfield__label">Max Price &#x20b9;</label>
											<?php echo form_error('mrp','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<!-- <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="sdiscount" value="<?= set_value('sdiscount') ?>">
											<label class="mdl-textfield__label">Discount (in rupees &#x20b9;)</label>
											<?php echo form_error('sdiscount','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div> -->
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="stime" value="<?= set_value('stime') ?>">
											<label class="mdl-textfield__label">Time (in minutes)</label>
											<?php echo form_error('stime','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<input class="mdl-textfield__input" type="file" name="image" style="padding-top: 18px;">
											<label class="mdl-textfield__label" style="margin-top: -10px; margin-left: 18px;">Service Image</label>
											<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>'); ?>
											<span class="text-danger" style="font-size: 12px;"><?=$this->session->flashdata('msg_upload') ?></span>
									</div>

									
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="4" id="text7" name="" ><?= set_value('sdescription') ?></textarea>

											<textarea  rows="4" id="text44" name="sdescription" style="
											display:none;"><?= set_value('sdescription') ?></textarea>

											<label class="mdl-textfield__label" for="text7">Service Description</label>
											<?php echo form_error('sdescription','<span class="text-danger" style="font-size: 12px;">','</span>');?>

										</div>
									</div>
									
									<!-- <div class="col-lg-12 p-t-20">
										<label class="control-label col-md-3">Upload Photo
										</label>
										<div class="col-md-12">
											<div id="id_dropzone" class="dropzone"></div>
										</div>
									</div> -->
									
									<div class="col-lg-12 p-t-20 text-center">
										<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" id="sub" value="Submit">
										<a href="<?=base_url('C_provider/services')?>">
											<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default"> Cancle </button>
										</a>
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
	<script>
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

	    // $('#categoryselect').change(function(){
     //  	var cid=$('#categoryselect').val();
     //  		$.ajax({
		   //      url:'<?=base_url('C_provider/getSubcategory/')?>'+cid,
		   //      success:function(result)
		   //      {
		   //      	$('#sublabel').css({"top":"8px"});
		   //      	$('#subcategory').html(result);
		   //      }
	    //   });
    	// });
    }

	$('#sub').click(function(){
	  var textareaText = $('#text7').val();
	  textareaText = textareaText.replace(/\r?\n/g, '<br />');
	  $('#text44').val(textareaText);
	});

    // $('#categoryselect').change(function(){

    //   cid=$('#categoryselect').val();
    //   $.ajax({
    //     url:'<?=base_url('C_provider/getSubcategory/')?>'+cid,
    //     success:function(result)
    //     {
    //     	$('#sublabel').css({"top":"8px"});
    //     	$('#subcategory').html(result);
    //     }
    //   });
    // });

    
    
    // Dropzone.autoDiscover = false;
    // $("div#id_dropzone").dropzone({
    //     // var myDropzone = new Dropzone("#id_dropzone",{
    //     url: "<?php echo base_url('C_provider/fileUpload')?>",
    //     acceptedFiles: "image/*", 
    //     addRemoveLinks: true,
    //     maxFiles: 10,
    //     removedfile: function(file) 
    //     {
    //       	var fname = file.name;
    //       	$.ajax({
    //       		type: "post",
    //       		url: "<?php echo base_url('C_provider/removeImage') ?>",
    //       		data: { file: fname },
    //       		dataType: 'html'
    //       	});
    //       	//remove thumbneil
    //       	var previewElement;
    //       	return (previewElement = file.previewElement) != null ? (
    //       			previewElement.parentNode.removeChild(
    //       			file.previewElement)): (void 0);
    //     },
    //     success: function(file, response)
    //     {
    //         console.log(response);
    //     }	
              
    // });
        
    // });

  </script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>