<?php
// Kiểm tra xem đã kết nối đến cơ sở dữ liệu chưa
require 'connect.php';

// Kiểm tra xem dữ liệu đã được gửi từ form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form và gán vào các biến tương ứng
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $category = $_POST['category'];
    $productQuantity = $_POST['productQuantity'];

    // Xử lý file ảnh sản phẩm
    $image_tmp = $_FILES['productImage']['tmp_name']; // Đường dẫn tạm thời của file được upload
    $image = $_FILES['productImage']['name']; // Tên file
    $upload_directory = "C:/xampp/htdocs/Gr9-Web/interface/images/uploads/"; // Thư mục lưu trữ file ảnh
    move_uploaded_file($image_tmp, $upload_directory . $image); // Di chuyển file vào thư mục lưu trữ

    // Thực hiện truy vấn SQL để thêm sản phẩm vào cơ sở dữ liệu
    $sql = "INSERT INTO products (`name`, `price`, `category`, `image`, `quantity`) VALUES ('$productName', '$productPrice', '$category', '$image', '$productQuantity')";

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo nếu thêm sản phẩm thành công
        echo "New record created successfully";
    } else {
        // Hiển thị thông báo lỗi nếu có vấn đề xảy ra trong quá trình thêm sản phẩm
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
