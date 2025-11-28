<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- CSS của Bootstrap (giúp giao diện đẹp) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS của Bootstrap (giúp hoạt động các thành phần như modal, alert, dropdown…) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<meta charset="UTF-8">
<title>Thêm sinh viên</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">

    <h2 class="mb-4 text-success">➕ Thêm sinh viên mới</h2>

    <form action="add.php" method="POST" class="shadow p-4 bg-white rounded">

        <div class="mb-3">
            <label class="form-label">Tên sinh viên</label>
            <input type="text" name="ten" class="form-control" required placeholder="Nhập tên...">
        </div>

        <div class="mb-3">
            <label class="form-label">Email sinh viên</label>
            <input type="email" name="email" class="form-control" required placeholder="Nhập email...">
        </div>

        <button class="btn btn-success">Thêm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>

</div>
</body>
</html>
