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
            <li class="active"><i class="fa fa-fw fa-users fa-2x"></i>Data User</li>
        </ul><!-- /.breadcrumb -->
        <div class="card card-info">
                <div class="card-header">
                    <a href="<?php echo base_url()?>welcome_admin/user_tambah" class="btn btn-primary" style="float:right; margin-right: 10px; margin-top: 10px">
                        <span class="fa fa-plus"></span>
                        <span>Tambah Data</span>
                    </a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                      $data=$this->session->flashdata('error');
                      if($data!=""){ ?>
                          <div id="pesan-flash">
                              <div class='alert alert-danger alert-dismissable'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <strong> Error! </strong> <?=$data;?>
                              </div>
                          </div>
                      <?php } ?>
                      <?php
                      $data2=$this->session->flashdata('sukses');
                      if($data2!=""){ ?>
                          <div id="pesan-error-flash">
                              <div class='alert alert-success alert-dismissable'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <strong> Succes! </strong> <?=$data2;?>
                              </div>
                          </div>
                      <?php } ?>
                      <?php
                      $data3=$this->session->flashdata('warning');
                      if($data3!=""){ ?>
                          <div id="pesan-error-flash">
                              <div class='alert alert-warning alert-dismissable'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  <strong> Warning! </strong> <?=$data3;?>
                              </div>
                          </div>
                      <?php } ?>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th width="2%">No</th>
                          <th>NAMA</th>
                          <th>JABATAN</th>
                           <th>EMAIL</th>
                           <th>FOTO</th>
                          <th>LOGIN TERAKHIR</th>
                          <th class="text-center">Opsi</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php
                              $no = 0; foreach ($data_user as $data){ $no++
                          ?>
                          <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $data['nama_user']?></td>
                              <td><?php echo $data['level']?></td>
                              <td><?php echo $data['email']?></td>
                              <!-- <td><img src="assets/upload/foto-user/<?php echo $data['foto']?>" style="height: 80px; width: 60px; margin-left: 30px;"></td> -->
                              <td><?php echo $data['foto']?></td>
                              <td><?php echo $data['last_login']?></td>
                              <td class="text-center">
                                  <div class="hidden-sm hidden-xs action-buttons">
                                      <a class="blue" href="<?php echo base_url()?>welcome_admin/detail_data_user/<?php echo $data['id_user'];?>" data-toggle="tooltip" data-placement ="top" title="detail">
                                            <i class="fa fa-search-plus fa-2x"></i>
                                      </a>
                                      <a class="green" href="<?php echo base_url()?>welcome_admin/edit_data_user/<?php echo $data['id_user'];?>" data-toggle="tooltip" data-placement ="top" title="edit">
                                            <i class="fa fa-pencil fa-2x"></i>
                                      </a>

                                      <a class="red" href="<?php echo base_url()?>welcome_admin/hapus_data_user/<?php echo $data['id_user'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="hapus">
                                        <i class="fa fa-trash-o fa-2x"></i>
                                      </a>
                                 </div></td>
                          </tr>
                          <?php }?>
                  </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/footer');?>