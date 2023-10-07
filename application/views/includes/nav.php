<div class="site-wrap">

	<div class="site-mobile-menu noprint">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close mt-3">
				<span class="icon-close2 js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body noprint"></div>
	</div>

	<header class="site-navbar container py-0" role="banner">
		
		<div class="row align-items-center">
			<div class="col-6 col-xl-2">
				<a class="noprint text-white" href="<?=base_url()?>">
					<span class=" logo-icon material-icons fa-rotate-45 notranslate">school</span>
					<span style="font-size: 20px; font-weight: bold;">serveathome</span> 
				</a>
			</div>
			<div class="googleTranslate col-4" id="google_translate_element"></div>

			<div class="col-10 col-md-10 d-none d-xl-block noprint">
				<nav class="site-navigation position-relative text-right" role="navigation">

					<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
						<li>
							<a href="<?= base_url(); ?>">Home</a>
						</li>
						<li>
							<a href="<?=base_url('about')?>">About Us</a>
						</li>
						<!-- <li>
							<a href="<?=base_url('displayCart')?>">Cart</a>
						</li> -->
						<li class="mr-5">
							<a href="<?=base_url('contact'); ?>">Contact Us</a>
						</li>
						
						
						
						<?php if($this->session->has_userdata('user')) : ?>
						<li class="has-children ml-xl-3 mr-5 login">
							<span class="border-left pl-xl-4"></span>
			                <a href="#"><?php $user = $this->User_model->get_user($this->session->userdata('user')['uid']);

			                 	if($user[0]['name'] ==null || $user[0]['name']=='') echo "My Account"; else echo $user[0]['name']; ?>
			                 		
			                </a>
			                 <ul class="dropdown arrow-top">
			                 	<li style="font-size: 12px;">
			                 		<a href="<?=base_url('profile');?>">My Profile</a>
			                 	</li>
			                    <li style="font-size: 12px;">
			                    	<a href="<?=base_url('orders');?>">My Orders</a>
			                    </li>
			                    <!-- <li style="font-size: 12px;">
			                    	<a href="#">Coupans</a>
			                    </li> -->
			                    <?php $check=$this->Common_model->check_provider($user[0]['uid']); ?>
			                  <!--   <li style="font-size: 12px;"><a href="#">Notifications</a></li> -->
			                    <li style="font-size: 12px;">
			                    	
			                    	<a href="<?=base_url('C_provider')?>">
			                    		<?php if(count($check)>0){ echo "My Business"; }
			                    			else{ echo "Add Your Business"; }?>
			                    	</a>
			                    </li>
			                    <li style="font-size: 12px;">
			                    	<a href="<?=base_url('logOut'); ?>">Logout</a>
			                    </li>
			                </ul>
		              	</li>
						<?php else: ?>
							<li class="ml-xl-3 mr-5 login">
								<a href="<?=base_url('signUp'); ?>"><span class="border-left pl-xl-4"></span>Log In / Sign up</a>
							</li>
						<?php endif; ?>
					</ul>

				</nav>
			</div>


			<div class="d-inline-block d-xl-none ml-auto py-3 col-1 text-right noprint" style="right: 15px;">
				<a href="#" class="site-menu-toggle js-menu-toggle text-white noprint"><span class="icon-menu h3"></span></a>
			</div>
		</div>
	</header>
</div>


