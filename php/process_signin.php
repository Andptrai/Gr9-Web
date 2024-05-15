<?php
session_start();

// Kết nối đến cơ sở dữ liệu MySQL
require '../php/connect.php';

// Function to handle profile updates
function updateProfile($conn) {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullName'])) {
        // Get the form data
        $fullName = $_POST['fullName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];

        // Get the user's ID from the session
        $userId = $_SESSION['iduser'];

        // Validate the input as needed (e.g., ensure email format is correct, fields are not empty, etc.)

        // Update the user information in the database
        $sql = "UPDATE user SET fullName=?, userName=?, email=?, address=?, phoneNumber=? WHERE iduser=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $fullName, $userName, $email, $address, $phoneNumber, $userId);


        if ($stmt->execute()) {
            // Update session variables
            $_SESSION['fullName'] = $fullName;
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['phoneNumber'] = $phoneNumber;

            // Redirect to the profile page with a success message
            $_SESSION['message'] = "Profile updated successfully!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Handle the error
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn để kiểm tra username và password trong cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Đăng nhập thành công, lấy thông tin người dùng và xác định vai trò
        $row = $result->fetch_assoc();
        $role = $row['role'];
        $iduser = $row['iduser'];
        $fullName = $row['fullName'];
        $userName = $row['userName'];
        $email = $row['email'];
        $address = $row['address'];
        $phoneNumber = $row['phoneNumber'];
        $isLocked = $row['locked']; // Lấy trạng thái khóa của người dùng
        
        // Kiểm tra trạng thái khóa
        if ($isLocked == 1) {
            // Nếu người dùng bị khóa, chuyển hướng về trang đăng nhập với thông báo
            echo "Your account is locked. Please contact support.";
            exit();
        }
        
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['iduser'] = $iduser;
        $_SESSION['fullName'] = $fullName;
        $_SESSION['userName'] = $userName;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['phoneNumber'] = $phoneNumber;

        // Lưu vai trò vào session và chuyển hướng tới trang tương ứng
        $_SESSION['role'] = $role;
        if ($role == 0) {
            header('Location: http://localhost/Gr9-Web/interface/index.php');
            exit();
        } elseif ($role == 1) {
            header('Location: http://localhost/Gr9-Web/admin/index.php');
            exit();
        }
    } else {
        // Đăng nhập không thành công, thông báo lỗi hoặc chuyển hướng về trang đăng nhập với thông báo
        header('Location: login_signup.html?error=1');
        exit();
    }
} elseif (isset($_POST['fullName'])) {
    // Handle profile update
    updateProfile($conn);
} else {
    // Nếu không có dữ liệu đăng nhập được gửi đi, chuyển hướng về trang đăng nhập
    header('Location: login.php');
    exit();
}

$conn->close();
?>
