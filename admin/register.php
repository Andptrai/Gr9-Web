<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // Mật khẩu của bạn, nếu có
$dbname = "web2"; // Tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$fullName = $_POST['inputFullName'];
$userName = $_POST['inputUserName'];
$Email = $_POST['inputEmail'];
$Password = $_POST['inputPassword'];
$address = $_POST['inputAddress'];
$phonenumber = $_POST['inputPhoneNumber'];
// Vì mật khẩu là thông tin nhạy cảm, nên bạn cần mã hóa nó trước khi lưu vào cơ sở dữ liệu. 
// Có thể sử dụng hàm hash như password_hash() trong PHP.
$hashed_password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);

// Tiến hành thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO user (fullName, userName, Email,Address,phoneNumber, Password) VALUES ('$fullName', '$userName', '$Email','$address','$phonenumber', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
