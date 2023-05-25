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
            <li><i class="fa fa-fw fa-file-text-o fa-2x"></i><a href="<?php echo site_url('c_komentar');?>">Data Komentar&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-search-plus fa-2x"></i>Detail Data</li>
        </ul>
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>NAMA</b> <a class="float-right"><?php echo $nama;?></a>
                </li>
                <li class="list-group-item">
                  <b>EMAIL</b> <a class="float-right"><?php echo $email;?></a>
                </li>
                <li class="list-group-item">
                  <b>KOMENTAR</b> <a class="float-right"><?php echo $komentar;?></a>
                </li>
                <li class="list-group-item">
                  <b>TANGGAL UPLOAD</b> <a class="float-right"><?php echo $tanggal; ?></a>
                </li>
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