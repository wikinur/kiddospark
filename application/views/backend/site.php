<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('backend/header');?>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php $this->load->view('backend/sidebar')?>
    <!--sidebar-->
    <div class="content-wrapper" style="height:800px;">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <?php $this->load->view($content);?>
                    <!--content-->
                </div>
            </div>
          </div>
    </div>
    <?php $this->load->view('backend/footer');?>
  </div>
</body>
</html>
