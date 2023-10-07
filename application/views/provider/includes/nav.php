<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner ">
		<!-- logo start -->
		<div class="page-logo">
			<a href="<?=base_url('C_provider/')?>">
				<span class="logo-icon material-icons fa-rotate-45">school</span>
				<span class="logo-default" style="font-size: 20px;">serveathome</span> </a>
		</div>
		<!-- logo end -->
		<?php $provider = $this->Provider_model->get_provider();
		if(count($provider)>0){
			if($provider[0]['status']==1){ ?>
			<ul class="nav navbar-nav navbar-left in">
				<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
			</ul>
			<?php } ?>
			<!-- start mobile menu -->
			<?php $provider = $this->Provider_model->get_provider();
			if($provider[0]['status']==1){ ?>
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span></span>
			</a>
		<?php } }?>
		<!-- end mobile menu -->
		<!-- start header menu -->
		<?php if(count($provider)>0){ ?>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
				<!-- start language menu -->
				
				<!-- end message dropdown -->
				<!-- start manage user dropdown -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
						data-close-others="true">
						<img alt="image" class="img-circle " src="<?=base_url('assets/provider/img/profile/').$provider[0]['image']?>" />
						<span class="username username-hide-on-mobile">
							<?=$provider[0]['shop_name']?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<?php if($provider[0]['status'] != 0){ ?>
						<li>
							<a href="<?=base_url('C_provider/providerProfile')?>">
								<i class="icon-user"></i> Profile </a>
						</li>
					<?php } ?>
					
						<li class="divider"> </li>
				
						<li>
							<a href="<?= base_url('logOut')?>">
								<i class="icon-logout"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- end manage user dropdown -->
				
			</ul>
		</div>
	<?php } ?>
	</div>
</div>