<?php
// Cấu hình kết nối
$servername = "localhost";
$username = "root";     // Thay đổi nếu không dùng mặc định XAMPP
$password = "";         // Thay đổi nếu không dùng mặc định XAMPP
$dbname = "btth1"; // Phải khớp với tên CSDL bạn đã tạo

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("❌ Kết nối CSDL thất bại: " . $conn->connect_error);
}

// Thiết lập bộ ký tự (Quan trọng cho Tiếng Việt)
$conn->set_charset("utf8mb4");

// Trả về đối tượng kết nối
return $conn;
?>