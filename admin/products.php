<!-- product.php -->
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
                    <!-- <div class="sb-sidenav-menu-heading">Management</div> -->
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
                <h1 class="mt-4">Add Product</h1>
                <form action="../php/add_products.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productType" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="Women">Women</option>
                            <option value="Men">Men</option>
                            <option value="Bag">Bag</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Watches">Watches</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Product List</h1>
                <div class="row">
                    <?php
                    // Kết nối đến cơ sở dữ liệu
                    require '../php/connect.php';

                    // Truy vấn để lấy danh sách sản phẩm
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    // Kiểm tra nếu có dữ liệu trả về từ truy vấn
                    if ($result->num_rows > 0) {
                        // Duyệt qua từng dòng dữ liệu và hiển thị thông tin sản phẩm
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4 mb-4">';
                            echo '<div class="card">';
                            echo '<img src="' . $row['image'] . '" class="card-img-top" alt="Product Image">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                            echo '<p class="card-text">Category: ' . $row['category'] . '</p>';
                            echo '<button class="btn btn-primary edit-product" data-productid="' . $row['idProduct'] . '" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>';
                            echo '<button class="btn btn-danger delete-product" data-productid="' . $row['idProduct'] . '">Delete</button>'; // Thêm nút xóa
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products available";
                    }

                    // Đóng kết nối cơ sở dữ liệu
                    $conn->close();
                    ?>

                </div>
            </div>
        </main>
        <!-- Modal -->
        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductForm" action="../php/product_action.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="productID" id="editProductID" value="">
                            <div class="mb-3">
                                <label for="editProductName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="editProductName" name="productName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCategory" class="form-label">Category</label>
                                <select class="form-select" id="editCategory" name="category" required>
                                    <option value="Women">Women</option>
                                    <option value="Men">Men</option>
                                    <option value="Bag">Bag</option>
                                    <option value="Shoes">Shoes</option>
                                    <option value="Watches">Watches</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editProductImage" class="form-label">Current Image</label>
                                <img src="" alt="Product Image" id="currentProductImage" style="max-width: 200px;">
                            </div>
                            <div class="mb-3">
                                <label for="editNewProductImage" class="form-label">New Image</label>
                                <input type="file" class="form-control" id="editNewProductImage" name="newProductImage">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Xử lý sự kiện khi nút chỉnh sửa được nhấn
    // Xử lý sự kiện khi nút chỉnh sửa được nhấn
        const editButtons = document.querySelectorAll('.edit-product');
        editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const productId = button.getAttribute('data-productid');
            const productName = button.parentNode.querySelector('.card-title').textContent;
            const category = button.parentNode.querySelector('.card-text').textContent.split(':')[1].trim();

        // Điền thông tin sản phẩm vào form chỉnh sửa
        document.getElementById('editProductID').value = productId;
        document.getElementById('editProductName').value = productName;
        document.getElementById('editCategory').value = category;

        // Hiển thị hình ảnh sản phẩm hiện tại (nếu có)
        const cardImgTop = button.parentNode.querySelector('.card-img-top');
        if (cardImgTop) {
            const currentImage = cardImgTop.src;
            document.getElementById('currentProductImage').src = currentImage;
        }

    });
});


    // Xử lý sự kiện khi nút xóa được nhấn
    const deleteButtons = document.querySelectorAll('.delete-product');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const productId = button.getAttribute('data-productid');
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                // Gửi yêu cầu xóa sản phẩm đến product_action.php bằng phương thức POST
                const formData = new FormData();
                formData.append('deleteProductID', productId);

                fetch('../php/product_action.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Hiển thị thông báo từ product_action.php
                    location.reload(); // Tải lại trang sau khi xóa sản phẩm
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>
</body>
</html>
