<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php $this->load->view('provider/includes/head') ?>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('provider/includes/nav') ?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<?php $this->load->view('provider/includes/sidebar') ?>

				<div class="page-content-wrapper">

					<div class="page-content">
						<div class="page-bar">
							<div class="page-title-breadcrumb">
								<div class=" pull-left">
									<div class="page-title">View Orders</div>
								</div>
								<ol class="breadcrumb page-breadcrumb pull-right">
									<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
											href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
									</li>
									<li class="active"><a class="parent-item" href="#">All Orders</a>&nbsp;<i
											class="fa fa-angle-right"></i>
									</li>
									<li class="active">View Orders</li>
								</ol>
							</div>
						</div>

						<div class="card">
							<div class="card-head card-topline-aqua">
								<header class="pull-right">  <a href="<?=base_url('C_provider/invoice/').$order[0]['oid']?>"><button class="btn btn-sm btn-primary text-right" style="margin-left: 30px;"> invoice</button></a></header>
							</div>
							<div class="card-body height-9">

								<div class="row container">
									<div class="col-md-3 col-12">
										<span><b>Order Id: </b></span>
										<span><?=$order[0]['oid'];?></span>
									</div>
									<div class="col-md-4 col-12">
										<span><b>Order Amount: </b></span>
										<span> ₹ <?=$order[0]['final_price'];?></span>
									</div>
									<div class="col-md-3 col-12">
										<span><b>Payment : </b></span>
										<span>PREPAID</span>
									</div>
								
								</div>
								<div class="row container">
									<div class="col-md-3 col-12">
										<span><b>Order Status: </b></span>
										<span><?php if($order[0]['order_status']==0){
											echo '<span class="text-warning"> New </span>';
											}
											elseif($order[0]['order_status']==1){
												echo '<span class="clsOnLeave"> Accepted </span>';
											}
											elseif($order[0]['order_status']==2){
												echo '<span class="clsAvailable"> Delivered </span>';
											}
											else{
												echo '<span class="clsNotAvailable"> Canclled </span>';
											}?>
												
										</span>
									</div>
									<?php if($order[0]['order_status']==2){ ?>

									<div class="col-md-4 col-12">
										<span><b>Delivered On: </b></span>
										<span><?=$order[0]['delivery_date'];?></span>
									</div>
								<!-- </div>
								<div class="row container"> -->
									<?php } if($order[0]['staffid'] != null){
										$oStaff=$this->Provider_model->get_staff_by_staffid($order[0]['staffid']);
										if(count($oStaff)>0){ ?>
											<div class="col-md-4 col-12">
												<?php if($order[0]['order_status'] ==2 ){ ?>
													<span><b>Delivered By: </b></span>
													<span><?=$oStaff[0]['name'];?></span>
												<?php } elseif($order[0]['order_status'] ==1 ){ ?>
													<span><b>Service Man: </b></span>
													<span><?=$oStaff[0]['name'];?></span>
												<?php } elseif($order[0]['order_status'] == -1 ){ ?>
													<span><b>Reason: </b></span>
													<span><?=$order[0]['reason'];?></span>
												<?php } ?>
												
											</div>
									<?php } }?>
								</div>
								<div class="profile-desc">
									<div class="row container">
										<div class="col-md-9">
											<div class="pull-left"><h3>Customer detail </h3></div> 
										</div>
									</div>
									<div class="row container">
										<div class="col-md-3 col-6">
											<div class="pull-left"><b>Customer Name: </b></div> 
										</div>
										<div class="col-md-9 col-6">
											<div class="col"><?=$order[0]['uname'];?></div>
										</div>
									</div>
									<div class="row container" style="margin-top: 10px;">
										<div class="col-md-3 col-6">
											<div class="pull-left"><b>Contact Number: </b></div> 
										</div>
										<div class="col-md-9 col-6">
											<div class="col"><?=$order[0]['contact'];?></div>
										</div>
									</div>
								
									<div class="row container" style="margin-top: 10px;">
										<div class="col-md-3 col-6">
											<div class="pull-left"><b>Customer Address: </b></div> 
										</div>
										<div class="col-md-9 col-6">
											<div class="col"><?=$order[0]['address'];?></div>
										</div>
									</div>
								</div>

								
								<ul class="list-group list-group-unbordered">
									<li class="list-group-item" style="margin-left: 15px;">
										<b class="text-danger" style="font-size: 19px;">Service </b>
										<div class="profile-desc-item pull-right" style="width: 40%;">Description</div>
									</li>
									<?php foreach($orderDtls as $o):?>
									<li class="list-group-item" style="margin-left: 15px;">
										<b class="col-6"><?=$o['sname']?> </b>
										<div class="profile-desc-item pull-right col-6" style="width: 40%;"><?=$o['sdescription']?> </div>
									</li>
									<?php endforeach; ?>
								</ul>
								<div class="form-actions">
									<div class="row">
										<div class="offset-md-4 col-md-8">
											<?php if($order[0]['order_status']==0){?>
												<button type="button" class="btn btn-success m-r-20" data-toggle="modal" data-target="#staffModal">Process Order</button>
												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject">Cancel Order</button>
											<?php } elseif ($order[0]['order_status']==1) { ?>
												<button type="button" class="btn btn-success m-r-20" data-toggle="modal" data-target="#staffModal">Change Service man</button>
												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject">Cancel Order</button>
											<?php } ?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	


				<!-- modal -->
		<div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 80px;">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			     	<div class="modal-header">
				        <h3 class="modal-title" id="exampleModalLabel">Available Staff</h3>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
			      	</div>
			    <div class="modal-body">
			    	<header> Allocate order to available service staff</header>
			        <div class="card">
			        	<?php $staff=$this->Provider_model->get_available_staff(); ?>
						
						<div class="card-body no-padding height-9">
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<?php if(count($staff)>0){ ?>
									<b class="pull-left">Staff Name</b>
									<div class="profile-desc-item pull-right" style="width: 50%;">
										<span class="profile-desc-item ">Staff Code</span>
									</div>
								<?php foreach ($staff as $s) : ?>
								<li class="list-group-item">
									<b class="pull-left"><?=$s['name']?></b>
									<div class="profile-desc-item pull-right" style="width: 50%;">
										<span class="profile-desc-item ">
											<!-- <?php  if($s['status']==0){
												echo '<span class="clsAvailable">Available</span>';} elseif($s['status']==1) echo '<span class="clsNotAvailable">On Order</span>';
													else echo '<span class="clsOnLeave"> On Order</span>';?>
													 --> 
												<span class="text-muted"><?=$s['code']?></span>
										</span>
										<a href="<?=base_url('C_provider/allocateOrder/').$s['staffid'].'/'.$order[0]['oid']?>" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-check"></i> </a>
										</div>
								</li> 
								<?php endforeach; }
									else{
										echo '<li class="list-group-item">';
										echo '<b class="pull-left clsNotAvailable">No staff Available..</b> </li>';
									?>
									<li class="list-group-item">
									<a href="<?=base_url('C_provider/addStaffPage')?>"><b class="pull-left clsOnLeave">Click Hear Add a Staff</b></a> 
									</li>	
									<?php }?>
								</li>
								
							</ul>
							
						</div>
					</div>
			    </div>
			</div>
			  <!--   <div class="modal-footer">
			    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    </div> -->
		    </div>
		</div>


		<div style="margin-top: 80px; " class="modal fade" id="reject" tabindex="0" role="dialog" aria-labelledby="forgotPasswordLable" aria-hidden="true">
            <div class="modal-dialog" role="document">
              	<div class="modal-content">
                	<div class="modal-header">
                  		<h3 class="modal-title" id="exampleModalLabel">Cancle Order</h3>
				        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
				        	<span class="fa fa-times"></span>
				        </button>
                	</div>
                	<div class="modal-body">
                  		<form action="<?=base_url('C_provider/cancleOrder/')?>" method="post">
                    		<div class="row form-group">
                     			<div class="col-12">
                        			<h3>Order ID:
                        			<?=$order[0]['oid']?></h3>
                        			<input type="hidden" name="odid" value="<?=$order[0]['oid']?>">
                      			</div>
                    		</div>
                    		<div class="row form-group">
                    			<div class="col-md-12">
                        			<label for="reason">Reason</label>
                        			<textarea class="form-control" id="reason" name="reason" placeholder="Reasone for cancle order..   Only 300 charecters.." rows="3" required></textarea>
                        			
                      			</div>
                    		</div>
                  
                    		<div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
	                       		<button type="button" class="btn btn-default" id="btclose" data-dismiss="modal">Cancle</button>
	                      		<button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary">Confirm </button><br>
                    		</div>
                  		</form>
                	</div>
              	</div>
            </div>
        </div>	

		
				<!-- end modal -->



			<?php $this->load->view('provider/includes/footer') ?>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>