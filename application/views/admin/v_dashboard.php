<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Emji Food Market Manokwari">
		<meta name="author" content="Emji Food Market Manokwari">
		<meta name="description" content="Emji Food Market Manokwari">
		<!-- END META -->
		<link rel="shorcut icon" href="<?php echo base_url().'assets/img/logo.png'?>">
		<!-- BEGIN STYLESHEETS -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/style-material.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/materialadmin.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/material-design-iconic-font.min.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/rickshaw.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/css/morris.core.css'?>" />
		
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
					<div class="section-body">
						<div class="row">
							<?php 
								$l=$pen_last->row_array();
							?>
							<!-- BEGIN ALERT - REVENUE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-info no-margin">
											<strong class="pull-right text-success text-lg"> <i class="fa fa-bar-chart"></i></strong>
											<strong class="text-xl"><?php echo 'Rp '.number_format($l['total_penjualan']);?></strong><br/>
											<span class="opacity-50">Penjualan Bulan Sebelumnya</span>
											<div class="stick-bottom-left-right">
												<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - REVENUE -->
							<?php 
								$c=$pen_now->row_array();
							?>
							<!-- BEGIN ALERT - VISITS -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-warning no-margin">
											<strong class="pull-right text-warning text-lg"> <i class="fa fa-line-chart"></i></strong>
											<strong class="text-xl"><?php echo 'Rp '.number_format($c['total_penjualan']);?></strong><br/>
											<span class="opacity-50">Penjualan Bulan Ini</span>
											<div class="stick-bottom-right">
												<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - VISITS -->
							<?php 
								$p=$tot_porsi->row_array();
							?>
							<!-- BEGIN ALERT - BOUNCE RATES -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-danger no-margin">
											<strong class="pull-right text-danger text-lg"> <i class="fa fa-cubes"></i></strong>
											<strong class="text-xl"><?php echo $p['total_porsi'];?></strong><br/>
											<span class="opacity-50">Total Porsi Terjual Bulan Ini</span>
											<div class="stick-bottom-right">
												<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - BOUNCE RATES -->
							<?php 
								$t=$tot_plg->row_array();
							?>
							<!-- BEGIN ALERT - TIME ON SITE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-success no-margin">
											<h1 class="pull-right text-success"><i class="fa fa-users"></i></h1>
											<strong class="text-xl"><?php echo $t['tot_pelanggan']?></strong><br/>
											<span class="opacity-50">Total Pelanggan</span>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - TIME ON SITE -->

						</div><!--end .row -->
						<div class="row">

						<?php
						    /* Mengambil query report*/
						    error_reporting(0);
						    foreach($statistik as $result){
						        $bulan[] = $result->tanggal; //ambil bulan
						        $value[] = (float) $result->total; //ambil nilai
						    }
						    /* end mengambil query*/
						     
						?>
							<!-- BEGIN SITE ACTIVITY -->
							<div class="col-md-12">
								<div class="card ">
									<div class="row">
										<div class="col-md-12">
											<div class="card-head">
												<header>Statistik Penjualan</header>
											</div><!--end .card-head -->
											<div class="card-body height-8">
												<div class="flot-legend-horizontal stick-top-right no-y-padding">
													<canvas id="canvas" width="1200" height="300"></canvas>
												</div>
											</div><!--end .card-body -->
										</div><!--end .col -->
										
									</div><!--end .row -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END SITE ACTIVITY -->

							

						</div><!--end .row -->
						<div class="row">

							<!-- BEGIN TODOS -->
							<div class="col-md-6">
								<div class="card ">
									<div class="card-head">
										<header>Orders Terbaru</header>
										<div class="tools">
											<a class="btn btn-icon-toggle btn-close"><i class="fa fa-close"></i></a>
										</div>
									</div><!--end .card-head -->
									<div class="card-body no-padding height-9 scroll">
										<ul class="list" data-sortable="true">
											<?php 
												foreach ($odr->result_array() as $o) {
													$oid=$o['inv_no'];
													$otgl=$o['inv_tanggal'];
													$oplg=$o['inv_plg_nama'];
											?>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<span>
															<?php echo $oid;?>
															<small><?php echo $otgl.'<br/>'.$oplg;?></small>
														</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default" href="<?php echo base_url().'admin/order'?>">
													<i class="fa fa-arrow-right"></i>
												</a>
											</li>
											<?php } ?>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->
							<?php
							    /* Mengambil query report*/
							    error_reporting(0);
							    foreach($statistikplg as $result){
							        $bln[] = $result->bulan; //ambil bulan
							        $val[] = (float) $result->total; //ambil nilai
							    }
							    /* end mengambil query*/
						     
							?>
							
							<!-- BEGIN NEW REGISTRATIONS -->
							<div class="col-md-6">
								<div class="card">
									<div class="card-head">
										<header>Pelanggan Terbaru</header>
										<div class="tools hidden-md">
											<a class="btn btn-icon-toggle btn-close"><i class="fa fa-close"></i></a>
										</div>
									</div><!--end .card-head -->
									<div class="card-body no-padding height-9 scroll">
										<ul class="list divider-full-bleed">
										<?php 
											foreach ($plg->result_array() as $p) {
												$idpel=$p['plg_id'];
												$napel=$p['plg_nama'];
												$ptpel=$p['plg_photo'];
											
										?>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?php echo base_url().'assets/images/'.$ptpel;?>" alt="" />
													</div>
													<div class="tile-text"><?php echo $napel;?></div>
												</div>
												<a class="btn btn-flat ink-reaction" href="<?php echo base_url().'admin/pelanggan'?>">
													<i class="fa fa-arrow-right text-default-light"></i>
												</a>
											</li>
										<?php } ?>
											
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END NEW REGISTRATIONS -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

<?php $this->load->view('admin/v_nav');?>
			

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="<?php echo base_url().'assets/js/jquery/jquery-1.11.2.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery/jquery-migrate-1.2.1.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/bootstrap/bootstrap.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/spin/spin.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/autosize/jquery.autosize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/moment/moment.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.time.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.resize.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.orderBars.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/jquery.flot.pie.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/flot/curvedLines.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/jquery-knob/jquery.knob.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/sparkline/jquery.sparkline.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/nanoscroller/jquery.nanoscroller.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/d3/d3.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/d3/d3.v3.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/rickshaw/rickshaw.min.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/App.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavigation.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppOffcanvas.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppCard.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppForm.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppNavSearch.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/source/AppVendor.js'?>"></script>
		<script src="<?php echo base_url().'assets/js/Chart.js'?>"></script>
		<!-- END JAVASCRIPT -->
		<script> 

			var lineChartData = {
				labels : <?php echo json_encode($bulan);?>,
				datasets : [
					
					{
						fillColor : "rgba(151,187,205,0.5)",
						strokeColor : "rgba(151,187,205,1)",
						pointColor : "rgba(151,187,205,1)",
						pointStrokeColor : "#fff",
						data : <?php echo json_encode($value);?>
					}
				]
				
			}

		var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

		var lineChartPelanggan = {
				labels : <?php echo json_encode($bln);?>,
				datasets : [
					
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : <?php echo json_encode($val);?>
					}
				]
				
			}

		var myLineplg = new Chart(document.getElementById("canvasplg").getContext("2d")).Line(lineChartPelanggan);
		
		</script>
	</body>
</html>
