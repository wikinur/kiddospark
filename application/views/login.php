    <html>
        <head>
            <script type="text/javascript" src="<?php echo base_url();?>assets/login/js/jquery.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/login/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/login/font-awesome-4.1.0/css/font-awesome.min.css">
            <link href="<?php echo base_url();?>assets/frontend/css/main.css" rel="stylesheet">
            <style type="text/css">
                body{
                    background-image: url("assets/images/background1.png");
                    background-repeat: no-repeat;
                }
            </style>
            <title>Halaman Login</title>
        </head>
        <body>
          <header id="header"><!--header-->
            <div class="header_top navbar navbar-fixed-top" style="background:blue;"><!--header_top-->
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="contactinfo">
                      <ul class="nav nav-pills">
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--/header_top-->
            <div class="header_top   navbar navbar-fixed-top" style="margin-top:50px; background:blue;"><!--header-bottom-->
              <div class="container">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="logo pull-left">
                      <div class="span4">
                            <a href="<?php echo site_url('main_page');?>" style="color:white; font-size: 40px;"><b>KiddosPark</b></a>
                          </div>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="navbar-header header-middle">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="mainmenu pull-right">
                      <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="<?php echo base_url('main_page');?>"><i class="fa fa-home"></i>   Home</a></li>
                        <li><a href="<?php echo base_url('main_page/tentang_kami');?>"><i class="fa fa-users"></i>   Tentang Kami</a></li>
                        <li><a href="<?php echo base_url('c_login');?>"><i class="fa fa-sign-in"></i>   Login</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--/header-bottom-->
          </header><!--/header-->
          <div align="center">
            <br><br><br><br><br><br>           
            <div align="center" style="width:320px;margin-top:5%;">
              <form name="login_form" method="post" class="well well-lg" action="<?php echo site_url('C_login/sign_in');?>" style="-webkit-box-shadow: 0px 0px 20px #888888;">
                <i class="fa fa-sign-in fa-5x fa-inverse" style="background-color: #76b4ff;padding: 20px 28px 20px 28px;border-radius: 50%;box-shadow: #ffffff -1px 2px 1px;"></i>
                <br><br>
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
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input name="username" class="form-control" type="text" placeholder="Username" autocomplete="off" autofocus="" />
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                </div>
                <br />
                <input name="log" type="submit" value="Login" class="btn btn-default btn-block" style="background: blue; color: white;">
                <br>
                <div class="flex-sb-m w-full p-t-3 p-b-32">
                  <div class="pull-left">
                   <a href="" data-toggle="modal" data-target="#lupa">Lupa Password?</a>
                  </div>
                  <div class="pull-right">
                   <a href="" data-toggle="modal" data-target="#register">Daftar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
            <br>
            <br>
            <br>
            <footer id="footer" style="margin-top: 120px;">
              <div class="footer-bottom" style="background: black;">
                <div class="container">
                  <div class="row">
                    <p align="center" style="color: #fff;">Copyright © 2018-2019 Kiddospark. All rights reserved.</p>  
                  </div>
                </div>
              </div> 
            </footer>
        </body>
    </html>

    <div id="register" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Daftar sebagai Pengunjung</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form action="<?php echo site_url('C_login/daftar_data')?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" class="form-control" name="nama_user" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                  <option value="Pengunjung">Pengunjung</option>
                </select>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="file_upload" value="">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <label class="checkbox-inline">
                                    <input type="radio" value="Laki-laki" name="jenkel" /> Laki-laki &nbsp;&nbsp;&nbsp;
                    <input type="radio" value="Perempuan" name="jenkel" /> Perempuan
                  </label>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-default" style="background: blue; color: white;" value="Daftar" name="daftar">
            </div>
          </form>
        </div>
      </div>
      </div>

    <div id="lupa" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Lupa Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form action="<?php echo site_url('C_login/lupa_password')?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="ulangi_password" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-default" style="background: blue; color: white;" value="Ubah" name="ganti">
            </div>
          </form>
        </div>
      </div>
    </div>