<?php
// TỆP: chapter2.php
// TODO 1: Khai báo 3 biến (2.1)
$ten_sv = "Nguyễn Văn A";
$mssv = "123456789";
$diem_tb = 8.8; // Ví dụ: Điểm này sẽ quyết định xếp loại
// Biến điều kiện bổ sung
$co_di_hoc_chuyen_can = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kết quả PHP Căn Bản</title>
</head>
<body>
    <h1>KẾT QUẢ THỰC HÀNH PHP CĂN BẢN</h1>
    <hr>
    
    <h2>1. Thông tin Sinh viên (In bằng echo/print)</h2>
    <?php
    // In thông tin đã khai báo (2.1) và dùng dấu chấm (.) để nối chuỗi
    echo "Họ và Tên: " . $ten_sv . "<br>";
    echo "MSSV: " . $mssv . "<br>";
    echo "Điểm Trung Bình: " . $diem_tb . "<br>";
    // echo "<br>"; // Dùng <br> để xuống dòng trong HTML
    ?>

    <h2>2. Xếp loại (Cấu trúc IF/ELSE IF/ELSE)</h2>
    <?php
    // TODO 3: Viết cấu trúc IF/ELSE IF/ELSE (2.2)
    // Dựa vào $diem_tb, in ra xếp loại:
    if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Giỏi";
    } elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Khá";
    } elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true) {
        echo "Xếp loại: Trung bình";
    } else {
        echo "Xếp loại: Yếu (Cần cố gắng thêm!)";
    }
    ?>

    <h2>3. Lời chúc mừng (Hàm)</h2>
    <?php
    // TODO 4: Viết 1 hàm đơn giản (2.3)
    function chaoMung() {
        echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
    }

    // TODO 5: Gọi hàm bạn vừa tạo
    chaoMung();

    // KẾT THÚC CODE PHP CỦA BẠN TẠI ĐÂY
    ?>
</body>
</html>