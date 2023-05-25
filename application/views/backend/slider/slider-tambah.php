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
            <li><i class="fa fa-fw fa-film fa-2x"></i><a href="<?php echo site_url('c_slider');?>">Data Slider&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-file-text-o fa-2x"></i>Tambah Data Slider</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <form action="<?php echo site_url('c_slider/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                </div>
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="tittle" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                      <textarea id="editor1" name="description" class="form-control ckeditor" style="width: 100%"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="gambar">
                      <span class="label label-important">PERHATIAN!</span>
                      <span>
                      File hanya dalam format gif,jpg,png,jpeg dengan resolusi ukuran maksimal file sebesar 4 MB
                      </span>
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
