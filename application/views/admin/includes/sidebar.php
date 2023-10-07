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
				<li class="sidebar-user-panel">
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?=base_url('assets/admin/')?>img/profile/<?=$this->session->userdata('admin')['image']?>" class="img-circle user-img-circle"
								alt="User Image" />
						</div>
						<div class="pull-left info">
							<p> <?php echo $this->session->userdata('admin')['name']; ?> </p>
							<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
									Online</span></a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('C_admin/home')?>" class="nav-link nav-toggle">
						<i class="material-icons">dashboard</i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
					<!-- 	<span class="arrow open"></span> -->
					</a>
				</li>
	
				<li class="nav-item" id="category">
					<a href="#" class="nav-link nav-toggle"> <i class="fa fa-list-alt">	</i>
						<span class="title">Business Category</span> <span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="<?=base_url('C_admin/category')?>" class="nav-link "> <span class="title">All Categories</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('C_admin/subcategoryPage')?>" class="nav-link "> <span class="title">All Subcategories</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" id="service">
					<a href="<?=base_url('C_admin/serviceCategory')?>" class="nav-link nav-toggle"> <i class="fa fa-filter"></i>
						<span class="title">Service Category</span>
					</a>
				</li>
				<!-- <li class="nav-item" id="service">
					<a href="<?=base_url('C_admin/services')?>"class="nav-link nav-toggle"> <i class="fa fa-cog"></i>
						<span class="title">Services</span>
					</a>
				</li> -->

				<li class="nav-item" id="Providers">
					<a href="#" class="nav-link nav-toggle"> <i class="fa fa-truck"></i>
						<span class="title">Service Providers</span> <span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="<?=base_url('C_admin/getProviders/1')?>" class="nav-link "> <span class="title">All Active Providers</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('C_admin/getProviders/0')?>" class="nav-link "> <span class="title">New Provider Requests</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('C_admin/getProviders/-1')?>" class="nav-link "> <span class="title">Rejected Provider Requests</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('C_admin/users')?>" class="nav-link nav-toggle"> <i class="fa fa-users">	</i>
						<span class="title">Users</span> 
					</a>
				</li>
				</li>
				
				<li class="nav-item">
					<a href="<?= base_url('C_admin/userInquiry') ?>" class="nav-link nav-toggle"> <i class="fa fa-question"></i>
						<span class="title">User's Inquiry</span> 
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('C_admin/coupans')?>" class="nav-link nav-toggle"> <i class="fa fa-gift">	</i>
						<span class="title">Manage Coupans</span> 
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=base_url('C_admin/locationPage')?>" class="nav-link nav-toggle"> <i class="fa fa-map-marker"> </i>
						<span class="title">Location</span> 
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>