<br><br>
<ul class="breadcrumb">
   <li class="active"><i class="fa fa-fw fa-file-text-o fa-2x"></i>Artikel</li>
   <li class="active"><i class="fa fa-fw fa-eye fa-2x"></i>Read Artikel</li>
</ul><!-- /.breadcrumb -->
<?php $this->load->view('frontend/sidebar')?>
<div class="col-md-9 padding-right">
  <div class="product-details">
            <div class="productinfo text-center">
            <h2 class="text-center" style="color: blue;"><?php echo $judul;?></h2>
            <br>
              <img src="<?php echo base_url();?>assets/upload/foto-artikel/<?php echo $gambar;?>" style="height: 300px; width:600px;">
            </div>
          <br>
      <div class="col-sm-12">
        <!-- <div class="product-information"> -->
        <div class="thumbnail" style="margin-top: 40px; font-size: 19px;">
          <p style="margin-top: 50px;"><?php echo $isi;?></p>
        </div>
      </div>
  </div>
</div>