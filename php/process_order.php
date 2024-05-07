<?php
// Kết nối đến cơ sở dữ liệu
include '../php/connect.php';
include '../php/addToCart.php';

// Kiểm tra xem liệu dữ liệu đã được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin vận chuyển từ form
    $shipping_address = $_POST['address'];
    // Lấy user_id từ session
    $user_id = $_SESSION['iduser']; 

    // Thêm thông tin đơn hàng vào bảng orders
    $sql_order = "INSERT INTO orders (user_id, delivery_location) VALUES (?, ?)";
    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param("is", $user_id, $shipping_address);
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

    // Sau khi thêm đơn hàng và các mục đơn hàng, cũng như xóa các mục giỏ hàng, bạn có thể tiếp tục xử lý, chẳng hạn chuyển hướng hoặc hiển thị thông báo thành công.

    // Chẳng hạn:
    // header("Location: success.php");
    // exit();

    // Đóng kết nối
    $conn->close();
}
?>
