<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="<?php echo base_url();?>assets/live-dinner/images/emji.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12" style="text-align:center !important">
							<h1 class="m-b-20">Welcome To <strong>EmJi Food Market</strong></h1>
							<?php if($this->session->userdata('nomor_meja')) { 
								$welcome = "Customer Meja No-".$this->session->userdata('nomor_meja');
							} else {
								$welcome = "Silahkan Scan QR-Code Yang Ada Dimeja Untuk Memulai Pemesanan Menu";
							}
							?>
							<p class="m-b-40"><?php echo $welcome; ?></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="<?php echo base_url();?>assets/live-dinner/images/emji2.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12" style="text-align:center !important">
							<h1 class="m-b-20">Welcome To <strong>EmJi Food Market</strong></h1>
							<p class="m-b-40"><?php echo $welcome; ?></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="<?php echo base_url();?>assets/live-dinner/images/emji3.jpeg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12" style="text-align:center !important">
							<h1 class="m-b-20">Welcome To <strong>EmJi Food Market</strong></h1>
							<p class="m-b-40"><?php echo $welcome; ?></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
				<?php
								foreach ($data->result_array() as $a) {
									$id=$a['galeri_id'];
									$judul=$a['galeri_judul'];
									$deskripsi=$a['galeri_deskripsi'];
									$gambar=$a['galeri_gambar'];
								
							?>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="<?php echo base_url().'assets/galeries/'.$gambar;?>">
							<img class="img-fluid" src="<?php echo base_url().'assets/galeries/'.$gambar;?>" alt="Gallery Images">
						</a>
					</div>
                                <?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	