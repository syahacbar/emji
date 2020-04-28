	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Stand</h1>
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
						<a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">All Stand</a>
                    <?php foreach($get_all_stand->result_array() as $s) { ?>
                        <a class="nav-link" id="<?php echo 'v-pills-tab-'.$s['stand_id'];?>" data-toggle="pill" href="<?php echo '#v-pills-'.$s['stand_id'];?>" role="tab" aria-controls="<?php echo 'v-pills-'.$s['stand_id'];?>" aria-selected="false"><?php echo $s['stand_nama'];?></a>
					<?php } ?>    
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
                        <?php foreach($get_all_stand->result_array() as $s) { ?>
						<div class="tab-pane fade" id="<?php echo 'v-pills-'.$s['stand_id'];?>" role="tabpanel" aria-labelledby="<?php echo 'v-pills-tab-'.$s['stand_id'];?>">
							<div class="row">
							<?php foreach ($get_menu_stand->get_menu_stand($s['stand_id'])->result_array() as $a) { ?>
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
                        <?php } ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- End Menu -->