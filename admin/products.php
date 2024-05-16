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
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" id="inputSearch"/>
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <?php if ($isLoggedIn): ?>
						<li class="dropdown-item"><button onclick="window.location.href='../php/logout.php'">Đăng xuất</button></li>
                        <?php else: ?>
							<li class="dropdown-item"><button onclick="window.location.href='../interface/login_singup.html'">Đăng nhập</button></li>
						<?php endif; ?>		
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
                    <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Quản lý đơn hàng
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
                        <label for="productName" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productImage1" class="form-label">Image1</label>
                        <input type="file" class="form-control" id="productImage1" name="productImage1" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage2" class="form-label">Image2</label>
                        <input type="file" class="form-control" id="productImage2" name="productImage2" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage3" class="form-label">Image3</label>
                        <input type="file" class="form-control" id="productImage3" name="productImage3" required>
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
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="editDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="text" class="form-control" id="editProductPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="currentProductImage1" class="form-label">Current Image1</label>
                            <img src="" alt="Product Image" id="currentProductImage1" style="max-width: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="editNewProductImage1" class="form-label">New Image1</label>
                            <input type="file" class="form-control" id="editNewProductImage1" name="newProductImage1">
                        </div>
                        <div class="mb-3">
                            <label for="currentProductImage2" class="form-label">Current Image2</label>
                            <img src="" alt="Product Image" id="currentProductImage2" style="max-width: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="editNewProductImage2" class="form-label">New Image2</label>
                            <input type="file" class="form-control" id="editNewProductImage2" name="newProductImage2">
                        </div>
                        <div class="mb-3">
                            <label for="currentProductImage3" class="form-label">Current Image3</label>
                            <img src="" alt="Product Image" id="currentProductImage3" style="max-width: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="editNewProductImage3" class="form-label">New Image3</label>
                            <input type="file" class="form-control" id="editNewProductImage3" name="newProductImage3">
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
    const editButtons = document.querySelectorAll('.edit-product');
    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const productId = button.getAttribute('data-productid');
            // Assuming 'button' is inside the card element
            const productName = button.parentNode.querySelector('.card-title').textContent;
            const category = button.parentNode.querySelector('.card-text').textContent.split(':')[1].trim();

            // Lấy thông tin sản phẩm từ cơ sở dữ liệu (ví dụ: thông qua AJAX)
            fetch('../php/get_product_info.php?product_id=' + productId)
            .then(response => response.json())
            .then(data => {
                // Điền thông tin sản phẩm vào form chỉnh sửa
                document.getElementById('editProductID').value = productId;
                document.getElementById('editProductName').value = productName;
                document.getElementById('editCategory').value = category;
                document.getElementById('editDescription').value = data.description; // Điền mô tả vào trường mô tả
                document.getElementById('editProductPrice').value = data.price; // Điền giá vào trường giá


                // Hiển thị hình ảnh sản phẩm hiện tại từ cơ sở dữ liệu
                if (data.image) {
                    document.getElementById('currentProductImage1').src = data.image;
                }
                if (data.image2) {
                    document.getElementById('currentProductImage2').src = data.image2;
                }
                if (data.image3) {
                    document.getElementById('currentProductImage3').src = data.image3;
                }
                
            })
            .catch(error => console.error('Error:', error));
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

<script>
    // Xử lý sự kiện khi nút tìm kiếm được nhấn
    document.getElementById('inputSearch').addEventListener('click', function() {
        const searchQuery = document.getElementById('inputSearch').value.trim();
        fetch('search.php?search=' + encodeURIComponent(searchQuery))
        .then(response => response.text())
        .then(data => {
            document.getElementById('productList').innerHTML = data; // Thay thế nội dung danh sách sản phẩm với kết quả tìm kiếm
        })
        .catch(error => console.error('Error:', error));
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
