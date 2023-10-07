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
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?=base_url('C_provider')?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="analysis-box m-b-0 bg-purple">
								<?php $newOrder = $this->Provider_model->count_new_order();?>
								<h3 class="text-white box-title">New Orders  
									<br><span><?=$newOrder?></span></h3>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="analysis-box m-b-0 bg-success">
								<?php $runningOrder = $this->Provider_model->count_running_order();?>
								<h3 class="text-white box-title">Running Orders  
									<br><span><?=$runningOrder?></span></h3>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="analysis-box m-b-0 bg-danger">
								<?php $canclledOrder = $this->Provider_model->count_canclled_order();?>
								<h3 class="text-white box-title">Canclled Orders  
									<br><span><?=$canclledOrder?></span></h3>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-6">
							<div class="analysis-box m-b-0 bg-blue">
								<?php $deliveredOrder = $this->Provider_model->count_total_order();?>
								<h3 class="text-white box-title">Total Delivered  
									<br><span><?=$deliveredOrder?></span></h3>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="analysis-box m-b-0 bg-info">
								<h3 class="text-white box-title">Order Report  
									<br>
									<a href="<?=base_url('C_provider/reportExl/dl')?>"><span class="btn btn-xs btn-success">Daily</span></a>
									<a href="<?=base_url('C_provider/reportExl/wk')?>"><span class="btn btn-xs btn-success">Weekly</span></a>
									<a href="<?=base_url('C_provider/reportExl/mt')?>"><span class="btn btn-xs btn-success">Monthly</span></a>
									<a href="<?=base_url('C_provider/reportExl/y')?>"><span class="btn btn-xs btn-success">Yearly</span></a>
									</h3>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="analysis-box m-b-0 bg-info">
								<h3 class="text-white box-title">Other Reports  
									<br>
									<a href="<?=base_url('C_provider/reportExl/st')?>"><span class="btn btn-xs btn-success">Staff</span></a>
									<a href="<?=base_url('C_provider/reportExl/sr')?>"><span class="btn btn-xs btn-success">Services</span></a>
									<a href="<?=base_url('C_provider/reportExl/fd')?>"><span class="btn btn-xs btn-success">Feedback</span></a>
									</h3>
							</div>
						</div>
					</div>

					<!-- <a href="<?=base_url('C_provider/report/')?>"><button id="report" class="btn btn-md btn-primary">Report</button></a> -->
					
					<!-- chart start -->
					<!-- <div id="chart_div" class="col-md-12 col-12"></div> -->
					<!-- Chart end -->
					<!-- start course list -->
					
					<!-- End course list -->
					<div class="row">
						<!-- Quick Mail start -->
						
						<!-- Quick Mail end -->
						<!-- Activity feed start -->
						
						<!-- Activity feed end -->
					</div>
					
					<!-- start new student list -->
					
					<!-- end new student list -->
				</div>
			</div>
			<!-- end page content -->
			
		</div>
	</div>
		<!-- end page container -->
		<!-- start footer -->
		
		<?php $this->load->view('provider/includes/footer') ?>

			
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
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:57:43 GMT -->
</html>