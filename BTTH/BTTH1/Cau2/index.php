<?php
// Đọc file câu hỏi
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$all_questions = [];
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0 && !empty($current_question)) {
        $all_questions[] = $current_question;
        $current_question = [];
    }
    $current_question[] = $line;
}
if (!empty($current_question)) {
    $all_questions[] = $current_question;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Bài kiểm tra trắc nghiệm</h1>
    <form action="process.php" method="POST">
        <?php foreach ($all_questions as $index => $question): ?>
            <div class="card mb-4">
                <div class="card-header"><strong><?= $question[0] ?></strong></div>
                <div class="card-body">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <?php $answer = substr($question[$i], 0, 1); ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question<?= $index + 1 ?>"
                                   value="<?= $answer ?>" id="question<?= $index + 1 . $answer ?>">
                            <label class="form-check-label"
                                   for="question<?= $index + 1 . $answer ?>"><?= $question[$i] ?></label>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
</body>
</html>