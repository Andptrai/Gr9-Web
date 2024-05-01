<?php
// Bao gồm file quản lý session và cookies
require_once '../php/check_session.php';

// Hàm để thêm sản phẩm vào giỏ hàng
function addToCart($productId, $productName, $productPrice) {
    // Lấy giỏ hàng từ cookies
    $cart = getCartFromCookies();

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (isset($cart[$productId])) {
        // Nếu đã tồn tại, tăng số lượng lên 1
        $cart[$productId]['quantity'] += 1;
    } else {
        // Nếu chưa tồn tại, thêm mới sản phẩm vào giỏ hàng
        $cart[$productId] = array(
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        );
    }

    // Lưu giỏ hàng mới vào cookies
    saveCartToCookies($cart);
}

// Hàm để tính tổng số tiền trong giỏ hàng
function calculateTotal() {
    $total = 0;
    // Lấy giỏ hàng từ cookies
    $cart = getCartFromCookies();
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Gọi hàm thêm sản phẩm vào giỏ hàng (có thể gọi từ các sự kiện trên trang web)
addToCart(1, "White Shirt Pleat", 19.00);
addToCart(2, "Converse All Star", 39.00);
addToCart(3, "Nixon Porter Leather", 17.00);
?>
