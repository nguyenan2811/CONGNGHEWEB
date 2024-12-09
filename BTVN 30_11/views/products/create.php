<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
<h1>Thêm sản phẩm</h1>
<form action="index.php?action=store" method="post" class="product-form">
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="price">Giá:</label>
    <input type="text" id="price" name="price" required><br>

    <button type="submit">Thêm</button>
</form>
</body>
</html>
