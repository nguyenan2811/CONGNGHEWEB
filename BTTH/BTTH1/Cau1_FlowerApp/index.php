<?php
include 'functions.php';
$flowers = getFlowers();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <div class="flower-list">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-item">
                <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>">
                <h2><?= $flower['name'] ?></h2>
                <p><?= $flower['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
