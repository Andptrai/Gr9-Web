<?php
// Kết nối đến cơ sở dữ liệu
require '../php/connect.php';

// Kiểm tra xem có dữ liệu productID được gửi từ yêu cầu POST không
if (isset($_POST['productID'])) {
    $productId = $_POST['productID'];

    // Chuẩn bị câu lệnh SQL để xóa sản phẩm từ cơ sở dữ liệu
    $sql = "DELETE FROM products WHERE idProduct='$productId'";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        // Trả về mã HTTP 200 để biểu thị thành công
        http_response_code(200);
        echo "Product deleted successfully";
    } else {
        // Trả về mã lỗi HTTP 500 nếu có lỗi xảy ra
        http_response_code(500);
        echo "Error deleting product: " . $conn->error;
    }
} else {
    // Trả về mã lỗi HTTP 400 nếu không có ID sản phẩm được cung cấp
    http_response_code(400);
    echo "Product ID not provided";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
