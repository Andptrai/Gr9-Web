<?php
require '../php/connect.php';

// Kiểm tra xem có tồn tại tham số product_id trong URL không
if (isset($_GET['product_id'])) {
    // Lấy giá trị product_id từ URL
    $productId = $_GET['product_id'];

    // Sử dụng prepared statements để tránh SQL injection
    $stmt = $conn->prepare("SELECT * FROM products WHERE idProduct = ?");
    $stmt->bind_param("i", $productId); // Sử dụng "i" cho kiểu integer

    // Thực thi truy vấn
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có dữ liệu trả về không
    if ($result->num_rows > 0) {
        // Lấy dữ liệu từ kết quả truy vấn
        $row = $result->fetch_assoc();

        // Chuẩn bị dữ liệu để trả về dưới dạng JSON
        $productInfo = array(
            'id' => $row['idProduct'],
            'name' => $row['name'],
            'price' => $row['price'],
            // 'description' => $row['description'],
            'category' => $row['category'],
            'image' => $row['image'],
            'image2' => $row['image2'],
            'image3' => $row['image3']
        );

        // Trả về dữ liệu dưới dạng JSON
    } else {
        echo "Product not found.";
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Product ID not provided.";
}
?>
