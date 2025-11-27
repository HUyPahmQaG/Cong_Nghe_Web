<?php
require "db.php";

$id = $_GET["id"] ?? 0;

// Xóa sinh viên theo ID
$sql = "DELETE FROM sinhvien WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([":id" => $id]);

// === RESET ID về đúng thứ tự 1,2,3,... ===

// 1) Tạo biến đếm
$conn->exec("SET @count = 0");

// 2) Gán lại ID theo thứ tự
$conn->exec("UPDATE sinhvien SET id = (@count := @count + 1) ORDER BY id");

// 3) Reset AUTO_INCREMENT về đúng tổng số bản ghi + 1
$conn->exec("ALTER TABLE sinhvien AUTO_INCREMENT = 1");

header("Location: index.php?deleted=1");
exit;
?>
