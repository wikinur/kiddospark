<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/bootstrap3-wysihtml5.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/modals.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/home.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light fixed-top border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="btn" style="background:blue;">
        <a href="#PrimaryModalftblack">
          <span class="Warning Warning-color mg-b-10" data-toggle="modal" data-target="#PrimaryModalftblack">
          <p style="color: white; margin-top: 1px;"><i class="fa fa-fw fa-sign-out"></i>Logout</p></span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Logout Modal-->
<div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-close-area modal-close-df">
        <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
      </div>
      <div class="modal-body">
        <i class="fa fa-warning modal-check-pro information-icon-pro"></i>
        <h2>Perhatian!</h2>
        <p>Anda yakin ingin keluar dari halaman website admin Kiddospark!</p>
      </div>
      <div class="modal-footer footer-modal-admin">
        <a data-dismiss="modal" href="#">Tutup</a>
        <a href="<?php echo base_url('welcome_admin/sign_out');?>">Logout</a>
      </div>
    </div>
  </div>
</div>
