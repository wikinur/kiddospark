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
            <li><i class="fa fa-fw fa-home"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li><i class="fa fa-fw fa-film"></i><a href="<?php echo site_url('c_video');?>">Data Video&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-plus"></i>Tambah Data Video</li>
        </ul><!-- /.breadcrumb -->
        <div class="col-md-12" style="float:right;">
          <div class="card card-primary">
          	<div class="card-header">
              <h3 class="card-title">Tambah Data Video</h3>
            </div>
            <form action="<?php echo site_url('c_video/simpan_data_video')?>" enctype="multipart/form-data" method="post">
            	<div class="modal-body">
            		  <div class="form-group">
                  		<label>Kode Video</label>
                  		<input type="text" class="form-control" name="kode_video" id="kode_video"  value="<?php echo $kode_video;?>" readonly="true">
                	</div>
                	<div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control select2" name="kategori_id">
                          <option value="">Pilih Kategori</option>
                          <?php
                          foreach ($data_kategori->result_array() as $tampil) { ?>
                            <option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
                          <?php } ?>
                        </select>
                	</div>
                  <div class="form-group">
                        <label>Jenis Video</label>
                        <select class="form-control select2" name="jevi_id">
                          <option value="">Pilih Jenis Video</option>
                          <?php
                          foreach ($data_jevi->result_array() as $tampil) { ?>
                            <option value="<?php echo $tampil['id_jevi'];?>"><?php echo $tampil['jenis_video'];?></option>
                          <?php } ?>
                        </select>
                  </div>
                	<div class="form-group">
        	          <label>Judul Video</label>
        	          <input type="text" class="form-control" name="judul" autocomplete="off" required>
                  </div>
                  <div class="form-group">
        	            <label>Video</label>
        	            <input type="file" class="form-control" name="file_upload">
                	</div>
                	<div class="form-group">
        	            <label>Cover</label>
        	            <input type="file" class="form-control" name="cover">
        	        </div>
        	        <div class="form-group">
                  		<label>Keterangan</label>
                    	<textarea id="editor1" name="keterangan" style="width: 100%"></textarea>
                  	</div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                    </button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/footer');?>