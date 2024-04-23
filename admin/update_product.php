<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin sản phẩm từ biến POST
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    // Lấy thông tin khác của sản phẩm nếu cần
    
    // Thực hiện truy vấn cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    $sql = "UPDATE products SET name='$productName', price='$productPrice' WHERE idProduct='$productId'";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $conn->error;
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
}
?>
