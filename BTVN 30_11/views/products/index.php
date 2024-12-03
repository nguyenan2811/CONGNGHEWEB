<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
    <!-- Thanh điều hướng -->
    <div class="navbar">
        <a href="index.php?action=index">Trang chủ</a>
        <a href="index.php?action=create">Thêm sản phẩm</a>
    </div>

    <!-- Khu vực nội dung -->
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></td>
                    <td><?= $product->price ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $product->id ?>">✏️</a> 
                       
                    </td>
                    <td> <a href="index.php?action=delete&id=<?= $product->id ?>">🗑️</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>Quản Lí Sản Phẩm</p>
    </footer>
</body>
</html>
