<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description">
    <meta name="author" content="">
    <title>Halaman Frontend | Home</title>
    <link href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/frontend/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/frontend/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/frontend/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/frontend/css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/frontend/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/modals.css">
	<!-- <link href="<?php echo base_url();?>assets/frontend/css/stylee.css" rel="stylesheet"> -->
</head><!--/head-->
<body>
	<header id="header"><!--header-->
		<div class="header_top navbar navbar-fixed-top" style="background:blue;"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<?php
						foreach ($kontak->result_array() as $value) {
							$phone = $value['phone'];
							$email = $value['email'];
						}
						?>
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="color:white;"><i class="fa fa-phone"></i> <?php echo $phone ?></a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-envelope"></i> <?php echo $email ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header_top 	 navbar navbar-fixed-top" style="margin-top:50px; background:blue;"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<div class="span4">
					          <a href="<?php echo site_url('welcome_user');?>" style="color:white; font-size: 40px;"><b>KiddosPark</b></a>
					        </div>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="navbar-header header-middle">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url('welcome_user');?>"><i class="fa fa-home"></i>   Home</a></li>
								<li><a href="<?php echo base_url('welcome_user/artikel');?>"><i class="fa fa-file-text-o"></i>   Artikel</a></li>
								<li class="dropdown"><a href="#"><i class="fa fa-film"></i>  Video<i class="fa fa-angle-down"></i></a>
								    <ul role="menu" class="sub-menu">
								        <?php
								            foreach ($kategori->result_array() as $value) { ?>
				                            <li><a href="<?php echo base_url();?>welcome_user/video/<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori'];?></a></li>
								        <?php } ?>
								    </ul>
								</li>
								<li><a href="#" data-toggle="modal" data-target="#PrimaryModalftblack"><i class="fa fa-sign-out"></i>   Signout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<!-- Modal Login -->
	<div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-close-area modal-close-df">
	        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
	      </div>
	      <div class="modal-body">
	        <i class="fa fa-warning modal-check-pro information-icon-pro"></i>
	        <h2>Perhatian!</h2>
	        <p>Anda Yakin Ingin Keluar dari Halaman Website Kiddospark ?</p>
	      </div>
	      <div class="modal-footer footer-modal-admin">
	        <a data-dismiss="modal" href="#">Tutup</a>
	        <a href="<?php echo base_url('welcome_user/sign_out');?>">Logout</a>
	      </div>
	    </div>
	  </div>
</div>
