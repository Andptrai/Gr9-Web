<?php

require '../php/connect.php';

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    if(!empty($productId)) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE idProduct = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productInfo = [
                'id' => $row['idProduct'],
                'name' => $row['name'],
                'price' => $row['price'],
                'category' => $row['category'],
                'image' => $row['image'],
                'image2' => $row['image2'],
                'image3' => $row['image3']
            ];
            
        } else {
            echo "Sản phẩm không tồn tại.";
        }
        
        $stmt->close();
    } else {
        echo "ID sản phẩm không được để trống.";
    }
} else {
}

$conn->close();
?>