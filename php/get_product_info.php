<?php
require '../php/connect.php';

// Lấy ID sản phẩm từ yêu cầu AJAX
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm
    $sql = "SELECT * FROM products WHERE idProduct='$productId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Chuẩn bị đường dẫn của hình ảnh sản phẩm
        $productImage = $row['image'];
        // Chuẩn bị dữ liệu để trả về dưới dạng JSON
        $productInfo = array(
            'id' => $row['idProduct'],
            'name' => $row['name'],
            'category' => $row['category'],
            'image' => $productImage // Đường dẫn của hình ảnh sản phẩm
        );
        // Trả về dữ liệu dưới dạng JSON
        echo json_encode($productInfo);
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>
