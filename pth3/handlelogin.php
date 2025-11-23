<?php
// TODO 1: Bắt buộc khởi động session ở đầu file
session_start();

// TODO 2: Kiểm tra xem người dùng đã nhấn nút đăng nhập chưa (tức là gửi form chưa)
if (isset($_POST['username']) && isset($_POST['password'])) {
    // TODO 3: Lấy dữ liệu từ POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: Kiểm tra logic đăng nhập (nếu username = 'admin' và password = '123' thì thành công)
    if ($user === 'admin' && $pass === '123') {
        // TODO 5: Lưu tên đăng nhập vào SESSION
        $_SESSION['tenbandat'] = $user;

        // TODO 6: Chuyển hướng sang welcome.php và thoát luôn
        header("Location: welcome.php");
        exit;
    } else {
        // Sai thông tin thì chuyển về trang đăng nhập và báo lỗi trên URL
        header("Location: login.html?error=1");
        exit;
    }
} else {
    // TODO 7: Nếu truy cập trực tiếp file này (không qua form) thì cũng chuyển về login.html
    header("Location: login.html");
    exit;
}
?>
