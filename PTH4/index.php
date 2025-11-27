<?php
require "db.php";

$sql = "SELECT * FROM sinhvien ORDER BY id DESC";
$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #999; padding: 8px; }
        th { background-color: #eee; }
        .success { padding: 10px; background: #d4f7d4; margin-bottom: 10px; }
    </style>
</head>
<body>

<h1>Danh sách sinh viên</h1>

<?php if (isset($_GET['success'])): ?>
    <div class="success">Thêm mới thành công!</div>
<?php endif; ?>

<a href="form.php">➕ Thêm sinh viên</a>

<table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Ngày tạo</th>
    </tr>

    <?php foreach ($data as $sv): ?>
        <tr>
            <td><?= $sv['id'] ?></td>
            <td><?= htmlspecialchars($sv['ten']) ?></td>
            <td><?= htmlspecialchars($sv['email']) ?></td>
            <td><?= $sv['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
