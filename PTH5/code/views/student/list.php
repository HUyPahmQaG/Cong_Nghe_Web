<?php require "./views/layout/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">📘 Danh sách sinh viên</h2>
    <a href="index.php?action=addForm" class="btn btn-success">➕ Thêm sinh viên</a>
</div>

<table class="table table-bordered table-hover bg-white text-center align-middle">
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
        <?php foreach ($students as $sv): ?>
        <tr>
            <td><span class="badge bg-primary"><?= $sv['id'] ?></span></td>
            <td><?= htmlspecialchars($sv['ten']) ?></td>
            <td><?= htmlspecialchars($sv['email']) ?></td>
            <td><?= $sv['created_at'] ?></td>
            <td>
                <a href="index.php?action=editForm&id=<?= $sv['id'] ?>" class="btn btn-warning btn-sm">✏ Sửa</a>
                <a onclick="return confirm('Xóa?')" class="btn btn-danger btn-sm"
                href="index.php?action=delete&id=<?= $sv['id'] ?>">🗑 Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require "./views/layout/footer.php"; ?>
