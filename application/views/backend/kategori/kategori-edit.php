<?php $this->load->view('backend/header');?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php $this->load->view('backend/sidebar')?>
<br><br><br>   
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
            <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li><i class="fa fa-fw fa-list-ol fa-2x"></i><a href="<?php echo site_url('c_kategori');?>">Data Kategori&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-pencil fa-2x"></i>Edit Data Kategori</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <h3>Edit Data Kategori</h3>
              <form action="<?php echo site_url('c_kategori/update_data_kategori')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?php echo $record['id_kategori']?>" name="id_kategori">
                <div class="modal-body">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" autocomplete="off" required value="<?php echo $record['nama_kategori']?>">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger ">Reset</button>
                    <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                    </button>
                    <input type="submit" class="btn btn-primary" value="Update" name="submit">
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('backend/footer')?>