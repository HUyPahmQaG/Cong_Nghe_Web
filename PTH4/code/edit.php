<?php
require "db.php";

// Lấy ID muốn sửa
$id = $_GET["id"] ?? 0;

// Lấy dữ liệu sinh viên theo ID
$sql = "SELECT * FROM sinhvien WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([":id" => $id]);
$sv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$sv) {
    die("Không tìm thấy sinh viên");
}

// Nếu submit form sửa
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ten = $_POST["ten"];
    $email = $_POST["email"];

    $update = $conn->prepare("UPDATE sinhvien SET ten = :ten, email = :email WHERE id = :id");
    $update->execute([
        ':ten' => $ten,
        ':email' => $email,
        ':id' => $id
    ]);

    header("Location: index.php?updated=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
</head>
<body>

<h2>Sửa sinh viên</h2>

<form method="POST">
    <label>Tên:</label><br>
    <input type="text" name="ten" value="<?= htmlspecialchars($sv['ten']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($sv['email']) ?>" required><br><br>

    <button type="submit">Cập nhật</button>
</form>

</body>
</html>
