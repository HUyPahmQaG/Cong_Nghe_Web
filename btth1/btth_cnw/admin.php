<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản trị Hoa</title>
<style>
    body { font-family: Arial; margin: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
    th { background: #f2f2f2; }
    img { width: 120px; }
    .actions button {
        padding: 6px 12px; border: none; cursor: pointer; border-radius: 4px;
    }
    .edit { background: #ffc107; }
    .delete { background: #dc3545; color: white; }
    .add-form {
        margin-bottom: 20px; padding: 20px; background: #f9f9f9;
        border-radius: 8px; border: 1px solid #ddd;
    }
</style>
</head>
<body>
<a href="index.php">Về lại trang chủ</a>
<h1>Trang Quản Trị – Quản lý Hoa</h1>

<h2>➕ Thêm Hoa Mới</h2>

<form class="add-form" method="POST" enctype="multipart/form-data">
    <label>Tên hoa:</label>
    <input type="text" name="name" required><br><br>

    <label>Mô tả:</label>
    <input type="text" name="desc" required><br><br>

    <label>Ảnh:</label>
    <input type="file" name="image" required><br><br>

    <button type="submit">Thêm mới</button>
</form>

<h2>Danh sách hoa</h2>
<table>
<tr>
    <th>#</th>
    <th>Ảnh</th>
    <th>Tên hoa</th>
    <th>Mô tả</th>
    <th>Chức năng</th>
</tr>

<?php foreach ($flowers as $i => $f): ?>
<tr>
    <td><?= $i+1 ?></td>
    <td><img src="images/<?= $f['image'] ?>"></td>
    <td><?= $f['name'] ?></td>
    <td><?= $f['desc'] ?></td>
    <td class="actions">
        <button class="edit">Sửa</button>
        <button class="delete">Xóa</button>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
