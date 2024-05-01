<?php
    require '../php/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường đã được gửi và không rỗng
    if (isset($_POST['productName'], $_POST['category'], $_FILES['productImage']) &&
        !empty($_POST['productName'])  && !empty($_POST['category'])) {

        $productName = $_POST['productName'];
        $category = $_POST['category'];
        // $productQuantity = $_POST['productQuantity'];
        
        // Kiểm tra loại và kích thước của tệp hình ảnh
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $upload_file = $_FILES['productImage']['name'];
        $file_extension = pathinfo($upload_file, PATHINFO_EXTENSION);
        $upload_directory = "C:/xampp/htdocs/Gr9-Web/interface/images/";

        if (in_array($file_extension, $allowed_types) && $_FILES['productImage']['size'] > 0) {
            $image_tmp = $_FILES['productImage']['tmp_name'];
            $image_path = "../interface/images/" . $upload_file; // Đường dẫn tệp hình ảnh trong thư mục mục tiêu
            
            // Di chuyển file từ thư mục tạm thời vào thư mục mục tiêu
            if (move_uploaded_file($image_tmp, $upload_directory . $upload_file)) {
                // Thêm dữ liệu vào cơ sở dữ liệu với đường dẫn hình ảnh cụ thể
                $sql = "INSERT INTO products (`name`,  `category`, `image`) VALUES ('$productName',  '$category', '$image_path')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Không thể di chuyển file.";
            }
        } else {
            echo "Loại hoặc kích thước của tệp không hợp lệ.";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin sản phẩm.";
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>