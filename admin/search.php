<?php
require '../php/connect.php';

if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
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

$conn->close();
?>
