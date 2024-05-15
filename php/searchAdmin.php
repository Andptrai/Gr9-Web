<?php
// Kết nối đến cơ sở dữ liệu
require 'connect.php';

// Lấy từ khóa tìm kiếm từ tham số URL
$keyword = $_GET['keyword'];

// Truy vấn để tìm kiếm sản phẩm
$sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'"; // Tìm kiếm theo tên sản phẩm
$result = $conn->query($sql);

// Hiển thị kết quả tìm kiếm
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . $row['image'] . '" class="card-img-top" alt="Product Image">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">Category: ' . $row['category'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Không tìm thấy sản phẩm phù hợp.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
