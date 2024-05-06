<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />  
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.php">Coza Store</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">login</a></li>
                <li><a class="dropdown-item" href="#!">register</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Trang chủ
                    </a>
                    <a class="nav-link" href="statistics.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Thống kê
                    </a>
                    <a class="nav-link" href="customer.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Khách hàng
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        
        <main>
            
            <div class="container-fluid px-4">
            <h1 class="mt-4">Add Customer</h1>                
            <form id="addUserForm" action="../php/customer_action.php" method="POST" enctype="multipart/form-data" style="padding-bottom: 20px;">
            <!-- <form action="../php/customer_action.php" method="POST"> -->
            <input type="hidden" id="add" name="action" value="add">
            <input type="hidden" id="add" name="iduser">

                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="userName" name="userName" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Numer</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <!-- Add button here -->
                <button type="submit" class="btn btn-primary">Add</button>
            </form>    
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Danh sách khách hàng
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>PhoneNumber</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Full name</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>PhoneNumber</th>
                                    <th>Password</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            require '../php/connect.php';

                            $sql = "SELECT iduser, fullName, userName, email, address, phoneNumber, Password, locked FROM user";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["fullName"]."</td>";
                                    echo "<td>".$row["userName"]."</td>";
                                    echo "<td>".$row["email"]."</td>";
                                    echo "<td>".$row["address"]."</td>";
                                    echo "<td>".$row["phoneNumber"]."</td>";
                                    echo "<td>".$row["Password"]."</td>";
                                    echo "<td>";
                                    if ($row["locked"] == 1) {
                                        echo "<button class='btn btn-success' onclick='performAction(\"unlock\", \"". $row['iduser'] ."\")'>Unlock</button>";
                                    } else {
                                        echo "<button class='btn btn-warning' onclick='performAction(\"lock\", \"". $row['iduser'] ."\")'>Lock</button>";
                                    }
                                    echo "<button class='btn btn-primary' onclick='openEditForm(\"". $row['iduser'] ."\")'>Edit</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>0 results</td></tr>";
                            }

                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
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

<!-- Edit Form -->
<div id="editForm" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditForm()">&times;</span>
        <h2>Edit User</h2>
        <form id="editUserForm" action="../php/customer_action.php" method="post">
            <input type="hidden" id="editAction" name="action" value="edit">
            <input type="hidden" id="userId" name="iduser" value="">
            <label for="fullName">Full Name:</label><br>
            <input type="text" id="fullName" name="fullName" ><br>
            <label for="userName">User Name:</label><br>
            <input type="text" id="userName" name="userName" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" ><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" ><br>
            <label for="phoneNumber">Phone Number:</label><br>
            <input type="text" id="phoneNumber" name="phoneNumber" ><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" ><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<script>
    function performAction(action, id) {
        var confirmMessage = "";
        switch (action) {
            case 'edit':
                confirmMessage = "Are you sure you want to add this user?";
                break;
            case 'lock':
                confirmMessage = "Are you sure you want to lock this user?";
                break;
            case 'unlock':
                confirmMessage = "Are you sure you want to unlock this user?";
                break;
            default:
                confirmMessage = "Are you sure you want to perform this action?";
        }

        if (confirm(confirmMessage)) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xhttp.open("POST", "../php/customer_action.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("action=" + action + "&iduser=" + id);
        }
    }

    function openEditForm(id) {
        document.getElementById("userId").value = id;
        document.getElementById("editForm").style.display = "block";
    }

    function closeEditForm() {
        document.getElementById("editForm").style.display = "none";
    }

    function closeAddForm() {
        document.getElementById("addForm").style.display = "none";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
