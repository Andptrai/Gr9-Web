<?php
// Include file kết nối đến cơ sở dữ liệu
require '../php/connect.php';

// Kiểm tra xem có dữ liệu gửi từ máy khách không
if(isset($_POST['productQuantities'])) {
    // Lặp qua mảng sản phẩm và số lượng được gửi từ máy khách
    foreach($_POST['productQuantities'] as $product) {
        // Xác thực dữ liệu đầu vào
        $productId = intval($product['id']); // Chuyển đổi giá trị thành số nguyên để tránh cuộc tấn công SQL Injection
        $quantity = intval($product['quantity']); // Chuyển đổi giá trị thành số nguyên

        // Cập nhật số lượng sản phẩm trong bảng cart_items sử dụng Prepared Statements
        $query = "UPDATE cart_items SET quantity = ? WHERE idProduct = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $quantity, $productId);
        mysqli_stmt_execute($stmt);

        // Kiểm tra và xử lý kết quả
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            // Cập nhật thành công
            echo "Product with ID $productId updated successfully.\n";
        } else {
            // Cập nhật thất bại
            echo "Failed to update product with ID $productId.\n";
        }

        // Đóng câu lệnh Prepared Statement
        mysqli_stmt_close($stmt);
    }
} else {
    // Không có dữ liệu được gửi từ máy khách
    echo "No data received.\n";
}
?>
