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
            <li><i class="fa fa-fw fa-comments fa-2x"></i><a href="<?php echo site_url('c_komentar');?>">Data Komentar&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-file-text-o fa-2x"></i>Tambah Data Komentar</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <form action="<?php echo site_url('c_komentar/simpan_data_komentar')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" autocomplete="off" name="email">
                  </div>
                  <div class="form-group">
                    <label>Komentar</label>
                      <textarea id="editor1" name="komentar" class="form-control ckeditor" style="width: 100%"></textarea>
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
