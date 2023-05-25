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
            <li class="active"><i class="fa fa-fw fa-users fa-2x"></i>Tentang Kami</li>
        </ul><!-- /.breadcrumb -->
        <div class="card card-info">
                <div class="card-header">
                    <h1>Tentang Kami</h1>
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
                    <table class="table table-bordered table-striped" id="" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>JUDUL</th>
                          <th>DESKRIPSI</th>
                          <th class="text-center">Opsi</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php
                            if ($data_teka->num_rows()>0) {
                                foreach ($data_teka->result_array() as $tampil) { ?>
                          <tr>
                              <td><?php echo $tampil['judul']?></td>
                              <td><?php echo $tampil['deskripsi']?></td>
                              <td class="text-center">
                                  <div class="hidden-sm hidden-xs action-buttons">
                                      <a class="green" href="<?php echo base_url()?>welcome_admin/edit_teka/<?php echo $tampil['id_teka'];?>" data-toggle="tooltip" data-placement ="top" title="edit">
                                            <i class="fa fa-pencil fa-2x"></i>
                                      </a>
                                 </div></td>
                          </tr>
                          <?php } } ?>
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