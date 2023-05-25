<br><br><br><br><br><br>
<footer id="footer"><!--Footer-->
    <div class="footer-top" >
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
          <br><br>
              <h2 class="title text-center" style="color: blue;">-------------------------- Komentar Terbaru --------------------------</h2>
              <?php foreach($data_komentar as $data): ?>
                <div class=" thumbnail col-md-12">
                  <p class="pull-right"><?php echo $data['tanggal']?></p>
                  <p><?php echo $data['nama']?></p>
                  <br>
                  <?php echo $data['komentar']?>
                </div>
              <?php endforeach; ?>
          </div>
          <div class="col-sm-6">
            <div class="address">
              <h2 class="title text-center" style="color: blue;">---------------------------- Kirim Komentar ----------------------------</h2>
              <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>welcome_user/komentar">
                    <div class="form-group col-md-6">
                        <input type="text" name="nama" class="form-control" required="required" autocomplete="off" placeholder="Nama">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="email" class="form-control" required="required" autocomplete="off" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="komentar" id="message" required="required" class="form-control" rows="8" placeholder="Ketikkan Komentar Anda Disini"></textarea>
                    </div>                        
                    <div class="form-group col-md-12">
                        <input type="submit" name="kirim" style="color: white; background: blue;" class="btn pull-right" value="Kirim">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>   
    <div class="footer-bottom" style="background: black;">
      <div class="container">
        <div class="row">
          <p align="center" style="color: #fff;">Copyright © 2018-2019 Kiddospark. All rights reserved.</p>  
        </div>
      </div>
    </div>  
 </footer><!--/Footer-->
<script src="<?php echo base_url();?>assets/frontend/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/price-range.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/main.js"></script>
