<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['fullName']) && isset($_SESSION['iduser'])) {
    // Người dùng đã đăng nhập, lấy thông tin từ session
    $fullName = $_SESSION['fullName'];
    $iduser = $_SESSION['iduser'];
    $isLoggedIn = true; // Set isLoggedIn to true since the user is logged in

    // Hiển thị thông báo chào mừng và nút đăng xuất
    echo "<a href='../php/logout.php'>Đăng xuất</a>";
} else {
    // Người dùng chưa đăng nhập, hiển thị nội dung đăng nhập
    echo "Xin chào, bạn chưa đăng nhập. <a href='../interface/login_singup.html'>Đăng nhập</a>";
    $isLoggedIn = false;
}
?>
