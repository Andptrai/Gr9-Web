<?php
// Kết nối đến cơ sở dữ liệu
include '../php/connect.php';
include '../php/addToCart.php';

// Kiểm tra xem liệu dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin vận chuyển từ form
    $shipping_address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    // Lấy user_id từ session
    $user_id = $_SESSION['iduser']; 

    // Thêm thông tin đơn hàng vào bảng orders
    $sql_order = "INSERT INTO orders (user_id, delivery_location, payment_method) VALUES (?, ?, ?)";
    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param("iss", $user_id, $shipping_address, $payment_method);
    $stmt_order->execute();

    // Lấy ID của đơn hàng mới được thêm vào
    $order_id = $conn->insert_id;

    // Thêm các mục đơn hàng vào bảng order_items
    $sql_order_item = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)";
    $stmt_order_item = $conn->prepare($sql_order_item);

    // Lặp qua các sản phẩm trong giỏ hàng và thêm vào đơn hàng
    foreach ($cart_items as $item) {
        $product_id = $item['idProduct'];
        $quantity = $item['quantity'];
        $unit_price = $item['product_price'];

        $stmt_order_item->bind_param("iiid", $order_id, $product_id, $quantity, $unit_price);
        $stmt_order_item->execute();
    }

    // Xóa các mục giỏ hàng của người dùng từ bảng cart_items
    $sql_delete_cart_items = "DELETE FROM cart_items WHERE cart_id IN (SELECT cart_id FROM carts WHERE iduser = ?)";
    $stmt_delete_cart_items = $conn->prepare($sql_delete_cart_items);
    $stmt_delete_cart_items->bind_param("i", $user_id);
    $stmt_delete_cart_items->execute();

    // Thống kê tổng số tiền cho đơn hàng hiện tại và thêm vào bảng order_statistics
    $sql_total_amount = "SELECT SUM(quantity * unit_price) AS total_amount FROM order_items WHERE order_id = ?";
    $stmt_total_amount = $conn->prepare($sql_total_amount);
    $stmt_total_amount->bind_param("i", $order_id);
    $stmt_total_amount->execute();
    $result_total_amount = $stmt_total_amount->get_result();

    if ($result_total_amount->num_rows > 0) {
        $row_total_amount = $result_total_amount->fetch_assoc();
        $total_amount = $row_total_amount['total_amount'];

        // Thêm hoặc cập nhật tổng số tiền vào bảng order_statistics
        $sql_insert_update_stat = "INSERT INTO order_statistics (user_id, order_id, total_amount) VALUES (?, ?, ?)";
        $stmt_insert_update_stat = $conn->prepare($sql_insert_update_stat);
        $stmt_insert_update_stat->bind_param("iii", $user_id, $order_id, $total_amount);
        $stmt_insert_update_stat->execute();
    }

    // Sau khi thêm đơn hàng và các mục đơn hàng, cũng như xóa các mục giỏ hàng, bạn có thể tiếp tục xử lý, chẳng hạn chuyển hướng hoặc hiển thị thông báo thành công.

    // Chẳng hạn:
    // header("Location: success.php");
    // exit();

    // Đóng kết nối
    $conn->close();
}
?>
