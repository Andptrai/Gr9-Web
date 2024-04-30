<?php
require_once '../php/connect.php';

// Hàm để truy vấn thông tin sản phẩm dựa trên ID
function getProductById($productId) {
    global $conn;

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
        return $row;
    } else {
        return null; // Trả về null nếu không tìm thấy sản phẩm
    }

    // Đóng kết nối
    $stmt->close();
}

// Hàm để tìm kiếm sản phẩm dựa trên từ khóa
function searchProducts($searchKeyword) {
    global $conn;

    // Làm sạch từ khóa tìm kiếm
    $searchKeyword = mysqli_real_escape_string($conn, $searchKeyword);

    // Truy vấn dữ liệu từ bảng products phù hợp với từ khóa tìm kiếm
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchKeyword%'";
    $result = $conn->query($sql);

    // Kiểm tra xem có sản phẩm nào được trả về từ truy vấn không
    if ($result->num_rows > 0) {
        // Nếu có ít nhất một sản phẩm, trả về mảng chứa thông tin sản phẩm
        $products = array();
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return array(); // Trả về mảng rỗng nếu không có sản phẩm nào phù hợp
    }
}

// Hàm để lấy tất cả sản phẩm nếu không có yêu cầu tìm kiếm
function getAllProducts() {
    global $conn;

    // Truy vấn tất cả sản phẩm từ bảng products
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Kiểm tra xem có sản phẩm nào được trả về từ truy vấn không
    if ($result->num_rows > 0) {
        // Nếu có ít nhất một sản phẩm, trả về mảng chứa thông tin sản phẩm
        $products = array();
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    } else {
        return array(); // Trả về mảng rỗng nếu không có sản phẩm nào
    }
}

// Đóng kết nối sau khi hoàn tất các thao tác
$conn->close();
?>
