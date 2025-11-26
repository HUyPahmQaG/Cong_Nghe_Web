<?php
// ĐỌC FILE QUIZ THEO ĐÚNG ĐỊNH DẠNG ĐẠI CA GỬI
$rows = file("data/Quiz.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$questions = [];
$temp = [];

foreach ($rows as $line) {
    if (preg_match("/^ANSWER:/", $line)) {
        $temp['answer'] = trim(str_replace("ANSWER:", "", $line));
        $questions[] = $temp;
        $temp = [];
    } elseif (preg_match("/^[ABCD]\./", $line)) {
        $optionKey = $line[0];      // A B C D
        $optionVal = trim(substr($line, 2)); // Bỏ "A. "
        $temp['options'][$optionKey] = $optionVal;
    } else {
        // DÒNG LÀ CÂU HỎI
        $temp['question'] = $line;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quiz – Bài 2</title>
</head>
<body>

<h1>Trắc nghiệm – Bài 2</h1>

<form method="post" action="quiz_submit.php">

<?php foreach ($questions as $i => $q): ?>
    <div style="margin-bottom:20px; padding:10px; border:1px solid #ccc;">
        <p><b>Câu <?= $i+1 ?>:</b> <?= htmlspecialchars($q['question']) ?></p>

        <?php foreach ($q['options'] as $key => $opt): ?>
            <label>
                <input type="radio" name="answer_<?= $i ?>" value="<?= $key ?>" required>
                (<?= $key ?>) <?= htmlspecialchars($opt) ?>
            </label><br>
        <?php endforeach; ?>

        <!-- LƯU ĐÁP ÁN ĐỂ CHẤM -->
        <input type="hidden" name="correct_<?= $i ?>" value="<?= $q['answer'] ?>">
    </div>
<?php endforeach; ?>

    <button type="submit">Nộp bài</button>
</form>

</body>
</html>
