<?php
// Kiểm tra xem dữ liệu đã được gửi từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bắt đầu xử lý dữ liệu nhận được từ form
    // Kết nối đến cơ sở dữ liệu
    require '../inc/myconnect.php';

    // Lấy dữ liệu từ form và gán vào các biến
    $email_ql = $_POST['email_ql'];
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $tenql = $_POST['ten_ql'];
    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
    $sql_check = "SELECT * FROM loginadmin WHERE email_ql = '$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Nếu email đã tồn tại, hiển thị thông báo lỗi và chuyển hướng người dùng trở lại trang quản lý khách hàng
        
        header(" url=quanlyadmin.php");
        exit();
    } else {
        // Thực hiện truy vấn để thêm khách hàng vào cơ sở dữ liệu
        $sql_insert = "INSERT INTO loginadmin (email_ql, tendangnhap,ten_ql, matkhau) VALUES ('$email_ql', '$tendangnhap', '$tenql', '$matkhau')";

        if ($conn->query($sql_insert) === TRUE) {
            // Nếu thêm thành công, chuyển hướng người dùng đến trang quản lý khách hàng
            header("Location: quanlyadmin.php");
            exit();
        } else {
            // Nếu có lỗi xảy ra trong quá trình thêm, hiển thị thông báo lỗi
            echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
