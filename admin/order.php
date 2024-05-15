<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>COZA STORE Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Coza Store</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
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
                <div id="ordersBtn">
                    <h2>Order Details</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>O.N.</th>
                                <th>Customer</th>
                                <th>Delivery location</th>
                                <th>OrderDate</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>More Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code for fetching orders -->
                            <?php
                            include_once "../php/connect.php";
                            $sql = "SELECT * from orders";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $row["order_id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["delivery_location"] ?></td>
                                        <td><?= $row["order_date"] ?></td>
                                        <td><?= $row["payment_method"] ?></td>
                                        <?php if ($row["order_status"] == 0) { ?>
                                            <td><button id="btn<?= $row['order_id'] ?>" class="btn btn-danger" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Pending</button></td>
                                        <?php } else { ?>
                                            <td><button id="btn<?= $row['order_id'] ?>" class="btn btn-success" onclick="ChangeOrderStatus('<?= $row['order_id'] ?>')">Delivered</button></td>
                                        <?php } ?>

                                        <td><a class="btn btn-primary openPopup" data-orderid="<?= $row['order_id'] ?>" href="javascript:void(0);">View</a></td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</div>

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

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body" id="orderDetailsContent">
                <!-- Content loaded via AJAX will be placed here -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script>
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var orderID = $(this).data('orderid');
            $.ajax({
                url: 'order_details.php', // Path to your PHP file
                type: 'GET',
                data: {order_id: orderID},
                success: function (response) {
                    $('#orderDetailsContent').html(response);
                    $('#viewModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while fetching order details.');
                }
            });
        });
    });

    function ChangeOrderStatus(id){
    $.ajax({
       url: "../php/updateOrderStatus.php",
       method: "post",
       data: {record: id},
       success: function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           // Thực hiện cập nhật trạng thái đơn hàng trực tiếp trên trang hiện tại
           // Bạn có thể thực hiện cập nhật DOM tại đây thay vì gọi hàm showOrders()
           // Ví dụ: cập nhật trực tiếp trạng thái của button mà không cần reload trang
           if (data.trim() === "success") {
               var button = $('#btn' + id);
               if (button.hasClass('btn-danger')) {
                   button.removeClass('btn-danger').addClass('btn-success').text('Delivered');
               } else {
                   button.removeClass('btn-success').addClass('btn-danger').text('Pending');
               }
           }
       }
   });
}

</script>

</body>
</html>
