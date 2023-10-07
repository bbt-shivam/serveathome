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
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?=base_url('C_admin/home')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>

					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">face</i></span>
									<div class="info-box-content">
										<?php $totalUsers = $this->Admin_model->count_users();?>
										<span class="info-box-text">Total Users</span>
										<span class="info-box-number"><?=$totalUsers?></span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-success">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">group</i></span>
									<div class="info-box-content">
										<?php $totalProvider = $this->Admin_model->count_provider();?>
										<span class="info-box-text">Total Service Providers</span>
										<span class="info-box-number"><?=$totalProvider?></span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-warning">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">view_list</i></span>
									<div class="info-box-content">
										<?php $totalServices = $this->Admin_model->count_services();?>
										<span class="info-box-text">Total Services</span>
										<span class="info-box-number"><?=$totalServices?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							
							<!-- /.col -->
						</div>

						<div class="row">
							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">group</i></span>
									<div class="info-box-content">
										<?php $totalnp = $this->Admin_model->count_new_provider();?>
										<span class="info-box-text">New Provider Requests</span>
										<span class="info-box-number"><?=$totalnp?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-danger">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">group</i></span>
									<div class="info-box-content">
										<?php $totalinp = $this->Admin_model->count_inactive_provider();?>
										<span class="info-box-text">Inactive Providers</span>
										<span class="info-box-number"><?=$totalinp?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>


							<div class="col-xl-4 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom" style="margin-top: 5px;">
										<i class="material-icons">view_list</i></span>
									<div class="info-box-content">
										<?php $totalinq = $this->Admin_model->count_userinquiry();?>
										<span class="info-box-text">User's inquies</span>
										<span class="info-box-number"><?=$totalinq?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

							
						</div>
						<div class="row">
						<!-- <div class="col-lg-6	 col-md-6 col-sm-6 col-12">
							<div class="analysis-box m-b-0 bg-info">
								<h3 class="text-white box-title">Order Report  
									<br>
									<span class="btn btn-xs btn-success">Daily</span>
									<span class="btn btn-xs btn-success">Weekly</span>
									<span class="btn btn-xs btn-success">Monthly</span>
									<span class="btn btn-xs btn-success">Yearly</span>
									</h3>
							</div>
						</div> -->

						<div class="col-lg-12 col-md-6 col-sm-6 col-12">
							<div class="analysis-box m-b-0 bg-info">
								<h3 class="text-white box-title">Reports  
									<br>
									<a href="<?=base_url('C_admin/reportExl/u')?>"><span class="btn btn-xs btn-success">Users</span></a>
									<a href="<?=base_url('C_admin/reportExl/sp')?>"><span class="btn btn-xs btn-success">Service Providers</span></a>
									<a href="<?=base_url('C_admin/reportExl/bc')?>"><span class="btn btn-xs btn-success">Business Categories</span></a>
									<a href="<?=base_url('C_admin/reportExl/cp')?>"><span class="btn btn-xs btn-success">Coupans</span></a>
									</h3>
							</div>
						</div>
					</div>
						
						
					</div>
					<!-- end widget -->




					<!-- chart  -->

							<!-- <div id="chart_div"></div> -->


					<!-- end chart -->
				
					<!-- chart start -->.
					<!-- <div class="row">
						<div class="col-sm-8">
							<div class="card card-box">
								<div class="card-head">
									<header>University Survey</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row">
										<canvas id="canvas1"></canvas>
									</div>
								</div>
							</div>
						</div>

					<<div class="col-sm-4">
							<div class="card card-box">
								<div class="card-head">
									<header>University Survey</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row">
										<canvas id="chartjs_pie"></canvas>
									</div>
								</div>
							</div>
						</div>
				</div>
 -->

	
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		
		<?php $this->load->view('admin/includes/footer') ?>

	<!-- end js include path -->

	<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Orders');
        data.addRows([
          <?php
          		$Orders = $this->db->query('SELECT count(oid) as TotalOrder, order_date 
				FROM orders WHERE substr(order_date, 1, 7) = date("Y-m") AND order_status = 2 GROUP BY substr(order_date, 1, 10)')->result_array();
        
		          foreach ($Orders as $o) {
		            echo "['".substr($o['order_date'],1,10)."', ".$o['TotalOrder']."],";  
		          }

		           ?>
	        	]);

        // Set chart options
        var options = {'title':'Total Orders Of Month',
                       'height':135};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>





</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:57:43 GMT -->
</html>