<br><br>
<ul class="breadcrumb">
   <li class="active"><i class="fa fa-fw fa-search fa-2x"></i>Hasil Pencarian</li>
</ul><!-- /.breadcrumb -->
<?php $this->load->view('frontend/sidebar')?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<form action="<?php echo site_url('welcome_user/cari_video')?>" enctype="multipart/form-data" method="post">
			        <div class="input-group">
			          <input type="text" name="cari" placeholder="Cari Video Berdasarkan Judul..." autocomplete="off" required="required" class="form-control pull-right" style="width: 300px;" />
			          <span class="input-group-btn"><button type="submit" class="btn btn-default blue" style="background: blue; color: white;" >GO!</button></span>
			        </div>
			    </form>
			    <br>
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center" style="color: blue;">Hasil Pencarian</h2>
					<?php
						if ($video_cari->num_rows()>0) {
        					foreach ($video_cari->result_array() as $value) {?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center" style="height: 420px; width: 250px;">
									<img src="<?php echo base_url();?>assets/upload/video-user/<?php echo $value['cover'];?>" style="height: 250px; width: 250px;" alt="" />
									<br><br>
									<b style="color: blue;"><?php echo $value['judul'];?></b>
									<br><br>
									<!-- <p><?php echo $value['isi'];?></p> -->
									<a href="<?php echo base_url();?>welcome_user/video_play1/<?php echo $value['id_video'];?>" class="btn btn-default blue"><i class="fa fa-file-text"></i>Read Artikel</a>
									<br>
									<p class="pull-right" style="margin-right: 40px;"><i class="fa fa-eye"></i> <?php echo $value['dilihat'];?> Kali   </p>
                					<p class="pull-left" style="margin-left: 40px;"> <?php echo $value['nama_kategori'];?></p>
								</div>
							</div>
						</div>
					</div>
				    <?php } } else {
							echo "Tidak Ada Video";
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
