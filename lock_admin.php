<?php
include "head.php";

include "../inc/myconnect.php";
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
          <small>Admin</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Quản lý Admin</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <?php
                // Kiểm tra xem có user_id được gửi từ trang quản lý không
                if (isset($_GET['tendangnhap'])) {
                    // Lấy user_id từ URL
                    $tendangnhap = $_GET['tendangnhap'];

                    // Kiểm tra xem có dữ liệu nhập chi tiết không
                    if (isset($_POST['chitietkhoa']) && !empty($_POST['chitietkhoa'])) {
                        // Lấy chi tiết nhập từ form
                        $chitietkhoa = $_POST['chitietkhoa'];

                        // Truy vấn để cập nhật cột 'khoatk' thành 1 (đã khoá) và nhập chi tiết khoá cho user có user_id tương ứng
                        $sql = "UPDATE loginadmin SET khoatk = 1, chitietkhoa = '$chitietkhoa' WHERE tendangnhap = $tendangnhap";

                        if ($conn->query($sql) === TRUE) {
                            // Nếu truy vấn thành công, hiển thị thông báo thành công
                            echo '<div class="alert alert-success">Khoá người dùng thành công.</div>';
                            echo '<a href="quanlyadmin.php" class="btn btn-default">Trở về</a>';
                        } else {
                            // Nếu có lỗi trong quá trình truy vấn, hiển thị thông báo lỗi
                            echo '<div class="alert alert-danger">Lỗi: ' . $conn->error . '</div>';
                        }
                    } else {
                        // Nếu không có dữ liệu nhập chi tiết, hiển thị form để nhập chi tiết khoá
                        ?>
                        <h2>Nhập chi tiết khoá</h2>
                        <form action="" method="post">
                            <textarea name="chitietkhoa" rows="4" cols="50" required></textarea><br><br>
                            <input type="submit" value="Khoá" class="btn btn-danger">
                        </form>
                <?php
                    }
                } else {
                    // Nếu không có user_id được gửi từ trang quản lý, hiển thị thông báo lỗi
                    echo '<div class="alert alert-danger">Không có user_id được gửi.</div>';
                }
                ?>
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

</body>

</html>
