<?php
require "db.php";

$sql = "SELECT * FROM sinhvien ORDER BY id ASC";
$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <style>
    table td, table th {
        text-align: center;        /* Căn chữ vào giữa */
        vertical-align: middle;    /* Căn giữa theo chiều dọc */
    }
    </style>

    <!-- CSS của Bootstrap (giúp giao diện đẹp) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS của Bootstrap (giúp hoạt động các thành phần như modal, alert, dropdown…) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<meta charset="UTF-8">
<title>Danh sách sinh viên</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">📚 Danh sách sinh viên</h2>
        <a href="form.php" class="btn btn-success">➕ Thêm sinh viên</a>
    </div>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">Đã xóa sinh viên!</div>
    <?php endif; ?>

    <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-info">Cập nhật thành công!</div>
    <?php endif; ?>

    <?php if (!empty($data)): ?>
    <table class="table table-bordered table-hover shadow-sm bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($data as $sv): ?>
            <tr>
                <td><span class="badge bg-primary"><?= $sv['id'] ?></span></td>
                <td><?= htmlspecialchars($sv['ten']) ?></td>
                <td><?= htmlspecialchars($sv['email']) ?></td>
                <td><?= $sv['created_at'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $sv['id'] ?>" class="btn btn-sm btn-warning">✏ Sửa</a>
                    <a href="delete.php?id=<?= $sv['id'] ?>" 
                       onclick="return confirm('Xóa sinh viên này?')" 
                       class="btn btn-sm btn-danger">🗑 Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-info">Chưa có sinh viên nào.</div>
    <?php endif; ?>

</div>
<script>
// Tự đóng alert sau 2 giây (2000 ms)
setTimeout(function() {
    let alertBox = document.querySelector('.alert');
    if (alertBox) {
        alertBox.style.transition = "0.5s";
        alertBox.style.opacity = "0";
        setTimeout(() => alertBox.remove(), 500);
    }
}, 2000);
</script>

</body>
</html>


