<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editProductID'], $_POST['productName'], $_POST['category'])) {
        // Sanitize input data
        $productID = mysqli_real_escape_string($conn, $_POST['editProductID']);
        $productName = mysqli_real_escape_string($conn, $_POST['productName']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        // Check for file uploads
        if (isset($_FILES['newProductImage1'], $_FILES['newProductImage2'], $_FILES['newProductImage3'])) {
            $uploadDir = "../interface/images/";

            // Handle image uploads
            $imagePaths = [];
            $uploadSuccess = true;
            $targetFiles = [];
            $newImages = [$_FILES['newProductImage1'], $_FILES['newProductImage2'], $_FILES['newProductImage3']];
            foreach ($newImages as $key => $newImage) {
                $imageName = uniqid() . "_" . basename($newImage["name"]);
                $targetFile = $uploadDir . $imageName;
                if (move_uploaded_file($newImage["tmp_name"], $targetFile)) {
                    $imagePaths[] = $targetFile;
                    $targetFiles[] = "image" . ($key + 1);
                } else {
                    $uploadSuccess = false;
                    echo "Lỗi khi tải lên hình ảnh " . ($key + 1);
                    break;
                }
            }

            if ($uploadSuccess) {
                // Update product information
                // Update product information
                $sql = "UPDATE products SET name=?, category=?, image=?, image2=?, image3=? WHERE idProduct=?";
                $stmt = $conn->prepare($sql);
                // Bind parameters
                $stmt->bind_param("sssssi", $productName, $category, $imagePaths[0], $imagePaths[1], $imagePaths[2], $productID);

                if ($stmt->execute()) {
                    echo "Sản phẩm đã được cập nhật thành công";
                } else {
                    echo "Lỗi khi cập nhật sản phẩm: " . $stmt->error;
                }
                $stmt->close();
            }
        } else {
            // No new images, update product information only
            $sql = "UPDATE products SET name=?, category=? WHERE idProduct=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $productName, $category, $productID);
            if ($stmt->execute()) {
                echo "Sản phẩm đã được cập nhật thành công";
            } else {
                echo "Lỗi khi cập nhật sản phẩm: " . $stmt->error;
            }
            $stmt->close();
        }
    } elseif (isset($_POST['deleteProductID'])) {
        // Handle product deletion
        $productID = mysqli_real_escape_string($conn, $_POST['deleteProductID']);

        // Delete product from database
        $sql = "DELETE FROM products WHERE idProduct=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);
        if ($stmt->execute()) {
            echo "Sản phẩm đã được xóa thành công";
        } else {
            echo "Lỗi khi xóa sản phẩm: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // If no data from the form, redirect back to the previous page or homepage
        header("Location: http://localhost/Gr9-Web/admin/products.php");
        exit();
    }
}

// Close database connection
$conn->close();
?>
