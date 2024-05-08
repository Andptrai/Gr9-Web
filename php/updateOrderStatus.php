<?php

// Bao gồm tệp kết nối CSDL
include_once "../php/connect.php";

// Kiểm tra xem có dữ liệu gửi từ mã JavaScript không
if(isset($_POST['record'])) {
    // Lấy order_id từ dữ liệu gửi đi
    $order_id = $_POST['record'];

    // Chuẩn bị câu truy vấn SQL để lấy trạng thái đơn hàng
    $sql = "SELECT order_status FROM orders WHERE order_id='$order_id'";
    
    // Thực thi câu truy vấn SQL
    $result = $conn->query($sql);

    // Kiểm tra xem truy vấn có thành công không
    if($result) {
        // Lấy dòng dữ liệu từ kết quả truy vấn
        $row = $result->fetch_assoc();

        // Kiểm tra và cập nhật trạng thái đơn hàng
        if($row["order_status"] == 0) {
            $update = mysqli_query($conn, "UPDATE orders SET order_status=1 WHERE order_id='$order_id'");
        } else if($row["order_status"] == 1) {
            $update = mysqli_query($conn, "UPDATE orders SET order_status=0 WHERE order_id='$order_id'");
        }

        // Kiểm tra xem cập nhật có thành công không
        if($update) {
            echo "success"; // Trả về thông báo thành công
        } else {
            echo "error"; // Trả về thông báo lỗi nếu cập nhật không thành công
        }
    } else {
        echo "error"; // Trả về thông báo lỗi nếu truy vấn không thành công
    }
} else {
    echo "error"; // Trả về thông báo lỗi nếu không có dữ liệu gửi đi từ mã JavaScript
}

?>
