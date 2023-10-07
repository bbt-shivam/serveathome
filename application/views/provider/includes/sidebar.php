<div class="sidebar-container">
	<div class="sidemenu-container navbar-collapse collapse fixed-menu">
		<div id="remove-scroll" class="left-sidemenu">
			<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
				data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
				<li class="sidebar-toggler-wrapper hide">
					<div class="sidebar-toggler">
						<span></span>
					</div>
				</li>
				<?php $provider = $this->Provider_model->get_provider(); ?>
				<li class="sidebar-user-panel">
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?=base_url('assets/provider/img/profile/').$provider[0]['image']?>" class="img-responsive user-img-circle"
								alt="User Image" style="margin-top: 10px;"/>
						</div>
						<div class="pull-left info">
							<p> <?= $provider[0]['shop_name'] ?> </p>
							<!-- <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
									Online</span></a> -->
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('C_provider/')?>" class="nav-link nav-toggle">
						<i class="material-icons">dashboard</i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
					<!-- 	<span class="arrow open"></span> -->
					</a>
				</li>
	
				<li class="nav-item">
					<a href="<?=base_url('C_provider/services')?>" class="nav-link nav-toggle"> <i class="fa fa-list-alt">	</i>
						<span class="title">Services</span> 
					</a>
				</li>



				<li class="nav-item" id="orders">
					<a href="#" class="nav-link nav-toggle"> <i class="fa fa-first-order">	</i>
						<span class="title">Orders</span> <span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<!-- <li class="nav-item">
							<a href="<?= base_url('C_provider/ordersPage') ?>" class="nav-link "> <span class="title">All Orders</span>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?= base_url('C_provider/ordersPage/0') ?>" class="nav-link "> <span class="title">New Orders</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('C_provider/ordersPage/1') ?>" class="nav-link "> <span class="title">Accepted/running Orders</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('C_provider/ordersPage/2') ?>" class="nav-link "> <span class="title">Delivered Orders</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('C_provider/ordersPage/-1') ?>" class="nav-link "> <span class="title">Cancled Orders</span>
							</a>
						</li>
					</ul>
				</li>

		<!-- 
				<li class="nav-item">
					<a href="" class="nav-link nav-toggle"> <i class="fa fa-first-order">	</i>
						<span class="title">Orders</span> 
					</a>
				</li> -->
			
				<li class="nav-item">
					<a href="<?=base_url('C_provider/staffPage')?>" class="nav-link nav-toggle"> <i class="fa fa-users"></i>
						<span class="title"> Service Stafs </span> 
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>