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
            <li class="active"><i class="fa fa-fw fa-file-text-o fa-2x"></i>Edit Data Artikel</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <form action="<?php echo site_url('c_artikel/update_data')?>" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="id_artikel" value="<?php echo $id_artikel;?>">
                  <div class="modal-body">
                      <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" name="judul" autocomplete="off" required value="<?php echo $judul;?>">
                      </div>
                      <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea id="editor1" name="isi" class="form-control ckeditor" style="width: 10px; height: 10px; "><?php echo $isi;?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="hidden" name="gambar" value="<?php echo $gambar;?>">
                        <?php if ($gambar == null){echo '<p>Tidak ada gambar</p>';}else{?>
                            <img src="<?php echo base_url('/assets/upload/foto-artikel/'.$gambar)?>" width="100px" height="150px">
                        <?php }?>
                        <input type="file" class="form-control" id="" name="gambar" placeholder="">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="reset" class="btn btn-danger ">Reset</button>
                      <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                      </button>
                      <input type="submit" class="btn btn-primary" value="Update" name="update">
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('backend/footer');?>
