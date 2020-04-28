<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pelanggan</title>

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
							<h2><span class="fa fa-users"></span> Data Pelanggan</h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					
					
					<div class="section-body">	
						<div class="row">
							
							<table class="table table-hover" id="datatable1">
							<thead>
								<tr>
									<th>Photo</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>Kontak</th>
									<th>Email</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no=0;
								foreach ($data->result_array() as $a) {
									$no++;
									$id=$a['plg_id'];
									$nama=$a['plg_nama'];	
									$alamat=$a['plg_alamat'];
									$jenkel=$a['plg_jenkel'];
									$notelp=$a['plg_notelp'];
									$email=$a['plg_email'];
									$facebook=$a['plg_facebook'];
									$instagram=$a['plg_instagram'];
									$line=$a['plg_line'];
									$whatapp=$a['plg_whatapp'];
									$path=$a['plg_path'];
									$photo=$a['plg_photo'];
									$register=$a['plg_register'];
								
							?>
								<tr>
									<?php if(empty($photo)):?>
										<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt="" /></td>
									<?php else:?>
										<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?php echo base_url().'assets/images/'.$photo;?>" alt="" /></td>
									<?php endif;?>
									<td><?php echo $nama;?></td>
									<?php if($jenkel=='L'):?>
										<td>Laki-Laki</td>
									<?php else:?>
										<td>Perempuan</td>
									<?php endif;?>
									<td><?php echo $alamat;?></td>
									<td><?php echo $notelp;?></td>
									<td><?php echo $email;?></td>
									<td class="text-right">
										<a href="#" class="btn btn-icon-toggle" title="Lihat Detail" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-eye"></i></a>
										
										<a href="#" class="btn btn-icon-toggle" title="Hapus Pelanggan" data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fa fa-trash-o"></i></a>
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

			

			<!-- ============ MODAL EDIT PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['plg_id'];
					$nama=$a['plg_nama'];	
					$alamat=$a['plg_alamat'];
					$jenkel=$a['plg_jenkel'];
					$notelp=$a['plg_notelp'];
					$email=$a['plg_email'];
					$facebook=$a['plg_facebook'];
					$instagram=$a['plg_instagram'];
					$line=$a['plg_line'];
					$whatapp=$a['plg_whatapp'];
					$path=$a['plg_path'];
					$photo=$a['plg_photo'];
					$register=$a['plg_register'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Detail Pelanggan</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/menu/update_menu'?>" enctype="multipart/form-data">
			        <div class="modal-body">
							<table>
								<tr>
									<td style="width:90px;">Nama</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $nama;?></td>
									<td style="width:90px;">Jenis Kelamin</td>
									<td>:</td>
									<?php if($jenkel=='L'):?>
										<td>Laki-Laki</td>
									<?php else:?>
										<td>Perempuan</td>
									<?php endif;?>
								</tr>
								<tr>
									<td style="width:90px;">Alamat</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $alamat;?></td>
									<td style="width:90px;">Kontak</td>
									<td>:</td>
									<td><?php echo $notelp;?></td>
								</tr>
								<tr>
									<td style="width:90px;">Facebook</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $facebook;?></td>
									<td style="width:90px;">Email</td>
									<td>:</td>
									<td><?php echo $email;?></td>
								</tr>
								<tr>
									<td style="width:90px;">Instagram</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $instagram;?></td>
									<td style="width:90px;">Line</td>
									<td>:</td>
									<td><?php echo $line;?></td>
								</tr>
								<tr>
									<td style="width:90px;">WhatApp</td>
									<td>:</td>
									<td style="width:160px;"><?php echo $whatapp;?></td>
									<td style="width:90px;">Path</td>
									<td>:</td>
									<td><?php echo $path;?></td>
								</tr>
							</table>			
									
			        </div>
			        <div class="modal-footer">
			            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
			        </div>
			    </form>
			    </div>
			    </div>
			</div>
			<?php } ?>

			<!-- ============ MODAL HAPUS PENGGUNA =============== -->
			<?php 
				foreach ($data->result_array() as $a) {
					$id=$a['plg_id'];
					$nama=$a['plg_nama'];	
					$alamat=$a['plg_alamat'];
					$jenkel=$a['plg_jenkel'];
					$notelp=$a['plg_notelp'];
					$email=$a['plg_email'];
					$facebook=$a['plg_facebook'];
					$instagram=$a['plg_instagram'];
					$line=$a['plg_line'];
					$whatapp=$a['plg_whatapp'];
					$path=$a['plg_path'];
					$photo=$a['plg_photo'];
					$register=$a['plg_register'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Pelanggan</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pelanggan/hapus_pelanggan'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-2 control-label"></label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="hidden" name="nama" value="<?php echo $nama;?>">
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
