<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Stand</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Emji Food Market Manokwari">
		<meta name="author" content="Emji Food Market Manokwari">
		<meta name="description" content="Emji Food Market Manokwari">
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

		
	</head>
	<body class="menubar-hoverable header-fixed">

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
							<h2><span class="fa fa-user"></span> Data Stand</h2>
					</div>
						<?php echo $this->session->flashdata('msg');?>
				</section>

				<!-- BEGIN TABLE HOVER -->
				<section class="style-default-bright" style="margin-top:0px;">
					<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Stand</a></p>
					
					<div class="section-body">	
						<div class="row">
							
							<table class="table table-hover" id="datatable1">
							<thead>
								<tr>
									<th>Photo</th>
									<th>Nama Stand</th>
									<th>Username</th>
									<th>Kontak</th>
									<th>Status</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach ($data->result_array() as $a) {
									$id=$a['pengguna_id'];
									$nama=$a['pengguna_nama'];
									$username=$a['pengguna_username'];
									$password=$a['pengguna_password'];
									$nohp=$a['pengguna_nohp'];
									$status=$a['pengguna_status'];
									$level=$a['pengguna_level'];
									$photo=$a['pengguna_photo'];
								
							?>
								<tr>
									<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?php echo base_url().'assets/images/'.$photo;?>" alt="" /></td>
									<td><?php echo $nama;?></td>
									<td><?php echo $username;?></td>
									<th><?php echo $nohp?></th>
									<th><?php echo $status?></th>
									<td class="text-right">
										<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?php echo $id;?>"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url().'admin/pengguna/reset_password/'.$id;?>" class="btn btn-icon-toggle" title="Reset Password"><i class="fa fa-key"></i></a>
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
			        <h3 class="modal-title" id="myModalLabel">Tambah Stand</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama Stand</label>
					 					<div class="col-sm-8">
											<input type="text" name="nama" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-8">
											<input type="password" name="password2" class="form-control" id="password13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-8">
											<input type="text" name="kontak" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Photo</label>
										<div class="col-sm-8">
											<input type="file" name="filefoto" class="form-control" id="regular13">
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
					$id=$a['pengguna_id'];
					$nama=$a['pengguna_nama'];
					$username=$a['pengguna_username'];
					$password=$a['pengguna_password'];
					$nohp=$a['pengguna_nohp'];
					$status=$a['pengguna_status'];
					$level=$a['pengguna_level'];
					$photo=$a['pengguna_photo'];
								
			?>
			<div class="modal fade" id="modal_edit_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Edit Stand</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" enctype="multipart/form-data">
			        <div class="modal-body">
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Nama Stand</label>
										<div class="col-sm-8">
											<input type="hidden" name="kode" value="<?php echo $id;?>">
											<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-8">
											<input type="text" name="username" value="<?php echo $username;?>" class="form-control" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-8">
											<input type="password" name="password" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
										<div class="col-sm-8">
											<input type="password" name="password2" class="form-control" id="password13">
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
										<div class="col-sm-8">
											<input type="text" name="kontak" class="form-control" value="<?php echo $nohp;?>" id="regular13" required>
										</div>
									</div>
									<div class="form-group">
										<label for="regular13" class="col-sm-3 control-label">Photo</label>
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
					$id=$a['pengguna_id'];
					$nama=$a['pengguna_nama'];
					$username=$a['pengguna_username'];
					$password=$a['pengguna_password'];
					$nohp=$a['pengguna_nohp'];
					$status=$a['pengguna_status'];
					$level=$a['pengguna_level'];
					$photo=$a['pengguna_photo'];
								
			?>
			<div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			    </div>
			    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
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
		<script src="<?php echo base_url().'assets/js/jquery-3.1.1.js'?>"></script>
		
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
			<script type="text/javascript">
				$(document).ready(function(){
					$('.form-chat').submit(function(){
						alert('Ini adalah klik events tombol kirim pesan');
					});
				});
			</script>

	</body>
</html>
