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
							<div class="page-title">1. Complete the registration</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Business Details</header>
								<p><?= $this->session->flashdata('msg_upload') ?></p>
							</div>
							<form method="post" enctype="multipart/form-data" action="<?=base_url('C_provider/register')?>">
								<div class="card-body row">
									<!-- <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="name">
											<label class="mdl-textfield__label">Full Name</label>
										</div>
									</div>
 -->
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="shopName" value="<?=set_value('shopName')?>" autocomplete="off">
											<label class="mdl-textfield__label">Shop / Business Name</label>
											<?php echo form_error('shopName','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="gstin" value="<?=set_value('gstin')?>">
											<label class="mdl-textfield__label" >GSTIN (optional)</label>
											<?php echo form_error('gstin','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="text5" name="phone" value="<?=set_value('phone')?>">
											<label class="mdl-textfield__label" for="text5">Shop contact no.</label>
											<?php echo form_error('phone','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="file" id="image" name="image">
											<label class="mdl-textfield__label" style="top: -5px;">Poster Image/Shop Image</label>
											<?php echo form_error('image','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="categoryselect" name="category">
												<option class="mdl-menu__item" selected="selected"></option>
												<?php $cat=$this->Provider_model->get_roll(); 
													foreach($cat as $c): 
													if($c['cid']==set_value('category')){ ?>?>
														<option class="mdl-menu__item" value="<?=$c['cid']?>" selected="selected"><?=$c['cname']?></option>
													<?php } else { ?>
														<option class="mdl-menu__item" value="<?=$c['cid']?>"><?=$c['cname']?></option>
												<?php } endforeach; ?>
											</select>
											
											<label for="list2" class="mdl-textfield__label">Business Category</label>
											<?php echo form_error('category','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="subcategory" name="subcategory">
												<option class="mdl-menu__item" selected="selected"></option>
												
											</select>
											<?php echo form_error('subcategory','<span class="text-danger" style="font-size: 12px;">','</span>');?>
											<label for="list2" class="mdl-textfield__label" id="sublabel">Service Type</label>
										</div>
									</div>
								
								</div>

								<div class="card-head">
									<header>Address Details</header>
									<p><?= $this->session->flashdata('msg_upload') ?></p>
								</div>
								<!-- <div class="col-lg-6 p-t-20" id="oldAddress">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width"> 
										<select name="selectAddress" class="mdl-textfield__input">
											<?php $address = $this->Common_model->get_address(); 
											if(count($address)>0){
											foreach ($address as $a) : ?>
												<option class="mdl-menu__item" value="<?=$a['addrid']?>">
													<?=$a['address'].', '.$a['locality'].', '.$a['landmark'].', '.$a['city_name'].', '.$a['state_name'].' - <b> '.$a['pincode'].'</b>'?>
												</option>
											<?php endforeach; } else { ?>
												<option></option>
												<input type="hidden" name="noAddress" id="noAddress" value="1">
											<?php } ?>
										</select>
									</div>
								</div> -->
								<!-- <div class="card-body row">
									

									<div class="col-lg-12 p-t-20">
										<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-primary" id="add" type="button"> Add a new address</button>
										<p id="new" class="page-title"><u>Enter New Address</u></p>
									</div>
								</div> -->

								<div class="card-body row" id="newAddress">
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="3" id="text7" name="address"><?=set_value('address')?></textarea>
											<label class="mdl-textfield__label" for="text7">Address</label>
											<?php echo form_error('address','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="pincode" value="<?=set_value('pincode')?>">
											<label class="mdl-textfield__label">pincode</label>
											<?php echo form_error('pincode','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="locality" value="<?=set_value('locality')?>">
											<label class="mdl-textfield__label">Locality/colony/street</label>
											<?php echo form_error('locality','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtLasttName" name="landmark" value="<?=set_value('landmark')?>">
											<label class="mdl-textfield__label">Landmark</label>
											<?php echo form_error('landmark','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="categoryselect" name="state" style="-webkit-appearance: none;">	
												<option class="mdl-menu__item"></option>
												<option class="mdl-menu__item" value="1">Gujrat</option>
											</select>
											<label for="list2" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list2" class="mdl-textfield__label"> State </label>
											<?php echo form_error('state','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>

									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<select class="mdl-textfield__input" id="categoryselect" name="city" style="-webkit-appearance: none;">	
												<option class="mdl-menu__item"></option>
												<option class="mdl-menu__item" value="1">Surat</option>
											</select>
											<label for="list2" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list2" class="mdl-textfield__label"> City / Town / District </label>
											<?php echo form_error('city','<span class="text-danger" style="font-size: 12px;">','</span>');?>
										</div>
									</div>
								</div>
								<div class="card-body row">
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Next</button>
										<button type="reset"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
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
		<script>
			$(document).ready(function(){
				// $('#new').hide();
				// if ($("#text7").val() == '') {
			 //    	$('#newAddress').hide();
				// } else {
				// 	$('#oldAddress').hide();
				// 	$('#old').hide();
				// 	$('#newAddress').show();
				// 	$('#add').hide();
				// 	$('#new').show();
				// }
				
				$('#add').click(function(){
					$('#old').hide();
					$('#oldAddress').hide();
					$('#newAddress').show();
					$(this).hide();
					$('#new').show();
				});
				// if ($("#noAddress").val() == 1) {
				// 	$('#old').hide();
				// 	$('#oldAddress').hide();
				// 	$('#add').hide();
				// 	$('#newAddress').show();
				// 	$('#new').show();
				// }

				 $('#categoryselect').change(function(){

			      cid=$('#categoryselect').val();
			      $.ajax({
			        url:'<?=base_url('C_provider/getSubcategory/')?>'+cid,
			        success:function(result)
			        {
			        	$('#sublabel').css({"top":"8px"});
			        	$('#subcategory').html(result);
			        }
			      });
			    });

			});
		</script>
	<!-- end js include path -->
	
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/add_course_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:25 GMT -->
</html>