<?php
require "db.php";

$sql = "SELECT * FROM sinhvien ORDER BY id ASC";
$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table{border-collapse:collapse;width:100%}
        th,td{border:1px solid #888;padding:8px}
        th{background:#eee}
        a.btn{padding:4px 8px;border:1px solid #333;text-decoration:none;margin-right:5px}
        .delete{color:red}
        .edit{color:blue}
    </style>
</head>
<body>

<h1>Danh sách sinh viên</h1>

<a href="form.php" class="btn">➕ Thêm sinh viên</a>

<table>
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Email</th>
    <th>Ngày tạo</th>
    <th>Hành động</th>
</tr>

<?php foreach ($data as $sv): ?>
<tr>
    <td><?= $sv['id'] ?></td>
    <td><?= htmlspecialchars($sv['ten']) ?></td>
    <td><?= htmlspecialchars($sv['email']) ?></td>
    <td><?= $sv['created_at'] ?></td>
    <td>
        <a class="btn edit" href="edit.php?id=<?= $sv['id'] ?>">Sửa</a>
        <a class="btn delete" href="delete.php?id=<?= $sv['id'] ?>" onclick="return confirm('Xóa sinh viên này?')">Xóa</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>

