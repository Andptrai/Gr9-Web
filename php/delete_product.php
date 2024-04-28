<?php
// Kết nối đến cơ sở dữ liệu
require '../php/connect.php';

// Kiểm tra xem có dữ liệu productID được gửi từ yêu cầu POST không
if (isset($_POST['productID'])) {
    $productId = $_POST['productID'];

    // Chuẩn bị câu lệnh SQL để kiểm tra số lượng sản phẩm đã bán ra
    $checkQuantitySql = "SELECT quantity FROM products WHERE idProduct='$productId'";
    $result = $conn->query($checkQuantitySql);

    if ($result->num_rows > 0) {
        // Lấy số lượng sản phẩm từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $quantity = $row['quantity'];

        // Kiểm tra nếu số lượng sản phẩm bằng 0
        if ($quantity == 0) {
            // Cập nhật cột hoặc thực hiện các thao tác cần thiết để ẩn sản phẩm trên giao diện
            // Ví dụ: có thể cập nhật cột status trong cơ sở dữ liệu hoặc thay đổi trạng thái trong giao diện
            // Ở đây, chúng ta có thể thực hiện câu lệnh SQL để đánh dấu sản phẩm là "ẩn"
            $hideProductSql = "UPDATE products SET status='hidden' WHERE idProduct='$productId'";
            $conn->query($hideProductSql);

            // Trả về mã lỗi HTTP 400 để thông báo rằng sản phẩm đã được ẩn
            http_response_code(400);
            echo "Product has been hidden because quantity is 0";
        } else {
            // Chuẩn bị câu lệnh SQL để xóa sản phẩm từ cơ sở dữ liệu
            $deleteSql = "DELETE FROM products WHERE idProduct='$productId'";

            // Thực hiện câu lệnh SQL và kiểm tra kết quả
            if ($conn->query($deleteSql) === TRUE) {
                // Trả về mã HTTP 200 để biểu thị thành công
                http_response_code(200);
                echo "Product deleted successfully";
            } else {
                // Trả về mã lỗi HTTP 500 nếu có lỗi xảy ra khi xóa sản phẩm
                http_response_code(500);
                echo "Error deleting product: " . $conn->error;
            }
        }
    } else {
        // Trả về mã lỗi HTTP 404 nếu không tìm thấy sản phẩm với ID cung cấp
        http_response_code(404);
        echo "Product not found";
    }
} else {
    // Trả về mã lỗi HTTP 400 nếu không có ID sản phẩm được cung cấp
    http_response_code(400);
    echo "Product ID not provided";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
