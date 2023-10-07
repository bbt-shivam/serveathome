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
								<div class="page-title">User's Questions</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">user's questions</li>
							</ol>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane active fontawesome-demo" id="tab1">
									<div class="row">
										<div class="col-md-12">
									<div class="card card-topline-green">
										<div class="card-head">
											<header>Queries</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="table-scrollable">
												<table class="table">
													<thead>
														<tr>
															<th>#</th>
															<th> Name </th>
															<th> Email </th>
															<th >Subject</th>
															<th class="text-center"> Action </th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($inquiry as $inq): ?>
														<tr>
															<td>1</td>
															<td><?=$inq['fname'].' '.$inq['lname']?></td>
															<td><?=$inq['email']?></td>
															<td><?=$inq['subject']?></td>
															<td class="text-center">
																<button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ur<?=$inq['inqid']?>"><i class="fa fa-check"></i>View & reply</button></br>
																<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#mr<?=$inq['inqid']?>"><i class="fa fa-trash"></i> Mark as read</button>
															</td>
														</tr>


				<div class="modal fade bd-example-modal-sm"  id="mr<?=$inq['inqid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Mark as Read</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Are you sure u not want to reply..</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="<?php echo base_url('C_admin/markReadInquiry/').$inq['inqid']; ?>" class="btn btn-primary">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="modal fade" id="ur<?=$inq['inqid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:50px;">
					<div class="modal-dialog" role="document">
					    <div class="modal-content">
					     	<div class="modal-header">
						        <h3 class="modal-title" id="exampleModalLabel">User Message</h3>
						        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
						        	<span class="fa fa-times"></span>
						        </button>
					      	</div>
					    <div class="modal-body">
					       <!-- <div class="card"> -->
								<!-- <div class="card-head card-topline-aqua">
									<header>About Me</header>
								</div> -->
								<div class="card-body no-padding height-9">
									<div class="row list-separated profile-stat" style="border: none;">
										<div class="col-md-12 col-sm-12 col-12">
											<div class="uppercase profile-stat-title text-left"> <?=$inq['fname'].' '.$inq['lname']?> </div>
											<div class="uppercase profile-stat-text pull-left"> <?=$inq['email']?> </div>
										</div>
									</div>
									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<span style="font-weight: bold;">Subject:  </span>
											<span class="profile-desc-item"> <?=$inq['subject']?></span>
										</li>
									</ul>
									<div class="profile-desc">
										<b> Message: </b><br>
										<?=$inq['message']?>
									</div>
									<form action="<?=base_url('C_admin/sendUserReply')?>" method="post">
										<div class="row form-group">
			                    			<div class="col-md-12">
			                        			<label for="reason"><b>Reply: </b></label>
			                        			<input type="hidden" name="inqid" value="<?=$inq['inqid']?>">
			                        			<input type="hidden" name="email" value="<?=$inq['email']?>">
			                        			<input type="hidden" name="subject" value="<?=$inq['subject']?>">
			                        			<textarea class="form-control" id="reason" name="reply" placeholder="Write here..." rows="3" required></textarea>
			                        			 <span class="text-danger" style="font-size: 12px;"></span>
			                      			</div>
			                      			<div style="margin-top:20px; margin-left: 50%; " class="col-12"> 
					                       		<button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Cancle</button>
					                      		<button id="btnChange" type="submit" name="btnSubmit" class="btn btn-primary"> Send Reply</button><br>
				                    		</div>
			                    		</div>
									</form>
								</div>
								
							<!-- </div> -->
					    </div>
					  <!--   <div class="modal-footer">
					    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					    </div> -->
				    </div>
				</div>



													<?php endforeach; ?>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
		<!-- start footer -->
	<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->

</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>