<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách các loài hoa</title>
<style>
    body { font-family: Arial; margin: 20px; }
    h1 { text-align: center; }
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .flower {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
    }
    img {
        width: 100%; height: 200px; object-fit: cover;
        border-radius: 6px;
    }
    .name { font-weight: bold; font-size: 20px; margin: 10px 0; }

</style>
</head>
<body>
<a href="admin.php">Vào trang quản trị</a>
<h1>🌸 14 Loại Hoa Tuyệt Đẹp – Xuân Hè 🌸</h1>

<div class="grid">
<?php foreach ($flowers as $f): ?>
    <div class="flower">
        <img src="images/<?= $f['image'] ?>" alt="">
        <div class="name"><?= $f['name'] ?></div>
        <p><?= $f['desc'] ?></p>
    </div>
<?php endforeach; ?>
</div>



</body>
</html>
