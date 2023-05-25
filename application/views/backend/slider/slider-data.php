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
            <li><i class="fa fa-fw fa-home"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
            <li class="active"><i class="fa fa-fw fa-file-text-o"></i>Data Slider</li>
        </ul><!-- /.breadcrumb -->
        <div class="card card-info">
          <div class="card-header">
            <a href="<?php echo base_url()?>c_slider/slider_tambah" class="btn btn-primary btn-small" style="float:right;">
              <span class="ace-icon fa fa-plus"></span><span>Tambah Data</span>
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
                          <th>No</th>
                          <th>Judul</th>
                          <th>Gambar</th>
                          <th>Status</th>
                          <th class="text-center">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no=1;
                    if ($data_slider->num_rows()>0) {
                      foreach ($data_slider->result_array() as $data) { ?>
                          <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $data['tittle']?></td>
                              <td><?php echo $data['gambar']?></td>
                              <td><?php if ($data['status']=="1") {
                                      echo "Aktif";
                                      }else {
                                        echo "Tidak Aktif";
                                      }
                              ?></td>
                              <td class="text-center">
                                  <div class="hidden-sm hidden-xs action-buttons">
                                      <a class="green" href="<?php echo base_url()?>c_slider/edit_data/<?php echo $data['id_slider'];?>" data-toggle="tooltip" data-placement ="top" title="edit">
                                            <i class="fa fa-pencil fa-2x"></i>
                                      </a>

                                      <a class="red" href="<?php echo base_url()?>c_slider/hapus_data/<?php echo $data['id_slider'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="hapus">
                                        <i class="fa fa-trash-o fa-2x"></i>
                                      </a>
                                 </div>
                              </td>
                          </tr>
                          <?php $no++; } } ?>
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