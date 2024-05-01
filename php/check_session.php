<?php
session_start();

// Hàm để kiểm tra xem người dùng đã đăng nhập hay chưa
function isLoggedIn() {
    return isset($_SESSION['fullName']);
}

// Hàm để đăng nhập và lưu thông tin người dùng vào session
function login($fullName) {
    $_SESSION['fullName'] = $fullName;
}

// Hàm để đăng xuất và xóa thông tin người dùng từ session
function logout() {
    unset($_SESSION['fullName']);
}

// Hàm để lưu giỏ hàng vào cookies
function saveCartToCookies($cart) {
    setcookie('cart', serialize($cart), time() + (86400 * 30), "/"); // Lưu trong 30 ngày
}

// Hàm để lấy giỏ hàng từ cookies
function getCartFromCookies() {
    return isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
}
?>
