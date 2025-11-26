<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $row_count = 0;

        // Kiểm tra phần mở rộng đơn giản
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ($ext !== 'csv') {
            $error = "❌ Vui lòng chọn tệp .csv";
        } else {
            if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
                // Reset bảng an toàn: xóa bảng con trước (nếu có FK), rồi reset AUTO_INCREMENT
                // Dùng DELETE để tránh lỗi khi có ràng buộc FK
                try {
                    $conn->begin_transaction();

                    $conn->query("DELETE FROM student_accounts");
                    $conn->query("ALTER TABLE student_accounts AUTO_INCREMENT = 1");

                    // Đọc dòng tiêu đề (username,password,...) để bỏ qua
                    $headers = fgetcsv($handle, 1000, ",");

                    // Prepared Statement cho 7 cột
                    $sql = "INSERT INTO student_accounts (username, password, lastname, firstname, city, email, course1) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        // Kiểm tra đủ 7 cột dữ liệu
                        if (count($data) === 7) {
                            $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                            $stmt->execute();
                            $row_count++;
                        }
                    }

                    $conn->commit();
                    $message = "✅ Đã chèn thành công $row_count tài khoản sinh viên vào CSDL!";
                    $stmt->close();
                } catch (Exception $e) {
                    $conn->rollback();
                    $error = "❌ Lỗi CSDL: " . $e->getMessage();
                }

                fclose($handle);
            } else {
                $error = "❌ Không thể mở tệp tin CSV đã upload.";
            }
        }
    } else {
        $error = "❌ Lỗi upload tệp tin CSV.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload CSV vào CSDL</title>
</head>
<body>
    <h1>Bài 04b: Upload CSV vào CSDL</h1>
    <?php if (isset($message)) echo "<p style='color:green; font-weight:bold;'>$message</p>"; ?>
    <?php if (isset($error)) echo "<p style='color:red; font-weight:bold;'>$error</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Chọn tệp danh sách (.csv):</label>
        <input type="file" name="csv_file" accept=".csv" required><br><br>
        <button type="submit">Upload và Lưu vào CSDL</button>
    </form>
</body>
</html>
```// filepath: