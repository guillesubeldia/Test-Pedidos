
<!-- jQuery 3 -->
<!-- Lo subi al header -->
<!-- <script src="<?php //echo base_url(). 'plantilla/bower_components/jquery/dist/jquery.min.js'?>"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url(). 'plantilla/bower_components/datatables.net/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url(). 'plantilla/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
<!-- Bootstrap 3.3.7 -->
<!-- Se cambió al header -->
<!-- <script src="<?php echo base_url(). 'plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script> -->
<!-- Select2 -->
<script src="<?php echo base_url(). 'plantilla/bower_components/select2/dist/js/select2.full.min.js'?>"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url(). 'plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url(). 'plantilla/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(). 'plantilla/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(). 'plantilla/dist/js/demo.js'?>"></script>


<script>

  // $(document).ready(function () {
  //   $('.sidebar-menu').tree()
  // })
  $(function () {
    $('.select2').select2()

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
