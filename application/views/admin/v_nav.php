
			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="<?php echo base_url().'admin/dashboard'?>" <?php echo $this->uri->segment(2)=='dashboard' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->
						<?php if($this->session->userdata('akses')=="1") { ?>
						<li>
							<a href="<?php echo base_url().'admin/pengguna'?>" <?php echo $this->uri->segment(2)=='pengguna' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-user"></i></div>
								<span class="title">Stand</span>
							</a>
						</li>
						<?php } ?>	
						<?php if($this->session->userdata('akses')=="2") { ?>
						<li>
							<a href="<?php echo base_url().'admin/menu'?>" <?php echo $this->uri->segment(2)=='menu' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-cutlery"></i></div>
								<span class="title">Menu</span>
							</a>
						</li>
						<?php } ?>	

						<li>
							<a href="<?php echo base_url().'admin/pelanggan'?>" <?php echo $this->uri->segment(2)=='pelanggan' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-users"></i></div>
								<span class="title">Pelanggan</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url().'admin/order'?>" <?php echo $this->uri->segment(2)=='order' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-cart-arrow-down"></i></div>
								<span class="title">Order</span>
							</a>
						</li>

						<?php if($this->session->userdata('akses')=="1") { ?>

						<li>
							<a href="<?php echo base_url().'admin/gallery'?>" <?php echo $this->uri->segment(2)=='gallery' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-image"></i></div>
								<span class="title">Gallery</span>
							</a>
						</li>

						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a <?php echo $this->uri->segment(2)=='status' ? 'class="active"' : '';?>>
								<div class="gui-icon"><i class="fa fa-cogs"></i></div>
								<span class="title">Pengaturan</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="<?php echo base_url().'admin/status'?>" ><span class="title">Status Order</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						
						<?php } ?>	
						<!-- END EMAIL -->


					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">&copy; <?php echo '2020';?></span> <strong>Anggi NS</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->