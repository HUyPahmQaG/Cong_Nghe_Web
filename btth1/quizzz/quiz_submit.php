<?php
$score = 0;
$total = 0;

foreach ($_POST as $key => $value) {
    if (strpos($key, "answer_") === 0) {
        $id = str_replace("answer_", "", $key);

        $userAnswer = $_POST["answer_" . $id];
        $correct    = $_POST["correct_" . $id];

        if ($userAnswer == $correct)
            $score++;

        $total++;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả Quiz</title>
</head>
<body>

<h1>KẾT QUẢ</h1>

<p>Đúng: <b><?= $score ?></b> / <?= $total ?></p>
<p>Điểm: <b><?= number_format(($score / $total) * 10, 2) ?></b></p>

<a href="quiz.php">Làm lại</a>

</body>
</html>
