<?php
// product_action.php
// Kết nối đến cơ sở dữ liệu
require '../php/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý yêu cầu chỉnh sửa sản phẩm
    if (isset($_POST['edit_product'])) {
        $productID = $_POST['idProduct'];
        $productName = $_POST['name'];
        $category = $_POST['category'];

        // Kiểm tra nếu có hình ảnh mới được tải lên
        if ($_FILES['newProductImage']['size'] > 0) {
            $newProductImage = $_FILES['newProductImage'];
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($newProductImage["name"]);

            // Di chuyển hình ảnh mới vào thư mục uploads
            if (move_uploaded_file($newProductImage["tmp_name"], $target_file)) {
                // Cập nhật thông tin sản phẩm với hình ảnh mới
                $sql = "UPDATE products SET name='$productName', category='$category', image='$target_file' WHERE idProduct='$productID'";
            } else {
                // Lỗi khi di chuyển hình ảnh
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Không có hình ảnh mới được tải lên, chỉ cập nhật thông tin sản phẩm
            $sql = "UPDATE products SET name='$productName', category='$category' WHERE idProduct='$productID'";
        }

        // Thực hiện truy vấn cập nhật
        if ($conn->query($sql) === TRUE) {
            // Chuyển hướng trở lại trang product.php sau khi cập nhật thành công
            header("Location: products.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Xử lý yêu cầu xóa sản phẩm
    if (isset($_POST['delete_product'])) {
        $productID = $_POST['productID'];

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $sql = "DELETE FROM products WHERE idProduct='$productID'";

        // Thực hiện truy vấn xóa
        if ($conn->query($sql) === TRUE) {
            // Chuyển hướng trở lại trang product.php sau khi xóa thành công
            header("Location: products.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
