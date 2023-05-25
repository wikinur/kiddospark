<?php $this->load->view('backend/header');?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php $this->load->view('backend/sidebar');?>
<br><br><br>
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
		<ul class="breadcrumb">
		   <li><i class="fa fa-fw fa-home"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
		   <li><i class="fa fa-fw fa-film"></i><a href="<?php echo site_url('c_video');?>">Data Video&nbsp;</a><span class="divider">/&nbsp;</span></li>
		   <li class="active"><i class="fa fa-fw fa-search-plus"></i>Detail Data Video</li>
		</ul><!-- /.breadcrumb -->
		<div class="col-md-3" style="float:left;">
			<div class="card card-primary card-outline">
		  		<div class="card-body box-profile">
		  			<div class="text-center">
				      <img src="<?php echo base_url('/assets/upload/video-user/'.$cover)?>" style="max-height: 140px; width: 200px;" class="img-responsive">
				    </div>
				    <h3 class="profile-username text-center"><?php echo $judul;?></h3>
				    <p class="text-muted text-center"></p>
		  		</div>
		  	</div>
		</div>
		<div class="col-md-9" style="float:right; ">
			<div class="card card-primary card-outline">
		  		<div class="card-body box-profile">
		  			<div class="text-center">
				      <video id="video1" width="350" height="200" controls>
				            <source src="<?php echo base_url('/assets/upload/video-user/'.$video)?>" type="video/mp4">
				        	browser anda tidak mendukung format video ini.</video>
				    </div>
				    <h3 class="profile-username text-center"><?php echo $judul;?></h3>
					<p class="text-muted text-center"></p>
		  		</div>
		  	</div>
		</div>
		<div class="col-md-9" style="float:right;">
			<div class="card card-primary card-outline">
			  <div class="card-body box-profile">
			    <ul class="list-group list-group-unbordered mb-3">
			      <li class="list-group-item">
			        <b>KATEGORI</b> <a class="float-right"><?php foreach ($data_kategori->result_array() as $tampil) { if ($kategori_id==$tampil['id_kategori']) { ?>
						<option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
						<?php } } ?></a>
			      </li>
			      <li class="list-group-item">
			        <b>JENIS VIDEO</b> <a class="float-right"><?php foreach ($data_jevi->result_array() as $tampil) { if ($jevi_id==$tampil['id_jevi']) { ?>
						<option value="<?php echo $tampil['id_jevi'];?>"><?php echo $tampil['jenis_video'];?></option>
						<?php } } ?></a>
			      </li>
			      <li class="list-group-item">
			        <b>JUDUL VIDEO</b> <a class="float-right"><?php echo $judul;?></a>
			      </li>
			      <li class="list-group-item">
			        <b>VIDEO</b> <a class="float-right"><?php echo $video;?></a>
			      </li>
			      <li class="list-group-item">
			          <b>KETERANGAN</b> <a class="float-right"><?php echo $keterangan;?></a>
			      </li>
			      <li class="list-group-item">
			          <b>DILIHAT</b> <a class="float-right"><?php echo $dilihat;?> x dilihat</a>
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