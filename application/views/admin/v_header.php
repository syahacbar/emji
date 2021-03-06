<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="#">
									<span class="text-lg text-bold text-primary">EMJI</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
							<?php 
								$qry=$this->db->query("SELECT COUNT(inv_no) AS jum_order FROM tbl_invoice WHERE inv_status='Menunggu Konfirmasi'");
								$o=$qry->row_array();
							?>
						<li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-cart-arrow-down"></i><sup class="badge style-danger"><?php echo $o['jum_order'];?></sup>
							</a>
							<ul class="dropdown-menu animation-expand" style="overflow-y:scroll;max-height:500px;">
								<li class="dropdown-header">New Order</li>
								<?php 
									$q=$this->db->query("SELECT DATE_FORMAT(inv_tanggal,'%d %M %Y') AS tgl,inv_plg_nama,inv_status FROM tbl_invoice WHERE inv_status='Menunggu Konfirmasi' order by date(inv_tanggal) desc");
									foreach ($q->result_array() as $x) {
										$tgl=$x['tgl'];
										$plg=$x['inv_plg_nama'];
										$sts=$x['inv_status'];
									
								?>
								<li>
									<a class="alert alert-callout alert-warning" href="<?php echo base_url().'admin/order'?>">
										<strong><?php echo $plg.' memesan...';?></strong><br/>
										<small><?php echo $tgl;?></small>
									</a>
								</li>
								<?php } ?>
								
								
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->

						
					</ul><!--end .header-nav-options -->
					<?php 
						$b=$user->row_array();
					?>
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="<?php echo base_url().'assets/images/'.$b['pengguna_photo'];?>" alt="" />
								<span class="profile-info">
									<?php echo $b['pengguna_nama'];?>
									<small><?php if($b['pengguna_level']=="1"){echo "Kasir";}elseif($b['pengguna_level']=="2"){echo "Stand";}?></small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><a href="<?php echo base_url().'administrator/logout'?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					<!--<ul class="header-nav header-nav-toggle">
						<li>
							<a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
								<i class="fa fa-ellipsis-v"></i>
							</a>
						</li>
					</ul>--><!--end .header-nav-toggle -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->