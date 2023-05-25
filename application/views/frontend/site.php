<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('frontend/header');?>
    <div  style="margin-top:130px;"></div>
</head>
<body>
        <div class="container">
            <div class="row">
                    <?php $this->load->view($content);?>
            </div>
          </div>
    <?php $this->load->view('frontend/footer');?>
</body>
</html>
