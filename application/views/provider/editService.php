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
			<?php
				$sid=$edit[0]['sid'];
				$sname=$edit[0]['sname'];
				$image=$edit[0]['simage'];
				$cid=$edit[0]['cid'];
				$price=$edit[0]['price'];
				$sdescription=$edit[0]['sdescription'];
				$stime=$edit[0]['time'];
				$status=$edit[0]['s_status'];?>

			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Service</div>
								<?php echo validation_errors();?>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?=base_url('C_provider/index')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?=base_url('C_provider/services')?>">Service</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Edit Service </li>
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
								<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/editService')?>">
									<div class="card-body row">
										<div class="col-lg-6 p-t-20">
										
											<div class="course-picture mdl-textfield__input" style="border: none;">
												<img width="100%" height="80%" src="<?=base_url('assets/images/services/').$image?>" class="img-responsive" alt=""> 
												<!-- <label class="mdl-textfield__label" style="margin-top: -10px; margin-left: 370px;">Service Image</label> -->
											</div>
									<!-- </div>
									<div class="col-lg-6 p-t-20"> -->
											<div class="mdl-textfield mdl-js-textfield txt-full-width">
												<input class="mdl-textfield__input"  type="file" name="image">
												<label class="mdl-textfield__label" style="margin-top: -20px;">Change Service Image</label>
												<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>'); ?>
											</div>
										</div>
										<div class="col-lg-6 p-t-20">
											<h1> <?=$sname?></h1>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<input class="mdl-textfield__input" type="text" name="sname" value="<?php $set=set_value('sname'); if(isset($set)) echo $set;
													if(isset($sname) && $set =='') echo $sname; ?>">
												 <input type="hidden" name="sid" value="<?=$sid?>" id="sid">
												<label class="mdl-textfield__label"> Edit </label>
												<?php echo form_error('sname','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											</div>

										</div>
									</div>
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
														if($c['cid']==set_value('category') || $c['cid']==$cid){ ?>
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
													if($c['cid']==set_value('category') || $c['cid']==$cid){ ?>
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
											<input class="mdl-textfield__input" type="text" name="sprice" value="<?php $set=set_value('sprice'); if(isset($set)) echo $set;
												if(isset($price) && $set =='') echo $price; ?>">
											<label class="mdl-textfield__label">Price &#x20b9;</label>
											<?php echo form_error('sprice','<span class="text-danger" style="font-size: 12px;">','</span>');?>
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
											<input class="mdl-textfield__input" type="text" name="stime" value="<?php $set=set_value('stime'); if(isset($set)) echo $set;
												if(isset($stime) && $set =='') echo $stime; ?>">
											<label class="mdl-textfield__label">Time (in minutes)</label>
											<?php echo form_error('stime','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
												<select class="mdl-textfield__input" id="subcategory" name="status">
													<option class="mdl-menu__item" <?php if($status == 0){ ?>selected="selected" <?php } ?> value="0">Active</option>
													<option class="mdl-menu__item" <?php if($status == 1){ ?>selected="selected" <?php } ?> value="1">Inactive</option>
													
												</select>
											
												<label for="list2" class="mdl-textfield__label" id="sublabel">Status</label>
											</div>
										</div> 
									</div>
									
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="4" id="text7" name="sdescription"><?php $set=set_value('sdescription'); if(isset($set)) echo $set;
												if(isset($sdescription) && $set =='') echo $sdescription; ?></textarea>
											<label class="mdl-textfield__label" for="text7">Service Description</label>
											<?php echo form_error('sdescription','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										
									</div>
									
									<div class="col-lg-12 p-t-20 text-center">
										<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" id="sub" value="Update">
										<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content-->
			
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

    
    
   
    // });

  </script>
</body>



</html>