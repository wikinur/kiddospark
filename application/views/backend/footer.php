<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0-alpha
  </div>
  <strong>Copyright &copy; 2018-2019 <a href="">Kiddospark</a>.</strong> All rights
  reserved.
</footer>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/backend/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/backend/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/backend/datatables/dataTables.bootstrap4.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/backend/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url();?>assets/backend/js/ckeditor.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/backend/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/backend/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/backend/js/password-meter/pwstrength-bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/password-meter/zxcvbn.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/password-meter/password-meter-active.js"></script>
<!-- page script -->
<script src="<?php echo base_url();?>assets/backend/datatables/admin-datatables.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

      ClassicEditor
      .create(document.querySelector('#editor2'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>
</body>
</html>
