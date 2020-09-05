    <footer class="main-footer no-print">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Developed By <a href="http://www.facebook.com/ProfileOfMehedi" target="_blank">Mehedi Jaman</a></strong>
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->  

  <!-- jQuery Validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <!-- Select2 -->
  <script src="{{ asset('/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

  <!-- InputMask -->
  <script src="{{ asset('/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
  <script src="{{ asset('/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ asset('/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

  <!-- date-range-picker -->
  <script src="{{ asset('/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <!-- bootstrap datepicker -->
  <script src="{{ asset('/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

  <!-- bootstrap color picker -->
  <script src="{{ asset('/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

  <!-- bootstrap time picker -->
  <script src="{{ asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

  <!-- SlimScroll -->
  <script src="{{ asset('/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

  <!-- iCheck 1.0.1 -->
  <script src="{{ asset('/adminlte/plugins/iCheck/icheck.min.js') }}"></script>

  <!-- FastClick -->
  <script src="{{ asset('/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>

  <!-- Sweet Alert2 -->
  <script src="{{ asset('/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

  <!-- DataTables -->
  <script src="{{ asset('/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/Buttons-1.6.1/js/buttons.bootstrap.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/Buttons-1.6.1/js/buttons.html5.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/Buttons-1.6.1/js/buttons.print.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/Buttons-1.6.1/js/buttons.colVis.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
  <script src="{{ asset('/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>  
  <script src="{{ asset('/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
  <script src="{{ asset('/vendor/DataTables/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('/vendor/DataTables/Responsive-2.2.3/js/responsive.bootstrap.min.js') }}"></script>
  <script src="{{ asset('/vendor/DataTables/ColReorder-1.5.2/js/dataTables.colReorder.min.js') }}"></script>
   

  <!-- Morris.js charts -->
  <!-- <script src="{{ asset('/adminlte/bower_components/raphael/raphael.min.js') }}"></script> -->
  <!-- <script src="{{ asset('/adminlte/bower_components/morris.js/morris.min.js') }}"></script> -->

  <!-- Sparkline -->
  <!-- <script src="{{ asset('/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script> -->

  <!-- jvectormap -->
  <!-- <script src="{{ asset('/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> -->
  <!-- <script src="{{ asset('/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> -->

  <!-- jQuery Knob Chart -->
  <!-- <script src="{{ asset('/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script> -->

  <!-- Bootstrap WYSIHTML5 -->
  <!-- <script src="{{ asset('/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> -->

  <!-- AdminLTE App -->
  <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script> 

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="{{ asset('/adminlte/dist/js/pages/dashboard.js') }}"></script> -->

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/adminlte/dist/js/demo.js') }}"></script> 

  <!-- Page script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script> 
</body>
</html>
