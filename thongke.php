<?php
include "head.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <?php include "Header.php"; ?>
    <?php include "aside.php"; ?>



  <div class="container ">
    <div class="Text-white">
    <h2>Chọn Ngày</h2>
    <form action="chitietthongke.php" method="post">
      <label for="from_date">Từ ngày:</label>
      <input type="date" id="from_date" name="from_date" required>

      <label for="to_date">Đến ngày:</label>
      <input type="date" id="to_date" name="to_date" required>

      <button type="submit">Tìm kiếm</button>
    
    </form>






<?php
 include "ControlSidebar.php";
?>
      