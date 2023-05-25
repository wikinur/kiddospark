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
</head><!--/head-->
<body>
  <header id="header"><!--header-->
    <div class="header_top navbar navbar-fixed-top" style="background:blue;"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            
            <div class="contactinfo">
              <ul class="nav nav-pills">
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    <div class="header_top   navbar navbar-fixed-top" style="margin-top:50px; background:blue;"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="logo pull-left">
              <div class="span4">
                    <a href="<?php echo site_url('main_page');?>" style="color:white; font-size: 40px;"><b>KiddosPark</b></a>
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
               <li><a href="<?php echo base_url('main_page');?>"><i class="fa fa-home"></i>   Home</a></li>
               <li><a href="<?php echo base_url('main_page/tentang_kami');?>"><i class="fa fa-users"></i>   Tentang Kami</a></li>
               <li><a href="<?php echo base_url('c_login');?>"><i class="fa fa-sign-in"></i>   Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->
  <div class="container" style="margin-top: 135px;">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
            <h2 style="color: blue;">Kategori <br>Jenis Video</h2>
            <div class="panel-group category-products">           
              <?php
                  foreach ($data_jevi->result_array() as $value) {?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-arrow-right" style="color: blue;"></i>   <a href="#" data-toggle="modal" data-target="#PrimaryModalftblack"><?php echo $value['jenis_video'];?></a></h4>
                    </div>
                  </div>    
              <?php } ?>  
            </div>
            <h2 style="color: blue;">Artikel Edukasi <br>Terbaru</h2>
            <div class="thumbnail">
            <?php
              foreach ($artikel->result_array() as $value) {?>
              <a href="" data-toggle="modal" data-target="#PrimaryModalftblack2">
                <img src="<?php echo base_url();?>assets/upload/foto-artikel/<?php echo $value['gambar'];?>" style="height: 100px; width:200px;">
              </a> 
              <h4><a href="" data-toggle="modal" data-target="#PrimaryModalftblack2" style="color: blue;"><?php echo $value['judul'];?></a> </h4>
              <p><?php echo substr($value['isi'], 0,50)."....."?>   </p>
              <p><?php echo $value['tanggal']?>         <i class="fa fa-eye"></i> <?php echo $value['dibaca'];?> Kali</p>  
              <hr>
              <?php } ?>
            </div>
        </div>
      </div>
      <div class="col-sm-9 padding-right">
        <div class="features_items">
          <div class="features_items">
            <h2 class="title text-center" style="color: blue;">Tentang Kami</h2>
            <?php
            foreach ($data_teka->result_array() as $value) { ?>
            <div class="col-sm-12">
                <h1 style="color: blue;"><?php echo $value['judul'];?></h1>
                <div class="thumbnail" style="margin-top: 40px; font-size: 19px;">
                  <p style="margin-top: 50px;"><?php echo $value['deskripsi'];?></p>
                </div>
                <?php
                  foreach ($kontak->result_array() as $value) {
                    $phone = $value['phone'];
                    $email = $value['email'];
                    $alamat = $value['alamat'];
                }
                ?>
                <div class="thumbnail col-sm-5" style="margin-top: 40px; margin-left: 10px; font-size: 19px;">
                  <i class="fa fa-phone"></i> <?php echo $value['phone'];?><br>
                  <i class="fa fa-envelope"></i> <?php echo $value['email'];?><br>
                </div>
                <div class="thumbnail col-sm-6" style="margin-top: 40px; margin-left:50px;  font-size: 19px;">
                  <i class="fa fa-map-marker"></i> <?php echo $value['alamat'];?><br><br>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br>
  <footer id="footer"><!--Footer-->
    <div class="footer-bottom" style="background: black;">
      <div class="container">
        <div class="row">
          <p align="center" style="color: #fff;">Copyright © 2018-2019 Kiddospark. All rights reserved.</p>  
        </div>
      </div>
    </div>  
  </footer><!--/Footer-->
  <script src="<?php echo base_url();?>assets/frontend/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/jquery.scrollUp.min.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/price-range.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/jquery.prettyPhoto.js"></script>
  <script src="<?php echo base_url();?>assets/frontend/js/main.js"></script>
</body>
</html>

<!-- Modal Video -->
<div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
      </div>
      <div class="modal-body">
        <i class="fa fa-warning modal-check-pro information-icon-pro"></i>
        <h2>Perhatian!</h2>
        <p>Untuk Melihat Video Silahkan Untuk Login Terlebih Dahulu</p>
      </div>
      <div class="modal-footer footer-modal-admin">
        <a data-dismiss="modal" href="#">Tutup</a>
        <a href="<?php echo base_url('c_login');?>">Login</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Artikel -->
<div id="PrimaryModalftblack2" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
      </div>
      <div class="modal-body">
        <i class="fa fa-warning modal-check-pro information-icon-pro"></i>
        <h2>Perhatian!</h2>
        <p>Untuk Membaca Artikel Silahkan Untuk Login Terlebih Dahulu</p>
      </div>
      <div class="modal-footer footer-modal-admin">
        <a data-dismiss="modal" href="#">Tutup</a>
        <a href="<?php echo base_url('c_login');?>">Login</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cari -->
<div id="PrimaryModalftblack3" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
      </div>
      <div class="modal-body">
        <i class="fa fa-warning modal-check-pro information-icon-pro"></i>
        <h2>Perhatian!</h2>
        <p>Untuk Melakukan Pencarian Silahkan Untuk Login Terlebih Dahulu</p>
      </div>
      <div class="modal-footer footer-modal-admin">
        <a data-dismiss="modal" href="#">Tutup</a>
        <a href="<?php echo base_url('c_login');?>">Login</a>
      </div>
    </div>
  </div>
</div>

