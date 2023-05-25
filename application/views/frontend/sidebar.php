<div class="col-sm-3">
  <div class="left-sidebar">
      <h2 style="color: blue;">Kategori <br>Jenis Video</h2>
        <div class="panel category-products">           
          <?php
              foreach ($data_jevi->result_array() as $value) {?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-arrow-right" style="color: blue;"></i>   <a href="<?php echo base_url();?>welcome_user/jenisvideo/<?php echo $value['id_jevi'];?>"><?php echo $value['jenis_video'];?></a></h4>
                </div>
              </div>    
          <?php } ?>  
        </div>
      <h2 style="color: blue;">Artikel Edukasi <br>Terbaru</h2>
      <div class="thumbnail">
      <?php
        foreach ($artikel->result_array() as $value) {?>
        <a href="<?php echo base_url();?>welcome_user/read_artikel/<?php echo $value['id_artikel'];?>">
          <img src="<?php echo base_url();?>assets/upload/foto-artikel/<?php echo $value['gambar'];?>" style="height: 100px; width:200px;">
        </a> 
        <h4><a href="<?php echo base_url();?>welcome_user/read_artikel/<?php echo $value['id_artikel'];?>" style="color: blue;"><?php echo $value['judul'];?></a> </h4>
        <p><?php echo substr($value['isi'], 0,50)."....."?>   </p>
        <p><?php echo $value['tanggal']?>         <i class="fa fa-book"></i> <?php echo $value['dibaca'];?> Kali</p>  
        <hr>
        <?php } ?>
      </div>
  </div>
</div>

