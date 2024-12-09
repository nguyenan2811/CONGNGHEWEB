<?php
session_start(); // Khởi tạo session

// Dữ liệu cứng ban đầu, chỉ được tạo khi chưa có trong session
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 100000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 200000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 300000],
    ];
}

// Lấy danh sách sản phẩm
function getAllProducts() {
    return $_SESSION['products'];
}

// Tìm sản phẩm theo ID
function findProductById($id) {
    foreach ($_SESSION['products'] as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

// Thêm sản phẩm mới
function addProduct($name, $price) {
    $id = count($_SESSION['products']) + 1; // Tự động tăng ID
    $_SESSION['products'][] = ['id' => $id, 'name' => $name, 'price' => $price];
}

// Cập nhật sản phẩm
function updateProduct($id, $newName, $newPrice) {
    foreach ($_SESSION['products'] as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $newName;
            $product['price'] = $newPrice;
            return true;
        }
    }
    return false;
}

// Xóa sản phẩm
function deleteProduct($id) {
    foreach ($_SESSION['products'] as $index => $product) {
        if ($product['id'] == $id) {
            unset($_SESSION['products'][$index]);
            $_SESSION['products'] = array_values($_SESSION['products']); // Đánh lại chỉ số
            return true;
        }
    }
    return false;
}

// Xử lý form thêm, sửa, xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        addProduct($_POST['name'], $_POST['price']);
    } elseif (isset($_POST['update'])) {
        updateProduct($_POST['id'], $_POST['name'], $_POST['price']);
    } elseif (isset($_POST['delete'])) {
        deleteProduct($_POST['id']);
    }
    header("Location: index.php"); // Redirect sau khi thao tác thành công
    exit;
}

$products = getAllProducts();
?>

<main>
    <style>
        .container {
            padding: 20px;
        }
        .btn-add {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f9f9f9;
        }
        .edit-icon, .delete-icon {
            cursor: pointer;
            color: blue;
        }
    </style>
    <div class="container">
        <!-- Nút Thêm Sản Phẩm -->
        <button class="btn-add" onclick="toggleForm('addForm')">Thêm sản phẩm mới</button>

        <!-- Form Thêm Sản Phẩm -->
        <div id="addForm" style="display: none;">
            <form method="POST">
                <input type="text" name="name" placeholder="Tên sản phẩm" required>
                <input type="number" name="price" placeholder="Giá sản phẩm" required>
                <button type="submit" name="add">Thêm sản phẩm</button>
                <button type="button" onclick="toggleForm('addForm')">Hủy</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= number_format($product['price']) ?> VNĐ</td>
                        <td>
                            <!-- Nút Sửa -->
                            <a href="#" onclick="editProduct(<?= $product['id'] ?>, '<?= $product['name'] ?>', <?= $product['price'] ?>)">✏️</a>
                        </td>
                        <td>
                            <!-- Nút Xóa -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button type="submit" name="delete" class="delete-icon">🗑️</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Form Cập Nhật Sản Phẩm -->
    <div id="editForm" style="display: none;">
        <form method="POST">
            <input type="hidden" name="id" id="editId">
            <input type="text" name="name" id="editName" required>
            <input type="number" name="price" id="editPrice" required>
            <button type="submit" name="update">Cập nhật sản phẩm</button>
            <button type="button" onclick="toggleForm('editForm')">Hủy</button>
        </form>
    </div>
</main>

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

    // Hàm điền thông tin vào form sửa sản phẩm
    function editProduct(id, name, price) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editPrice').value = price;
        toggleForm('editForm');
    }
</script>
