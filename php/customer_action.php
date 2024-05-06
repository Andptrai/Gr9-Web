<?php
// customer_actions.php

require '../php/connect.php';

$action = $_POST['action'];
$id = $_POST['iduser'];

switch ($action) {
    case 'add':
         // Lấy dữ liệu từ form thêm người dùng
         $fullName = $_POST['fullName'];
         $userName = $_POST['userName'];
         $email = $_POST['email'];
         $address = $_POST['address'];
         $phoneNumber = $_POST['phoneNumber'];
         $password = $_POST['password']; // Cần mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
 
         // Thêm người dùng mới vào cơ sở dữ liệu
         $sql = "INSERT INTO user (fullName, userName, email, address, phoneNumber, Password) VALUES ('$fullName', '$userName', '$email', '$address', '$phoneNumber', '$password')";
         if ($conn->query($sql) === TRUE) {
             echo "New user added successfully";
         } else {
             echo "Error adding new user: " . $conn->error;
         }
        break;
    case 'edit':
         // Lấy dữ liệu từ form chỉnh sửa
         $fullName = $_POST['fullName'];
         $userName = $_POST['userName'];
         $email = $_POST['email'];
         $address = $_POST['address'];
         $phoneNumber = $_POST['phoneNumber'];
        
         // Thực hiện cập nhật thông tin khách hàng
         $sql = "UPDATE user SET fullName = '$fullName', userName = '$userName', email = '$email', address = '$address', phoneNumber = '$phoneNumber' WHERE iduser = $id";
         if ($conn->query($sql) === TRUE) {
             echo "User information updated successfully";
         } else {
             echo "Error updating user information: " . $conn->error;
         }
        break;
    // case 'delete':
        // Xóa khách hàng
        // Cần thêm mã để xóa khách hàng khỏi cơ sở dữ liệu
        // $sql = "DELETE FROM user WHERE iduser = $id";
        // if ($conn->query($sql) === TRUE) {
        //     echo "User deleted successfully";
        // } else {
        //     echo "Error deleting user: " . $conn->error;
        // }
        // break;
    case 'lock':
        // Khóa khách hàng
        // Cần thêm mã để khóa khách hàng trong cơ sở dữ liệu
        $sql = "UPDATE user SET locked = 1 WHERE iduser = $id";
        if ($conn->query($sql) === TRUE) {
            echo "User locked successfully";
        } else {
            echo "Error locking user: " . $conn->error;
        }
        break;
    case 'unlock':
        // Mở khách hàng
        // Cần thêm mã để mở khách hàng trong cơ sở dữ liệu
        $sql = "UPDATE user SET locked = 0 WHERE iduser = $id";
        if ($conn->query($sql) === TRUE) {
            echo "User unlocked successfully";
        } else {
            echo "Error unlocking user: " . $conn->error;
        }
        break;
    default:
        echo "Invalid action";
}

$conn->close();
?>
