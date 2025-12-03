<?php require "./views/layout/header.php"; ?>

<h2 class="text-warning mb-4">✏ Sửa sinh viên</h2>

<form action="index.php?action=update" method="POST" class="shadow p-4 bg-white rounded">

    <input type="hidden" name="id" value="<?= $student['id'] ?>">

    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" name="ten" class="form-control"
               value="<?= htmlspecialchars($student['ten_sinh_vien']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= htmlspecialchars($student['email']) ?>" required>
    </div>

    <button class="btn btn-warning">Cập nhật</button>
    <a href="index.php" class="btn btn-secondary">Quay lại</a>

</form>

<?php require "./views/layout/footer.php"; ?>
