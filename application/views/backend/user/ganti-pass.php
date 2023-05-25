<br><br><br>
<ul class="breadcrumb">
    <li><i class="fa fa-fw fa-home fa-2x"></i><a href="<?php echo site_url('welcome_admin');?>">Home&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li><i class="fa fa-fw fa-users fa-2x"></i><a href="<?php echo site_url('welcome_admin/data_user');?>">Data User&nbsp;</a><span class="divider">/&nbsp;</span></li>
    <li class="active"><i class="fa fa-fw fa-gear fa-2x"></i>Ganti Password</li>
</ul><!-- /.breadcrumb -->

<div class="col-md-12" style="float:right;">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <form action="<?php echo site_url('welcome_admin/ubah_password')?>" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
            <input type="hidden" name="password" value="<?php echo $password;?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password lama</label>
                        <input type="password" name="password_lama" title="8 character password,use uppercase,lowercase and numeric" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="ulangi_password_baru" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger ">Reset</button>
                    <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Update" name="update">
                </div>
        </form>
      </div>
    </div>
</div>

 <!-- Password meter Start -->
<!--<div class="password-meter-area mg-b-15">
    <div class="sparkline12-graph">
        <div id="pwd-container1">
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control example1" id="password1" placeholder="Password">
            </div>
            <div class="form-group mg-b-pass">
            <div class="pwstrength_viewport_progress"></div>
            </div>
        </div>
    </div>
</div>-->
