<?php
include '../php/connect.php';
include '../php/check_session.php';
// Kiểm tra xem liệu dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin vận chuyển và thanh toán từ form
    $shipping_address = $_POST['shipping_address'];
    $payment_method = $_POST['payment_method'];

    // Lấy user_id từ session hoặc bất kỳ nguồn dữ liệu nào phù hợp khác
    $user_id = $_SESSION['iduser']; // Ví dụ, giả sử user_id được lưu trong session

    // Thêm thông tin đơn hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO orders (user_id, shipping_address, payment_method) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $shipping_address, $payment_method);
    $stmt->execute();

    // Lấy ID của đơn hàng mới được thêm vào
    $order_id = $conn->insert_id;

    // Tiến hành truy vấn SQL để chuyển đổi giỏ hàng thành đơn hàng
    $sql = "INSERT INTO order_items (order_id, product_id, quantity) SELECT ?, idProduct, quantity FROM cart_items WHERE cart_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $order_id, $cart_id);
    $stmt->execute();

    // Sau khi chuyển đổi xong, xóa giỏ hàng
    $sql = "DELETE FROM cart_items WHERE cart_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();

    // Redirect hoặc hiển thị thông báo thành công
    header("Location: success.php");
    exit();
}

// Đóng kết nối
$conn->close();
?>
