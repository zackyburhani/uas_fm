<!-- /.content-wrapper -->
<!-- <footer class="main-footer" >
  <strong><p align="center">Copyright &copy; 2018 <a href="https://adminlte.io">PanenPangan.com</a>.</strong> All rights
  reserved.</p>
</footer> -->

<!-- jQuery 3 -->
<script src="<?php blink('/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php blink('/assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php blink('/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?php blink('/assets/AdminLTE/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php blink('/assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php blink('/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php blink('/assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php blink('/assets/AdminLTE/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php blink('/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php blink('/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php blink('/assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php blink('/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php blink('/assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php blink('/assets/AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php blink('/assets/AdminLTE/dist/js/demo.js')?>"></script>

<!--script PLUGINS-->
<script src="<?php blink('/assets/AdminLTE/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/morris/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php blink('/assets/AdminLTE/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php blink('/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php blink('/assets/AdminLTE/plugins/knob/jquery.knob.js')?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php blink('/assets/AdminLTE/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php blink('/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php blink('/assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php blink('/assets/AdminLTE/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php blink('/assets/AdminLTE/dist/js/app.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php blink('/assets/AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php blink('/assets/AdminLTE/dist/js/demo.js')?>"></script>
<!-- DataTables JavaScript -->
<script src="<?php blink('/assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php blink('/assets/AdminLTE/plugins/select2/select2.full.min.js')?>"></script>
<!--END script PLUGINS-->
<script src="<?php blink('/assets/AdminLTE/plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php blink('assets/AdminLTE/dist/js/fnSetFilteringDelay.js')?>"></script>
<script src="<?php blink('/assets/AdminLTE/plugins/bootbox/bootbox.min.js')?>"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#datatablebuku').DataTable();
} );
</script>

<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }
</script>

<script> 
  window.setTimeout(function() {
    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
  }, 3000); 
</script>

</body>
</html>
