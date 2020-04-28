	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Detail Menu</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
        <?php 
            $b=$data->row_array(); 
        ?>
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1><span><?php echo $b['menu_nama']?></span></h1>
						<p><?php echo $b['menu_deskripsi']?>.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="<?php echo base_url().'menu/add_to_cart/'.$b['menu_id'];?>"><?php echo $b['harga_baru']?> K | <i class="fa fa-shopping-cart"></i> Order</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<img src="<?php echo base_url().'assets/gambar/'.$b['menu_gambar']?>" alt="" class="img-fluid">
                </div>
            </div>
		</div>
	</div>
	<!-- End About -->