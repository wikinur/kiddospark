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
            <li><i class="fa fa-fw fa-film fa-2x"></i><a href="<?php echo site_url('c_slider');?>">Data Slider&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-pencil fa-2x"></i>Edit Data Slider</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">             
              <h3>Edit Data Slider</h3>
              <form action="<?php echo site_url('c_slider/update_data')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?php echo $slider['id_slider']?>" name="id_slider">
                <div class="modal-body">
                	<div class="form-group">
	                  <label>Judul</label>
	                  <input type="text" class="form-control" name="tittle" autocomplete="off" required value="<?php echo $slider['tittle']?>">
	                </div>
	                <div class="form-group">
	                  <label>Deskripsi</label>
	                  <textarea id="editor1" name="description" style="width: 100%"><?php echo $slider['description']?></textarea>
	                </div>
	                <div class="form-group">
	                <label>Status</label>
		                <select class="form-control select2" name="status" value="<?php echo $slider['status']?>">
		                    <?php
								if ($status=="1") { ?>
									<option value="1" selected="selected">Aktif</option>
									<option value="0">Tidak Aktif</option>
									<?php } else if ($status=="0"){?>
									<option value="1">Aktif</option>
									<option value="01" selected="selected">Tidak Aktif</option>
									<?php } else { ?>
									<option value="1">Aktif</option>
									<option value="0">Tidak Aktif</option>
									<?php }
							?>
		                </select>
	        	    </div>
	                <div class="form-group">
	                  <label>Gambar</label><br>
	                  <input type="hidden" name="gambar" value="<?php echo $slider['gambar']?>">
	                  <?php if ($gambar == null){echo '<p>Tidak ada gambar</p>';}else{?>
	                    <img src="<?php echo base_url();?>/assets/upload/slider/<?php echo $gambar;?>" class="img-responsive" width="110">
	                  <?php }?>
	                  <input type="file" class="form-control" name="gambar">
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