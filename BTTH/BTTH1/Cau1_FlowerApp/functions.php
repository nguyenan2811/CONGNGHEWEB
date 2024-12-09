<?php
// Đọc dữ liệu từ tệp PHP
function getFlowers() {
    include 'data.php'; // Lấy mảng $flowers từ tệp data.php
    return $flowers;
}

// Lưu dữ liệu vào tệp PHP
function saveFlowers($flowers) {
    $phpCode = "<?php\n\$flowers = " . var_export($flowers, true) . ";\n?>";
    file_put_contents('data.php', $phpCode);
}

// Thêm hoa mới
function addFlower($name, $description, $image) {
    $flowers = getFlowers();
    $flowers[] = ["name" => $name, "description" => $description, "image" => $image];
    saveFlowers($flowers);
}

// Xóa hoa theo chỉ số
function deleteFlower($index) {
    $flowers = getFlowers();
    if (isset($flowers[$index])) {
        unset($flowers[$index]);
        $flowers = array_values($flowers); // Đánh lại chỉ số
        saveFlowers($flowers);
    }
}


// Cập nhật thông tin hoa
function updateFlower($index, $name, $description, $image) {
    $flowers = getFlowers();
    
    // Kiểm tra xem chỉ số hoa có hợp lệ không
    if (isset($flowers[$index])) {
        // Cập nhật thông tin hoa
        $flowers[$index] = ["name" => $name, "description" => $description, "image" => $image];
        
        // Lưu lại mảng hoa đã sửa
        saveFlowers($flowers);
    } else {
        echo "Không tìm thấy hoa cần sửa.";
    }
}

?>
