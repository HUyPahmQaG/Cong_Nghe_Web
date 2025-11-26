<?php
if ($_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {

    $tmp = $_FILES['csv_file']['tmp_name'];
    $dest = "data/accounts.csv";

    move_uploaded_file($tmp, $dest);

    echo "Tải file thành công! <a href='accounts.php'>Xem danh sách</a>";
} else {
    echo "Lỗi tải file!";
}
?>
