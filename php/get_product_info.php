<?php

require '../php/connect.php';

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    if(!empty($productId)) {
        // Sanitize input
        $productId = intval($productId);

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
            header('Content-Type: application/json');
            echo json_encode($productInfo);
        } // Thiếu cặp dấu ngoặc đóng ở đây
        $stmt->close();
    } else {
        // Return JSON response for error
        header('Content-Type: application/json');
        echo json_encode(['error' => 'ID sản phẩm không được để trống.']);
    }
} else {
    // Handle case where no product ID is provided
    // Return JSON response for error
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No product ID provided.']);
}

$conn->close();
?>
