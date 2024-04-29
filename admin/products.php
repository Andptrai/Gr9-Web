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
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
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
    <form id="editProductForm" action="../php/update_product.php" method="POST" enctype="multipart/form-data">
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
<!-- lấy data  -->
<script>
// Thêm sự kiện click vào nút "Edit" và thực hiện AJAX khi mở modal
document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll('.edit-product');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('data-productid'); // Lấy ID sản phẩm từ data attribute
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var productInfo = JSON.parse(xhr.responseText); // Parse dữ liệu JSON trả về
                        // Điền thông tin sản phẩm vào các trường trong form
                        document.getElementById('editProductID').value = productInfo.id;
                        document.getElementById('editProductName').value = productInfo.name;
                        document.getElementById('editCategory').value = productInfo.category;
                        // Hiển thị hình ảnh sản phẩm trong form (nếu có)
                        if (productInfo.image) {
                            var imageElement = document.getElementById('currentProductImage');
                            imageElement.src = productInfo.image; // Đặt đường dẫn hình ảnh từ dữ liệu JSON
                            imageElement.style.display = 'block'; // Hiển thị ảnh
                        }
                    } else {
                        console.error('Error: Request failed.');
                    }
                }
            };
            xhr.open('GET', '../php/get_product_info.php?id=' + productId, true); // Điều chỉnh đường dẫn ở đây
            xhr.send();
        });
    });
});

</script>
<!-- delete prod -->
<script>
    // Bắt sự kiện khi tài liệu được tải hoàn tất
document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các nút xóa sản phẩm
    var deleteButtons = document.querySelectorAll('.delete-product');

    // Duyệt qua từng nút xóa sản phẩm và gán sự kiện khi được nhấn
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Lấy ID sản phẩm từ thuộc tính data của nút xóa
            var productId = this.getAttribute('data-productid');
            
            // Hiển thị hộp thoại xác nhận xóa
            if (confirm("Are you sure you want to delete this product?")) {
                // Tạo yêu cầu AJAX để xóa sản phẩm
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Xóa sản phẩm khỏi giao diện nếu xóa thành công
                            // Ví dụ: có thể xóa hoặc ẩn phần tử thẻ card của sản phẩm
                            console.log("Product deleted successfully");
                        } else {
                            console.error("Error deleting product");
                        }
                    }
                };
                xhr.open('POST', 'http://localhost/Gr9-Web/php/delete_product.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('productID=' + productId); // Truyền ID sản phẩm cần xóa
            }
        });
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
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
