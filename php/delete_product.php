<?php
require '../php/connect.php';

// Kiểm tra xem có dữ liệu productID được gửi từ yêu cầu POST không
if (isset($_POST['productID'])) {
    $productId = $_POST['productID'];

    // Kiểm tra số lượng của sản phẩm
    $quantity = getProductQuantity($productId);

    if ($quantity !== false) {
        if ($quantity > 0) {
            // Nếu còn hàng tồn kho, hiển thị xác nhận xóa
            echo "Are you sure you want to delete this product?";
            echo '<button onclick="deleteProduct(' . $productId . ')">Yes</button>';
            echo '<button onclick="cancelDelete()">No</button>';
        } else {
            // Nếu hết hàng, ẩn sản phẩm
            hideProduct($productId);
        }
    } else {
        echo "Error checking product quantity";
    }
} else {
    echo "Product ID not provided";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();

// Hàm lấy số lượng sản phẩm
function getProductQuantity($productId) {
    global $conn;
    $sql = "SELECT quantity FROM products WHERE idProduct='$productId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['quantity'];
    } else {
        return false;
    }
}

// Hàm ẩn sản phẩm
function hideProduct($productId) {
    global $conn;
    $sql = "UPDATE products SET hidden = 1 WHERE idProduct='$productId'";
    if ($conn->query($sql) === TRUE) {
        echo "Product hidden successfully";
    } else {
        echo "Error hiding product: " . $conn->error;
    }
}
?>
