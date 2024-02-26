 </div>
 <footer class="main-footer">
    <strong>Copyright &copy; 2024 Berliana.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="<?=base_url()?>assets/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/moment/moment.min.js"></script> 

<script src="<?=base_url()?>assets/datatables/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/datatables/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/datatables/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/datatables/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/datatables/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/js/pages/dashboard.js"></script>

<link href="<?=base_url()?>assets/select2/css/select2.min.css" rel="stylesheet" />
<script src="<?=base_url()?>assets/select2/js/select2.min.js"></script>


<style>
  .alert p{
    margin-bottom: 0!important;
  }
  .alert-success{
    color: #155724!important;
    background-color: #d4edda!important;
    border-color: #c3e6cb!important;
  }

  .alert-danger {
    color: #721c24!important;
    background-color: #f8d7da!important;
    border-color: #f5c6cb!important;
  }
  .table-title h4{
    font-size: 20px;
    letter-spacing: 5px; 
  }
</style>
<script>
  $(document).ready(function() {
    $('.basic-multiple').select2();
    $('.basic-select').select2();
  });

  $(function () {
    $("#dataBasic").DataTable({
      "dom": '<"html5buttons">Blfrtip',
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#dataBasic .col-md-6:eq(0)');

    $('#dataBasic2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "columnDefs": [
        {
            "targets": 0,
            "className": "text-center",
            "orderable": false,
        } 
        ]
    });
  });
</script> 

<link href="<?=base_url()?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="<?=base_url();?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function () {
   $(".date-month").datepicker({
      format: "mm-yyyy",
      viewMode: "months", 
      minViewMode: "months",
      autoclose: true,
    });

   $(".date-year").datepicker({
      format: "yyyy",
      viewMode: "years", 
      minViewMode: "years",
      autoclose: true,
    });

    $(".date-picker").datepicker({
      format: "yyyy-mm-dd",
      todayHighlight:'TRUE',
      autoclose: true,
    });
  });
 </script> 
</body>
</html>
