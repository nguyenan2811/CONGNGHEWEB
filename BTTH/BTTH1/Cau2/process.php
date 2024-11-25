<?php
// Đọc câu hỏi và đáp án từ file
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}

// So sánh câu trả lời của người dùng
$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}

// Hiển thị kết quả
$total = count($answers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Kết quả bài làm</h1>
    <div class="alert alert-success text-center">
        Bạn trả lời đúng <strong><?= $score ?></strong> / <?= $total ?> câu.
    </div>
    <a href="index.php" class="btn btn-primary">Làm lại</a>
</div>
</body>
</html>