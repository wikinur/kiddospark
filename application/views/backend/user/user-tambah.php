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
            <li><i class="fa fa-fw fa-users fa-2x"></i><a href="<?php echo site_url('welcome_admin/data_user');?>">Data User&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-plus fa-2x"></i>Tambah Data User</li>
        </ul>
          <div class="col-md-12" style="float:right;">
          <div class="card card-primary">
            <form action="<?php echo site_url('welcome_admin/simpan_data_user')?>" enctype="multipart/form-data" method="post">
              <div class="modal-body">
              <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" name="nama_user" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Level</label>
                  <select name="level" class="form-control">
                      <option value="">Pilih</option>
                      <option value="Admin">Admin</option>
                      <option value="Pengunjung">Pengunjung</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" title="8 character password,use uppercase,lowercase and numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control">
              </div>
              <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="file_upload" value="">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <label class="checkbox-inline">
                  <input type="radio" value="Laki-laki" name="jenkel" /> Laki-laki &nbsp;&nbsp;&nbsp;
                  <input type="radio" value="Perempuan" name="jenkel" /> Perempuan
                </label>
              </div>
              <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" value="">
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
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/footer');?>
