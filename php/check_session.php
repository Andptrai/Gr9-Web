<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['fullName']) && isset($_SESSION['iduser'])) {
    // Người dùng đã đăng nhập, lấy thông tin từ session
    $fullName = $_SESSION['fullName'];
    $iduser = $_SESSION['iduser'];

    // Hiển thị thông báo chào mừng và nút đăng xuất
    echo "Xin chào, $fullName. Bạn đã đăng nhập thành công.";
    echo "<a href='../php/logout.php'>Đăng xuất</a>";
} else {
    // Người dùng chưa đăng nhập, hiển thị nội dung đăng nhập
    echo "Xin chào, bạn chưa đăng nhập. <a href='../interface/login_singup.html'>Đăng nhập</a>";
}
?>
