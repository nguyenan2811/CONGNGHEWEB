<?php
// Đường dẫn tới file CSV
$filename = "KTPM2.csv";

// Mảng chứa dữ liệu sinh viên
$sinhvien = [];

// Đọc dữ liệu từ file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (header)
    $headers = fgetcsv($handle, 1000, ",");

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }

    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Thành phố</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị từng sinh viên
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>{$sv['username']}</td>";
                    echo "<td>{$sv['password']}</td>";
                    echo "<td>{$sv['lastname']}</td>";
                    echo "<td>{$sv['firstname']}</td>";
                    echo "<td>{$sv['city']}</td>";
                    echo "<td>{$sv['email']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>