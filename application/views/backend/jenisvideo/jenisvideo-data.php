<br><br><br>
<ul class="breadcrumb">
    <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li class="active"><i class="fa fa-fw fa-list-ol fa-2x"></i>Data Jenis Video</li>
</ul><!-- /.breadcrumb -->
<div class="card card-info">
  <div class="card-header">
    <a href="<?php echo base_url()?>c_jenisvideo/jenisvideo_tambah" class="btn btn-primary" style="float:right; margin-right: 10px; margin-top: 10px">
      <span class="fa fa-plus"></span><span>Tambah Data</span>
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
            <th>Jenis Video</th>
            <th class="text-center">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no=1;
            if ($data_jevi->num_rows()>0) {
                foreach ($data_jevi->result_array() as $tampil) { ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $tampil['jenis_video']?></td>
                    <td class="text-center">
                    <div class="hidden-sm hidden-xs action-buttons">
                      <a class="green" href="<?php echo base_url();?>c_jenisvideo/edit_data/<?php echo $tampil['id_jevi'];?>" data-toggle="tooltip" data-placement ="top" title="edit">
                      <i class="fa fa-pencil fa-2x"></i></a>
                      <a class="red" href="<?php echo base_url();?>c_jenisvideo/hapus_data/<?php echo $tampil['id_jevi'];?>" onclick="return confirm('Yakin ingin menghapus Jenis Video <?php echo $tampil['jenis_video'];?>?')" data-toggle="tooltip" data-placement ="top" title="hapus"><i class="fa fa-trash-o fa-2x"></i></a>
                    </div></td>
                  </tr>
            <?php $no++; } } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
