<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST["ten"];
    $email = $_POST["email"];

    if ($ten != "" && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $sql = "INSERT INTO sinhvien (ten, email) VALUES (:ten, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':ten' => $ten,
            ':email' => $email
        ]);

        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Dữ liệu không hợp lệ";
    }
}
?>
