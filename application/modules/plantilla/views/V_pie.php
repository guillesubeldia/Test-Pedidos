
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


<!-- date-range-picker -->
<script src="<?php echo base_url(). 'plantilla/bower_components/moment/min/moment.min.js'?>"></script>
<script src="<?php echo base_url(). 'plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(). 'plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>

<!-- InputMask -->
<script src="<?php echo base_url(). 'plantilla/plugins/input-mask/jquery.inputmask.js'?>"></script>
<script src="<?php echo base_url(). 'plantilla/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
<script src="<?php echo base_url(). 'plantilla/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>


<!-- SlimScroll -->
<script src="<?php echo base_url(). 'plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url(). 'plantilla/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(). 'plantilla/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(). 'plantilla/dist/js/demo.js'?>"></script>

<!-- fullCalendar -->
<script src="<?php echo base_url(). 'plantilla/bower_components/moment/moment.js'?>"></script>
<script src="<?php echo base_url(). 'plantilla/bower_components/fullcalendar/dist/fullcalendar.min.js'?>"></script>


<script>
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
  
$(function () {
  $(".datepicker").datepicker({ 
    autoclose: true, 
    todayHighlight: true,
    format: "dd-mm-yyyy",
    maxViewMode: 2,
    clearBtn: true,
    language: "es"
  }).datepicker('update', new Date());
});
  // $(document).ready(function () {
  //   $('.sidebar-menu').tree()
  // })
 
</script>
</body>
</html>
