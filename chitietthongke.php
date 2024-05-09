<?php
include "head.php";
?>
<body class="hold-transition skin-blue sidebar-mini">

<?php include "Header.php"; ?>
    <?php include "aside.php"; ?>
    <div class="container ">

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
echo "<table border='1'><tr><th>Tên Khách hàng</th><th>Mức mua</th><th>Chi tiết</th></tr>";
while($row = $result->fetch_assoc()) {
$sodhList = explode(",", $row["sodh"]);
echo "<tr><td>".$row["tenkh"]."</td><td>".$row["total_spent"]."</td><td>";
foreach ($sodhList as $sodh) {
echo "<a href='chitietdonhang.php?sodh=".$sodh."'>Xem chi tiết ".$sodh."</a>, ";
}
echo "</td></tr>";
}
echo "</table>";
} else {
echo "Không có khách hàng nào trong khoản thời gian được chọn.";
}
?>