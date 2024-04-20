<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputEmail" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                    <?php if(isset($error_message)): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
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

    <?php
    require 'connect.php'; // Assuming 'connect.php' contains database connection logic

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputEmail = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : NULL;
        $inputPassword = isset($_POST['inputPassword']) ? $_POST['inputPassword'] : NULL;

        // Using prepared statements to prevent SQL injection
        $sql = "SELECT * FROM admin_login_logout WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $inputEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($inputPassword, $row['password'])) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $inputEmail;
                header("location: index.php");
                exit();
            } else {
                // Displaying error message on the login page
                $error_message = "Incorrect email or password.";
            }
        } else {
            // Displaying error message on the login page
            $error_message = "User not found.";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
