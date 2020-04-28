<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Emji Food Market</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/live-dinner/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/live-dinner/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/live-dinner/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/live-dinner/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/live-dinner/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/live-dinner/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url();?>">
					<img width="147" height="72" src="<?php echo base_url();?>assets/live-dinner/images/emji.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?php echo $this->uri->segment(1)=='home'||$this->uri->segment(1)==''?'active':'';?>"><a class="nav-link" href="<?php echo base_url();?>">Home</a></li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='menu'?'active':'';?>"><a class="nav-link" href="<?php echo base_url('menu');?>">Menu</a></li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='stand'?'active':'';?>"><a class="nav-link" href="<?php echo base_url('stand');?>">Stand</a></li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='about'?'active':'';?>"><a class="nav-link" href="<?php echo base_url('about');?>">About</a></li>
						
						<li class="nav-item <?php echo $this->uri->segment(1)=='gallery'?'active':'';?>"><a class="nav-link" href="<?php echo base_url('gallery');?>">Gallery</a></li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='contact'?'active':'';?>"><a class="nav-link" href="<?php echo base_url('contact');?>">Contact</a></li>

						<li class="nav-item dropdown <?php echo $this->uri->segment(1)=='cart'||$this->uri->segment(1)=='customer'?'active':'';?>">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Meja-".$this->session->userdata('nomor_meja');?></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo base_url('menu/cart');?>"><i class="fa fa-shopping-cart"></i> Cart</a>
								<a class="dropdown-item" href="<?php echo base_url('customer/logout');?>"><i class="fa fa-sign-out"></i> Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->