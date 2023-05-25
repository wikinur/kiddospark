<?php $this->load->view('backend/header');?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php $this->load->view('backend/sidebar');?>
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <br><br><br>
        <ul class="breadcrumb">
            <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li><i class="fa fa-fw fa-file-text-o fa-2x"></i><a href="<?php echo site_url('c_artikel');?>">Data Artikel&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-search-plus fa-2x"></i>Detail Data</li>
        </ul>
        <div class="col-md-3" style="float:left;">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img src="<?php echo base_url('/assets/upload/foto-artikel/'.$gambar)?>" style="max-height: 140px;" class="img-responsive">
              </div>
              <h3 class="profile-username text-center"><?php echo $judul;?></h3>
              <p class="text-muted text-center">Software Engineer</p>
            </div>
          </div>
        </div>
        <div class="col-md-9" style="float:right;">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>JUDUL</b> <a class="float-right"><?php echo $judul;?></a>
                </li>
                <li class="list-group-item">
                  <b>Isi</b> <a class="float-right"><?php echo $isi;?></a>
                </li>
                <li class="list-group-item">
                  <b>TANGGAL UPLOAD</b> <a class="float-right"><?php echo $tanggal; ?></a>
                </li>
                <li class="list-group-item">
                  <b>PENULIS</b> <a class="float-right"><?php echo $penulis;?></a>
                </li>
                <li class="list-group-item">
                  <b>DIBACA</b> <a class="float-right"><?php echo $dibaca;?> x dibaca</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/footer');?>