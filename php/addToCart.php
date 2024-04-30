<?php
// Assuming you have a connection to the database
$product_id = $_GET['id'];
$quantity = 1; // Default quantity

$sql = "INSERT INTO cart (idProduct, quantity) VALUES ($idProduct, $quantity)";

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
