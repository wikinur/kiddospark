<br><br><br>
<ul class="breadcrumb">
    <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li><i class="fa fa-fw fa-users fa-2x"></i><a href="<?php echo site_url('welcome_admin/data_user');?>">Data User</a><span class="divider">/&nbsp;</span></li>
    <li class="active"><i class="fa fa-fw fa-user fa-2x"></i>User Profile</li>
</ul><!-- /.breadcrumb -->

<!-- Profile Image -->
<div class="col-md-3" style="float:left;">
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <div class="text-center">
      <img src="<?php echo base_url('/assets/upload/foto-user/'.$foto)?>" style="height: 150px; width: 250px;" class="img-responsive">
    </div>
    <h3 class="profile-username text-center"><?php echo $username;?></h3>
    <p class="text-muted text-center"><?php echo $password;?></p>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<div class="col-md-9" style="float:right;">
<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>NAMA USER</b> <a class="float-right"><?php echo $nama_user;?></a>
      </li>
      <li class="list-group-item">
        <b>LEVEL</b> <a class="float-right"><?php echo $level;?></a>
      </li>
      <li class="list-group-item">
        <b>EMAIL</b> <a class="float-right"><?php echo $email;?></a>
      </li>
      <li class="list-group-item">
        <b>LOGIN TERAKHIR</b> <a class="float-right"><?php echo $last_login;?></a>
      </li>
      <li class="list-group-item">
        <b>JENIS KELAMIN</b> <a class="float-right"><?php echo $jenkel;?></a>
      </li>
      <li class="list-group-item">
        <b>TANGGAL LAHIR</b> <a class="float-right"><?php echo $tgl_lahir;?></a>
      </li>
    </ul>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
