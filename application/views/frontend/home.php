<br><br>
<!--<div id="pesan-flash">
  <div class='alert alert-success alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <strong><span class="user-info">
      <small>Welcome,</small>
      <?php echo $this->session->userdata("ses_nama"); ?>
    </span> </strong>
  </div>
</div>-->
<ul class="breadcrumb">
   <li class="active"><i class="fa fa-fw fa-home fa-2x"></i>Home</li>
</ul><!-- /.breadcrumb -->
<?php $this->load->view('frontend/gambar');?>
<?php $this->load->view('frontend/sidebar');?>
<div class="col-sm-9 padding-right">
  <div class="features_items">
    <div class="features_items">
      <h2 class="title text-center" style="color: blue;">Video Pendidikan</h2>
      <?php
      foreach ($data_video->result_array() as $value) { ?>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
              <div class="productinfo text-center">
                <img src="<?php echo base_url();?>assets/upload/video-user/<?php echo $value['cover'];?>"  style="height:270px; width:250px;" alt="" />
                <br><br>
                <b style="color: blue;"><?php echo $value['judul'];?></b>
                <br><br>
                <a href="<?php echo base_url();?>welcome_user/video_play1/<?php echo $value['id_video'];?>" class="btn btn-default blue"><i class="fa fa-play-circle-o"></i>Play Video</a>
                <br>
                <p class="pull-right" style="margin-right: 40px;"><i class="fa fa-eye"></i> <?php echo $value['dilihat'];?> Kali   </p>
                <p class="pull-left" style="margin-left: 40px;"> <?php echo $value['nama_kategori'];?></p>
              </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="recommended_items">
      <h2 class="title text-center" style="color: blue;">Terbaru</h2>
      <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active">
              <?php
              foreach ($random_active->result_array() as $value) { ?>
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?php echo base_url();?>assets/upload/video-user/<?php echo $value['cover'];?>" style="height:270px; width:250px;" alt="" />
                      <br><br>
                      <b style="color: blue;"><?php echo $value['judul'];?></b>
                      <br><br>
                      <a href="<?php echo base_url();?>welcome_user/video_play1/<?php echo $value['id_video'];?>" class="btn btn-default blue"><i class="fa fa-play-circle-o"></i>Play Video</a>
                      <br>
                      <p class="pull-right" style="margin-right: 40px;"><i class="fa fa-eye"></i> <?php echo $value['dilihat'];?> Kali   </p>
                      <p class="pull-left" style="margin-left: 40px;"> <?php echo $value['nama_kategori'];?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
          </div>
          <div class="item">
              <?php
              foreach ($random->result_array() as $value) { ?>
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?php echo base_url();?>assets/upload/video-user/<?php echo $value['cover'];?>" style="height:270px; width:250px;" alt="" />
                      <br><br>
                      <b style="color: blue;"><?php echo $value['judul'];?></b>
                      <br><br>
                      <a href="<?php echo base_url();?>welcome_user/video_play1/<?php echo $value['id_video'];?>" class="btn btn-default blue"><i class="fa fa-play-circle-o"></i>Play Video</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
          </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left" style="background: blue;"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right" style="background: blue;"></i>
      </a>
      </div>
    </div>
  </div>
</div>
