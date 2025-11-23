<?php
// TODO 1: Bắt buộc khởi động session ở đầu file
session_start();

// TODO 2: Kiểm tra xem SESSION lưu tên đăng nhập đã tồn tại chưa
if (isset($_SESSION['tenbandat'])) {
    // TODO 3: Lấy username ra
    $loggedInUser = $_SESSION['tenbandat'];
    // TODO 4: In lời chào mừng
    echo "<h1>Chào mừng trở lại, " . $loggedInUser . "!</h1>";
    echo "<p>Bạn đăng nhập thành công.</p>";
    // TODO 5: Tạm thời cho nút đăng xuất (quay về login.html)
    echo '<a href="login.html">Đăng xuất</a>';
} else {
    // TODO 6: Nếu chưa đăng nhập
    header("Location: login.html");
    exit;
}
?>
