<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Menu</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<link rel="shorcut icon" href="<?php echo base_url().'assets/img/logo.png'?>">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href="<?php echo base_url().'assets/style-material.css'?>" rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/materialadmin.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/material-design-iconic-font.min.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/jquery.dataTables.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.colVis.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/DataTables/extensions/dataTables.tableTools.css'?>" />
		<!-- END STYLESHEETS -->

		
		<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }      
        ?>
	</head>
	<body class="menubar-hoverable header-fixed ">

		<?php 
			$this->load->view('admin/v_header');
		?>

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
							<h2><span class="fa fa-cutlery"></span> Data Menu</h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Menu</a></p>
					
					<div class="section-body">	
						<div class="row">
							
							<table class="table table-hover" id="datatable1">
							<thead>
								<tr>
									<th>Gambar</th>
									<th>Nama Menu</th>
									<th>Deskripsi</th>
									<th style="text-align:center;">Harga</th>
									<th>Suka</th>
									<th>Kategori</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0;
								foreach ($data->result_array() as $a) {
									$no++;
									$id=$a['menu_id'];
									$nama=$a['menu_nama'];	
									$deskripsi=$a['menu_deskripsi'];
									$harga_lama=$a['menu_harga_lama'];
									$harga_baru=$a['menu_harga_baru'];
									$like=$a['menu_likes'];
									$kat_id=$a['menu_kategori_id'];
									$kat_nama=$a['menu_kategori_nama'];
									$status=$a['menu_status'];
									$gambar=$a['menu_gambar'];
								
							?>
								<tr>
									<td><img style="width:80px;height:80px;" class="img-thumbnail width-1" src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="" /></td>
									<td><?php echo $nama;?></td>
									<td><?php echo limit_words($deskripsi,10).'...';?></td>
									<?php if(empty($harga_lama)):?>
										<td style="text-align:right;"><?php echo 'Rp '.number_format($harga_baru);?></td>
									<?php else:?>
										<td style="vertical-align:middle;text-align:right;"><b><?php echo 'Rp '.number_format($harga_baru);?></b><p style="font-size:9px;"><del><?php echo 'Rp '.number_format($harga_lama);?></del></p></td>
									<?php endif;?>
									<td style="text-align:center;"><?php echo $like;?></td>
									<td><?php echo $kat_nama;?></td>
									<td class="text-right">
										<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
										<a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>

							<?php } ?>
								
							</tbody>
						  </table>

						</div>
					</div><!--end .section-body -->

					
				</section>
				<!-- END TABLE HOVER -->

				

			</div><!--end #content-->
			<!-- END CONTENT -->
			<?php $this->load->view('admin/v_nav');?>

		</div><!--end #base-->
		<!-- END BASE -->

			<!-- ============ MODAL ADD PELANGGAN =============== -->
			<div class="modal fade" id="modal_add_pengguna" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Tambah Menu</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/menu/simpan_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-8">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga</label>
										<div class="col-sm-8">
											<input type="text" name="harga" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-8">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
													
												?>
												<option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
												<?php } ?>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-8">
											<input type="file" name="filefoto" class="form-control" id="regular13" required>
										</div>
									</div>
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>

			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['menu_id'];
					$nama=$a['menu_nama'];	
					$deskripsi=$a['menu_deskripsi'];
					$harga_lama=$a['menu_harga_lama'];
					$harga_baru=$a['menu_harga_baru'];
					$like=$a['menu_likes'];
					$kat_id=$a['menu_kategori_id'];
					$kat_nama=$a['menu_kategori_nama'];
					$status=$a['menu_status'];
					$gambar=$a['menu_gambar'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Edit Menu</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/menu/update_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>

									<div class="form-group">
										<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-8">
											<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required><?php echo $deskripsi;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Lama(Rp)</label>
										<div class="col-sm-8">
											<input type="text" name="harga_lama" value="<?php echo $harga_baru;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Harga Baru(Rp)</label>
										<div class="col-sm-8">
											<input type="text" name="harga_baru" class="form-control" id="regular13">
										</div>
									</div>
									<div class="form-group">
										<label for="select13" class="col-sm-3 control-label">Kategori</label>
										<div class="col-sm-8">
											<select id="select13" name="kategori" class="form-control" required>
												<option value="">&nbsp;</option>
												<?php 
													foreach ($kat->result_array() as $k) {
														$k_id=$k['kategori_id'];
														$k_nama=$k['kategori_nama'];
														if($kat_id==$k_id)
															echo "<option value='$k_id' selected>$k_nama</option>";
														else
															echo "<option value='$k_id'>$k_nama</option>";
													}
												?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Gambar</label>
										<div class="col-sm-8">
											<input type="file" name="filefoto" class="form-control" id="regular13">
										</div>
									</div>
									
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['menu_id'];
					$nama=$a['menu_nama'];	
					$deskripsi=$a['menu_deskripsi'];
					$harga_lama=$a['menu_harga_lama'];
					$harga_baru=$a['menu_harga_baru'];
					$like=$a['menu_likes'];
					$kat_id=$a['menu_kategori_id'];
					$kat_nama=$a['menu_kategori_nama'];
					$status=$a['menu_status'];
					$gambar=$a['menu_gambar'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/menu/hapus_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="kategori" value="<?php echo $nama;?>">
											<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama;?></b> ?</p>
										</div>
									</div>
	
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			            <button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url().'assets/js/jquery/jquery-1.11.2.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery/jquery-migrate-1.2.1.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/jquery.dataTables.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/core/DemoTableDynamic.js'?>"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
