<?php
require "db.php";

$id = $_GET["id"] ?? 0;

$sql = "SELECT * FROM sinhvien WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$sv = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$sv) {
    die("Không tìm thấy sinh viên");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = $conn->prepare("UPDATE sinhvien SET ten=:ten, email=:email WHERE id=:id");
    $update->execute([
        ':ten' => $_POST['ten'],
        ':email' => $_POST['email'],
        ':id' => $id
    ]);

    header("Location: index.php?updated=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- CSS của Bootstrap (giúp giao diện đẹp) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS của Bootstrap (giúp hoạt động các thành phần như modal, alert, dropdown…) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<meta charset="UTF-8">
<title>Sửa sinh viên</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">

    <h2 class="text-warning mb-4">✏ Sửa sinh viên</h2>

    <form method="POST" class="shadow p-4 bg-white rounded">
        <div class="mb-3">
            <label class="form-label">Tên sinh viên</label>
            <input type="text" name="ten" class="form-control" value="<?= htmlspecialchars($sv['ten']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($sv['email']) ?>" required>
        </div>

        <button class="btn btn-warning">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>

</div>
</body>
</html>
