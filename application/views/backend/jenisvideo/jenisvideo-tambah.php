<br><br><br>
<ul class="breadcrumb">
    <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li><i class="fa fa-fw fa-list-ol fa-2x"></i><a href="<?php echo site_url('c_jenisvideo');?>">Data Jenis Video&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li class="active"><i class="fa fa-fw fa-plus fa-2x"></i>Tambah Data Jenis Video</li>
</ul>
  <div class="col-md-12" style="float:right;">
  <div class="card card-primary">
    <form action="<?php echo site_url('c_jenisvideo/simpan_data')?>" enctype="multipart/form-data" method="post">
      <div class="modal-body">
      <div class="form-group">
          <label>Jenis Video</label>
          <input type="text" class="form-control" name="jenis_video" autocomplete="off" required>
      </div>
    </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
      </div>
    </form>
  </div>
</div>
