<?php
// customer_actions.php

require '../php/connect.php';

$action = $_POST['action'];
$id = $_POST['iduser'];

switch ($action) {
    // case 'add':
        // Thêm khách hàng
        // Cần thêm mã để thêm khách hàng vào cơ sở dữ liệu
        // break;
    case 'delete':
        // Xóa khách hàng
        // Cần thêm mã để xóa khách hàng khỏi cơ sở dữ liệu
        $sql = "DELETE FROM user WHERE iduser = $id";
        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
        break;
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
