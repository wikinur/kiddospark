<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo site_url('welcome_admin');?>" class="brand-link">
    <!-- <img src="<?php echo site_url('assets/images/222.png');?>" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8"> -->
    <span class="logo-mini" style="margin-left: 15px;"><b>K</b>p</span>
    <span class="brand-text" style="margin-left: 15px; color: blue;"><b>Kiddospark</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block" align="center" style="margin-left: 50px;"><h2>Navigasi</h2></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo site_url('welcome_admin');?>" class="nav-link active">
            <i class="fa fa-fw fa-home"></i>
              <p>Home</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-pie-chart"></i>
                  <p>Data Master<i class="right fa fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('welcome_admin/data_user');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_video');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Video</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_artikel');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Artikel</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_komentar');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Komentar</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-gear"></i>
                  <p>Pengaturan<i class="right fa fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_slider');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Slider</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('welcome_admin/data_teka');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Tentang Kami</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_kategori');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('c_jenisvideo');?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Jenis Video</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Pengaturan Akun<i class="right fa fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo site_url('welcome_admin/detail_data_user/'.$this->session->userdata('ses_id'))?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Profil</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo site_url('welcome_admin/ganti_password/'.$this->session->userdata('ses_id'))?>" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Ganti Password</p>
                    </a>
                  </li>
                </ul>
              </li>
      </ul>
    </nav>
  </div>
</aside>
