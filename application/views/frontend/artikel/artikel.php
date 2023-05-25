<br><br>
<ul class="breadcrumb">
   <li class="active"><i class="fa fa-fw fa-file-text-o fa-2x"></i>Artikel</li>
</ul><!-- /.breadcrumb -->
<?php $this->load->view('frontend/sidebar')?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center" style="color: blue;">Artikel Edukasi</h2>
					<?php
        				foreach ($data_artikel->result_array() as $value) {?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center" style="height: 420px; width: 250px;">
									<img src="<?php echo base_url();?>assets/upload/foto-artikel/<?php echo $value['gambar'];?>" style="height: 250px; width: 250px;" alt="" />
									<br><br>
									<b style="color: blue;"><?php echo $value['judul'];?></b>
									<br><br>
									<!-- <p><?php echo $value['isi'];?></p> -->
									<a href="<?php echo base_url();?>welcome_user/read_artikel/<?php echo $value['id_artikel'];?>" class="btn btn-default blue"><i class="fa fa-file-text"></i>Read Artikel</a>
									<br>
									<i class="fa fa-file-text"></i> <?php echo $value['dibaca'];?> Kali
								</div>
							</div>
						</div>
					</div>
				    <?php } ?>
				</div>
				<?php echo $paginator; ?>
			</div>
		</div>
	</div>
</section>
