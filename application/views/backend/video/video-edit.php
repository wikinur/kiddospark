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
            <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li><i class="fa fa-fw fa-film fa-2x"></i><a href="<?php echo site_url('c_video');?>">Data Video&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-pencil fa-2x"></i>Edit Data Video</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <h3>Edit Data Kategori</h3>
              <form action="<?php echo site_url('c_video/update_data_video')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?php echo $record['id_video']?>" name="id_video">
                <div class="modal-body">
                	<div class="form-group">
		          		<label>Kode Video</label>
		          		<input type="text" class="form-control" name="kode_video" id="kode_video"  value="<?php echo $record['kode_video'];?>" readonly="true">
		        	</div>
	                <div class="form-group">
	                <label>Kategori</label>
		                <select class="form-control select2" name="kategori_id">
		                  <?php
								foreach ($data_kategori->result_array() as $tampil) { 
									if ($kategori_id==$tampil['id_kategori']) { ?>
										<option value="<?php echo $tampil['id_kategori'];?>" selected="selected"><?php echo $tampil['nama_kategori'];?></option>
										<?php } else { ?>
										<option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
										<?php } }
							?>
		                </select>
	        	    </div>
	        	    <div class="form-group">
	                <label>Jenis Video</label>
		                <select class="form-control select2" name="jevi_id">
		                  <?php
								foreach ($data_jevi->result_array() as $tampil) { 
									if ($jevi_id==$tampil['id_jevi']) { ?>
										<option value="<?php echo $tampil['id_jevi'];?>" selected="selected"><?php echo $tampil['jenis_video'];?></option>
										<?php } else { ?>
										<option value="<?php echo $tampil['id_jevi'];?>"><?php echo $tampil['jenis_video'];?></option>
										<?php } }
							?>
		                </select>
	        	    </div>
	                <div class="form-group">
	                  <label>Judul</label>
	                  <input type="text" class="form-control" name="judul" required value="<?php echo $record['judul']?>">
	                </div>
	                <div class="form-group">
	                  <label>Video</label><br>
	                  <input type="hidden" name="video" value="<?php echo $record['video']?>">
	                  <?php if ($video == null){echo '<p>Tidak ada Video</p>';}else{?>
	                  <video width="100" height="100" controls>
	                    <source src="<?php echo base_url();?>/assets/upload/video-user/<?php echo $video;?>" type="video/mp4">
	                  </video>
	                  <?php }?>
	                  <input type="file" class="form-control" name="video">
	                  <p>*Nama file video tidak boleh ada spasi</p>
	                </div>
	                <div class="form-group">
	                  <label>Cover</label><br>
	                  <input type="hidden" name="cover" value="<?php echo $record['cover']?>">
	                  <?php if ($cover == null){echo '<p>Tidak ada Cover</p>';}else{?>
	                    <img src="<?php echo base_url();?>/assets/upload/video-user/<?php echo $cover;?>" class="img-responsive" width="110">
	                  <?php }?>
	                  <input type="file" class="form-control" id="" name="cover" placeholder="">
	                </div>
	                <div class="form-group">
	                  <label>Keterangan</label>
	                  <textarea id="editor1" name="keterangan" style="width: 100%"><?php echo $record['keterangan']?></textarea>
	                </div>
	                <div class="modal-footer">
	                    <button type="reset" class="btn btn-danger ">Reset</button>
	                    <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
	                    </button>
	                    <input type="submit" class="btn btn-primary" value="Update" name="update">
	                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('backend/footer');?>