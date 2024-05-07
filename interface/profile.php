<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
   
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
    </style>
</head>
<body>
<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header('Location: login.php');
    exit();
}

// Trích xuất thông tin người dùng từ session
$fullName = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$phoneNumber = isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : '';
?>
<div class="container-xl px-4 mt-4">

    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>

    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">

            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">

                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>

                </div>
            </div>
        </div>
        <div class="col-xl-8">

            <div class="card mb-4">
                <div class="card-header">Your Account</div>
                <div class="card-body">
                    
               
                    <form action="../php/process_signin.php" method="post">
                        <div class="mb-3">
                            <label class="small mb-1" for="fullName">Full Name</label>
                            <input class="form-control" id="fullName" type="text" value="<?php echo $fullName; ?>">
                        </div>

                        <div class="md-3">
                            <label class="small mb-1" for="userName">User name</label>
                                <input class="form-control" id="userName" type="text" value="<?php echo $userName; ?>">
                        </div>

                        <div class="md-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control" id="email" type="email" type="text" value="<?php echo $email; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="address">Address</label>
                            <input class="form-control" id="address" type="text" type="text" value="<?php echo $address; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="phoneNumber">Phone number</label>
                            <input class="form-control" id="phoneNumber" type="tel"  type="text" value="<?php echo $phoneNumber; ?>">
                        </div>

                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>