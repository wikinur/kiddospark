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
            <li class="active"><i class="fa fa-fw fa-pencil fa-2x"></i>Edit Data User</li>
        </ul>
          <div class="col-md-12" style="float:right;">
          <div class="card card-primary">
            <form action="<?php echo site_url('welcome_admin/update_data_user')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama_user" autocomplete="off" required value="<?php echo $nama_user;?>">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option>Pilih</option>
                            <option value="Admin" <?php if ($level == 'Admin'){echo "selected";}?>>Admin</option>
                            <option value="Pengunjung" <?php if ($level == 'Pengunjung'){echo "selected";}?>>Pengunjung</option>
                            <option value="Psikolog" <?php if ($level == 'Psikolog'){echo "selected";}?>>Psikolog</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="hidden" name="foto" value="<?php echo $foto;?>">
                        <?php if ($foto == null){echo '<p>Tidak ada Foto</p>';}else{?>
                            <img src="<?php echo base_url();?>assets/upload/foto-user/<?php echo $foto;?>" class="img-responsive" width="110">
                        <?php }?>
                        <input type="file" class="form-control" id="" name="file_upload" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <label class="checkbox-inline">
                            <!-- <?php $jenkel = $tampil['jenkel']; ?> -->
                            <input type="radio" value="Laki-laki" name="jenkel" <?php echo ($jenkel == 'L') ? "checked": "" ?>/> Laki-laki
                          </label>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <label class="checkbox-inline">
                            <input type="radio" value="Perempuan" name="jenkel" <?php echo ($jenkel == 'P') ? "checked": "" ?>/> Perempuan
                          </label>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type='date' class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir;?>"/>

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