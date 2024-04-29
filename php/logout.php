<?php
// Bắt đầu hoặc tiếp tục một phiên đã tồn tại
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Nếu cần, hủy bỏ cookie phiên
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hủy bỏ phiên hiện tại
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính của bạn
header("Location: ../interface/login_singup.html");
exit();
?>
