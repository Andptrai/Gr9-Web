<?php
require '../php/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin sản phẩm từ biến POST
    $productId = $_POST['productID']; // Nhận giá trị ID của sản phẩm từ trường input ẩn
    $productName = $_POST['productName'];
    $productCategory = $_POST['category'];

    // Kiểm tra xem idProduct có giá trị không trống
    if (!empty($productId)) {
        // Xử lý hình ảnh mới nếu được cung cấp
        if (isset($_FILES['newProductImage']) && $_FILES['newProductImage']['error'] === UPLOAD_ERR_OK) {
            $upload_directory = "C:/xampp/htdocs/Gr9-Web/interface/images/";
            $upload_file = basename($_FILES['newProductImage']['name']);
            $image_path = "../interface/images/" . $upload_file;

            // Di chuyển file từ thư mục tạm thời vào thư mục mục tiêu
            if (move_uploaded_file($_FILES['newProductImage']['tmp_name'], $upload_directory . $upload_file)) {
                // Cập nhật đường dẫn hình ảnh mới vào cơ sở dữ liệu
                $sql = "UPDATE products SET name='$productName', category='$productCategory', image='$image_path' WHERE idProduct='$productId'";

                if ($conn->query($sql) === TRUE) {
                    echo "Product updated successfully";
                } else {
                    echo "Error updating product: " . $conn->error;
                }
            } else {
                echo "Không thể di chuyển file.";
            }
        } else {
            // Nếu không có hình ảnh mới được cung cấp, chỉ cập nhật thông tin sản phẩm
            $sql = "UPDATE products SET name='$productName', category='$productCategory' WHERE idProduct='$productId'";

            if ($conn->query($sql) === TRUE) {
                echo "Product updated successfully";
            } else {
                echo "Error updating product: " . $conn->error;
            }
        }
    } else {
        // Nếu idProduct rỗng, in ra thông báo lỗi
        echo "Error: Product ID is empty";
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
}
?>