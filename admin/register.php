<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "123"; // Mật khẩu của bạn, nếu có
$dbname = "register"; // Tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Lấy dữ liệu từ form và xử lý
$fullName = $_POST['inputFullName'];
$userName = $_POST['inputUserName'];
$email = $_POST['inputEmail'];
$address = $_POST['inputAddress'];
$phoneNumber = $_POST['inputPhoneNumber'];
$password = $_POST['inputPassword'];

// Kiểm tra dữ liệu đầu vào
if (empty($fullName) || empty($userName) || empty($email) || empty($password) || empty($address) || empty($phoneNumber)) {
    echo "Vui lòng điền đầy đủ thông tin.";
    exit();
}

// Kiểm tra tính hợp lệ của email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email không hợp lệ.";
    exit();
}

// Kiểm tra số điện thoại chỉ chứa các chữ số
if (!ctype_digit($phoneNumber)) {
    echo "Số điện thoại chỉ được chứa các chữ số.";
    exit();
}

// Băm mật khẩu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Tiến hành thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO registerform (fullName, userName, email, address, phoneNumber, password) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $fullName, $userName, $email, $address, $phoneNumber, $hashed_password);

if ($stmt->execute()) {
    // Chuyển hướng người dùng về trang index
    header("Location: index.php");
    exit(); // Đảm bảo không có mã HTML hoặc mã PHP nào được thực thi sau hàm header
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
<!-- end php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <form action="register.php" method="post" onsubmit="return validateForm()"";> <!-- Thêm action và method vào form -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    
                                                    <input class="form-control" id="inputFullName" name="inputFullName" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFullName">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                           
                                                    <input class="form-control" id="inputUserName" name="inputUserName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputUserName">User Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                     
                                            <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                
                                                    <input class="form-control" id="inputAddress" name="inputAddress" type="text" placeholder="Your address" />
                                                    <label for="inputAddress">Address</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                
                                                    <input class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" type="text" placeholder="Your phone number" />
                                                    <label for="inputPhoneNumber">Phone Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                
                                                    <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                
                                                    <input class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        // Function to validate password and confirm password match
        function validatePassword() {
            var password = document.getElementById("inputPassword").value;
            var confirmPassword = document.getElementById("inputPasswordConfirm").value;
    
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    
        // Function to validate phone number
        function validatePhoneNumber() {
            var phoneNumber = document.getElementById("inputPhoneNumber").value;
            var phoneNumberPattern = /^\d+$/;
    
            if (!phoneNumber.match(phoneNumberPattern)) {
                alert("Phone number must contain only digits.");
                return false;
            }
            return true;
        }
    
        // Function to handle form submission
        function validateForm() {
            return validatePassword() && validatePhoneNumber();
        }
    </script>
    
</body>
</html>
