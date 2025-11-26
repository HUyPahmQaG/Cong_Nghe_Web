<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Tải đối tượng kết nối CSDL
$conn = require 'db_connect.php'; 

// Hàm phân tích file Quiz.txt thành mảng cấu trúc (như bài 02)
function parse_quiz($quiz_content) {
    $questions_list = [];
    $question_blocks = array_filter(preg_split('/\n\s*\n/', $quiz_content));

    foreach ($question_blocks as $index => $block) {
        $lines = array_filter(explode("\n", trim($block)));
        if (empty($lines)) continue;

        $question_data = ['text' => '', 'options' => [], 'answer' => ''];
        $current_phase = 'question';

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            if (strpos($line, 'ANSWER:') === 0) {
                $question_data['answer'] = trim(str_replace('ANSWER:', '', $line));
                break; 
            } elseif (preg_match('/^([A-E])\. /', $line, $matches)) {
                $key = $matches[1];
                $value = trim(substr($line, strlen($key) + 2));
                $question_data['options'][$key] = $value;
                $current_phase = 'options';
            } elseif ($current_phase === 'question') {
                $question_data['text'] .= ($question_data['text'] ? ' ' : '') . $line;
            }
        }
        
        $answer_parts = explode(',', $question_data['answer']);
        // Xác định loại input dựa trên số lượng đáp án đúng
        $question_data['input_type'] = (count($answer_parts) > 1 || strpos($question_data['text'], '(Chọn') !== false) ? 'checkbox' : 'radio';

        $questions_list[] = $question_data;
    }

    return $questions_list;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['quiz_file'])) {
    
    $file = $_FILES['quiz_file'];
    
    if ($file['error'] === UPLOAD_ERR_OK && strpos($file['type'], 'text/') !== false) {
        $quiz_content = file_get_contents($file['tmp_name']);
        $parsed_questions = parse_quiz($quiz_content);

// ...existing code...
        // Reset bảng để tránh trùng lặp dữ liệu (tắt kiểm tra FK tạm thời)
+        $conn->query("SET FOREIGN_KEY_CHECKS = 0");
+        $conn->query("TRUNCATE TABLE quiz_options");
+        $conn->query("TRUNCATE TABLE quiz_questions");
+        $conn->query("SET FOREIGN_KEY_CHECKS = 1");
// ...existing code...
        
        // Prepared Statements cho câu hỏi và lựa chọn
        $sql_insert_q = "INSERT INTO quiz_questions (question_text, answer_correct, input_type) VALUES (?, ?, ?)";
        $stmt_q = $conn->prepare($sql_insert_q);
        
        $sql_insert_opt = "INSERT INTO quiz_options (question_id, option_key, option_value) VALUES (?, ?, ?)";
        $stmt_opt = $conn->prepare($sql_insert_opt);

        $conn->begin_transaction(); // Bắt đầu giao dịch
        $count = 0;

        try {
            foreach ($parsed_questions as $q) {
                // 1. Lưu câu hỏi chính
                $stmt_q->bind_param("sss", $q['text'], $q['answer'], $q['input_type']);
                $stmt_q->execute();
                
                $question_id = $conn->insert_id; // Lấy ID vừa chèn

                // 2. Lưu các lựa chọn
                foreach ($q['options'] as $key => $value) {
                    $stmt_opt->bind_param("iss", $question_id, $key, $value);
                    $stmt_opt->execute();
                }
                $count++;
            }
            $conn->commit(); // Cam kết nếu thành công
            $message = "✅ Đã chèn thành công $count câu hỏi vào CSDL!";
        } catch (Exception $e) {
            $conn->rollback(); // Hoàn tác nếu có lỗi
            $error = "❌ Lỗi CSDL: " . $e->getMessage();
        }
        
        $stmt_q->close();
        $stmt_opt->close();
    } else {
        $error = "❌ Lỗi khi upload tệp tin Quiz hoặc định dạng tệp không đúng.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload Quiz.txt vào CSDL</title>
</head>
<body>
    <h1>Bài 04a: Upload Quiz.txt vào CSDL</h1>
    <?php if (isset($message)) echo "<p style='color:green; font-weight:bold;'>$message</p>"; ?>
    <?php if (isset($error)) echo "<p style='color:red; font-weight:bold;'>$error</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Chọn tệp Quiz (.txt):</label>
        <input type="file" name="quiz_file" accept=".txt" required><br><br>
        <button type="submit">Upload và Lưu vào CSDL</button>
    </form>
</body>
</html>