
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
                    
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
	