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
			<div class="page-content-wrapper">
				<div class="page-content">
				
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Country, State, City</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
					
								<li class="active">locations</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-sm-4">
									<div class="card card-topline-green">
										<div class="card-head">
											<header>Country</header> 
											<?php echo validation_errors(); ?>
											<button class="btn-info btn btn-xs" data-toggle="modal" data-target="#addCountry"> Add Country <i class="fa fa-plus" area-hidden="true"></i></button>
												<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down"
													href="javascript:;"></a>
												
											</div>
										</div>
										<div class="card-body ">
											<div class="table-scrollable">
												<table class="table">
													<thead>
														<tr>
															<th>Country id</th>
															<th>Country Name</th>
															<th>Action</th>

														</tr>
													</thead>
													<tbody>
														<?php foreach($countries as $country): ?>
														<tr>
															<td><?=$country['countryid']?></td>
															<td><?=$country['country_name']?></td>
															<td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#mc<?=$country['countryid']?>"> <i class="fa fa-trash-o "></i></td>
														</tr>
									<div class="modal fade bd-example-modal-sm"  id="mc<?=$country['countryid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Country</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete this Country</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url('C_admin/deleteCountry/').$country['countryid']; ?>" class="btn btn-primary">Save changes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="card card-topline-green">
										<div class="card-head">
											<header>State</header>
											<button class="btn-info btn btn-xs" data-toggle="modal" data-target="#addState"> Add State <i class="fa fa-plus" area-hidden="true"></i></button>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down"
													href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="table-scrollable">
												<table class="table">
													<thead>
														<tr>
															<th>State id</th>
															<th>State Name</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($states as $state): ?>
														<tr>
															<td><?=$state['stateid']?></td>
															<td><?=$state['state_name']?></td>
															<td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#ms<?=$state['stateid']?>"> <i class="fa fa-trash-o "></i></td>
														</tr>
									<div class="modal fade bd-example-modal-sm" id="ms<?=$state['stateid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete State</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete this State</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url('C_admin/deleteState/').$state['stateid']; ?>" class="btn btn-primary">Save changes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card card-topline-green">
										<div class="card-head">
											<header>City</header>
											<button class="btn-info btn btn-xs" data-toggle="modal" data-target="#addCity"> Add City <i class="fa fa-plus" area-hidden="true"></i></button>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down"
													href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="table-scrollable">
												<table class="table">
													<thead>
														<tr>
															<th>City id</th>
															<th>City Name</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($cities as $city): ?>
														<tr>
															<td><?=$city['cityid']?></td>
															<td><?=$city['city_name']?></td>
															<td><button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#m<?=$city['cityid']?>"> <i class="fa fa-trash-o "></i></td>
														</tr>
									<div class="modal fade bd-example-modal-sm"  id="m<?=$city['cityid']?>" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 80px;">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete City</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure u want to delete this City</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?php echo base_url('C_admin/deleteCity/').$city['cityid']; ?>" class="btn btn-primary">Save changes</a>
                                                </div>
                                            </div>
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

				<!-- Add Country Modal -->
				<div class="modal fade" id="addCountry" style="margin-top: 80px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('C_admin/addCountry')?>" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Country Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Enter Country Name" name="country" value="<?=set_value('country')?>">
                                    </div>
                                    <div class="modal-footer">
                                    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    	<input type="submit" name="submit" value="Add" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add State Modal -->
                <div class="modal fade" id="addState" style="margin-top: 80px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add State</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('C_admin/addState')?>" method="post">
                                	 <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"> Country:</label>
                                        <select name="country" class="form-control">
                                        	<option selected="selected"disabled>--Select Country--</option>
                                        	<?php foreach($countries as $c): ?>
                                        	<option value="<?=$c['countryid']?>"><?=$c['country_name']?></option>
                                        	<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">State Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Enter State Name" name="state"value="<?=set_value('state')?>">
                                    </div>
                                    <div class="modal-footer">
                                    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    	<input type="submit" name="submit" value="Add" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add City modal -->
                <div class="modal fade" id="addCity" style="margin-top: 80px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('C_admin/addCity')?>" method="post">
                                	 <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"> Country:</label>
                                       <select name="country" class="form-control" id="country3">
                                        	<option selected="selected"disabled>--Select Country--</option>
                                        	<?php foreach($countries as $c): ?>
                                        	<option value="<?=$c['countryid']?>"><?=$c['country_name']?></option>
                                        	<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"> State:</label>
                                        <select name="state" class="form-control" id="state2">
                                        	<option selected="selected"disabled>--Select State--</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">City Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Enter City Name" name="city"value="<?=set_value('city')?>">
                                    </div>
                                    <div class="modal-footer">
                                    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    	<input type="submit" name="submit" value="Add" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		</div>
		<!-- end page container -->
		<!-- start footer -->
	<?php $this->load->view('admin/includes/footer') ?>
	<!-- end js include path -->
	<script>
		$('#country3').change(function(){
			cid = $('#country3').val();
			$.ajax({
				url:'<?=base_url('C_admin/fillState/')?>'+cid,
		        success:function(result)
		        {
		          $('#state2').html(result);
		        }
		    });
		});
	</script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/all_staffs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 14:00:26 GMT -->
</html>