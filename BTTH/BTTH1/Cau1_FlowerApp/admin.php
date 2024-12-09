<?php
include 'functions.php';
$flowers = getFlowers();

// Xử lý form thêm, sửa, xóa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Thêm hoa mới
        $image = "images/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        addFlower($_POST['name'], $_POST['description'], $image);
    } elseif (isset($_POST['delete'])) {
        // Xóa hoa
        deleteFlower($_POST['index']);
    } elseif (isset($_POST['update'])) {
        // Cập nhật hoa
        $image = "images/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        updateFlower($_POST['index'], $_POST['name'], $_POST['description'], $image);
    }
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Hoa</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .actions {
            text-align: center;
        }

        .form-wrapper {
            text-align: center;
        }

        .add-button {
            margin-top: 20px;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-wrapper button {
            background-color:#007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
        }

        .form-wrapper button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Quản lý các loại hoa</h1>

    <h2>Danh sách Hoa</h2>
    <table>
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" width="100" class="image-preview"></td>
                    <td><?= $flower['name'] ?></td>
                    <td><?= $flower['description'] ?></td>
                    <td class="actions">
                        <!-- Nút Sửa Hoa -->
                        <button onclick="toggleForm('editForm<?= $index ?>')"><i class="edit-icon">✏️</i></button>
                        <!-- Nút Xóa Hoa -->
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" name="delete"><i class="delete-icon">🗑️</i></button>
                        </form>
                    </td>
                </tr>

                <!-- Form Sửa Hoa -->
                <div id="editForm<?= $index ?>" class="form-container">
                    <h3>Cập nhật Hoa</h3>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <input type="text" name="name" value="<?= $flower['name'] ?>" required>
                        <textarea name="description" required><?= $flower['description'] ?></textarea>
                        <input type="file" name="image">
                        <button type="submit" name="update">Cập nhật</button>
                        <button type="button" onclick="toggleForm('editForm<?= $index ?>')">Hủy</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Nút Thêm Hoa -->
    <div class="form-wrapper">
        <button class="add-button" onclick="toggleForm('addForm')">Thêm Hoa</button>
    </div>
    
    <!-- Form Thêm Hoa -->
    <div id="addForm" class="form-container">
        <h2>Thêm Hoa</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Tên hoa" required>
            <textarea name="description" placeholder="Mô tả" required></textarea>
            <input type="file" name="image" required>
            <button type="submit" name="add">Thêm</button>
            <button type="button" onclick="toggleForm('addForm')">Hủy</button>
        </form>
    </div>

    <script>
        // Hàm ẩn/hiện các form khi người dùng nhấn vào nút
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>
