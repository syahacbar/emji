	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Special Menu</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">All Menu</a>
						<a class="nav-link" id="v-pills-promo-tab" data-toggle="pill" href="#v-pills-promo" role="tab" aria-controls="v-pills-promo" aria-selected="false">Hot Promo</a>
						<a class="nav-link" id="v-pills-favorite-tab" data-toggle="pill" href="#v-pills-favorite" role="tab" aria-controls="v-pills-favorite" aria-selected="false">Favorite</</a>
						<a class="nav-link" id="v-pills-makanan-tab" data-toggle="pill" href="#v-pills-makanan" role="tab" aria-controls="v-pills-makanan" aria-selected="false">Makanan</a>
						<a class="nav-link" id="v-pills-minuman-tab" data-toggle="pill" href="#v-pills-minuman" role="tab" aria-controls="v-pills-minuman" aria-selected="false">Minuman</a>
						<a class="nav-link" id="v-pills-snack-tab" data-toggle="pill" href="#v-pills-snack" role="tab" aria-controls="v-pills-snack" aria-selected="false">Snack</a>
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
							<div class="row">
							<?php foreach ($get_all_menu->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
							
						</div>
						<div class="tab-pane fade" id="v-pills-promo" role="tabpanel" aria-labelledby="v-pills-promo-tab">
							<div class="row">
							<?php foreach ($promo->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
							
						</div>
						<div class="tab-pane fade" id="v-pills-favorite" role="tabpanel" aria-labelledby="v-pills-favorite-tab">
							<div class="row">
							<?php foreach ($favorite->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-makanan" role="tabpanel" aria-labelledby="v-pills-makanan-tab">
							<div class="row">
							<?php foreach ($makanan->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
						</div>						
						<div class="tab-pane fade" id="v-pills-minuman" role="tabpanel" aria-labelledby="v-pills-minuman-tab">
							<div class="row">
							<?php foreach ($minuman->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
						</div>				
						<div class="tab-pane fade" id="v-pills-snack" role="tabpanel" aria-labelledby="v-pills-snack-tab">
							<div class="row">
							<?php foreach ($snack->result_array() as $a) { ?>
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="<?php echo base_url('assets/gambar').'/'.$a['menu_gambar'];?>" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4><?php echo $a['menu_nama'];?></h4>
											<?php echo word_limiter($a['menu_deskripsi'],7);?>.
											<a class="btn btn-xs btn-outline-new-white" href="<?php echo base_url().'menu/detail_menu/'.$a['menu_id'];?>"> <?php echo $a['harga_baru'];?> K | <i class="fa fa-shopping-cart"></i> Order</a>
										</div>										
									</div>
								</div>
							<?php } ?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->