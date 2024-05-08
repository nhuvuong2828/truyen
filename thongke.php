<?php 
 include "head.php";
 
?>
  
    <?php 
 include "Header.php";
?> 
    <?php 
 include "aside.php";
?>


  <div class="container mt-3">
    <div class="Text-white">
    <h2>Chọn Ngày</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="from_date">Từ ngày:</label>
      <input type="date" id="from_date" name="from_date" required>

      <label for="to_date">Đến ngày:</label>
      <input type="date" id="to_date" name="to_date" required>

      <button type="submit">Tìm kiếm</button>
    
    </form>


<?php
 if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
     require '../inc/myconnect.php';
     $from_date = isset($_POST['from_date']) ? $_POST['from_date'] : date('Y-m-d');
     $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d');
 }
$sql = "SELECT tenkh, SUM(thanhtien) AS total_spent, GROUP_CONCAT(sodh SEPARATOR ', ') AS sodh
FROM hoadon
WHERE ngaygiao BETWEEN '$from_date' AND '$to_date'
GROUP BY tenkh
ORDER BY total_spent DESC
LIMIT 5;";

$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
     // Bắt đầu bảng HTML
     echo "<table border='1'><tr><th>Tên Khách hàng</th><th>Mức mua</th></tr>";
     // In dữ liệu từ mỗi hàng kết quả
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>".$row["tenkh"]."</td><td>".$row["total_spent"]."</td></tr>";
     }
     // Kết thúc bảng HTML
     echo "</table>";
 } else {
     echo "Không có khách hàng nào trong khoản thời gian được chọn.";
 }

 

?>


<?php 
      include "footer.php";
     ?>
  <?php 
 include "ControlSidebar.php";
?>
      