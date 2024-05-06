
<?php
// Kiểm tra xem yêu cầu là từ form chỉnh sửa hay nút xóa
if(isset($_POST['productID']) && isset($_POST['productName']) && isset($_POST['category'])) {
    // Kết nối đến cơ sở dữ liệu
    require 'connect.php';

    // Lấy dữ liệu từ form chỉnh sửa
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $category = $_POST['category'];

    // Kiểm tra xem có hình mới được tải lên không
    if(isset($_FILES['newProductImage']) && $_FILES['newProductImage']['error'] === UPLOAD_ERR_OK) {
        // Xử lý hình mới
        $newImage = $_FILES['newProductImage'];
        $uploadDir = "../interface/images/"; // Thay đổi đường dẫn nếu cần
        $imageName = uniqid() . "_" . basename($newImage["name"]);
        $targetFile = $uploadDir . $imageName;

        // Di chuyển hình mới đến thư mục upload
        if(move_uploaded_file($newImage["tmp_name"], $targetFile)) {
            // Cập nhật thông tin sản phẩm với hình mới
            $sql = "UPDATE products SET name='$productName', category='$category', image='$targetFile' WHERE idProduct='$productID'";
            if($conn->query($sql) === TRUE) {
                echo "Sản phẩm đã được cập nhật thành công";
               
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Có lỗi khi tải lên hình mới";
        }
    } else {
        // Không có hình mới, chỉ cập nhật thông tin sản phẩm
        $sql = "UPDATE products SET name='$productName', category='$category' WHERE idProduct='$productID'";
        if($conn->query($sql) === TRUE) {
            echo "Sản phẩm đã được cập nhật thành công";
        } else {
            echo "Lỗi: " . $sql  . "<br>" . $conn->error;
        }
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
} elseif(isset($_POST['deleteProductID'])) {
    // Xử lý xóa sản phẩm
    require 'connect.php';

    $productID = $_POST['deleteProductID'];

    // Xóa sản phẩm từ cơ sở dữ liệu
    $sql = "DELETE FROM products WHERE idProduct='$productID'";
    if($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được xóa thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
} else {
    // Nếu không có dữ liệu từ form hoặc nút xóa, chuyển hướng về trang không tồn tại hoặc trang chính
    header("Location: http://localhost/Gr9-Web/admin/products.php"); // Thay đổi đường dẫn nếu cần
//    exit();
}
?>
