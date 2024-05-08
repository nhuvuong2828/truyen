<?php
include "head.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "Header.php"; ?>
    <?php include "aside.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Quản lý
          <small>ADMIN</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Quản lý admin</h3>
                <div class="box-tools">
                  <a href="themadmin.php" class="btn btn-primary">Thêm mới</a> <!-- Thêm nút Thêm mới -->
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>ten qly</th>
                      <th>maql</th>
                      <th>tendangnhap</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require '../inc/myconnect.php';
                    $sql = "SELECT tendangnhap, email_ql, ma_ql, ten_ql FROM loginadmin ORDER BY tendangnhap";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                          <td><?php echo $row["email_ql"] ?></td>
                          <td><?php echo $row["ten_ql"] ?></td>
                          <td><?php echo $row["ma_ql"] ?></td>
                          <td><?php echo $row["tendangnhap"] ?></td>
                          <td>
                            <!-- Thêm nút Khoá người dùng và sử dụng JavaScript để hiển thị hộp thoại xác nhận -->
                            <button onclick="confirmLockUser(<?php echo $row['email_ql']; ?>)" class="btn btn-danger">Khoá</button>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>  
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section>
      <!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "footer.php"; ?>
    <?php include "ControlSidebar.php"; ?>
    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

  <script>
    // Hàm JavaScript để hiển thị hộp thoại xác nhận khi nhấp vào nút Khoá
    function confirmLockUser(userId) {
      if (confirm('Bạn có chắc chắn muốn khoá người dùng này không?')) {
        // Nếu người dùng xác nhận, chuyển hướng đến trang xử lý khoá người dùng với userId
        window.location.href = 'lock_admin.php?tendangnhap=' + tendangnhap;
      }
    }
  </script>
</body>

</html>