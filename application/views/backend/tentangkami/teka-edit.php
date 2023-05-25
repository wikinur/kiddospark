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
            <li><i class="fa fa-fw fa-users fa-2x"></i><a href="<?php echo site_url('welcome_admin/data_teka');?>">Tentang Kami&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-pencil fa-2x"></i>Edit Data Tentang Kami</li>
        </ul>
          <div class="col-md-12" style="float:right;">
            <div class="card card-primary">
              <h3>Edit Tentang Kami</h3>
              <form action="<?php echo site_url('welcome_admin/update_teka')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?php echo $record['id_teka']?>" name="id_teka">
                <div class="modal-body">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" name="judul" autocomplete="off" required value="<?php echo $record['judul']?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="editor1" name="deskripsi" class="form-control ckeditor" style="width: 10px; height: 10px; "><?php echo $deskripsi;?></textarea>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" autocomplete="off" required value="<?php echo $record['alamat']?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" autocomplete="off" required value="<?php echo $record['email']?>">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" name="phone" autocomplete="off" required value="<?php echo $record['phone']?>">
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