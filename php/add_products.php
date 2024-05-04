<?php
require '../php/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem tất cả các trường đã được gửi và không rỗng
    if (isset($_POST['productName'], $_POST['category'], $_FILES['productImage1'], $_FILES['productImage2'], $_FILES['productImage3']) &&
        !empty($_POST['productName']) && !empty($_POST['category'])) {

        $productName = $_POST['productName'];
        $category = $_POST['category'];

        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $upload_directory = "C:/xampp/htdocs/Gr9-Web/interface/images/";

        // Lặp qua các hình ảnh được tải lên
        $image_paths = array();
        for ($i = 1; $i <= 3; $i++) {
            $input_name = "productImage$i";
            if (isset($_FILES[$input_name]) && $_FILES[$input_name]['size'] > 0) {
                $upload_file = $_FILES[$input_name]['name'];
                $file_extension = pathinfo($upload_file, PATHINFO_EXTENSION);

                if (in_array($file_extension, $allowed_types)) {
                    $image_tmp = $_FILES[$input_name]['tmp_name'];
                    $image_path = "../interface/images/" . $upload_file;

                    if (move_uploaded_file($image_tmp, $upload_directory . $upload_file)) {
                        $image_paths[] = $image_path;
                    } else {
                        echo "Không thể di chuyển file.";
                        exit;
                    }
                } else {
                    echo "Loại hoặc kích thước của tệp không hợp lệ.";
                    exit;
                }
            } else {
                echo "Vui lòng chọn tệp hình ảnh.";
                exit;
            }
        }

        // Thêm dữ liệu vào cơ sở dữ liệu với các đường dẫn hình ảnh
        $sql = "INSERT INTO products (`name`, `category`, `image`, `image2`, `image3`) VALUES ('$productName', '$category', '$image_paths[0]', '$image_paths[1]', '$image_paths[2]')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin sản phẩm.";
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
