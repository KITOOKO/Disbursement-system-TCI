<footer class="main-footer">
  <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
  })
</script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & assets/plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [{
        extend: 'print',
        customize: function(win) {
          var currentDate = new Date().toLocaleDateString('th-TH'); // ดึงวันที่ปัจจุบันในรูปแบบที่ต้องการ
          // เพิ่มหัวกระดาษและด้านล่างของกระดาษ
          $(win.document.body)
            .prepend('<style>.print-header { text-align: left; font-size: 20px; font-weight: bold; margin-bottom: 20px; }</style>')
            .prepend('<div class="print-header"style="font-size: 15px;">วันที่: ' + currentDate + '</div>') // เพิ่มข้อมูลวันที่
            .prepend('<div class="print-header"style="font-size: 15px;">ชื่อลูกค้า::กฤษณะ คงสืบ </div>') 
            .prepend('<div class="order-date" style="float: right; font-size: 15px;">วันกำส่ง: 2024-04-05</div>')// เพิ่มเลขที่ขอเบิก
            .prepend('<div class="print-header"style="font-size: 15px;">เลขที่สั่งผลิต::TciOr_01 </div>')
            .prepend('<div class="order-date" style="float: right; font-size: 15px;">วันที่สั่งผลิต: 2024-03-21</div>')
            .prepend('<div class="print-header"style="text-align: center;">ใบสั่งผลิต</div>')
            .prepend('<div class="print-header"style="text-align: center;">15หมู่4 ตำบลลำผักกูดด อำเภอธัญบุรี จังหวัดปทุมธานี 12110<br>โทร 089-589-1523 เลขประจำตัวผู้เสียภาษีอากร 0135561008829</div>') // เพิ่มข้อมูลลูกค้าของ TCI
            .prepend('<div class="print-header"style="text-align: center;">บริษัทอุตสาหกรรมตู้บรรทุกไทย</div>')
            .append('<div class="print-footer" style="position: absolute; bottom: 0; left: 0; width: 100%; display: flex; justify-content: space-between;">' +
              '<div style="text-align: center;">_____________________________<br> (ผู้อนุมัติ)<br><br><br><br></div>' +
              '<div style="text-align: center;">_____________________________<br> (ผู้ตรวจสอบ)</div>' +
              '<div style="text-align: center;">_____________________________<br> (ผู้จำเนินการผลิต)</div>' +
              '</div>');
          // เพิ่มช่องเซ็นลายเซ็น
          // .append('<div class="print-footer" style="position: absolute; bottom: 0; left: 0; width: 100%; text-align: center;">นายกฤษณะ คงสืบ</div>'); // ปรับตำแหน่งของ Footer เพื่อให้แสดงที่ด้านล่างของหน้า
        }

      }, "copy"]
      // "buttons": ["print", "copy"]//["excel", "csv", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


</body>

</html>