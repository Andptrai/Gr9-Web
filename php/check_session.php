<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['fullName'])) {
    // Người dùng đã đăng nhập, lấy vai trò từ session
    $fullName = $_SESSION['fullName'];

    // Kiểm tra vai trò và hiển thị nội dung tương ứng
    echo "Xin chào ,  " . $fullName . ". Bạn đã đăng nhập thành công.";

    // Nội dung khác cho người dùng đã đăng nhập
    // Ví dụ: Hiển thị nút đăng xuất
    echo "<a href='../php/logout.php'>Đăng xuất</a>";
} else {
    // Người dùng chưa đăng nhập, hiển thị nội dung đăng nhập
    echo "Xin chào, bạn chưa đăng nhập. <a href='../interface/login_singup.html'>Đăng nhập</a>";
}
?>
