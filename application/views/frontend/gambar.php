<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<?php
						$sliderhome = $this->db->query("select max(id_slider) as slider from tbl_slider where status='1' order by id_slider desc ");
							foreach ($sliderhome->result_array() as $value) {
								$slider = $value['slider'];
							} ?>
						<?php
						foreach ($slidermax->result_array() as $value) {
							if ($value['id_slider']==$slider) { ?>
							<div class="item active">
								<div class="col-sm-6">
									<h1 style="color: orange;"><span style="color: blue;">Selamat</span>-Datang</h1>
									<h2><?php echo $value['tittle'];?></h2>
									<p><?php echo strip_tags(substr($value['description'],0,200));?></p>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>assets/upload/slider/<?php echo $value['gambar'];?>" class="girl img-responsive" alt="<?php echo $value['tittle'];?>" />
								</div>
							</div>	
							<?php } else { ?>
							<div class="item">
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>assets/upload/slider/<?php echo $value['gambar'];?>" class="girl img-responsive" alt="<?php echo $value['tittle'];?>" />
								</div>
								<div class="col-sm-6">
									<h1 style="color: orange;"><span style="color: blue;">1,2,3,4,...</span>A,B,C,D,....</h1>
									<h2><?php echo $value['tittle'];?></h2>
									<p><?php echo strip_tags(substr($value['description'],0,200));?></p>
								</div>
							</div>
							<?php } ?>
						<?php } ?>
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/slider-->
