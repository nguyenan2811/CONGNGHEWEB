<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
<h1>Sửa sản phẩm</h1>
<form action="index.php?action=update" method="post" class="product-form">
    <input type="hidden" name="id" value="<?= $product->id ?>">

    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" value="<?= $product->name ?>" required><br>

    <label for="price">Giá:</label>
    <input type="text" id="price" name="price" value="<?= $product->price ?>" required><br>

    <button type="submit">Cập nhật</button>
</form>
</body>
</html>
