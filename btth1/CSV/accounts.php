<?php
// Đọc file CSV
$path = "data/accounts.csv";

if (!file_exists($path)) {
    die("Không tìm thấy file accounts.csv");
}

$rows = array_map("str_getcsv", file($path));

// Lấy hàng đầu làm header
$header = array_shift($rows);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3 – Danh sách tài khoản</title>
    <style>
        body { font-family: Arial; background:#f5f5f5; padding:20px }
        table { width:100%; border-collapse: collapse; background:white }
        th, td { padding:10px; border:1px solid #ccc; text-align:left }
        th { background:#3498db; color:white }
        h1 { text-align:center }
        .upload-box { margin:20px 0; padding:15px; background:#fff; border:1px solid #ddd }
    </style>
</head>
<body>

<h1>Danh sách sinh viên – Bài 3</h1>

<div class="upload-box">
    <form method="post" action="upload_accounts.php" enctype="multipart/form-data">
        <label>Chọn file CSV mới:</label>
        <input type="file" name="csv_file" required>
        <button type="submit">Tải lên</button>
    </form>
</div>

<table>
    <tr>
        <?php foreach ($header as $col): ?>
            <th><?= htmlspecialchars($col) ?></th>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($rows as $r): ?>
        <tr>
            <?php foreach ($r as $cell): ?>
                <td><?= htmlspecialchars($cell) ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
