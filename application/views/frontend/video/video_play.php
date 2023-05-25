<br><br>
<ul class="breadcrumb">
   <li class="active"><i class="fa fa-fw fa-film fa-2x"></i>Video</li>
   <li class="active"><i class="fa fa-fw fa-play-circle-o fa-2x"></i>Video Play</li>
</ul><!-- /.breadcrumb -->
<?php $this->load->view('frontend/sidebar')?>
<div class="col-md-9 padding-right">
<h2 class="title text-center" style="color: blue;"><?php foreach ($data_kategori->result_array() as $tampil) { if ($kategori_id==$tampil['id_kategori']) { ?>
          <option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
          <?php } } ?></h2>
  <div class="product-details">
      <!-- <div class="product-image-wrapper"> -->
          <!-- <div class="single-products"> -->
            <div class="productinfo text-center">
              <video id="video1" width="600" height="300" controls>
                    <source src="<?php echo base_url('/assets/upload/video-user/'.$video)?>" type="video/mp4">
                  browser anda tidak mendukung format video ini.</video>
            </div>
          <!-- </div> -->
      <!-- </div> -->
      <div class="col-sm-12">
        <div class="product-information">
          <span>
              <span style="color: blue;"><?php foreach ($data_kategori->result_array() as $tampil) { if ($kategori_id==$tampil['id_kategori']) { ?>
              <option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?></option>
              <?php } } ?></span>
          </span>
          <h2><?php echo $judul;?></h2>
          <p><?php echo $keterangan;?></p>
        </div>
      </div>
  </div>
</div>