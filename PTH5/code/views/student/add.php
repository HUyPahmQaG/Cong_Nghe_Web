<?php require "./views/layout/header.php"; ?>

<h2 class="text-success mb-4">➕ Thêm sinh viên</h2>

<form action="index.php?action=add" method="POST" class="shadow p-4 bg-white rounded">

    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" name="ten" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <button class="btn btn-success">Thêm</button>
    <a href="index.php" class="btn btn-secondary">Quay lại</a>
</form>

<?php require "./views/layout/footer.php"; ?>
